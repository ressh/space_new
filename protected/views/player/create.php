<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>

<div class="text_general">
    <h3>Регистрация</h3>
</div>

<div class="kranshteyn_hr_100"></div>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'player-create-form',
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
            <?php echo $form->labelEx($model, 'password', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model, 'password'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'password_repeat', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->passwordField($model, 'password_repeat'); ?>
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

        <div style="background: #000000; padding: 15px; text-align: center; color:#ffffff;">
            Нажимая на кнопку регистрация, вы соглашаетесь с тем, что Вам есть 18 лет и Вы сгласны с <a target="_blank" href="<?= $this->createUrl( 'site/rulesGame' ) ?>">правилами игры</a>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Регистрация', array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>

        
    </div>
    <!-- form -->

</div>

<div class="regist_iframe">
    <iframe id="regist" scrolling="no" width="480" height="400" src="/iframes/regist/index.php"
            style="border:none;"></iframe>
</div>

<br><br>

<script>
    var isClickName = false;
    var isClickEmail = false;
    var isClickPassword = false;
    var isClickPasswordRepeat = false;

    $("#Player_name").change(function() {

        if( isClickName == false )
            document.getElementById("regist").contentWindow.setInformChild( $("#Player_name").val() );

        isClickName = true;

    });

    $("#Player_email").change(function() {

        if( isClickEmail == false )
            document.getElementById("regist").contentWindow.setInformEmail();

        isClickEmail = true;

    });

    $("#Player_password").change(function() {

        if( isClickPassword == false )
            document.getElementById("regist").contentWindow.setInformPassword();

        isClickPassword = true;

    });

    $("#Player_password_repeat").change(function() {

        if( isClickPasswordRepeat == false )
            document.getElementById("regist").contentWindow.setInformPasswordRepeat();

        isClickPasswordRepeat = true;

    });



</script>