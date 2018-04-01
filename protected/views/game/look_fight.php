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

$cs->registerScriptFile($baseUrl . "/iframes/lookFight/Client.js");
$cs->registerScriptFile($baseUrl . "/iframes/lookFight/index.js");
$cs->registerScriptFile($baseUrl . "/iframes/lookFight/joiner.js");
$cs->registerScriptFile($baseUrl . "/iframes/lookFight/ship.js");

?>


<script>

    var players = [];

    <? foreach( $joiners as $joiner ): ?>

    <? $joiner->getshipJoiner(); ?>

    <? if( $joiner->ship != null ): ?>

    var gfx = '<?= $joiner->ship->gfx ?>';
    var gfx_gun = '<?= $joiner->ship->gfx_power; ?>';
    var gfx_engine = '<?= $joiner->ship->gfx_speed; ?>';
    var gfx_defend = '<?= $joiner->ship->gfx_defend; ?>';

    <? else: ?>

    var gfx = '/images/noShip1.png';
    var gfx_gun = '';
    var gfx_engine = '';
    var gfx_defend = '';

    <? endif; ?>

    var player_id = '<?= $joiner->id_player; ?>';
    var type_guns = '<?= $joiner->type_gun; ?>';
    var name = '<?= $joiner->ship->name_ship; ?>';

    var player = new Player( player_id, gfx, gfx_gun, gfx_engine, gfx_defend, type_guns, name );
    players.push( player );

    <? endforeach; ?>

</script>



<div class="text_general">
    <h3>Просмотр битвы</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">


    <div style="position: relative; width: 940px; height: 750px;">
        <div class="panel_info" >


           <div style="float: right;">Раунд <span id="round">1</span></div>
            Игроки:

            <? $f = 1; foreach( $joiners as $joiner ): ?>
                <div id="player<?= $joiner->id_player; ?>">  <?= $joiner->ship->name_ship ?> </div>
            <?endforeach;?>


            <br>

            <button id="start_round" class="btn btn-danger">Старт</button>
            <button id="next_level" style="display:none;" class="btn btn-info">Далее</button>
        </div>

        <div id="text_round">

        </div>

    <canvas id="canvas" width="940" height="750" style=""></canvas>
    </div>


    <div style="margin-top: 10px;" class="kranshteyn_hr_100"></div>



    <br><br>




</div>
