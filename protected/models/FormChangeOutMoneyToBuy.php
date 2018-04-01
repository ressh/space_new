<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 2:28
 */
class FormChangeOutMoneyToBuy extends CFormModel
{
    public $summ;


    public function rules()
    {
        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');


        return array(
            array('summ', 'required'),
            array( 'summ', 'numerical', 'integerOnly' => TRUE, 'min' => '1' ),
            array( 'summ', 'filter', 'filter'=>$obj )
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'summ'=>'Введите сумму для обмена',
        );
    }

    public function checkToChanging()
    {

        $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));

        if ($this->validate()) {


            if ($player->getSummExit() >= $this->summ)
            {

               if( $player->setSummExitPlus( -$this->summ ) ) {

                   $player->setOperation( Operations::$OP_CHANGE_MONEY_EXIT, Operations::$TYPE_EXIT, -$this->summ );

                   $player->setSummBuyPlus($this->summ * 1.1);

                   $player->setOperation( Operations::$OP_CHANGE_MONEY_EXIT, Operations::$TYPE_BUY, $this->summ * 1.1 );

                   Yii::app()->getController()->redirect('/player/Myship');
               }
                else {
                    $this->addError('summ', 'Ошибка. Обмен не произошел!');
                }
            } else {
                $this->addError('summ', 'Обмен не произошел, возможно не хватает средств.');
                return false;
            }
        }
        else
        {
            return false;
        }
    }

}