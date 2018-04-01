<?php

/**
 * This is the model class for table "Operations".
 *
 * The followings are the available columns in table 'Operations':
 * @property integer $id
 * @property integer $id_player
 * @property integer $type_money
 * @property integer $summ
 * @property integer $type_operation
 */
class Operations extends CActiveRecord
{
    static $TYPE_BUY = 0;
    static $TYPE_EXIT = 1;
    static $TYPE_LIMIT = 2;

    static $OP_REFERAL = 0;
    static $OP_BILLING = 1;
    static $OP_BOSS = 2;
    static $OP_UPGRADE_SHIP = 3;
    static $OP_ARENA_ADD = 4;
    static $OP_ARENA_JOIN = 5;
    static $OP_MISSION_COMPLETTE = 6;
    static $OP_SALE_SHIP = 7;
    static $OP_ARENA_COMPLETE = 8;
    static $OP_BOOS_COMPLETE = 9;
    static $OP_CHANGE_MONEY_EXIT = 10;
    static $OP_BUY_SHIP = 11;
    static $OP_OUT_SUMM = 12;
    static $OP_GET_CASH_SHIP = 13;


    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Operations';
    }

    public function getTextMoney()
    {
        switch ( $this->type_money )
        {
            case Operations::$TYPE_LIMIT:
                return "Космический баланс";
            case Operations::$TYPE_BUY:
                return "Покупка";
            case Operations::$TYPE_EXIT:
                return "Сбережения";
        }
    }

    public function getIconMoney()
    {
        switch ( $this->type_money )
        {
            case Operations::$TYPE_LIMIT:
                return "<img src='/images/money.png' width='15'>";
            case Operations::$TYPE_BUY:
                return "<img src='/images/gold.png' width='15'>";
            case Operations::$TYPE_EXIT:
                return "<img src='/images/gold.png' width='15'>";
        }
    }


    public function getTextOperation()
    {
        switch ($this->type_operation) {
            case Operations::$OP_REFERAL:
                return "Получил реферальные начисления";
            case Operations::$OP_BILLING:
                return "Внес средства в игру";
            case Operations::$OP_BOSS:
                return "Битва с боссом";
            case Operations::$OP_UPGRADE_SHIP:
                return "Покупка в магазине";
            case Operations::$OP_ARENA_ADD:
                return "Создал битву";
            case Operations::$OP_ARENA_JOIN:
                return 'Присоединился к битве';
            case Operations::$OP_MISSION_COMPLETTE:
                return 'Удачно завершил миссию';
            case Operations::$OP_SALE_SHIP:
                return 'Продажа корабля';
            case Operations::$OP_ARENA_COMPLETE:
                return "Победил на арене";
            case Operations::$OP_BOOS_COMPLETE:
                return "Победил босса";
            case Operations::$OP_CHANGE_MONEY_EXIT:
                return "Обменял +10%";
            case Operations::$OP_BUY_SHIP:
                return "Купил корабль";
            case Operations::$OP_OUT_SUMM:
                return "Вывел из игры";
            case Operations::$OP_GET_CASH_SHIP:
                return "Заправился/собрал";
        }

    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_player, type_money, summ', 'required'),
            array('id_player, type_money, summ', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, id_player, type_money, summ', 'safe', 'on' => 'search'),
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
            'type_money' => 'Type Money',
            'summ' => 'Summ',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_player', $this->id_player);
        $criteria->compare('type_money', $this->type_money);
        $criteria->compare('summ', $this->summ);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Operations the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
