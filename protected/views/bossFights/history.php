<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 25.10.2015
 * Time: 19:51
 */

?>

<div class="text_general">
    <h3>Завершенные битвы Боссов</h3>

</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">


    <table class="table table-bordered"
           style=" width: 900px; margin-left: auto; margin-right: auto;">

        <thead>
        <tr>
            <th>
                Победитель
            </th>
            <th>
                Босс
            </th>
            <th>
                Сумма выигрыша
            </th>
            <th>
                Валюта битвы
            </th>
        </tr>
        </thead>

        <tbody>


        <? foreach ($fights as $fight): ?>

            <? $winner_ship = $fight->getWinner(); ?>


            <tr style="color:#ffffff;">
                <td style="position: relative; width: 105px; height: 100px;">


                    <?= $winner_ship->name_ship; ?>

                    <? if (isset($winner_ship->gfx)): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $winner_ship->gfx; ?>">
                    <? endif; ?>

                    <? if ($winner_ship->gfx_speed != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $winner_ship->gfx_speed; ?>">
                    <? endif; ?>

                    <? if ($winner_ship->gfx_power != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $winner_ship->gfx_power; ?>">
                    <? endif; ?>

                    <? if ($winner_ship->gfx_defend != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $winner_ship->gfx_defend; ?>">
                    <? endif; ?>


                </td>
                <td>
                    <img width="120" src="/images/ships/boss/icon/<?= $fight->gfx ?>">
                </td>
                <td>
                    <?= round($fight->shots_need * $fight->summ_shot * 0.8, 2); ?> <img width="35" src="/images/gold.png">
                </td>
                <td>
                    <?= $fight->getNameMoney() ?>
                </td>
            </tr>

        <? endforeach; ?>


        </tbody>
    </table>

    <? $this->widget('CLinkPager', array(
        'pages' => $pages,
    )) ?>

    <br>
    <br>

</div>



