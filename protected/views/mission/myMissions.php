<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 07.11.2015
 * Time: 19:05
 */


$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile($baseUrl . "/js/timer/jquery.plugin.min.js");
$cs->registerScriptFile($baseUrl . "/js/timer/jquery.countdown.js");


$cs->registerCssFile($baseUrl . '/js/timer/jquery.countdown.css');

$chance = $ship->getChanceMissionPlus();

?>

<div class="text_general">
    <h3>Текущие миссии</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">

    <p class="text_general_100">
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

        <? foreach ( $missions as $mission) : ?>

            <?  $mission->checkComplete(); ?>


            <tr>
                <td style="width: 100px;"><img width="100" src="/images/mission/<?= $mission->getIconMission(); ?>"></td>

                <td><?= $mission->getTextMission(); ?></td>

                <td><?= $mission->getChanceMission(); ?>%
                    <? if( $chance != 0 ): ?>
                    + <span class="bold_red"><?= $chance ?>%
                        <? endif; ?>
                    </span></td>

                <td><?= $mission->getTimeNeed() ?></td>

                <td><?= $mission->getSummWin() ?> <img width="35" src="/images/gold.png"></td>

                <? if( $mission->status == Missions::$MISSION_IN_WORK ): ?>
                    <script>
                        $(document).ready( function() {
                            var timeSec = '<?=$mission->getTimeCompleteMissionSec();?>';
                            startMissionTimer(timeSec);
                        } )

                    </script>
                    <td class="time_td">Выполняется, осталось:
                        <br>
                            <span id="imageLayout">
                                <span class="image{h10}"></span>
                                <span class="image{h1}"></span>
                                <span class="imageSep"></span>
                                <span class="image{m10}"></span>
                                <span class="image{m1}"></span>
                                <span class="imageSep"></span>
                                <span class="image{s10}"></span>
                                <span class="image{s1}"></span>
                            </span>

                </td>
                <? elseif( $mission->status == Missions::$MISSION_NOT_COMPLETE ) : ?>
                    <td><a class="btn disabled">Не выполнена</a></td>
                <? elseif( $mission->status == Missions::$MISSION_COMPLETE ): ?>
                    <td>
                        <a class="btn btn-success" href="<?= $this->createUrl( 'mission/getWin', array( 'id'=>$mission->id ) ) ?>">Получить <img width="35" src="/images/gold.png"></a>
                        <a class="btn btn-success" href="<?= $this->createUrl( 'mission/GetWinLimit', array( 'id'=>$mission->id ) ) ?>">Получить <img width="35" src="/images/money.png"></a>

                    </td>
                <? elseif( $mission->status == Missions::$MISSION_COMPLETE_GET ): ?>
                    <td>Получена награда:<br>
                        <div class="form-group" style="padding: 10px; background:#41B5D7">
                            <span class="black_konkurs"><span style="color: #ffffff;"><?= $mission->getSummWin() ?> <?= $mission->getTypeMoneyGFX(); ?>
                        </div>
                <? endif;?>
                    </td>
            </tr>

        <? endforeach; ?>

        </tbody>
    </table>

</div>

<script>


    function startMissionTimer( timeSec ) {

        $('#imageLayout').countdown({until: timeSec, compact: false,
            layout: $('#imageLayout').html()});

    }



</script>

