<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 1:14
 */
?>


<div class="content">
    <h3>Обменять баланс (бонус +10%)</h3>


    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'form-change',
        'enableAjaxValidation'=>false,
        'action' => Yii::app()->createUrl('player/ChangeOutSummToBuy'),
        'htmlOptions'=>array( 'class'=>'converter-form' ),
    )); ?>

    <div class="convert-item">


        <div class="convert-item">
            <span class="value-name-convert">Сумма обмена</span>
            <p>Ваш баланс: <?= $player->getSummExit() ?> <img src="/images/gold.png"></p>
            <p>

                <?php echo $form->textField($model,'summ'); ?>
                <span class="bold_red"><?php echo $form->error($model, 'summ'); ?></span>
            </p>
        </div>


        <p class="btn-convert">
            <button class="btn" type="submit">Обменять</button>
        </p>


        <?php $this->endWidget(); ?>


        <div class="kranshteyn_hr_100"></div>

        <br><br>

        <div class="content-main content-aside">
            <div class="paym-bl">

                <p class="bg-primary">
                    <h3>Действует бонус перевода средств! +10%</h3>
                    При пополнении баланса для покупок вы получаете дополнительный бонус!
                </p>

            </div>

        </div>

        <br><br>

    </div>

