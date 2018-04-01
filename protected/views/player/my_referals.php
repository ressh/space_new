<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 2:07
 */
?>

<div class="text_general">
    <h3>Мои рефералы</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Имя</td>
            <td>Дата последнего визита</td>
            <td>Время регистрации</td>
            <td>Корабль</td>
            <td>Финансовая информация</td>
        </tr>
        </thead>
        <tbody>

        <? foreach ( $referals as $referal) : ?>

            <tr>
                <? $player = $referal->getReferalPlayer(); ?>
                <td>
                    <?= $player->name ?>
                </td>
                <td><?= $player->date_last_visit ?></td>
                <td><?= $referal->time;  ?></td>
                <?  $ship  = $referal->getReferalShip(); ?>
                <? if( $ship != null ): ?>
                    <td><div style="position: relative;">

                            <img src='<?= $ship->gfx ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
                            <? if( $ship->gfx_speed != '' ): ?>
                            <img src='<?= $ship->gfx_speed ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
                            <? endif; ?>
                            <? if( $ship->gfx_power != '' ): ?>
                            <img src='<?= $ship->gfx_power ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
                            <? endif; ?>
                            <? if( $ship->gfx_defend != '' ): ?>
                            <img src='<?= $ship->gfx_defend ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
                            <? endif; ?>
                        </div>
                    </td>
                <? else: ?>
                    <td> Отсутствует </td>
                <? endif; ?>
                <td>
                    <? if( $ship != null ): ?>
                        <?= CHtml::link( 'Подробно', Yii::app()->createUrl( 'player/getInfoReferal', array( 'id'=>$referal->id_referal, 'name'=>$player->name ) ), array('class' => 'btn btn-info')) ?>
                    <? endif; ?>
                </td>
            </tr>

        <? endforeach; ?>
        </tbody>
    </table>

    <? $this->widget('CLinkPager', array(
        'pages' => $pages,
    )) ?>

</div>