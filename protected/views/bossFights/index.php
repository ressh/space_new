<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 21:37
 */
?>

<div class="content">


<div class="kranshteyn_hr_100"></div>

    <div class="text_general">
        <h3>Битва боссов</h3>
    </div>


    <p class="text_general_100">
        Бейте босса по очереди! Кто нанесет решающий удар - забирает прибыль. Комиссия системы 20%.
    </p>

    <div style="margin-top: 5px; float: left">
        <button class="btn" data-toggle="modal" data-target="#RulesArena">Правила игры</button>
    </div>
    <div style="margin-top: 5px; float: right;">
        <a href="<?= $this->createUrl('bossFights/HistoryFights') ?>" class="btn btn-info">История побед</a>
    </div>

    <div style="clear: both; height: 10px;"></div>

    <div style="float: left; margin-top: 30px; margin-left: 10px;">

            <table class="table table-bordered"
                   style="width: 900px;">

                <thead>
                <tr>
                    <th>
                        Босс
                    </th>
                    <th>
                        Изображение
                    </th>
                    <th>
                        Стоимость
                    </th>
                    <th>
                        Валюта битвы
                    </th>
                </tr>
                </thead>

                <tbody>


                <? foreach ($bosses as $boss): ?>

                    <? if ($boss->type_money == Boss::$MONEY_GAME): ?>

                        <tr style="color:#ffffff;">
                            <td style="position: relative; width: 105px; height: 100px;">

                                <?= $boss->name ?>
                                <a href="<?= $this->createUrl('bossFights/ShotBoss', array('id' => $boss->id)) ?>"
                                   class="btn btn-danger">Напасть</a>

                            </td>
                            <td style="position: relative; width: 105px; height: 100px;">

                                <img src="/images/ships/boss/icon/<?= $boss->gfx ?>">

                            </td>
                            <td>

                                <?= $boss->summ_shot ?> <img width="35" src="/images/gold.png">
                            </td>
                            <td>
                                <?= $boss->getNameMoney() ?>
                            </td>

                        </tr>

                    <? endif; ?>

                <? endforeach; ?>

                <? foreach ($bosses as $boss): ?>

                    <? if ($boss->type_money == Boss::$MONEY_LIMIT): ?>

                        <tr style="color:#ffffff;">
                            <td style="position: relative; width: 105px; height: 100px;">

                                <?= $boss->name ?>
                                <a href="<?= $this->createUrl('bossFights/ShotBoss', array('id' => $boss->id)) ?>"
                                   class="btn btn-danger">Напасть</a>

                            </td>
                            <td style="position: relative; width: 105px; height: 100px;">

                                <img src="/images/ships/boss/icon/<?= $boss->gfx ?>">

                            </td>
                            <td>

                                <?= $boss->summ_shot ?> <img width="35" src="/images/money.png">
                            </td>
                            <td>
                                <?= $boss->getNameMoney() ?>
                            </td>

                        </tr>

                    <? endif; ?>

                <? endforeach; ?>

                </tbody>
            </table>

    </div>


        <div style="clear: both; height: 1px;"></div>

    <br>
    <br>


</div>

<? $this->widget("application.widgets.ModalRulesBoss"); ?>



