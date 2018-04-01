<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>

<div class="content">

    <div class="kranshteyn_hr_100"></div>

<div class="text_general">
    <h3>Техподдержка</h3>
</div>



<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'support-form',
    'htmlOptions' => array(
        'class' => 'form-horizontal margin_bottom_0',
        'role' => 'form'
    ),

)); ?>


<div class="info"  style="margin: 10px; text-align: left; background:#349BB9; color:#ffffff; border-radius: 3px;" >
    <?php
    if( $form->errorSummary($model) != '' )
    {
        echo $form->errorSummary($model);
    }

    ?>
</div>

<?php
foreach(Yii::app()->user->getFlashes() as $key => $message) {
    echo '<div class="flash_success">' . $message . "</div>\n";
}
?>

<div class="contanier_regist content">

    <div class="form" style="">


        <div class="form-group">
            <?php echo $form->labelEx($model, 'name', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'name'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'email', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'email'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'message', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->textArea($model, 'message', array('rows'=>6, 'cols'=>50)); ?>
            </div>
        </div>

        <? if (CCaptcha::checkRequirements() && Yii::app()->user->isGuest): ?>

            <?= CHtml::activeLabelEx($model, 'verifyCode', array('class' => 'control-label col-sm-2')) ?>
            <div class="col-sm-10">
                <?= CHtml::activeTextField($model, 'verifyCode') ?>


                <div style="margin-left: 150px;"><? $this->widget('CCaptcha', array('buttonLabel' => 'Обновить')) ?>
                </div>

            </div>

        <? endif ?>


        <div class="row buttons">
            <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>
    <!-- form -->

</div>

<div class="regist_iframe">
    <iframe id="regist" scrolling="no" width="471" height="385" src="/iframes/support/index.php"
            style="border:none;"></iframe>
</div>

<br><br>

    <div style="clear: both; height: 1px;"></div>

    </div>