<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 18.10.2015
 * Time: 3:56
 */



$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile($baseUrl . "/js/buttons.js");
$cs->registerCssFile($baseUrl . '/css/buttons.css');

$cs->registerScriptFile("http://code.createjs.com/easeljs-0.8.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/tweenjs-0.6.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/movieclip-0.8.0.min.js");
$cs->registerScriptFile("http://code.createjs.com/preloadjs-0.6.0.min.js");

$cs->registerScriptFile($baseUrl . "/iframes/my_ship/Client.js");
$cs->registerScriptFile($baseUrl . "/iframes/my_ship/index.js");

?>

<script>

    var gfx = '/images/ships/boss/icon/nosh.png';
    var gfx_gun = '';
    var gfx_engine = '';
    var gfx_defend = '';

    var fuel = 100;

</script>

<div style="position: absolute; top:20px; left:17px; width: 560px; height: 335px;">
    <canvas id="canvas" width="530" height="285" style=""></canvas>
</div>

<div class="name_ship">Требуется корабль</div>


