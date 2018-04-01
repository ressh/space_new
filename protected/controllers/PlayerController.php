<?php

class PlayerController extends Controller
{

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


    public function accessRules()
    {
        return array(

            array('allow',  // allow all users to perform 'list' and 'show' actions
                'actions' => array('create', 'login', 'captcha', 'CheckEmailLink', 'create2', 'login2'),
                'users' => array('*'),
            ),

            array('allow', // allow authenticated user to perform 'delete' and 'update' actions
                'actions' => array(
                    'myship',
                    'OpenReferalsInfo',
                    'HistoryPaysOuts',
                    'GetHistoryBays',
                    'OutSumm',
                    'PhoneConfirm',
                    'CodeConfirm',
                    'AddPay',
                    'ChangeOutSummToBuy',
                    'Sellship',
                    'CheckEmailLink',
                    'DifferenceFuel',
                    'Addship',
                    'Needship',
                    'logout',
                    'MyReferals',
                    'GetInfoReferal',

                ),
                'users' => array('@'),
            ),

            array('deny',  // deny all users\
                'actions' => array('create'),
                'users' => array('@')
            ),

        );
    }


    public function actionIndex()
    {
        $this->render('index');
    }

    // Создать игрока
    public function actionCreate2()
    {
        $serviceName = Yii::app()->request->getQuery('service');


        if (isset($serviceName)) {

            $eauth = Yii::app()->eauth->getIdentity($serviceName);
            $eauth->redirectUrl = Yii::app()->user->returnUrl;
            $eauth->cancelUrl = $this->createAbsoluteUrl('player/create2');

            try {
                if ($eauth->authenticate()) {

                    $identity = new ServiceUserIdentity($eauth);

                    // Успешный вход
                    if ($identity->authenticate()) {

                        Yii::app()->user->login($identity, 0);


                        $player = Player::model()->findByAttributes( array( 'email'=>Yii::app()->user->id, 'role'=>$serviceName ) );

                        if( $player == null )
                        {
                            $player = new Player();
                            $player->createSocialPlayer( Yii::app()->user->name, $serviceName );
                        }

                        // Специальный редирект с закрытием popup окна
                        $eauth->redirect();
                    }
                    else {
                        // Закрываем popup окно и перенаправляем на cancelUrl
                        $eauth->cancel();
                    }
                }

                // Something went wrong, redirect to login page
                $this->redirect(array('player/create2'));
            }
            catch (EAuthException $e) {

                // save authentication error to session
                Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());

                // close popup window and redirect to cancelUrl
                $eauth->redirect($eauth->getCancelUrl());
            }
        }


        $player = new Player();

        if (isset($_POST['Player'])) {
            $player->attributes = $_POST['Player'];

            if (!$player->checkAndLoginNewplayer()) {
                $this->render('create2', array('model' => $player));
                return;
            } else {
                $this->redirect($this->createUrl('player/addship'));
            }
        }

