<?php

/**
 * This is the model class for table "PaysOut".
 *
 * The followings are the available columns in table 'PaysOut':
 * @property integer $id
 * @property integer $id_player
 * @property integer $summ
 * @property string $type
 * @property string $nomer_schet
 * @property string $status
 * @property string $time
 */
class PaysOut extends CActiveRecord
{
    static $STATUS_ADDING = 0;
    static $STATUS_COMPLETE = 1;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PaysOut';
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
			array('summ, type, nomer_schet', 'required'),
			array('id_player, status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>25),
			array('nomer_schet', 'length', 'max'=>100),
			array('nomer_schet, type', 'filter', 'filter'=>array( $obj, 'purify' )),
			array('summ', 'numerical', 'integerOnly'=>true, 'min'=>10, 'tooSmall'=>"Сумма вывода должна быть не менее 10" ),


		);
	}


    public function sendAdminEmail( $player )
    {
        // подключаем модуль
        Yii::app()->getModule('email');
        // создаем объект класса
        $email = new Email;
        $email->subject    = 'Заявка на вывод';
        // ставим значение для заголовка from
        $email->from = 'Admin@spacewarsgame.ru';
        // использовать шаблон common
        // тип письма - HTML
        $email->type = 'text/html';
        // кому отправляем письмо
        $email->to = 'spacewarsgame.ru@gmail.com';
        // представление которое будет использовано для формирования содержимого
        $email->view = 'get_money';
        // отправить письмо
        if ($email->send(array('email_user'=>$player->email, 'summ'=>$this->summ, 'type'=>$this->type, 'nomer'=>$this->nomer_schet ))) {
            return true;
        }

        return false;
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
			'id_player' => 'Id Player',
			'summ' => 'Сумма вывода',
			'type' => 'Type',
			'nomer_schet' => 'Nomer Schet',
			'status' => 'Status',
			'time' => 'Time',
		);
	}

    public function getTextStatus()
    {
        switch( $this->status )
        {
            case 0:
                $txt = "Ожидается выплата";
                break;
            case 1:
                $txt = "Выплачено";
                break;
        }

        return $txt;
    }

    public function getTextTypeSchet()
    {
        switch( $this->type )
        {
            case 0:
                $txt = "Яндекс деньги";
                break;
            case 1:
                $txt = "QIWI";
                break;
            case 2:
                $txt = "МТС";
                break;
            case 3:
                $txt = "Билайн";
                break;
            case 4:
                $txt = "Мегафон";
                break;
            case 5:
                $txt = "Payeer";
                break;
        }

        return $txt;
    }




	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaysOut the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    // Создать вывод
    public function addOut( $player )
    {
        if ($player->activate_phone == Player::$ACTIVE_PHONE) {

            if ($this->validate()) {

                if ($player->getSummExit() >= $this->summ) {
                    if ($player->getSummLimit() >= $this->summ) {

                        $this->status = PaysOut::$STATUS_ADDING;
                        $this->sendAdminEmail($player);
                        $this->save();

                        $player->setSummExitPlus(-$this->summ);
                        $player->setSummLimitPlus(-$this->summ);

                        $player->setOperation( Operations::$OP_OUT_SUMM, Operations::$TYPE_EXIT, -$this->summ );
                        $player->setOperation( Operations::$OP_OUT_SUMM, Operations::$TYPE_LIMIT, -$this->summ );

                        $statistic = Statistic::model()->findByAttributes( array( 'id_player'=>$player->id ) );
                        $statistic->out_sum += $this->summ;
                        $statistic->update();

                        return true;

                    } else {
                        $this->addError('info', "У вас не хватает средств на Космическом балансе! Чтобы пополнить Космический баланс, читайте информацию ниже!");

                    }
                } else {
                    $this->addError('info', "У вас не хватает средств для вывода!");
                }
            }
        }
        else {
            $this->addError('info', "Вы должны подтвердить телефон, чтобы выводить деньги");
        }
        return false;
    }

}
