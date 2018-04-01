<?php

/**
 * This is the model class for table "Arena_joiners".
 *
 * The followings are the available columns in table 'Arena_joiners':
 * @property integer $id
 * @property integer $id_room
 * @property integer $id_player
 * @property string $type_gun           // Строка из 10 символов, каждый символ от 1 до 3 стратегия
 * @property integer $status           // Статус игры
 * @property integer $is_new          // если игра сыграна но еще не просмотрена
 */

class ArenaJoiners extends CActiveRecord
{

    public $loose_step;
    public $ship;

    public $room;


    // STATUS
//  0 - не сыграна
//  1 - умер/сыграл
//  2 - выиграл/сыграл
//  3 - ничья
//  4 - забрал деньги // выигрышь
//  5 - забрал деньги // ничья
//  6 - закрыл // проиграл

    static $STATUS_NO_COMPLETTE = 0;
    static $STATUS_LOOSE = 1;
    static $STATUS_WIN = 2;
    static $STATUS_NOTHING = 3;
    static $STATUS_GET_MONEY = 4;
    static $STATUS_NOTHING_GET_MONEY  = 5;
    static $STATUS_CLOSE = 6;

    static  $IS_NEW = 1;
    static  $IS_OLD = 0;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Arena_joiners';
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
			array('id_room, id_player, type_gun', 'required',  'message'=>'Укажите полную стратегию из 10 шагов'),
			array('id_room, id_player, status, is_new', 'numerical', 'integerOnly'=>true),
			array('type_gun', 'length', 'max'=>10),
            array( 'type_gun', 'filter', 'filter'=>$obj )
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
			'id_room' => 'Id Room',
			'id_player' => 'Id Player',
			'type_gun' => 'Type Gun',
		);
	}


    public  function getshipJoiner()
    {
        $ship = Ship::model()->findByAttributes( array( 'id'=>$this->id_player ) );
        $this->ship = $ship;
    }

    public function validateStrategy()
    {
        $array = str_split($this->type_gun);

        if( count( $array ) != 10 )
            return false;

        foreach( $array as $gun )
        {
            if( $gun == "1" || $gun == "2" || $gun == "3" )
            {
            }
            else
            {
                return false;
            }
        }

        return true;
    }


    // Получить текущий ход игрока на данном шаге
    public function getCurrentTypeGunForStepNum( $step )
    {
        $steps = str_split($this->type_gun);
        return $steps[$step];
    }

    // Приходит массив с действиями всех игроков в раунде, нужно определить выиграл или проиграл
    // $step - теукущий шаг
    public function traceWinnerOrLooseRound( $array_guns_in_step, $step )
    {
        // Получить мой тип оружия на этом шаге
        $my_gun = $this->getCurrentTypeGunForStepNum( $step );

        $my_ansvers_for_round = [];

        foreach( $array_guns_in_step as $id_player=>$gun )
        {
            // Если проверяю сам себя то пропускаю
            if( $id_player != $this->id_player ) {

                //Сравнить свое оружие с оружием игрока
                // Игрок отвечает про себя Выиграл или Проиграл А НЕ ПРО СОПЕРНИКА!
                switch ($my_gun) {
                    case 1:
                        if ($gun == 1)
                            $my_ansvers_for_round[$id_player] = 'Ничья';
                        else if ($gun == 2)
                            $my_ansvers_for_round[$id_player] = 'Выиграл';
                        else if ($gun == 3)
                            $my_ansvers_for_round[$id_player] = 'Проиграл';
                        break;

                    case 2:
                        if ($gun == 1)
                            $my_ansvers_for_round[$id_player] = 'Проиграл';
                        else if ($gun == 2)
                            $my_ansvers_for_round[$id_player] = 'Ничья';
                        else if ($gun == 3)
                            $my_ansvers_for_round[$id_player] = 'Выиграл';
                        break;

                    case 3:
                        if ($gun == 1)
                            $my_ansvers_for_round[$id_player] = 'Выиграл';
                        else if ($gun == 2)
                            $my_ansvers_for_round[$id_player] = 'Проиграл';
                        else if ($gun == 3)
                            $my_ansvers_for_round[$id_player] = 'Ничья';
                        break;
                }
            }

        }


        // Дополнительно проверяем если у других игроков он увидел как проигравших так и выигравших
        // то этот раунд никто не выиграл
        $is_win = false;
        $is_loose = false;
        foreach( $my_ansvers_for_round as $ansver )
        {
            if( $ansver == 'Выиграл' )
            {
                $is_win = true;
            }
            if( $ansver == 'Проиграл' )
            {
                $is_loose = true;
            }
        }

        // если есть победители и проигравшие то возвращаем false / переход на другой раунд
        if( $is_loose == true && $is_win == true || $is_loose == false && $is_win == false )
        {
            return false;
        }
        // Если есть только выигрывшие и ничья или проигравшие и ничья
        // то раунд или окончен или выбывают несколько игроков
        else {
            return $my_ansvers_for_round;
        }
    }



    // НИЧЬЯ вернуть ставку игроку
    public function backMoneyNotWins()
    {
        $this->is_new = 1;
        $this->status = 3;
        $this->save( false );
    }

    public function setWinn()
    {
        $this->is_new = 1;
        $this->status = 2;
        $this->save( false );
    }

    public function setLoose()
    {
        $this->is_new = 1;
        $this->status = 1;
        $this->save( false );
    }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArenaJoiners the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
