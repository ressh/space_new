<?php
/* @var $this PlayerController */
/* @var $model Player */
/* @var $form CActiveForm */
?>


<div class="text_general">
    <h3>Вам должна придти смс</h3>
</div>

<div class="kranshteyn_hr_100"></div>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'code-form',
    'action' => Yii::app()->createUrl('player/CodeConfirm'),
    'htmlOptions' => array(
        'class' => 'form-horizontal margin_bottom_0',
        'role' => 'form',
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
            <?php echo $form->labelEx($model, 'code', array('class' => 'control-label col-sm-2')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'code'); ?>
            </div>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton('Подтвердить', array('class' => 'btn btn-info')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>
    <!-- form -->

</div>

<div class="regist_iframe">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-phone',
        'enableAjaxValidation' => false,
        'action' => Yii::app()->createUrl('player/PhoneConfirm'),
        'htmlOptions' => array('class' => 'form-inline'),
    )); ?>

     <p style="padding: 20px; color:#ffffff; text-align: center;">Если по каким то причинам код не приходит, напишите в техподдержку!</p>
    <p style="padding: 20px; padding-top:10px; color:#ffffff; text-align: center;" class="get_again"> Повторно код можно запросить через <span id="sec"></span> сек. </p>

    <?php echo $form->hiddenField( $phone_form, 'phone', array()); ?>

    <?php $this->endWidget(); ?>
</div>

<script>

    var time = 60
    var intTime = setInterval( function(){

        time--;
        $('#sec').text( time );

        if( time <= 0 )
        {
            clearInterval( intTime );
            $('.get_again').html( '<button class="btn" type="submit">Выслать код повторно</button>' );
        }

    }, 1000 )

</script>

<br><br>

