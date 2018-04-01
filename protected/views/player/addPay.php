<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 1:14
 */
?>


<div class="content">
    <h3>Пополнить счет</h3>



    <div class="convert-item">

        <iframe frameborder="0" allowtransparency="true" scrolling="no" src="https://money.yandex.ru/quickpay/shop-widget?account=410011746227008&quickpay=shop&payment-type-choice=on&mobile-payment-type-choice=on&writer=seller&targets=%D0%98%D0%B3%D1%80%D0%BE%D0%B2%D0%B0%D1%8F+%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%D0%B0&targets-hint=&default-sum=&button-text=02&successURL=http%3A%2F%2Fspacewarsgame.ru%2Fplayer%2FMyship&label=<?= $player->id ?>" width="450" height="199"></iframe>



        <br>
        1 pубль =  1 <img  src="/images/gold.png">

        <br><br>

    </div>

    <div class="kranshteyn_hr_100"></div>

    <div class="convert-item">
    <br>
        <img src="/images/payeer.png">

        <h3>Пополнить счет</h3>


        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pay-form',
            'enableAjaxValidation' => false,
            'action' => Yii::app()->createUrl('billing/index'),
            'htmlOptions' => array('class' => 'converter-form'),
        )); ?>

        <div class="convert-item">


            <div class="convert-item">
                <span class="value-name-convert">Сумма пополнения</span>

                <p>
                    <? if (isset($_GET['summ_need'])): ?>
                        <?php echo $form->textField($model, 'summ', array('value' => $_GET['summ_need'])); ?>
                    <? else: ?>
                        <?php echo $form->textField($model, 'summ'); ?>
                    <? endif; ?>
                </p>
            </div>


            <p class="btn-convert">
                <button class="btn" type="submit">Купить</button>
            </p>


            <?php $this->endWidget(); ?>

        <br>
        1 pубль =  1 <img  src="/images/gold.png">

        <br><br>

    </div>

