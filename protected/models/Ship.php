<?php

/**
 * This is the model class for table "ship".
 *
 * The followings are the available columns in table 'ship':
 * @property integer $id
 * @property string $type_ship
 * @property string $name_ship
 * @property string $summ
 * @property integer $speed_item_id
 * @property integer $power_item_id
 * @property integer $defend_item_id
 * @property integer $hold_item_id
 * @property integer $time_fuel_btn
 * @property integer $time_fuel_need_sec
 * @property integer $gfx
 * @property integer $gfx_speed
 * @property integer $gfx_power
 * @property integer $gfx_defend
 * @property integer $gfx_artefact

 *
 */
class Ship extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ship';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');


        // NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_ship, name_ship, id, time_fuel_btn, summ, gfx, time_fuel_need_sec', 'required'),
			array('speed_item_id, power_item_id, defend_item_id, hold_item_id, id, summ, time_fuel_need_sec', 'numerical', 'integerOnly'=>true),
			array('type_ship', 'length', 'max'=>10),
            array('name_ship', 'length', 'max'=>26, 'message'=>'{attribute} длинна строки не должна превышшать 26 символов'),
            array('gfx, gfx_speed, gfx_power, gfx_defend, gfx_artefact', 'length', 'max'=>125),
            array( 'type_ship, name_ship', 'filter', 'filter'=>$obj )


		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_ship' => 'Type ship',
            'name_ship' => 'Название корабля',
			'speed_item_id' => 'Speed Item',
			'power_item_id' => 'Power Item',
			'defend_item_id' => 'Defend Item',
			'hold_item_id' => 'Hold Item',
		);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ship the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function getSummToSell()
    {
       $summ_sell = round( $this->summ/100 * 80, 2 );
        return $summ_sell;
    }

    public function  getSummToBuy()
    {
        $summ_buy =  Yii::app()->params['ships_settings'][$this->type_ship]['summ'];
        return $summ_buy;
    }

    // Получить количество заработанных денег после последнего снятия
    public function getMoneyWorkTodey()
    {
        $time = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($this->time_fuel_btn));

        if( $time > $this->getTimeFuelNeedSec() )
        {
            $persent = Yii::app()->params['ships_settings'][$this->type_ship]['persent'];
            $money_work = ( $this->summ/100 * $persent ) / 2592000 * $this->getTimeFuelNeedSec();
            $money_work = round( floor($money_work * 100), 2 )/100;
        }
        else
        {
            $persent = Yii::app()->params['ships_settings'][$this->type_ship]['persent'];
            $money_work = ( $this->summ/100 * $persent ) / 2592000 * $time;
            $money_work = round( floor($money_work * 100), 2 )/100;
        }

        return $money_work;
    }

    // Получить прогноз прибыли в день
    public function getMoneyPrognozMonth()
    {
        $persent = Yii::app()->params['ships_settings'][$this->type_ship]['persent'];
        $money_work = ( $this->summ/100 * $persent );
        $money_work = round( floor($money_work * 100), 2 )/100;

        return $money_work;
    }

    // Получить прогнос прибыли в месяц
    public function getMoneyPrognozDay()
    {
        $persent = Yii::app()->params['ships_settings'][$this->type_ship]['persent'];
        $money_work = ( $this->summ/100 * $persent ) / 30;
        $money_work = round( floor($money_work * 100), 2 )/100;

        return $money_work;
    }

    // Просчитать требуемое время до заправки
    public function getTimeFuelNeedSec()
    {
        $time = $this->time_fuel_need_sec;

        if( $this->speed_item_id > 0 )
        {
            $items = $this->getBuyNextMagazinesForType();
            $time_engine = $items['engine'][$this->speed_item_id]['time_speed'];

            $time += $time_engine;
        }

        return $time;
    }

    // Получить количество оставшегося топлива в %
    public function getFuelPersent()
    {
        $time = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($this->time_fuel_btn));

        if( $time > $this->getTimeFuelNeedSec() )
        {
            $fuelPersent = 0;
        }
        else
        {
            $fuelPersent = round( 100 -  $time/$this->getTimeFuelNeedSec() * 100 );
        }

        return $fuelPersent;
    }

    // Зачислить деньги после нажатия кнопки на счет вывода игрока
    // Возвращает возможное получение прибыли 2х
    public function setFuelGetMoney( $player )
    {
        $isBonuce = false;

        // Получим текущий шанс и прибыль
        if( $this->power_item_id > 0 )
        {
            $items = $this->getBuyNextMagazinesForType();
            $chance = $items['guns'][$this->power_item_id]['2x'];
            $rnd = rand( 0, 100 );

            if( $chance > $rnd )
            {
                $isBonuce = true;
            }
        }

        if( $isBonuce == true ) {
            $player->setSummExitPlus( $this->getMoneyWorkTodey()*2 );
            $player->setOperation( Operations::$OP_GET_CASH_SHIP, Operations::$TYPE_EXIT, $this->getMoneyWorkTodey() * 2 );
        }
        else {
            $player->setSummExitPlus( $this->getMoneyWorkTodey() );
            $player->setOperation( Operations::$OP_GET_CASH_SHIP, Operations::$TYPE_EXIT, $this->getMoneyWorkTodey() );
        }


        $this->time_fuel_btn = date("Y-m-d H:i:s");
        $this->save();

        return $isBonuce;
    }

    // Ролучить количество часов полета без дозоправки
    public function getHoursToFuel()
    {
       $fuelHours = $this->getTimeFuelNeedSec() / 60/ 60;
        return $fuelHours;
    }

    // Получить прототипы прототипы оружия персонажа для магазина
    public function getBuyNextMagazinesForType()
    {
        $items_shop = Yii::app()->params[$this->type_ship];;
        return $items_shop;
    }

    // Получить количество битв на арене
    public function getStatisticArenaWars()
    {
        $countArenaWars = ArenaJoiners::model()->count( "id_player=:id_player",  array( ':id_player'=>$this->id ) );
        return $countArenaWars;
    }

    // Получить количество побед
    public function getWinsArena()
    {
        $countArenaWins = ArenaRoom::model()->count( "winner_id=:winner_id",  array( ':winner_id'=>$this->id ) );
        return $countArenaWins;
    }

    // Убил боссов
    public function getCountWinBoss()
    {
        $countWin = Boss::model()->count( 'status=1 and player_id=:player_id', array( ":player_id"=>$this->id ) );
        return $countWin;
    }


    //Выполнил миссий
    public function getMissionsCount()
    {
        $countMissions = Missions::model()->count( "id_player=:id_player",  array( ':id_player'=>$this->id ) );
        return $countMissions;
    }

    // Шанс получения двойной прибыли
    public function getChance2x()
    {
        if( $this->power_item_id > 0 )
        {
            $items = $this->getBuyNextMagazinesForType();
            $chance = $items['guns'][$this->power_item_id]['2x'];

            return $chance;
        }
        else
        {
            return 0;
        }
    }


    // Получить текущий параметр из базы по типу придмета персонажа
    public function getParamForKeyPrototype( $key )
    {
        switch( $key )
        {
            case 'guns':
                return $this->power_item_id;
                break;

            case 'engine':
                return $this->speed_item_id;
                break;

            case 'defend':
                return $this->defend_item_id;
                break;

            case 'artefact':
                return $this->hold_item_id;
                break;
        }

    }



    // Установить новую вещб на корабль
    // $key - тип вещи,
    // #summ - стоимоть вещи
    // которую устанавливаем и обновить стоимость корабля
    public function setNewItemToshipAndUpdateSummship( $key, $summ, $gfx )
    {
        switch( $key )
        {
            case 'guns':
                $this->power_item_id++;
                $this->gfx_power = $gfx;
                break;

            case 'engine':
                $this->speed_item_id++;
                $this->gfx_speed = $gfx;
                break;

            case 'defend':
                $this->defend_item_id++;
                $this->gfx_defend = $gfx;
                break;

            case 'artefact':
                $this->hold_item_id++;
                $this->gfx_artefact = $gfx;
                break;
        }

        $this->summ += $summ;
        $this->save();
    }


    // Получить количество новых сражений
    public function getNewFightsArenaCount()
    {
        $criteria = new CDbCriteria();
        $criteria->condition = 'id_player = :id_player AND is_new = :is_new';
        $criteria->params = array( ':id_player'=>$this->id, ':is_new' => 1 );

        $count = ArenaJoiners::model()->count( $criteria );

        return $count;
    }

    public function addship( $player )
    {
        $this->id = $player->id;
        $this->time_fuel_btn = date("Y-m-d H:i:s");
        $this->summ = $this->getSummToBuy();
        $this->gfx = '/images/ships/' . $this->type_ship . '.png';
        $this->time_fuel_need_sec = Yii::app()->params['first_time_fuel_need_sec'];


        // Если денег хватает сохранить корабль и редиректить
        if ($player->setSummBuyPlus(-$this->getSummToBuy())) {

            $player->setOperation( Operations::$OP_BUY_SHIP, Operations::$TYPE_BUY, -$this->getSummToBuy() );


            if( $this->save(false) )
            {
                return true;
            }
        }


    }

    // Дополнительный шанс от защиты
    public function getChanceMissionPlus()
    {
        if( $this->defend_item_id != 0 ) {
            $items = $this->getBuyNextMagazinesForType();
            $chance = $items['defend'][$this->defend_item_id]['persent_mission'];
            return $chance;
        }else
        {
            return 0;
        }
    }



}
