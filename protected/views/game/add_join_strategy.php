<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 21:37
 */

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile($baseUrl . "/js/buttons.js");
$cs->registerCssFile($baseUrl . '/css/buttons.css');

$cs->registerScriptFile("http://code.createjs.com/easeljs-0.8.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/tweenjs-0.6.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/movieclip-0.8.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/preloadjs-0.6.0.min.js");

$cs->registerScriptFile($baseUrl . "/iframes/arenaAddRoom/Client.js");
$cs->registerScriptFile($baseUrl . "/iframes/arenaAddRoom/index.js");

?>

<script>
    var gfx = '<?= $ship->gfx ?>';
    var gfx_gun = '<?= $ship->gfx_power; ?>';
    var gfx_engine = '<?= $ship->gfx_speed; ?>';
    var gfx_defend = '<?= $ship->gfx_defend; ?>';
</script>



<div class="text_general">
    <h3>Присоединиться к битве</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">


    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'arena-form',
        'enableAjaxValidation' => true,
    )); ?>

    <div class="info"  style="margin: 10px; text-align: left; background:#349BB9; color:#ffffff; border-radius: 3px;" >
        <?php

        if( $form->errorSummary($join) != '' )
        {
            echo $form->errorSummary($join);
        }

        ?>
    </div>


    <p class="">

        Выбери стратегию игры на 10 раундов.

    <div style="clear: both; height: 5px;"></div>
    <img src="/iframes/arenaAddRoom/images/message_icon_blasters.jpg" width="50" align="left">
    - лазер, уничтожает корабли идущие на абордаж, не эффективен против защитного поля!
    <div style="clear: both; height: 5px;"></div>
    <img src="/iframes/arenaAddRoom/images/message_icon_swords.jpg" width="50" align="left">
    - абордаж, уничтожает корабли с защитным полем, не эфективен против лазера!
    <div style="clear: both; height: 5px;"></div>
    <img src="/iframes/arenaAddRoom/images/message_icon_flag.jpg" width="50" align="left">
    - защитное поле, уничтожает лазер, не эфективен против абордажа!
    <div style="clear: both; height: 5px;"></div>

    </p>

    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>

    <h3>Моя стратегия</h3>

    <div style="position: relative; width: 940px; height: 385px;">
        <div class="round_info"
             style="display: none; position: absolute; left:550px; top:100px; font-size: 36px; font-weight: bold; ">
            Раунд <span class="round_num">1</span>
        </div>
        <div class="round_add"
             style="display: none; position: absolute; left:400px; top:80px; font-size: 21px; font-weight: bold; ">
            Моя стратегия:
        </div>


        <canvas id="canvas" width="940" height="385" style=""></canvas>
    </div>


    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>



    <!-- ...input fields for $a, $b... -->

    <?php echo $form->hiddenField($join, 'type_gun', array('value' => '')); ?>
    <?php echo $form->hiddenField($join, 'id_room', array( 'value' => $room->id )); ?>


    <div class="row buttons">
        <?php echo CHtml::linkButton('', array('submit'=>$this->createUrl('game/joinRoom'), 'class' => 'button_join_room')); ?>
    </div>

    <?php $this->endWidget(); ?>

    <br><br>




</div>
