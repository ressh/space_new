<?php

class ManagerController extends Controller
{
    public $layout = 'admin';

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }


    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        if (Yii::app()->user->id != 'ressh@mail.ru') {
            $this->redirect('/site/index');
            return;
        }

        $criteria=new CDbCriteria;
        $criteria->select='summ_limit';  // выбираем только поле 'title'
        $criteria->condition='summ_limit>:summ_limit';
        $criteria->params=array(':summ_limit'=>0);
        $currentDolg=Player::model()->findAll($criteria); // $params не требуется

        $allDolg = 0;

        foreach ( $currentDolg as $dolg )
            $allDolg += $dolg->summ_limit;

        $allDolg = round( $allDolg/1000, 2 );

        $criteria=new CDbCriteria;
        $criteria->select='summ';  // выбираем только поле 'title'
        $criteria->condition='status=:status';
        $criteria->params=array(':status'=>1);
        $outs=PaysOut::model()->findAll($criteria); // $params не требуется

        $allOuts = 0;

        foreach ( $outs as $out )
            $allOuts += $out->summ;


        $criteria=new CDbCriteria;
        $criteria->condition='status=:status';
        $criteria->params=array(':status'=>'succes');
        $criteria->order = 'time DESC';
        $criteria->limit = 10;
        $pays=Pays::model()->findAll($criteria); // $params не требуется

        $this->render('index', array( 'allDolg'=>$allDolg, 'allOuts' => $allOuts, 'pays'=>$pays ));
    }

    public function actionPayOuts()
    {
        if (Yii::app()->user->id != 'ressh@mail.ru') {
            $this->redirect('/site/index');
            return;
        }

        $criteria=new CDbCriteria;
        $criteria->condition='status=:status';
        $criteria->params=array(':status'=>0);
        $paysOutNow = PaysOut::model()->findAll( $criteria );

        $this->render('payouts', array(  'paysOut'=>$paysOutNow ));
    }

    public function actionGetInfoPlayer( $id )
    {
        if (Yii::app()->user->id != 'ressh@mail.ru') {
            $this->redirect('/site/index');
            return;
        }

        $criteria=new CDbCriteria;
        $criteria->condition='id_player=:id_player';
        $criteria->params=array(':id_player'=>$id);
        $criteria->order = 'date DESC';
        $operations = Operations::model()->findAll( $criteria );

        $this->render('show_player_operations', array('operations'=>$operations));

    }

    public function actionSetPayComplete( $id )
    {
        if (Yii::app()->user->id != 'ressh@mail.ru') {
            $this->redirect('/site/index');
            return;
        }

        $pay = PaysOut::model()->findByPk( $id );
        $pay->status = 1;
        $pay->update( 'status' );
        $this->redirect( '/manager/index' );
    }


    public function actionSendInfoMail()
    {
        if (Yii::app()->user->id != 'ressh@mail.ru') {
            $this->redirect('/site/index');
            return;
        }

        /*
        $players = Player::model()->findAll('activate_email=:p',array(':p'=>'1'));

        foreach ($players as $player) {
            $ship = Ship::model()->findByAttributes(array('id' => $player->id));

            print_r( $player->email . '\n');

            if ($ship != null) {

                if ((time() - strtotime($ship->time_fuel_btn)) > 250000) {

                    // подключаем модуль
                    Yii::app()->getModule('email');
                    // создаем объект класса
                    $email = new Email;
                    $email->subject = $player->name . ' - ваш корабль ждет Вас!';
                    // ставим значение для заголовка from
                    $email->from = 'Admin@spacewarsgame.ru';
                    // использовать шаблон common
                    // тип письма - HTML
                    $email->type = 'text/html';
                    // кому отправляем письмо
                    $email->to = $player->email;
                   // $email->to = 'ressh@mail.ru';
                    // представление которое будет использовано для формирования содержимого
                    $email->view = 'ship_have';
                    // отправить письмо
                    if ($email->send(array(
                        'type_ship' => $ship->type_ship,
                        'name_ship' => $ship->name_ship,
                        'money' => $ship->getMoneyPrognozDay(),
                        'fuel' => $ship->getFuelPersent(),
                        'chance' => $ship->getChance2x(),
                        'arena' => $ship->getStatisticArenaWars(),
                        'wins' => $ship->getStatisticArenaWars(),
                        'count' => $ship->getMissionsCount(),
                        'win_boss' => $ship->getCountWinBoss(),
                        'gfx' => $ship->gfx,
                        'gfx_power' => $ship->power_item_id,
                        'gfx_speed' => $ship->speed_item_id,
                        'gfx_defend' => $ship->defend_item_id,
                        'type_Ship' => $ship->type_ship,


                    ))
                    ) {
                        print_R('sending');
                    }
                }

            } else {
                // подключаем модуль
                Yii::app()->getModule('email');
                // создаем объект класса
                $email = new Email;
                $email->subject = $player->name . ' - ваш корабль ждет Вас!';
                // ставим значение для заголовка from
                $email->from = 'Admin@spacewarsgame.ru';
                // использовать шаблон common
                // тип письма - HTML
                $email->type = 'text/html';
                // кому отправляем письмо
                $email->to = $player->email;
                //$email->to = 'ressh@mail.ru';
                // представление которое будет использовано для формирования содержимого
                $email->view = 'not_player_ship';
                // отправить письмо

                if ($email->send(array('login' => $player->email, 'role' => $player->role))) {
                    print_R('sending_to');
                    
                }


            }


        }

        */
    }


}