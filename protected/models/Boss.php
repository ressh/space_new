<?php

/**
 * This is the model class for table "Boss".
 *
 * The followings are the available columns in table 'Boss':
 * @property integer $id
 * @property string $name
 * @property string $gfx
 * @property integer $type_boss
 * @property integer $type_money
 * @property integer $shots_need
 * @property integer $current_shot
 * @property integer $summ_shot
 * @property integer $time_add
 * @property integer $status
 * @property integer $player_id
 */
class Boss extends CActiveRecord
{

    static $MONEY_LIMIT = 1;
    static $MONEY_GAME = 0;

    static $LIVE = 0;
    static $WIN = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Boss';
	}

    public function getNameMoney()
    {
        switch( $this->type_money )
        {
            case Boss::$MONEY_GAME:
                return "Покупки";
                break;
            case Boss::$MONEY_LIMIT:
                return "Космический баланс";
                break;
        }


    }

    public function generateBoss( $type )
    {

        $this->current_shot = 0;
        $this->type_boss = $type;

        switch( $type )
        {
            case 0:
                $this->shots_need = rand( 10, 50 );
                $this->gfx = 'enemy22.png';
                $this->name = "Пират Таракан";
                $this->summ_shot = 1;
                break;

            case 1:
                $this->shots_need  = rand( 6, 25 );
                $this->gfx = 'enemy55.png';
                $this->name = 'Инопланетный корабль';
                $this->summ_shot = 5;
                break;

            case 2:
                $this->shots_need  = rand( 4, 15 );
                $this->gfx = 'enemy77.png';
                $this->name = 'Ястреб';
                $this->summ_shot = 10;
                break;

            case 3:
                $this->shots_need  = rand( 3, 10 );
                $this->gfx = 'enemy99.png';
                $this->name = 'Командный корабль Коалиции';
                $this->summ_shot = 25;
                break;

            case 4:
                $this->shots_need  = rand( 2, 5 );
                $this->gfx = 'enemy111.png';
                $this->name = 'Военный корабль Коалиции';
                $this->summ_shot = 50;
                break;
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
			array('name, gfx, type_boss, type_money, shots_need, current_shot, summ_shot', 'required'),
			array('type_boss, type_money, shots_need, current_shot, summ_shot', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('gfx', 'length', 'max'=>125),

		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'gfx' => 'Gfx',
			'type_boss' => 'Type Boss',
			'type_money' => 'Type Money',
			'shots_need' => 'Shots Need',
			'current_shot' => 'Current Shot',
			'summ_shot' => 'Summ Shot',
		);
	}

    public function setShot( $player )
    {

        $this->current_shot++;

        if( $this->current_shot >= $this->shots_need )
        {
            $summPluss = $this->shots_need * $this->summ_shot * 0.8;

            switch( $this->type_money )
            {
                case Boss::$MONEY_LIMIT:
                    $player->setSummLimitPlus( $summPluss );
                    $player->setOperation( Operations::$OP_BOOS_COMPLETE, Operations::$TYPE_LIMIT, $summPluss );
                    break;
                case Boss::$MONEY_GAME:
                    $player->setSummBuyPlus( $summPluss );
                    $player->setOperation( Operations::$OP_BOOS_COMPLETE, Operations::$TYPE_BUY, $summPluss );
                    break;
            }

            $boss = new Boss();
            $boss->type_boss = $this->type_boss;
            $boss->type_money = $this->type_money;
            $boss->generateBoss( $this->type_boss );
            $boss->save();


            $this->status = Boss::$WIN;
            $this->player_id = $player->id;

            $this->update( array( 'status', 'player_id' ) );

            return 'kill';
        }
        else
        {
            $this->update( array( 'current_shot' ) );

            return 'false';
        }
    }

    public function getWinner()
    {
        $ship = Ship::model()->findByPk($this->player_id);
        return $ship;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Boss the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
