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

?>

<div class="text_general">
    <h3>Доступные миссии</h3>

</div>

<a class="btn btn-info" href="<?= $this->createUrl("mission/getMyMission"); ?>">Мои миссии
    <? if( $countMissions > 0 ): ?>
        (<?= $countMissions ?>)
    <? endif; ?>
</a>

<div class="kranshteyn_hr_100"></div>


<p class="text_general_100">
    У каждого типа корабля есть свои определенные миссии! Чем лучше кораблик, тем более
    разнообразные миссии он может выполнять. Награда за миссии соответственно выше!
    Чтобы <b>ускорить мисси</b> или <b>увеличить шанс</b> на выигрыш - <a href="<?= $this->createUrl( 'game/magazine' ); ?>"><b>загляните в магазин!</b></a>
</p>

<div class="content">

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

                    </span></td>

                    <td><?= $mission->getTimeNeed() ?></td>

                <td><?= $mission->getSummWin() ?> <img width="35" src="/images/gold.png"></td>


                <td><a class="btn disabled">Выполнить (требуется корабль)</a></td>


            </tr>

        <? endforeach; ?>
        </tbody>
    </table>

</div>

<br><br>
