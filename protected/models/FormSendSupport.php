<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 22:10
 */
class FormSendSupport extends CFormModel
{
    public $name;
    public $email;
    public $message;

    public $verifyCode;

    public function rules()
    {
        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');



        return array(
            array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
            // username and password are required
            array('name, email, message', 'required', 'message' => '{attribute} должен быть заполнен'),
            array('email', 'email', 'message' => "Неправильно указан email"),
            array( 'name, email, message', 'filter', 'filter'=>$obj )
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {

        return array(
            'name'=>'Ваше имя',
            'email'=>'Email', // Торговец, воин, пират, дбытчик
            'message'=>'Вопрос, пожелание, предложение', // Торговец, воин, пират, дбытчик
            'verifyCode'=>'Код проверки', // Торговец, воин, пират, дбытчик
        );
    }



    public function sendEmail()
    {
        // подключаем модуль
        Yii::app()->getModule('email');
        // создаем объект класса
        $email = new Email;
        $email->subject    = 'Запрос в техподдержку';
        // ставим значение для заголовка from
        $email->from = 'support@spacewarsgame.ru';
        // использовать шаблон common
        // тип письма - HTML
        $email->type = 'text/html';
        // кому отправляем письмо
        $email->to = 'spacewarsgame.ru@gmail.com';
        // представление которое будет использовано для формирования содержимого
        $email->view = 'support_get';
        // отправить письмо
        if ($email->send(array( 'name' => $this->name, 'email_player'=>$this->email, 'message'=>$this->message))) {
            return true;
        }

        return false;

    }

}