<?php

/**
 * This is the model class for table "missions".
 *
 * The followings are the available columns in table 'missions':
 * @property integer $id
 * @property integer $id_player         // ид игрока взявшего миссию
 * @property string $type_ship          // тип кораблика
 * @property integer $type_mission       // получаем из game_Settings
 * @property integer $summ              // плата за миссию
 * @property integer $status            // 0- новая 1 - Взята 2- выполнена(не получили деньги) 3- выполнена (получили) 4 - невыполнена
 * @property string $time               // Время начала миссии
 * @property integer $time_need_sec     // Сколько требуется времени на миссию
 * @property integer $type_get_money     // Сколько требуется времени на миссию
 */
class Missions extends CActiveRecord
{

    static $MISSION_NO_GET = 0;
    static $MISSION_IN_WORK = 1;
    static $MISSION_COMPLETE = 2;
    static $MISSION_COMPLETE_GET = 3;
    static $MISSION_NOT_COMPLETE = 4;

    static $TYPE_MONEY_LIMIT = 1;
    static $TYPE_MONEY_BUY = 2;
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'missions';
    }


    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type_ship, type_mission, summ, status, time_need_sec', 'required'),
            array('id_player, summ, status, time_need_sec', 'numerical', 'integerOnly' => true),
            array('type_ship', 'length', 'max' => 10),
            // The following rule is used by search().

        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    public function getTypeMoneyGFX()
    {
        $typemoney = '';

        switch ( $this->type_get_money )
        {
            case 1:
                $typemoney = "<img src='/images/money.png'>";
                break;
            case 2:
                $typemoney = "<img src='/images/gold.png'>";
                break;

        }

        return $typemoney;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_player' => 'Id Player',
            'type_ship' => 'Type Ship',
            'summ' => 'Summ',
            'status' => 'Status',
            'time' => 'Time',
            'time_need_sec' => 'Time Need Sec',
        );
    }


    // Генерируем миссии. умножаем сумму на 1000 чтобы получить копейки
    public function generateMissions($summ)
    {
        // Передаем кол-во поступивших денег для генерации миссиий
        $numMissions = $this->getAmountMissions($summ);

        $summ = $summ * 1000;

        $piratSumm = $summ * 0.25;
        $this->addMissions($piratSumm,  $numMissions[3], "pirat");

        $killerSumm = $summ * 0.25;
        $this->addMissions($killerSumm,  $numMissions[2], "killer");

        $sellerSumm = $summ * 0.25;
        $this->addMissions($sellerSumm,  $numMissions[1], "seller");

        $workerSumm = $summ * 0.25;
        $this->addMissions($workerSumm,  $numMissions[0], "worker");

    }

    // Получить кол-во миссиий для генерации
    function getAmountMissions( $summ )
    {
        $arrAmount = array();

       if( $summ < 50 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['50'];
       }
       else if( $summ < 100 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['100'];
       }
       else if( $summ < 300 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['300'];
       }
       else if( $summ < 500 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['500'];
       }
       else if( $summ < 1000 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['1000'];
       }
       else if( $summ < 3000 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['3000'];
       }
       else if( $summ < 7000 )
       {
           $arrAmount = Yii::app()->params['mission_generate']['7000'];
       }

       return $arrAmount;
    }


    public function addMissions($summ, $numm, $type)
    {
        for ($i = 0; $i < $numm; $i++) {
            $mission = new Missions();
            $mission->type_ship = $type;
            $mission->type_mission = $mission->getTypeMission();
            $mission->summ = round(($summ / $numm), 0);
            $mission->status = 0;
            $mission->time_need_sec = rand(3600, 14400);

            if( !$mission->save())
            {
                print_r( $mission->getErrors() );
            }
        }
    }

    public function getTimeToNeedSec()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if( $ship->hold_item_id > 0 )
        {
            $items = $ship->getBuyNextMagazinesForType();
            $persent = $items['artefact'][$ship->hold_item_id]['persent'];

            return $this->time_need_sec - $this->time_need_sec * $persent/100;
        }else
        {
            return $this->time_need_sec;
        }
    }


    public function checkComplete()
    {
        if( $this->status != Missions::$MISSION_IN_WORK )
            return;

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        $time = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($this->time));


        if( $time > $this->getTimeToNeedSec() )
        {

            if( rand(0, 100) > $this->getChanceMission() +  (int)$ship->getChanceMissionPlus() )
            {

                $this->status = Missions::$MISSION_NOT_COMPLETE;
                $this->update( array( 'status' ) );
            }
            else
            {
                $this->status = Missions::$MISSION_COMPLETE;
                $this->update( array( 'status' ) );
            }

            return true;

        }
        return false;
    }

    /**
     * Возвращает ID миссии для текущего типа персонажа
     * @return int
     */
    public function getTypeMission()
    {
        return rand(0, count(Yii::app()->params['missions'][$this->type_ship]) - 1);
    }

    public function getIconMission()
    {
        return Yii::app()->params['missions'][$this->type_ship][$this->type_mission]['img'];
    }

    public function getTextMission()
    {
        return Yii::app()->params['missions'][$this->type_ship][$this->type_mission]['text'];
    }

    public function getChanceMission()
    {
        return Yii::app()->params['missions'][$this->type_ship][$this->type_mission]['chance'];
    }

    public function getTimeNeed()
    {
        return gmdate("H:i:s", $this->getTimeToNeedSec());
    }

    public function getTimeNeedWithoutArt()
    {
        return gmdate("H:i:s", $this->time_need_sec);
    }

    public function getSummWin()
    {
        return round($this->summ / 1000, 2);
    }


    public function getTimeCompleteMissionSec()
    {
        if( $this->status == Missions::$MISSION_IN_WORK )
        {
            $time = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($this->time));
            return  $this->getTimeToNeedSec() - $time;
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Missions the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
