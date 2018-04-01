<?php

class MissionController extends Controller
{

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
                'actions' => array('Missions'),
                'users' => array('*'),
            ),

            array('allow', // allow authenticated user to perform 'delete' and 'update' actions
                'actions' => array(
                   'getMyMission',
                    'GetMission',
                    'GetWin',
                    'GetWinLimit',

                ),
                'users' => array('@'),
            ),

            array('deny',  // deny all users
                'users' => array('*')
            ),

        );
    }


    public function actionMissions()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship != null) {
            $criteria = new CDbCriteria();
            
            // Сдлеать генерацию миссий по классам
            // Пиратам все миссии, добытчикам не все...
            switch( $ship->type_ship )
            {
                case 'pirat':
                    $criteria->addCondition('status = :status');
                    $criteria->params = array(':status' => Missions::$MISSION_NO_GET);
                    break;
                case 'killer':
                    $criteria->addCondition('status = :status');
                    // все кроме пирата
                    $criteria->addCondition('type_ship != :type_ship');
                    $criteria->params = array(':status' => Missions::$MISSION_NO_GET, ':type_ship' => 'pirat');
                    break;
                case 'seller':
                    $criteria->compare('type_ship', 'worker', false);
                    $criteria->compare('type_ship', 'seller', false, 'OR');
                    $criteria->compare('status', Missions::$MISSION_NO_GET, false);
                    break;
                case 'worker':
            $criteria->addCondition('status = :status');
            $criteria->addCondition('type_ship = :type_ship');
                    $criteria->params = array(':status' => Missions::$MISSION_NO_GET, ':type_ship' => 'worker');
                    break;
            }

            $criteria->order = 'summ DESC';

            $count = Missions::model()->count($criteria);

            $pages = new CPagination($count);
            // элементов на страницу
            $pages->pageSize = 10;
            $pages->applyLimit($criteria);

            $missions = Missions::model()->findAll($criteria);

            $this->render('missions', array('player' => $player, 'ship' => $ship, 'missions' => $missions, 'isCurrent' => $isCurrent));
        }
        else
        {
            $criteria = new CDbCriteria();
            $criteria->order = 'summ DESC';

            $count = Missions::model()->count($criteria);

            $pages = new CPagination($count);
            // элементов на страницу
            $pages->pageSize = 10;
            $pages->applyLimit($criteria);

            $missions = Missions::model()->findAll($criteria);

            $this->render('missions', array('player' => $player, 'missions' => $missions ));
        }
    }


    public function actionGetMyMission()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if( $ship == null )
        {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect( '/player/Myship' );
        }

        $criteria = new CDbCriteria();
        $criteria->addCondition('id_player = :id_player');
        $criteria->params = array( ':id_player' => $player->id );
        $criteria->order = 'time DESC';

        $count = Missions::model()->count($criteria);

        $pages = new CPagination($count);
        // элементов на страницу
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $missions = Missions::model()->findAll($criteria);

        $this->render('myMissions', array('player' => $player, 'ship' => $ship, 'missions' => $missions));
    }


    public function actionGetMission($id)
    {
        if (isset($id)) {
            $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
            $ship = Ship::model()->findByAttributes(array('id' => $player->id));

            if( $ship == null )
            {
                Yii::app()->user->setFlash('info', "Требуется корабль!");
                $this->redirect( '/mission/Missions' );
            }

            $currentMission = Missions::model()->findByAttributes(array('status' => Missions::$MISSION_IN_WORK, 'id_player' => $player->id));

            if ($currentMission == null) {

                $mission = Missions::model()->findByAttributes(array('id' => $id, 'status' => Missions::$MISSION_NO_GET));

                // Сдлеать генерацию миссий по классам
                // Пиратам все миссии, добытчикам не все...
                switch( $ship->type_ship )
                {
                    case 'killer':
                        if(  $mission->type_ship == "pirat" )
                        {
                            Yii::app()->user->setFlash('info', "Вы пытаетесь взять миссию пирата!");
                            $this->redirect($this->createUrl('mission/missions'));
                            return;
                        }
                        break;
                    case 'seller':
                        if(  $mission->type_ship == "pirat" )
                        {
                            Yii::app()->user->setFlash('info', "Вы пытаетесь взять миссию пирата!");
                            $this->redirect($this->createUrl('mission/missions'));
                            return;
                        }
                        elseif ($mission->type_ship == "killer")
                        {
                            Yii::app()->user->setFlash('info', "Вы пытаетесь взять миссию война!");
                            $this->redirect($this->createUrl('mission/missions'));
                            return;
                        }
                        break;
                    case 'worker':
                        if(  $mission->type_ship != "worker" )
                        {
                            Yii::app()->user->setFlash('info', "Вы пытаетесь взять другую миссию!");
                            $this->redirect($this->createUrl('mission/missions'));
                            return;
                        }
                        break;
                }

                if ($mission != null) {
                    $mission->id_player = $player->id;
                    $mission->time = date("Y-m-d H:i:s");
                    $mission->status = Missions::$MISSION_IN_WORK;
                    if ($mission->save()) {
                        $this->redirect($this->createUrl('mission/GetMyMission'));
                    }
                }
            } else {
                if ($currentMission->checkComplete() != true) {
                    Yii::app()->user->setFlash('info', "У вас уже есть запущенные миссии");
                    $this->redirect($this->createUrl('mission/missions'));
                }
                else
                {
                    if( $currentMission->status == Missions::$MISSION_COMPLETE || $currentMission == Missions::$MISSION_NOT_COMPLETE ) {
                        $this->redirect($this->createUrl('mission/GetMission', array( 'id'=>$id )));
                    }
                }

                $this->redirect($this->createUrl('mission/missions'));
            }
        }
    }

    public function actionGetWin()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        $currentMission = Missions::model()->findByAttributes(array('status' => Missions::$MISSION_COMPLETE, 'id_player' => $player->id));

        if ($currentMission != null) {
            $currentMission->status = Missions::$MISSION_COMPLETE_GET;
            $currentMission->type_get_money = Missions::$TYPE_MONEY_BUY;
            if ($currentMission->update(array('status', 'type_get_money'))) {
                $player->setSummBuyPlus($currentMission->getSummWin());

                $player->setOperation( Operations::$OP_MISSION_COMPLETTE, Operations::$TYPE_BUY, $currentMission->getSummWin() );

                $this->redirect($this->createUrl('mission/GetMyMission'));
            }
        }
    }

    public function actionGetWinLimit()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        $currentMission = Missions::model()->findByAttributes(array('status' => Missions::$MISSION_COMPLETE, 'id_player' => $player->id));

        if ($currentMission != null) {
            $currentMission->status = Missions::$MISSION_COMPLETE_GET;
            $currentMission->type_get_money = Missions::$TYPE_MONEY_LIMIT;
            if ($currentMission->update(array('status', 'type_get_money'))) {
                $player->setSummLimitPlus($currentMission->getSummWin());

                $player->setOperation( Operations::$OP_MISSION_COMPLETTE, Operations::$TYPE_LIMIT, $currentMission->getSummWin() );

                $this->redirect($this->createUrl('mission/GetMyMission'));
            }
        }
    }

}