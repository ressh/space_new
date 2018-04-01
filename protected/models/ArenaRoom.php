<?php

/**
 * This is the model class for table "Arena_room".
 *
 * The followings are the available columns in table 'Arena_room':
 * @property integer $id
 * @property integer $summ
 * @property integer $creator_id
 * @property string $time
 * @property integer $quantity
 * @property integer $is_complete   // 1 - завершена
 * @property integer $type_money
 * @property integer $step          // Выигрышный раунд
 * @property integer $winner_id     // ид победителя
 */
class ArenaRoom extends CActiveRecord
{
    static $MONEY_GAME = 0;
    static $MONEY_LIMIT = 1;

    static $WIN_COFFICIENT = 0.8;

    public $warior_ship;
    public $winner_ship;

    public $summ_valid = [

        0=>5,
        1=>10,
        2=>25,
        3=>50,
        4=>100,
        5=>250,
        6=>500
    ];

    public $quantity_valid = [

        0=>2,
        1=>3,
        2=>5,
        3=>7

    ];

    public $type_money_valid = [

        0=>0,
        1=>1

    ];

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Arena_room';
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
			array('summ, creator_id, quantity, type_money', 'required'),
			array('summ, creator_id, quantity, is_complete, type_money, step, winner_id', 'numerical', 'integerOnly'=>true),
            array( 'summ, creator_id, quantity, type_money', 'filter', 'filter'=>$obj )
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
			'summ' => 'Summ',
			'creator_id' => 'Creator',
			'time' => 'Time',
			'quantity' => 'Quantity',
			'is_complete' => 'Is Complete',
		);
	}

    public function getCountPlayers()
    {
        $count = ArenaJoiners::model()->count( 'id_room=:id_room', array( ':id_room'=>$this->id ));
        return $count;
    }

    public function getDubleJoin( $id_player )
    {
        $joiners = ArenaJoiners::model()->findAllByAttributes( array( 'id_room'=>$this->id ) );

        // Проверить если игрок уже зареган
        foreach( $joiners as $aJ )
        {
            if( $id_player == $aJ->id_player )
            {
                return true;
            }
        }

        return false;
    }

    public function getTypeMoney()
    {
        $type_string = '';

        switch( $this->type_money )
        {
            case 0:
                $type_string = "<img src='/images/gold.png'>";
                break;

            case 1:
                $type_string = "<img src='/images/money.png'>";
                break;

        }

        return $type_string;
    }


    // Проверить правильность выбора поля Сумма
	public function validateSumm()
    {
        foreach( $this->summ_valid as $valid )
        {
            if( $valid == $this->summ )
            {
                return true;
            }
        }

        return false;
    }

    // Проверить правильнсть выбора поля количество игроков
    public function validateQuantity()
    {
        foreach( $this->quantity_valid as $valid )
        {
            if( $valid == $this->quantity )
            {
                return true;
            }
        }

        return false;
    }

    // Проверить правильность выбора валюты
    public function validateTypeMoney()
    {
        foreach( $this->type_money_valid as $valid )
        {
            if( $valid == $this->type_money )
            {
                return true;
            }
        }

        return false;
    }

    public function addFight()
    {
        // Получаем всех участников
        $joiners = $this->getAllFighters();
        $fighters = [];
        $winner = null;
        $step_win = 0;

        // Пересортируем их с ключем id_player
        foreach( $joiners as $join )
        {
            $fighters[$join->id_player] = $join;
        }


        // Переберем все 10 раундов
        for( $step=0; $step<10; $step++ )
        {
            // Запишем массив текущего раунда (действия игроков)
            $step_strategys = [];
            foreach( $fighters as $join )
            {
               // Получить текущее действие игроков в этом раунде и записать в массив
               $step_strategys[$join->id_player] = $join->getCurrentTypeGunForStepNum( $step );
            }

            // Теперь перебираем эти действия для каждого игрока конкретно, чтобы он определил выиграл или проиграл
            $ansver_players = []; // Ответы игроков
            foreach( $step_strategys as $id_player=>$gun )
            {
                // Получаем игрока из массива $figthers по ключу
                $join = $fighters[$id_player];

                // Проверяем что ответит текущий игрок о его положении =)
                $ansver_players[$id_player] = $join->traceWinnerOrLooseRound( $step_strategys, $step );

                // Если раунд не вигрышный
                if( $ansver_players[$id_player] == false )
                {
                    $ansver_players = null;
                    break;
                }
            }


            // Раунд кто-то выиграл возможно не один чел
            if( $ansver_players != null )
            {
                // Получить тех кто выиграл раунд
                // Передаем ответы всех игроков и массив игроков
                // Возвращаем массив победителей
                $fighters = $this->getWinnerPlayersRound( $ansver_players, $fighters );

                if( count( $fighters ) == 1 )
                {
                    $winner = reset($fighters);
                    $this->step = $step;
                    $this->winner_id = $winner->id_player;
                    $this->is_complete = 1;


                    $this->setInfoJoiners();
                    $this->update();
                    break;
                }
            }

        }

        if( $winner == null )
        {
            $this->winner_id = 0;
            $this->is_complete = 1;
            $this->update();
            $this->backAllMoneyJoiners();
        }

    }



    // Ответы всех игроков относительно друг друга массив в массиве
    // В каждом ответе $key - ссылка на соперника и статус по отношению к нему
    // Выиграл, проиграл или ничья
    public function getWinnerPlayersRound( $ansver_players, $figthers )
    {

        // Переберем ответы каждого игрока относительно другого
        // Каждый игрок отвечает
        // Array ( [3] => Array ( [2] => Проиграл ) )
        // Где он говорит про сеябя я 3-ий и я проиграл 2-му
        foreach( $ansver_players as $id_player=>$ansver )
        {
            // Переберем ответ первого игрока и удалим
            // его, если он ответит что проиграл
            foreach( $ansver as $is_loose ) {
                if ($is_loose == 'Проиграл') {
                    // Удаляем того игрока, в чьме ответе есть слово проиграл
                    unset($figthers[$id_player]);
                }
            }
        }

        return $figthers;
    }


    // Ничья вернуть все деньги игрокам
    public function backAllMoneyJoiners()
    {
       $joiners = $this->getAllFighters();

        foreach( $joiners as $joiner )
        {
            $joiner->backMoneyNotWins();
        }
    }

    // Отправить инфо игрокам, кто выиграл
    public function setInfoJoiners()
    {
        $joiners = $this->getAllFighters();

        foreach( $joiners as $joiner )
        {
            if( $joiner->id_player == $this->winner_id )
                $joiner->setWinn();
            else
                $joiner->setLoose();
        }
    }

    // Получить всех игроков
    public function getAllFighters()
    {
        $fighters = ArenaJoiners::model()->findAllByAttributes( array( 'id_room'=>$this->id ) );
        return $fighters;
    }

    public function getMoneyWin()
    {
        $summ = round(($this->summ * $this->quantity) * ArenaRoom::$WIN_COFFICIENT, 2);
        return $summ;
    }

    public function setMoneyForGame( $player )
    {
        if ($this->type_money == ArenaRoom::$MONEY_GAME) {

            $player->setSummBuyPlus( $this->getMoneyWin() );
            $player->setOperation( Operations::$OP_ARENA_COMPLETE, Operations::$TYPE_BUY, $this->getMoneyWin() );

        } else if ($this->type_money == ArenaRoom::$MONEY_LIMIT) {
            $player->setSummLimitPlus( $this->getMoneyWin() );
            $player->setOperation( Operations::$OP_ARENA_COMPLETE, Operations::$TYPE_LIMIT, $this->getMoneyWin() );
        }

    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArenaRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
