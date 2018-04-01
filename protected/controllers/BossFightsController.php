<?php

class BossFightsController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );
    }

    public function accessRules()
    {
        return array(

            array('allow',  // allow all users to perform 'list' and 'show' actions
                'actions' => array('Index', 'HistoryFights'),
                'users' => array('*'),
            ),

            array('allow', // allow authenticated user to perform 'delete' and 'update' actions
                'actions' => array(
                    'ShotBoss',
                ),
                'users' => array('@'),
            ),

            array('deny',  // deny all users
                'users' => array('*')
            ),

        );
    }

/*
    public function actionGenerateBoss()
    {
        for( $i = 0; $i<5; $i++ )
        {
            $boss = new Boss();
            $boss->generateBoss( $i );
            $boss->type_money = Boss::$MONEY_GAME;

            if( !$boss->save() )
            {
                print_r( $boss->getErrors() );
            }
        }

        for( $i = 0; $i<5; $i++ )
        {
            $boss = new Boss();
            $boss->generateBoss( $i );
            $boss->type_money = Boss::$MONEY_LIMIT;

            if( !$boss->save() )
            {
                print_r( $boss->getErrors() );
            }
        }

    }

*/
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('status = :status');
        $criteria->params = array(':status' => Boss::$LIVE);

        $bosses = Boss::model()->findAll( $criteria );

        $this->render( 'index', array( 'bosses'=>$bosses ) );
    }

    public function actionShotBoss( $id )
    {
        if( isset( $id ) )
        {
            $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
            $ship = Ship::model()->findByAttributes(array('id' => $player->id));
            $boss = Boss::model()->findByPk( $id );

            if( $boss == null ) {
                Yii::app()->user->setFlash('info', "Босса уже убили или он не существует!");
                $this->redirect( $this->createUrl('bossFights/index') );
                return;
            }

            if( $ship == null )
            {
                Yii::app()->user->setFlash('info', "Требуется корабль!");
                $this->redirect( $this->createUrl('bossFights/index') );
                return;
            }

            switch( $boss->type_money )
            {
                case Boss::$MONEY_GAME:
                    if(  $player->setSummBuyPlus( -$boss->summ_shot ) ) {

                        $player->setOperation( Operations::$OP_BOSS, Operations::$TYPE_BUY, -$boss->summ_shot );

                        if(  $boss->setShot($player) == "kill" )
                        {
                            $this->render( 'fight', array( 'kill'=>true, 'ship'=>$ship, 'player'=>$player, 'boss'=>$boss  ) );
                            return;
                        }
                        else
                        {
                            $this->render( 'fight', array( 'kill'=>false, 'ship'=>$ship, 'player'=>$player, 'boss'=>$boss  ) );
                            return;
                        }

                    }
                    else
                    {
                        Yii::app()->user->setFlash('info', "У вас нехватает игровой валюты!");
                        $this->redirect( $this->createUrl('bossFights/index') );
                    }
                    break;
                case Boss::$MONEY_LIMIT:
                    if( $player->setSummLimitPlus( -$boss->summ_shot ) ) {

                        $player->setOperation( Operations::$OP_BOSS, Operations::$TYPE_LIMIT, -$boss->summ_shot );

                        if(  $boss->setShot($player) == "kill" )
                        {
                            $this->render( 'fight', array( 'kill'=>true, 'ship'=>$ship, 'player'=>$player, 'boss'=>$boss ) );
                            return;
                        }
                        else
                        {
                            $this->render( 'fight', array( 'kill'=>false, 'ship'=>$ship, 'player'=>$player, 'boss'=>$boss  ) );
                            return;
                        }
                    }
                    else
                    {
                        Yii::app()->user->setFlash('info', "У вас нехватает космического баланса!");
                        $this->redirect( $this->createUrl('bossFights/index') );
                    }
                break;

            }

        }
    }

    public function actionHistoryFights()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('status = :status');
        $criteria->params = array(':status' => Boss::$WIN );
        $criteria->order = 'time_add DESC';

        $count = Boss::model()->count($criteria);

        $pages = new CPagination($count);
        // элементов на страницу
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $fights = Boss::model()->findAll($criteria);

        $this->render( 'history', array( 'fights'=>$fights, 'pages'=>$pages ) );
    }


}