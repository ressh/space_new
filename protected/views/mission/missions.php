<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 2:07
 */


$countMissions = Missions::model()->count(
    new CDbCriteria(array
    (
        'condition' => 'id_player = :id_player and ( status = 1 or status = 2 )',
        'params' => array(':id_player'=>$player->id)
    )));

if( $ship != null )
$chance = $ship->getChanceMissionPlus();
else
$chance = 0;

?>


<div class="content">

    <div class="kranshteyn_hr_100"></div>

<div class="text_general">
    <h3>Доступные миссии</h3>

</div>

<a class="btn btn-info" href="<?= $this->createUrl("mission/getMyMission"); ?>">Мои миссии
    <? if( $countMissions > 0 ): ?>
    (<?= $countMissions ?>)
    <? endif; ?>
</a>


<p class="text_general_100">
    У каждого типа корабля есть свои определенные миссии! Чем лучше кораблик, тем более
    разнообразные миссии он может выполнять. Награда за миссии соответственно выше!
    Чтобы <b>ускорить мисси</b> или <b>увеличить шанс</b> на выигрыш - <a href="<?= $this->createUrl( 'game/magazine' ); ?>"><b>загляните в магазин!</b></a>
</p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Миссия</td>
            <td>Описание</td>
            <td style="width:120px;">Шанс на выигрыш</td>
            <td>Время выполнения</td>
            <td>Сумма</td>
            <td>Выполнить</td>
        </tr>
        </thead>
        <tbody>

        <? foreach ($missions as $mission) : ?>

            <tr>
                <td style="width: 100px;"><img width="100" src="/images/mission/<?= $mission->getIconMission(); ?>">
                </td>

                <td><?= $mission->getTextMission(); ?></td>

                <td><?= $mission->getChanceMission(); ?>%

                    <? if( $chance != 0 ): ?>
                    + <span class="bold_red"><?= $chance ?>%
                    <? endif; ?>

                    </span></td>

                <? if( $ship->hold_item_id > 0 ): ?>
                <td><strike><?= $mission->getTimeNeedWithoutArt() ?></strike><br><span class="bold_red"><?= $mission->getTimeNeed() ?></span></td>
                <? else: ?>
                    <td><?= $mission->getTimeNeed() ?></td>
                <? endif; ?>

                <td><?= $mission->getSummWin() ?> <img width="25" src="/images/gold.png"><img width="25" src="/images/money.png"></td>

                <? if ($isComplete == null): ?>
                    <td><a class="btn btn-success"
                           href="<?= $this->createUrl('mission/getMission', array('id' => $mission->id)); ?>">Выполнить</a>
                    </td>
                <? else: ?>
                    <td><a class="btn disabled">Выполнить</a></td>
                <? endif; ?>

            </tr>

        <? endforeach; ?>
        </tbody>
    </table>

</div>

<? $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

<br><br>
