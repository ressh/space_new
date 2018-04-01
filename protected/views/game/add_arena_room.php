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
    <h3>Создать комнату битвы!</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">


    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'arena-form',
        'enableAjaxValidation' => true,
    )); ?>

    <div class="info"  style="margin: 10px; text-align: left; background:#349BB9; color:#ffffff; border-radius: 3px;" >
        <?php
        if( $form->errorSummary($room) != '' )
        {
            echo $form->errorSummary($room);
        }

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


    <div class="kranshteyn_hr_100"></div>

    <h3>Моя ставка</h3>

    <span class="btn_summ button button-circle button-primary" name="5">5 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-caution" name="10">10 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-primary" name="25">25 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-primary" name="50">50 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-primary" name="100">100 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-primary" name="250">250 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>
    <span class="btn_summ button button-circle button-primary" name="500">500 <img width="30" src="/images/gold.png">/<img width="30" src="/images/money.png"></span>

    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>

    <h3> Тип валюты </h3>

    <span class="btn_money_type button button-pill button-caution"
          name="0"> Покупка <?= $player->getSummBuy() ?> <img width="35" src="/images/gold.png"></span>

    <span class="btn_money_type button button-pill button-primary"
          name="1"> Космический <?= $player->getSummLimit() ?> <img width="35" src="/images/money.png"></span>

    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>


    <h3>Количество игроков </h3>

    <span class="btn_quantity button button-circle button-caution" name="2">2</span>
    <span class="btn_quantity button button-circle button-primary" name="3">3</span>
    <span class="btn_quantity button button-circle button-primary" name="5">5</span>
    <span class="btn_quantity button button-circle button-primary" name="7">7</span>


    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>



    <!-- ...input fields for $a, $b... -->

    <?php echo $form->hiddenField($room, 'summ', array('value' => '10')); ?>
    <?php echo $form->hiddenField($room, 'type_money', array('value' => '0')); ?>
    <?php echo $form->hiddenField($room, 'quantity', array('value' => '2')); ?>
    <?php echo $form->hiddenField($join, 'type_gun', array('value' => '')); ?>


    <div class="row buttons">
        <?php echo CHtml::linkButton('', array('submit'=>$this->createUrl('game/addRoomArena'), 'class' => 'button_add_room')); ?>
    </div>

    <?php $this->endWidget(); ?>

    <br><br>

    <script>

        $('.btn_quantity').on('click', function (ev) {

            $('.btn_quantity.button-caution').removeClass('button-caution').addClass('button-primary');
            $(ev.target).removeClass('button-primary').addClass('button-caution');

            $('#ArenaRoom_quantity').val($(ev.target).attr('name'));
        })

        $('.btn_summ').on('click', function (ev) {

            $('.btn_summ.button-caution').removeClass('button-caution').addClass('button-primary');
            $(ev.target).removeClass('button-primary').addClass('button-caution');

            $('#ArenaRoom_summ').val($(ev.target).attr('name'));
        })

        $('.btn_money_type').on('click', function (ev) {

            $('.btn_money_type.button-caution').removeClass('button-caution').addClass('button-primary');
            $(ev.target).removeClass('button-primary').addClass('button-caution');

            $('#ArenaRoom_type_money').val($(ev.target).attr('name'));
        })

    </script>


</div>
