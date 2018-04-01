<?php

/**
 * This is the model class for table "Referals".
 *
 * The followings are the available columns in table 'Referals':
 * @property integer $id
 * @property integer $id_player
 * @property integer $id_referal
 * @property integer $is_active
 * @property string $time
 */
class Referals extends CActiveRecord
{
    static $NOT_ACTIVE = 0;
    static $ACTIVE = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Referals';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_player, id_referal', 'required'),
            array('id_player, id_referal, is_active', 'numerical', 'integerOnly' => true),
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

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'id_player' => 'Id Player',
            'id_referal' => 'Id Referal',
            'is_active' => 'is Active',
            'time' => 'Time',
        );
    }

    // Получить статистику пополнений
    public function getStatus()
    {
        switch ($this->is_active) {
            case Referals::$NOT_ACTIVE:
                $txt = "Не активирован";
                break;
            case Referals::$ACTIVE:
                $statistic = Statistic::model()->findByAttributes(array('id_player' => $this->id_referal));
                $txt = "Активирован" . ", внес в систему: " . $statistic->invest_summ . ' <img width="35" src="/images/gold.png">';
                break;
        }

        return $txt;
    }

    public function getReferalPlayer()
    {
        $player = Player::model()->findByPk( $this->id_referal );
        return $player;
    }

    public function getReferalShip()
    {
        $ship  = Ship::model()->findByPk( $this->id_referal );
        return $ship;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Referals the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
