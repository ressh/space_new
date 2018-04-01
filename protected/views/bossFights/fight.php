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

$cs->registerScriptFile($baseUrl . "/iframes/boss/Client.js");
$cs->registerScriptFile($baseUrl . "/iframes/boss/index.js");


?>


<script>


    var gfx = '<?= $ship->gfx ?>';
    var gfx_gun = '<?= $ship->gfx_power; ?>';
    var gfx_engine = '<?= $ship->gfx_speed; ?>';
    var gfx_defend = '<?= $ship->gfx_defend; ?>';

    var boss_gfx = '<?= $boss->gfx ?>';

    var winSumm = 0;

    <? if( $kill == "true" ): ?>

    winSumm = '<?= round( $boss->shots_need * $boss->summ_shot * 0.8, 2); ?>'

    <? endif; ?>

</script>



<div class="text_general">
    <h3>Просмотр битвы</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">


    <div style="position: relative; width: 940px; height: 750px;">
        <canvas id="canvas" width="940" height="750" style=""></canvas>

        <div class="btn_kill_boss"></div>
        <div class="btn_again_boss" style="display: none;"></div>
        <div class="btn_exit_boss" style="display: none;"></div>
        <div class="win_boss" ><img src="/images/ships/boss/win.png" ></div>
        <div class="loose_boss" ><img src="/images/ships/boss/dead.png" ></div>
    </div>

    <div style="position: absolute; top:630px; left:410px; text-align: center;">
        <h3 class="text_stage"></h3>
    </div>


    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>



    <br><br>




</div>