        $this->render('create2', array('model' => $player));
    }



    // Создать игрока
    public function actionCreate()
    {
        $player = new Player();

        if (isset($_POST['Player'])) {
            $player->attributes = $_POST['Player'];

            if (!$player->checkAndLoginNewplayer()) {
                $this->render('create', array('model' => $player));
                return;
            } else {
                $this->redirect($this->createUrl('player/addship'));
            }
        }

        $this->render('create', array('model' => $player));
    }

    public function actionMyReferals()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $criteria = new CDbCriteria();
        $criteria->addCondition('id_player = :id_player');
        $criteria->params = array(':id_player' => $player->id);
        $criteria->order = 'id_referal DESC';

        $count = Referals::model()->count($criteria);

        $pages = new CPagination($count);
        // элементов на страницу
        $pages->pageSize = 50;
        $pages->applyLimit($criteria);

        $referals = Referals::model()->findAll($criteria);


        $this->render('my_referals', array('player' => $player, 'referals' => $referals));
    }

    public function actionOpenReferalsInfo()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $statistic = Statistic::model()->findByAttributes(array('id_player' => $player->id));

        $this->render('referalInfo', array('player' => $player, 'statistic' => $statistic));
    }

    // Открыть страницу истории вывода
    public function actionHistoryPaysOuts()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $criteria = new CDbCriteria();
        $criteria->addCondition('id_player = :id_player');
        $criteria->params = array(':id_player' => $player->id);

        $count = PaysOut::model()->count($criteria);

        $pages = new CPagination($count);
        // элементов на страницу
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);

        $history_games = PaysOut::model()->findAll($criteria);

        $this->render('historyPayOuts', array('history' => $history_games));
    }


    // Открыть страницу истории пополнений
    public function  actionGetHistoryBays()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $criteria=new CDbCriteria;
        $criteria->condition='id_player=:id_player';
        $criteria->params = array(':id_player' => $player->id);
        $criteria->order = 'date DESC';
        $criteria->limit = 100;
        $operations = Operations::model()->findAll( $criteria );

        $this->render('historyPays', array('operations' => $operations));
    }


    public function actionGetInfoReferal( $id, $name )
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $criteria=new CDbCriteria;
        $criteria->condition='id_player=:id_player AND id_referal=:id_referal';
        $criteria->params=array(':id_player'=>$player->id, ':id_referal'=>$id);
        $referal = Referals::model()->find( $criteria );

        if( $referal != null )
        {
            $criteria=new CDbCriteria;
            $criteria->condition='id_player=:id_player';
            $criteria->params=array(':id_player'=>$referal->id_referal);
            $criteria->order = 'date DESC';
            $criteria->limit = 100;
            $operations = Operations::model()->findAll( $criteria );

            $this->render('referal_current_statistic', array('operations' => $operations, 'referal'=>$referal, 'name'=>$name ));
    }



    }

    // Форма вывода денег
    public function actionOutSumm()
    {
        $formPhone = new FormConfirmPhone();
        $paysOut = new PaysOut();
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));


        if (isset($_POST['PaysOut'])) {
            $paysOut->attributes = $_POST['PaysOut'];
            $paysOut->id_player = $player->id;

            if ($paysOut->addOut($player)) {
                $this->render('paysOutAdding');
                return;
            }
        }

        $this->render('paysOut', array('form_model' => $formPhone, 'model' => $paysOut, 'player' => $player));
    }


    // Запрос на подтверждение мобильника
    public function actionPhoneConfirm()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $phoneForm = new FormConfirmPhone();

        if (isset($_POST['FormConfirmPhone'])) {

            $phoneForm->attributes = $_POST['FormConfirmPhone'];
            $phoneForm->phone = preg_replace("/[ ()-]/", "", $phoneForm->phone);

            $codeActivation = CodeActivation::model()->findByAttributes(array('id_player' => $player->id));


            if ($codeActivation != null) {
                if (abs(strtotime(date("Y-m-d H:i:s")) - strtotime($codeActivation->time)) < 60) {
                    $this->render('addFormCheckCode', array('model' => $codeActivation, 'phone_form' => $phoneForm));
                    return;
                } else {
                    $codeActivation->delete();
                    $this->sendCodeMobile($phoneForm, $player);
                    return;
                }
            }

            $this->sendCodeMobile($phoneForm, $player);
            return;
        }

    }

    public function sendCodeMobile($phoneForm, $player)
    {
        if ($phoneForm->validate()) {

            $code = rand(1000, 9999);

            $codeActivation = new CodeActivation();
            $codeActivation->id_player = $player->id;
            $codeActivation->code = $code;
            $codeActivation->time = date("Y-m-d H:i:s");
            $codeActivation->phone = $phoneForm->phone;

            if ($codeActivation->save()) {

                $codeActivation = new CodeActivation();
                $content = file_get_contents("http://sms.ru/sms/send?api_id=6eb86121-949e-9ee4-7995-0a53746ca3cd&from=spacewars&to=" . $phoneForm->phone . "&text=" . urlencode($code . " - ваш код для подтверждения "));


                $this->render('addFormCheckCode', array('model' => $codeActivation, 'phone_form' => $phoneForm));
            }
        }
    }

    // Заполнил код подтверждения пришедший на мобильник
    public function actionCodeConfirm()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $codeActivation = CodeActivation::model()->findByAttributes(array('id_player' => $player->id));
        $codeCheck = new CodeActivation();


        if ($codeActivation != null) {
            if (isset($_POST['CodeActivation'])) {
                $codeCheck->attributes = $_POST['CodeActivation'];

                if ($codeCheck->code == $codeActivation->code) {
                    $player->activate_phone = Player::$ACTIVE_PHONE;
                    $player->phone = $codeActivation->phone;
                    $player->update(array('activate_phone', "phone"));

                    $this->redirect($this->createUrl('player/outSumm'));
                }
            }
        }

    }


    // Форма пополнения баланса
    public function actionAddPay()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $pay = new Pays();
        $this->render('addPay', array('model' => $pay, 'player'=>$player));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {


        $model = new LoginForm;
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate())
                $this->redirect("/player/Myship");
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionLogin2()
    {
        $serviceName = Yii::app()->request->getQuery('service');


        if (isset($serviceName)) {

            $eauth = Yii::app()->eauth->getIdentity($serviceName);
            $eauth->redirectUrl = Yii::app()->user->returnUrl;
            $eauth->cancelUrl = $this->createAbsoluteUrl('player/login2');

            try {
                if ($eauth->authenticate()) {

                    $identity = new ServiceUserIdentity($eauth);

                    // Успешный вход
                    if ($identity->authenticate()) {

                        Yii::app()->user->login($identity, 0);


                        $player = Player::model()->findByAttributes( array( 'email'=>Yii::app()->user->id, 'role'=>$serviceName ) );

                        if( $player == null )
                        {
                            $player = new Player();
                            $player->createSocialPlayer( Yii::app()->user->name, $serviceName );
                        }

                        // Специальный редирект с закрытием popup окна
                        $eauth->redirect();
                    }
                    else {
                        // Закрываем popup окно и перенаправляем на cancelUrl
                        $eauth->cancel();
                    }
                }

                // Something went wrong, redirect to login page
                $this->redirect(array('player/login2'));
            }
            catch (EAuthException $e) {

                // save authentication error to session
                Yii::app()->user->setFlash('error', 'EAuthException: '.$e->getMessage());

                // close popup window and redirect to cancelUrl
                $eauth->redirect($eauth->getCancelUrl());
            }
        }

        $model = new LoginForm;
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate())
                $this->redirect("/player/Myship");
        }
        // display the login form
        $this->render('login2', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    // Отправить письмо подтверждения
    public function actionCheckEmailLink()
    {

        $player = Player::model()->findByAttributes(array('email' => $_GET['email']));

        if ($player != null) {

            if ($player->email == $_GET['email']) {

                if (md5($player->password . $player->name . $player->password) == $_GET['hash']) {

                    $player->activate_email = 1;
                    $player->update(array('activate_email'));

                    $this->render("email_confirm");
                }
            }
        }
    }

    // поменять выводимые средства на деньги для покупок
    public function actionChangeOutSummToBuy()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        $formChange = new FormChangeOutMoneyToBuy();

        if (isset($_POST['FormChangeOutMoneyToBuy'])) {
            $formChange->attributes = $_POST['FormChangeOutMoneyToBuy'];
            if ($formChange->checkToChanging() == true) {
                $this->redirect($this->createUrl('player/myship'));
                return;
            } else {
                $this->render('changeOutToBuy', array('model' => $formChange));
                return;
            }
        }

        $this->render('changeOutToBuy', array('model' => $formChange, 'player'=>$player));
    }


    // Продать корабль
    public function actionSellship()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('player/myship'));
            return;
        }

        if ($ship->delete()) {

            $player->setSummBuyPlus($ship->getSummToSell());

            $player->setOperation( Operations::$OP_SALE_SHIP, Operations::$TYPE_BUY, $ship->getSummToSell() );

            $this->redirect($this->createUrl('player/myship'));
        }
    }

    public function actionNeedship()
    {
        $this->render('needBuyship');
    }

    // Заправиться и собрать кассу
    public function actionDifferenceFuel()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship == null) {
            Yii::app()->user->setFlash('info', "Требуется корабль!");
            $this->redirect($this->createUrl('player/myship'));
            return;
        }

        // Получить бонус 2х
        $is2x = $ship->setFuelGetMoney($player);

        if ($is2x == true)
            $this->redirect($this->createUrl('player/myship', array('isBonuce' => $is2x)));
        else
            $this->redirect($this->createUrl('player/myship'));

    }


    // Моя страница
    public function  actionMyship()
    {
        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        if( $player == null )
            $this->redirect($this->createUrl('player/login2'));

        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        $statistic = Statistic::model()->findByAttributes(array('id_player' => $player->id));

        $this->render('myship', array('player' => $player, 'ship' => $ship, 'statistic' => $statistic));
    }

    // Страница покупки корабля
    public function actionAddship()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        if (isset($_POST['Ship'])) {

            $ship = new Ship();
            $ship->attributes = $_POST['Ship'];


            if ($ship->addship($player)) {
                $this->redirect($this->createUrl('player/myship'));
            } else {
                $this->render('shipBuy', array('model' => $ship, 'player' => $player));
            }
        }

        $ship = Ship::model()->findByAttributes(array('id' => $player->id));

        if ($ship != null) {
            $this->render('needSellship');
            return;
        }

        $ship = new Ship();
        $this->render('shipBuy', array('model' => $ship, 'player' => $player));
    }


}