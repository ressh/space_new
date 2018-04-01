<?php

/**
 * This is the model class for table "Player".
 *
 * The followings are the available columns in table 'Player':
 * @property integer $id
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property integer $summ_buy
 * @property integer $summ_exit
 * @property integer $summ_limit
 * @property integer $date_regist
 * @property integer $date_last_visit
 * @property integer $name
 * @property integer $role
 * @property integer $activate_email
 * @property integer $activate_phone
 * @property integer $gold_partner      // Если золотой партнер
 *
 *
 * The followings are the available model relations:
 * @property ship $idship
 * @property Statistic $id0
 */
class Player extends CActiveRecord
{
    static $NO_ACTIVE = 0;
    static $ACTIVE_EMAIL = 1;
    static $ACTIVE_PHONE = 1;

    public $verifyCode;
    public $password_repeat;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Player';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
            array('email', 'email','message'=>"Email неверный"),
            array('email', 'unique','message'=>'Email уже зарегистрирован!'),
            array('name, password, email ', 'required', 'message'=>'{attribute} обязательно для заполнения!'),
			array('summ_buy, summ_exit, summ_limit, activate_email, activate_phone, gold_partner', 'numerical', 'integerOnly'=>true),
			array('name, password, password_repeat, email, phone, role', 'length', 'max'=>125, 'message'=>'{attribute} длинна строки не должна превышшать 125 символов'),
            array( 'name, email, phone', 'filter', 'filter'=>array( $obj ,'purify') )

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
			'idship' => array(self::BELONGS_TO, 'ship', 'id_ship'),
			'id0' => array(self::BELONGS_TO, 'Statistic', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
            'name' => 'Ваше имя',
            'verifyCode' => 'Код проверки',
			'password' => 'Пароль',
			'password_repeat' => 'Повторите пароль',
			'email' => 'Email',
			'phone' => 'Phone',
			'summ_buy' => 'Summ Buy',
			'summ_exit' => 'Summ Exit',
			'summ_limit' => 'Summ Limit',
			'quests_complette_ids' => 'Quests Complette Ids',
			'quests_current_ids' => 'Quests Current Ids',
			'date_regist' => 'Date Regist',
			'date_last_visit' => 'Date Last Visit',
		);
	}


    public function createSocialPlayer( $nameEmail, $service )
    {
        $this->name = $nameEmail;
        $this->password =  md5('_________555_______');
        $this->email = Yii::app()->user->id;
        $this->role = $service;
        $this->date_regist = time();
        $this->activate_email = 1;

        if( $this->save( false ) ) {

            // Проверка и создание реферала
            $session = new CHttpSession;
            $session->open();

            if (isset($session['ref_id'])) {
                $player = Player::model()->findByAttributes(array('id' => (int)$session['ref_id']));

                if ($player != null) {
                    $referal = new Referals();
                    $referal->id_player = $player->id;
                    $referal->id_referal = $this->id;
                    $referal->is_active = Referals::$NOT_ACTIVE;
                    $referal->save();
                }
            }


            $statistic = new Statistic();
            $statistic->id_player = $this->id;
            $statistic->invest_summ = 0;
            $statistic->out_sum = 0;
            $statistic->questions_summ_complette = 0;
            $statistic->referals = 0;
            $statistic->save();


        }

    }


    /**
     * Если пользователь зарегистрировался и сохранился то возвращаем //тру
     *
     * @return boolean
     */
	public function checkAndLoginNewplayer()
    {
        if ($this->validate()) {
            // Если пароли не совпадают выдадим ошибку
            if ($this->password != $this->password_repeat) {
                $this->addError( 'password', 'Вы указали разные значения в поле пароль' );
                return false;
            } else {

                $this->password = md5($this->password);
                $this->date_regist = time();

                if( $this->save() ) {

                    // Отправить письмо с подтверждением email
                    $this->sendAndCheckEmail();

                    // Проверка и создание реферала
                    $session = new CHttpSession;
                    $session->open();

                    if (isset($session['ref_id'])) {
                        $player = Player::model()->findByAttributes( array( 'id'=>(int)$session['ref_id'] ) );

                        if ($player != null) {
                            $referal = new Referals();
                            $referal->id_player = $player->id;
                            $referal->id_referal = $this->id;
                            $referal->is_active = Referals::$NOT_ACTIVE;
                            $referal->save();
                        }
                    }


                    $statistic = new Statistic();
                    $statistic->id_player = $this->id;
                    $statistic->invest_summ = 0;
                    $statistic->out_sum = 0;
                    $statistic->questions_summ_complette = 0;
                    $statistic->referals = 0;
                    $statistic->save();

                    $identity = new UserIdentity($this->email, $this->password);
                    $identity->authenticate();
                    Yii::app()->user->login($identity, 0);

                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }


    public function getSummBuy()
    {
        return round( $this->summ_buy/1000, 2 );
    }

    public function setSummBuyPlus( $summ )
    {
        if ($summ < 0) {
            if (abs($summ) > $this->getSummBuy()) {
                return false;
            }
        }

        $this->summ_buy += round( $summ * 1000 );
        $this->update( array( 'summ_buy' ) );
        return true;
    }

    public function getSummLimit()
    {
        return round( $this->summ_limit/1000, 2 );
    }

    public function  setSummLimitPlus( $summ )
    {
        if ($summ < 0) {
            if (abs($summ) > $this->getSummLimit()) {
                return false;
            }
        }

        $this->summ_limit += round( $summ * 1000 );
        $this->update( array( 'summ_limit' ) );
        return true;
    }

    public function getSummExit()
    {
        return round( $this->summ_exit/1000, 2 );
    }

    public function setSummExitPlus( $summ )
    {
        if ($summ < 0) {
            if (abs($summ) > $this->getSummExit()) {
                return false;
            }
        }

        $this->summ_exit += round( $summ * 1000 );
        $this->update( array( 'summ_exit' ) );
        return true;
    }

    /**
     * Отправить приветствие и ссылку для подтверждения e-mail
     *
     */
    public function sendAndCheckEmail()
    {

        // подключаем модуль
        Yii::app()->getModule('email');
        // создаем объект класса
        $email = new Email;
        $email->subject    = 'Message from SpaceWarsGame';
        // ставим значение для заголовка from
        $email->from = 'Admin@spacewarsgame.ru';
        // использовать шаблон common
        // тип письма - HTML
        $email->type = 'text/html';
        // кому отправляем письмо
        $email->to = $this->email;
        // представление которое будет использовано для формирования содержимого
        $email->view = 'regComplete';
        // отправить письмо
        if ($email->send(array('linkActivation' => Yii::app()->createAbsoluteUrl( 'player/CheckEmailLink', $params = array('email' =>  $this->email, 'hash'=> md5( $this->password . $this->name . $this->password ) ))))) {
            return true;
        }

        return false;

    }

    /**
     * @param $type_opertion
     * @param $type_money
     * @param $summ
     */
    public function setOperation( $type_opertion, $type_money, $summ )
    {
        $operation = new Operations();
        $operation->id_player = $this->id;
        $operation->summ = $summ;
        $operation->type_money = $type_money;
        $operation->type_operation = $type_opertion;
        $operation->save(false);
    }

    public function setReferalBonuses( $summ_pay, $statistic )
    {

        if ($this->role == 'partner') {
            $summ_to_exit = $summ_pay * Yii::app()->params['referals']['partner_persent']/100;
            $this->setSummExitPlus($summ_to_exit);
            $this->setSummLimitPlus($summ_to_exit);

            $this->setOperation( Operations::$OP_REFERAL, Operations::$TYPE_EXIT, $summ_to_exit );
            $this->setOperation( Operations::$OP_REFERAL, Operations::$TYPE_LIMIT, $summ_to_exit );

            // Оповестить партнера о пополнении
            if ($this->activate_phone == Player::$ACTIVE_PHONE) {
                $content = file_get_contents("http://sms.ru/sms/send?api_id=6eb86121-949e-9ee4-7995-0a53746ca3cd&from=spacewars&to=" . $this->phone . "&text=" . urlencode("Ваш реферал оплатил покупку, вам начислено: " . $summ_to_exit ));
            }

        } else {
                // Определить сумму поступления пригласившего на счет покупок
            $summ_buy_for_parent_referal = $summ_pay * Yii::app()->params['referals']['summ'][$statistic->id_ref_bonuse] / 100;
                $this->setSummBuyPlus($summ_buy_for_parent_referal);

           $this->setOperation( Operations::$OP_REFERAL, Operations::$TYPE_BUY, $summ_buy_for_parent_referal );

                // Определить сумму поступления пригласившего на лимитированный счет
            $summ_limit_parent_referal = $summ_pay * Yii::app()->params['referals']['summ_limit'][$statistic->id_ref_bonuse] / 100;
                $this->setSummLimitPlus( $summ_limit_parent_referal );

            $this->setOperation( Operations::$OP_REFERAL, Operations::$TYPE_LIMIT, $summ_limit_parent_referal );

    }
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Player the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
