<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 3:32
 */

?>


<div class="content" style="rgba(0, 0, 0, 0.48)">

    <div class="kranshteyn_hr_100"></div>


<div class="text_general">
    <h3>Топ игроков</h3>

</div>

    <p class="text_general_100">
        Здесь представлен рейтинг выдающихся пиратов нашей галактики! Пираты, войны, добытчики и торговци и подробная статистика их достижений!
    </p>

    <div class="kranshteyn_hr_100"></div>


    <? foreach ($ships as $key=>$ship): ?>



        <div style="width:100%; height:320px; margin-left: 410px; position: relative; text-align: center;">
            <div style="position: absolute; top:50px; left:-400px; font-size: 36px;"><img hspace="10" width="70" src="/images/<?= $ship->type_ship ?>.png"><?= $ship->name_ship ?></div>

            <div style="position: absolute; top:120px; left:-310px; font-size: 16px;">
                <i class="fa fa-money"></i> прибыль в день: <?= $ship->getMoneyPrognozDay() ?> <img width="15" src="/images/gold.png">
            </div>
            <div style="position: absolute; top:140px; left:-310px; font-size: 16px;">
                <i class="fa fa-tachometer"></i> топлива осталось: <?= $ship->getFuelPersent() ?>%
            </div>
            <div style="position: absolute; top:160px; left:-310px; font-size: 16px;">
                <i class="fa fa-thumbs-o-up"></i> шанс 2-х прибыль: <?= $ship->getChance2x() ?>%
            </div>
            <div style="position: absolute; top:180px; left:-310px; font-size: 16px;">
                <i class="fa fa-star-half-o"></i> кол-во битв/побед на Арене: <?= $ship->getStatisticArenaWars() ?>/<?= $ship->getWinsArena() ?>
            </div>
            <div style="position: absolute; top:200px; left:-310px; font-size: 16px;">
                <i class="fa fa-rocket"></i> выполнил миссий: <?= $ship->getMissionsCount() ?>
            </div>
            <div style="position: absolute; top:220px; left:-310px; font-size: 16px;">
                <i class="fa fa-reddit-alien"></i> убил боссов: <?= $ship->getCountWinBoss() ?>
            </div>


            <iframe scrolling="no" width="500" height="285" src="/iframes/my_ship/index.php?gfx=<?= $ship->gfx ?>
            &gfx_power=<?= $ship->gfx_power ?>&gfx_speed=<?=  $ship->gfx_speed ?>&gfx_defend=<?= $ship->gfx_defend ?>"

                    style="border:none; text-align: left; margin-right: 460px;"></iframe>


        </div>

        <div class="kranshteyn_hr_100"></div>

    <? endforeach; ?>

    <?$this->widget('CLinkPager', array(
        'pages' => $pages,
    ))?>

</div>

    <div style="clear: both; height: 100px;"></div>
