<?php

class GameController extends Controller
{
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0x000000, // background color
                'foreColor' => 0xFFFFFF, // font color

            ),
        );
    }

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(

            array('allow',  // allow all users to perform 'list' and 'show' actions

                'actions' => array(
                    'Galactic',
                    'News',
                    'Support',
                    'captcha',
                    'lookRandomFight',
                    'Arena',
                    'Magazine',
                    'HistpryFights',
                    'LookFight' ),

                'users' => array('*'),
            ),

            array('allow', // allow authenticated user to perform 'delete' and 'update' actions
                'actions' => array(
                    'Upgrade',
                    'AddRoomArena',
                    'JoinRoom',
                    'LookFight',
                    'GetMoneyWin',
                    'CloseFight',
                    'MoneyNothin',
                    'MyFightsComplete',
                    'getMoneyNothin',

                ),
                'users' => array('@'),
            ),

            array('deny',  // deny all users
                'users' => array('*')
            ),

        );
    }


    // Открыть страницу магазина
    public function actionMagazine()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('player/myship'));
            return;
        }

        $items = $ship->getBuyNextMagazinesForType();

        $this->render('magazine', array('player' => $player, 'ship' => $ship, 'items' => $items));
    }

    // Улучшить оружие
    public function actionUpgrade()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));



        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('player/myship'));
            return;
        }

        // Получить ссылку на все предметы игрока
        $person_prototype_items_shop = $ship->getBuyNextMagazinesForType();

        if (!isset($_GET['type'])) {
            $this->redirect($this->createUrl('player/myship'));
            return;
        }

        $type_item = $_GET['type'];

        // Получить текущий список по типу покупаемой вещи
        $type_buy = $person_prototype_items_shop[$type_item];

        // Получить текущую ИД текущей установленной вещи
        $id_ship_item = $ship->getParamForKeyPrototype($type_item);

        // Получить покупаемую вещь (следующюю по счету)
        $buy_item = $type_buy[$id_ship_item + 1];


        if ($player->setSummBuyPlus(-$buy_item['summ'])) {

            $player->setOperation( Operations::$OP_UPGRADE_SHIP, Operations::$TYPE_BUY, -$buy_item['summ'] );

            $ship->setNewItemToshipAndUpdateSummship($type_item, $buy_item['summ'], $buy_item['gfx_ship']);

            $journal = new Journal();
            $journal->item_id = $buy_item['id'];
            $journal->type = $type_item;
            $journal->summ = $buy_item['summ'];
            $journal->id_player = $player->id;
            $journal->save();

            $this->redirect($this->createUrl('/player/myship'));

        } else {
            $this->render('noMoney');
        }

    }



    public function actionGalactic()
    {

        $criteria = new CDbCriteria();
        $criteria->order = 'summ DESC';

        $count=Ship::model()->count($criteria);

        $pages=new CPagination($count);
        // элементов на страницу
        $pages->pageSize=10;
        $pages->applyLimit($criteria);

        $ships = Ship::model()->findAll($criteria);

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ( $player != null && $ship != null) {

            $position = Yii::app()->db->createCommand('SELECT t.UserRank FROM ( SELECT *, (@rownum := @rownum + 1) UserRank FROM `ship`, (SELECT @rownum := 0) t  ORDER BY summ DESC ) t  WHERE id = ' . $ship->id )->queryAll();

            $this->render('top_players_with_player', array('ships' => $ships,  'pages' => $pages, 'ship' => $ship, 'position'=>$position));
            return;
        }
        else
        {
        $this->render('top_players', array('ships' => $ships,  'pages' => $pages));
            return;
        }

    }


    public function actionNews()
    {

        $this->render('news');

    }

    public function actionSupport()
    {
        $form = new FormSendSupport();

        if (isset($_POST['FormSendSupport'])) {

            $form->attributes = $_POST['FormSendSupport'];

            if ($form->validate()) {
                $form->sendEmail();
                Yii::app()->user->setFlash('success', "Ваше письмо отправлено. Мы ответим на ваш email в ближайшее время!");
            }

        }

        $this->render('support', array('model' => $form));
    }


    public function actionArena()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));


        $criteria = new CDbCriteria();
        // Найти все активные игры, не созданные самим игроком и непосредственно созданные создателем
        $criteria->condition = 'is_complete=:is_complete';

        $criteria->params = array(":is_complete" => 0);
        $criteria->order = 'time DESC';

        $current_gamaes = ArenaRoom::model()->findAll($criteria);


        if ($current_gamaes != null) {
            foreach ($current_gamaes as $key => $game) {
                $warior_ship = Ship::model()->findByAttributes(array('id' => $game->creator_id));

                ////////////////////////////////////////////////////////////////////
                // Если игрок продал корабль после создания комнаты, удаляем комнату
                ////////////////////////////////////////////////////////////////////
                if ($warior_ship == null) {
                    unset($current_gamaes[$key]);
                    $current_gamaes = array_values($current_gamaes);
                    $game->delete();
                } else {

                    $game->warior_ship = $warior_ship;
                }

            }
        }

        $this->render('arena_mission', array('player' => $player, 'ship' => $ship, 'current_games' => $current_gamaes));

    }

    public function actionAddRoomArena()
    {

        $room = new ArenaRoom();
        $join = new ArenaJoiners();

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('game/arena'));
            return;
        }

        if (isset($_POST['ArenaRoom']) && isset($_POST['ArenaJoiners'])) {
            $room->attributes = $_POST['ArenaRoom'];
            $room->creator_id = $player->id;

            if (!$room->validateSumm()) {
                $room->addError('summ', "Неверно указана сумма игры");
                $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                return;
            }

            if (!$room->validateQuantity()) {
                $room->addError('quantity', "Неверно указано количество игроков");
                $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                return;
            }

            if (!$room->validateTypeMoney()) {
                $room->addError('type_money', "Неверно указан тип валюты");
                $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                return;
            }

            if ($room->save()) {
                $join->attributes = $_POST['ArenaJoiners'];
                $join->id_player = $player->id;
                $join->id_room = $room->id;
                $join->status = 0;


                if (!$join->validateStrategy()) {
                    $join->addError('type_gun', 'Вы указали неполную стратегию');
                    $room->delete();
                    $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                    return;
                }


                if ($room->type_money == 0) {
                    if (!$player->setSummBuyPlus(-$room->summ)) {

                        $player->setOperation( Operations::$OP_ARENA_ADD, Operations::$TYPE_BUY, -$room->summ );

                        $room->addError('summ', 'У вас не хватает денег на создание комнаты');
                        $room->delete();
                        $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                        return;
                    }
                } else {
                    if (!$player->setSummLimitPlus(-$room->summ)) {

                        $player->setOperation( Operations::$OP_ARENA_ADD, Operations::$TYPE_LIMIT, -$room->summ );

                        $room->addError('summ', 'У вас не хватает Космического баланса  на создание комнаты');
                        $room->delete();
                        $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                        return;
                    }
                }

                if ($join->save()) {
                    $this->redirect($this->createUrl('game/arena'));
                    return;
                }

            }


        }


        $this->render('add_arena_room', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));

    }

    public function actionJoinRoom()
    {

        $join = new ArenaJoiners();
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('game/arena'));
            return;
        }

        if (isset($_GET['id'])) {
            $room = ArenaRoom::model()->findByAttributes(array('id' => $_GET['id']));

            if ($room != null) {
                $this->render('add_join_strategy', array('join' => $join, 'player' => $player, 'room' => $room, 'ship' => $ship));
                return;
            }
        }


        if (isset($_POST['ArenaJoiners'])) {
            $room = ArenaRoom::model()->findByAttributes(array('id' => $_POST['ArenaJoiners']['id_room']));

            if ($room != null) {

                if ($room->is_complete == 0) {
                    // Проверить количество вступивших
                    if ($room->getCountPlayers() < $room->quantity) {
                        $join->attributes = $_POST['ArenaJoiners'];
                        $join->id_player = $player->id;
                        $join->id_room = $room->id;
                        $join->status = 0;

                        // Получить ид всех игроков, чтобы определить если кто ломится повторно
                        if( $room->getDubleJoin($join->id_player) )
                        {
                            Yii::app()->user->setFlash('info', "Вы уже зарегистрированы в битве!");
                            $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                            return;
                        }


                        if (!$join->validateStrategy()) {
                            Yii::app()->user->setFlash('info', "Вы указали неполную стратегию");
                            $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                            return;
                        }


                        if ($room->type_money == 0) {
                            if (!$player->setSummBuyPlus(-$room->summ)) {

                                $player->setOperation( Operations::$OP_ARENA_JOIN, Operations::$TYPE_BUY, -$room->summ );

                                Yii::app()->user->setFlash('info', "У вас не хватает денег, чтобы присоединиться");
                                $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                                return;
                            }
                        } else {
                            if (!$player->setSummLimitPlus(-$room->summ)) {

                                $player->setOperation( Operations::$OP_ARENA_JOIN, Operations::$TYPE_LIMIT, -$room->summ );

                                Yii::app()->user->setFlash('info', "У вас не хватает Космического баланса, чтобы присоединиться");
                                $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                                return;
                            }
                        }

                        if ($join->save()) {

                            // если набрали нужное количество игроков запускаем матч
                            if ($room->getCountPlayers() == $room->quantity) {
                                $room->addFight();
                                $this->redirect($this->createUrl('game/lookFight', array( 'id'=>$room->id )));
                            }

                            Yii::app()->user->setFlash('info', "Вы присоединились к игре");
                            $this->redirect($this->createUrl('game/Arena'));

                        } else {
                            $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                            return;
                        }

                    } else {
                        Yii::app()->user->setFlash('info', "В игру уже сыграли вы не успели!");
                        $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                        return;
                    }
                } else {
                    Yii::app()->user->setFlash('info', "В игру уже сыграли вы не успели!");
                    $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                    return;
                }

                Yii::app()->user->setFlash('info', "В игру уже сыграли вы не успели!");
                $this->render('add_join_strategy', array('ship' => $ship, 'player' => $player, 'room' => $room, 'join' => $join));
                return;

            }


        }
    }


    public function actionHistpryFights()
    {

        $criteria = new CDbCriteria();
        $criteria->addCondition('is_complete = :is_complete');
        $criteria->params = array(':is_complete' => 1);

        $count = ArenaRoom::model()->count($criteria);

        $pages = new CPagination($count);
        // элементов на страницу
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $history_games = ArenaRoom::model()->findAll($criteria);

        if ($history_games != null) {
            foreach ($history_games as $key => $game) {

                $winner_ship = null;

                if ($game->winner_id != 0)
                    $winner_ship = Ship::model()->findByAttributes(array('id' => $game->winner_id));

                ////////////////////////////////////////////////////////////////////
                // Если игрок продал корабль или НИЧЬЯ
                ////////////////////////////////////////////////////////////////////
                $game->winner_ship = $winner_ship;

            }
        }

        $this->render('history_fights', array('history_games' => $history_games, 'pages' => $pages));

    }

    public function actionLookFight()
    {
        if (isset($_GET['id'])) {
            $game = ArenaRoom::model()->findByPk(array('id' => $_GET['id']));
            $joiners = ArenaJoiners::model()->findAllByAttributes(array('id_room' => $game->id));

            $this->render('look_fight', array('game' => $game, 'joiners' => $joiners));
        }
    }


    public function actionLookRandomFight()
    {
        $criteria = new CDbCriteria;
        $criteria->addCondition('is_complete = 1');
        $criteria->limit = 1;
        $criteria->order = 'RAND()';


        $game = ArenaRoom::model()->find($criteria);

        $joiners = ArenaJoiners::model()->findAllByAttributes(array('id_room' => $game->id));

        $this->render('look_fight', array('game' => $game, 'joiners' => $joiners));
    }

    public function actionGetMoneyWin( $id )
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $game = ArenaRoom::model()->findByPk((int)$id);

        // Проверка победителя
        if ($game != null) {
            if ($game->is_complete == 1) {
                if ($game->winner_id == $player->id) {
                    $join = ArenaJoiners::model()->findByAttributes(array('id_room' => $game->id, 'id_player' => $player->id));

                    if ($join != null) {
                        if ($join->status == ArenaJoiners::$STATUS_WIN) {

                            if ($join->is_new == ArenaJoiners::$IS_NEW) {
                                $join->is_new = ArenaJoiners::$IS_OLD;
                                $join->status = ArenaJoiners::$STATUS_GET_MONEY;
                                $join->update( array( 'is_new', 'status' ) );

                                $game->setMoneyForGame($player);

                                $this->redirect($this->createUrl('game/MyFightsComplete'));
                            }
                        }
                    }
                }
            }
        }
    }

    public function actionCloseFight( $id )
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $game = ArenaRoom::model()->findByPk((int)$id);

        // Проверка победителя
        if ($game != null) {
            if ($game->is_complete == 1) {

                $join = ArenaJoiners::model()->findByAttributes(array('id_room' => $game->id, 'id_player'=>$player->id));

                if ($join != null) {
                    if ($join->status == ArenaJoiners::$STATUS_LOOSE) {
                        if ($join->is_new == ArenaJoiners::$IS_NEW) {

                            $join->is_new = ArenaJoiners::$IS_OLD;
                            $join->status = ArenaJoiners::$STATUS_CLOSE;
                            $join->update( array( 'is_new', 'status' ) );

                            $this->redirect($this->createUrl('game/MyFightsComplete'));
                        }
                    }
                }
            }
        }
    }

    public function  actiongetMoneyNothin( $id )
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $game = ArenaRoom::model()->findByPk((int)$id);

        // Проверка победителя
        if ($game != null) {
            if ($game->is_complete == 1) {
                if ($game->winner_id == 0) {
                    $join = ArenaJoiners::model()->findByAttributes(array('id_room' => $game->id));

                    if ($join != null) {
                        if ($join->status == ArenaJoiners::$STATUS_NOTHING) {
                            if ($join->is_new == ArenaJoiners::$IS_NEW) {

                                $join->is_new = ArenaJoiners::$IS_OLD;
                                $join->status = ArenaJoiners::$STATUS_NOTHING_GET_MONEY;
                                $join->update( array( 'is_new', 'status' ) );

                                $game->setMoneyForGame($player);

                                $this->redirect($this->createUrl('game/MyFightsComplete'));
                            }
                        }
                    }
                }
            }
        }
    }

    // Показать мои миссии
    public function actionMyFightsComplete()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        $criteria = new CDbCriteria();
        $criteria->condition = 'id_player = :id_player AND ( status = :die OR status = :win OR status = :nothing )';
        $criteria->params = array(':id_player' => $player->id, ':die' => ArenaJoiners::$STATUS_LOOSE, ':win' => ArenaJoiners::$STATUS_WIN, ':nothing' => ArenaJoiners::$STATUS_NOTHING);

        $joins = ArenaJoiners::model()->findAll($criteria);
        $pks = [];

        foreach ($joins as $join) {
            array_push($pks, $join->id_room);
        }

        $rooms = ArenaRoom::model()->findAllByPk($pks);

        if ($rooms != null) {
            foreach ($rooms as $key => $game) {

                $winner_ship = null;

                if ($game->winner_id != 0)
                    $winner_ship = Ship::model()->findByAttributes(array('id' => $game->winner_id));

                ////////////////////////////////////////////////////////////////////
                // Если игрок продал корабль или НИЧЬЯ
                ////////////////////////////////////////////////////////////////////
                $game->winner_ship = $winner_ship;

            }
        }

        $this->render('show_my_fights', array('player' => $player, 'ship' => $ship, 'joins' => $joins, 'rooms' => $rooms));
    }

    /*
            public function actionTestFights()
            {
                for( $f = 0; $f<100; $f++) {

                    $creator_id = rand( 2,3 );

                    $game = new ArenaRoom();
                    $game->creator_id = $creator_id;
                    $game->summ = 5;
                    $game->quantity = rand(2, 7);
                    $game->type_money = 0;

                    $joiners = [];

                    if ($game->save()) {


                        $joiner = new ArenaJoiners();
                        $joiner->id_player = $creator_id;
                        $joiner->id_room = $game->id;
                        $joiner->type_gun = rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3);

                        if ($joiner->save()) {
                            $joiners[] = $joiner;
                        }

                        for ($q = 1; $q < $game->quantity; $q++) {
                            $joiner = new ArenaJoiners();
                            $joiner->id_player = rand(300, 310);
                            $joiner->id_room = $game->id;
                            $joiner->type_gun = rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3) . rand(1, 3);

                            if ($joiner->save()) {
                                $joiners[] = $joiner;
                            }
                        }


                        $game->addFight();

                    }
                }

            }




            public function  actionGeneratePlayersAndship()
            {

                for( $f = 300; $f<310; $f++)
                {

                    $player = new Player();
                    $player->id = $f;
                    $player->name = rand( 231234, 343242343 );
                    $player->email = 'bot'. $f .'@mail.ru';
                    $player->password = '123123';
                    $player->password_repeat = '123123';
                    $player->save(false);

                    $ship = new ship();
                    $ship->id = $player->id;

                    switch(rand(1,4))
                    {
                        case 1:
                            $ship->type_ship = 'worker';

                            $ship->power_item_id = rand( 0, 10 );
                            $ship->speed_item_id = rand( 0, 4 );

                            $this->getItemForBot( 'guns', $ship );
                            $this->getItemForBot( 'engine', $ship );

                            break;
                        case 2:
                            $ship->type_ship = 'seller';

                            $ship->power_item_id = rand( 0, 10 );
                            $ship->speed_item_id = rand( 0, 7 );

                            $this->getItemForBot( 'guns', $ship );
                            $this->getItemForBot( 'engine', $ship );

                            break;
                        case 3:
                            $ship->type_ship = 'killer';

                            $ship->power_item_id = rand( 0, 10 );
                            $ship->speed_item_id = rand( 0, 10 );
                            $ship->defend_item_id = rand( 0, 6 );

                            $this->getItemForBot( 'guns', $ship );
                            $this->getItemForBot( 'engine', $ship );
                            $this->getItemForBot( 'defend', $ship );

                            break;
                        case 4:
                            $ship->type_ship = 'pirat';

                            $ship->power_item_id = rand( 0, 10 );
                            $ship->speed_item_id = rand( 0, 10 );
                            $ship->defend_item_id = rand( 0, 6 );

                            $this->getItemForBot( 'guns', $ship );
                            $this->getItemForBot( 'engine', $ship );
                            $this->getItemForBot( 'defend', $ship );

                            break;

                    }

                    $ship->name_ship = 'Бот';
                    $ship->time_fuel_btn = date("Y-m-d H:i:s");
                    $ship->summ = $ship->getSummToBuy() + rand( 300, 442352 );
                    $ship->gfx = '/images/ships/' . $ship->type_ship . '.png';
                    $ship->time_fuel_need_sec =  Yii::app()->params['first_time_fuel_need_sec'];


                    $ship->save( false );

                }

            }


            public function getItemForBot( $type, $ship )
            {
                $type_item = $type;

                $person_prototype_items_shop = $ship->getBuyNextMagazinesForType();

                // Получить текущий список по типу покупаемой вещи
                $type_buy = $person_prototype_items_shop[$type_item];

                // Получить текущую ИД текущей установленной вещи
                $id_ship_item = $ship->getParamForKeyPrototype($type_item);

                // Получить покупаемую вещь (следующюю по счету)
                $buy_item = $type_buy[$id_ship_item];

                switch( $type )
                {
                    case 'guns':
                        $ship->gfx_power = $buy_item['gfx_ship'];
                        break;

                    case 'engine':
                        $ship->gfx_speed = $buy_item['gfx_ship'];
                        break;

                    case 'defend':
                        $ship->gfx_defend = $buy_item['gfx_ship'];
                        break;

                    case 'artefact':
                        $ship->gfx_artefact = $buy_item['gfx_ship'];
                        break;
                }


            }
    */


}