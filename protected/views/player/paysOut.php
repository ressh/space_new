<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 1:14
 */
?>


<div class="content">

    <div style="float: right;"><a href="<?= $this->createUrl( 'player/HistoryPaysOuts' ) ?>" class="btn">История заявок</a></div>


    <h3 style="width: 300px;">Снять со счета</h3>

    <div class="kranshteyn_hr_100"></div>

    <? if ($player->activate_phone != Player::$ACTIVE_PHONE): ?>

        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'form-phone',
            'enableAjaxValidation' => false,
            'action' => Yii::app()->createUrl('player/PhoneConfirm'),
            'htmlOptions' => array('class' => 'form-inline'),
        )); ?>

        <div class="form-group" style="padding: 10px; background:#41B5D7">
            Требуется указать номер телефона для безопасного вывода
            средств  <?php echo $form->textField($form_model, 'phone', array('class' => 'form-control', 'placeholder' => '79122222222')); ?>
            <button class="btn btn-success" type="submit">Указать</button>
        </div>

        <?php $this->endWidget(); ?>

        <div class="kranshteyn_hr_100"></div>
    <? endif; ?>


    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-out',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->createUrl('player/OutSumm'),
        'htmlOptions' => array('class' => 'converter-form'),
    )); ?>

    <div class="info" style="margin: 10px; text-align: left; background:#349BB9; color:#ffffff; border-radius: 3px;">
        <?php
        if ($form->errorSummary($model) != '') {
            echo $form->errorSummary($model);
        }

        ?>
    </div>

    <div class="convert-item">

        <p>
            Ваши сбережения: <?= $player->getSummExit() ?> <img width="35" src="/images/gold.png">
        </p>
        <p>
            1 pубль = 1 <img src="/images/money.png"> + 1 <img  src="/images/gold.png">
        </p>

        <p>
            В данный момент в целях исключения мошенничества, вывод производится в ручном режиме. Время поступления
            средств до 1 рабочих дней.
            Если у вас возникли вопросы, напишите в нашу службу поддержки!
            <span class="bold_red"> Внимание! </span> минимальная сумма вывода <span class="bold_red">10 руб.</span>
        </p>


        <div class="convert-item">
            <span class="value-name-convert">Сумма вывода</span>

            <p>
                <?php echo $form->textField($model, 'summ'); ?>
            </p>
        </div>
        <div class="convert-item">
            <span class="value-name-convert">Тип счета</span>

            <p>
                <?php echo $form->dropDownList($model, 'type', array_merge(array('0' => 'Яндекс Деньги', '1' => 'QIWI', '2' => 'МТС', '3' => 'Билайн', '4' => 'Мегафон', '5'=>'Payeer'))); ?>
            </p>
        </div>
        <div class="convert-item">
            <span class="value-name-convert">Номер счета/телефона</span>

            <p>
                <?php echo $form->textField($model, 'nomer_schet'); ?>
            </p>
        </div>


        <p class="btn-convert">
            <button class="btn" type="submit">Вывести</button>
        </p>


        <?php $this->endWidget(); ?>

        <br><br>


        <div class="kranshteyn_hr_100"></div>

        <div>
            <h3>Космический баланс</h3>
            Ваш доступный баланс: <span class="bold_red"><?= $player->getSummLimit(); ?> <img src="/images/money.png"></span><br><br>

            <p>Как пополнить доступный баланс?</p>
            1) Играйте на Арене на <strong>космический баланс</strong>, чтобы выйграть баланс у ваших соперников! <br>
            2) Выполняйте миссии, миссии генерируются автоматически для всех игроков!  <br>
            3) Приглашайте рефералов! За каждое пополнение рефералом вы будете получать до <span
                class="bold_red">40%</span> от суммы пополнения! <br>
            4) Пополняйте счет! За каждое пополнение вы будете получать <span class="bold_red">40%</span> космического баланса!

            <br>
            <br>

        </div>

        <br><br>

    </div>

</div>