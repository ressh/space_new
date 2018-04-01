<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>
<div class="content">

    <div class="kranshteyn_hr_100"></div>

<div class="text_general">
    <h3>Вход в игру</h3>
</div>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'player-login-form',
    'htmlOptions' => array(
        'class' => 'form-horizontal margin_bottom_0',
        'role' => 'form'
    ),

)); ?>


<div class="info"  style="margin: 10px; text-align: left; background:#349BB9; color:#ffffff; border-radius: 3px;" >
    <?php
        if ($form->errorSummary($model) != '') {
        echo $form->errorSummary($model);
    }
    ?>
</div>

<div class="contanier_regist content">

    <div class="form" style="">


        <div class="form-group">
            <?php echo $form->labelEx($model, 'email', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'email'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'password', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model, 'password'); ?>
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
            <?php echo CHtml::submitButton('Вход', array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <div style="text-align: center; background: #000000; padding: 5px;">или вход через соц сети </div>

        <div style="padding-left:65px; padding-top: 10px;">
            <?php  Yii::app()->eauth->renderWidget();   ?>
        </div>


    </div>
    <!-- form -->

</div>

<div class="regist_iframe">
    <iframe id="regist" scrolling="no" width="471" height="375" src="/iframes/enter/index.php"
            style="border:none;"></iframe>
</div>

<br><br>

<script>
    var isClickPassword = false;

    $("#LoginForm_password").change(function() {

        if( isClickPassword == false )
            document.getElementById("regist").contentWindow.killSpaceman();

        isClickPassword = true;

    });

    $( '.auth-service').on( 'mouseover', function() {
        if( isClickPassword == false )
            document.getElementById("regist").contentWindow.killSpaceman();

        isClickPassword = true;
    } )

</script>

    <div style="clear: both; height: 1px;"></div>

</div>