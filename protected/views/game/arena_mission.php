<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 21:37
 */
if ($ship != null)
    $countFights = $ship->getNewFightsArenaCount();
else
    $countFights = 0;
?>

<div class="content">

    <div class="kranshteyn_hr_100"></div>


<div class="text_general">
    <h3>Арена</h3>

</div>


    <p class="text_general_100">

        Арена - это место, где игроки решают свои претензии по мужски. Чтобы вступить в бой выберите битву или создайте новую. Как это сделать читайте правила игры. Победивший игрок получает весь выигрышь. Проигравший остается без выигрыша.

    <div style="margin-top: 5px; float: left">
        <button class="btn" data-toggle="modal" data-target="#RulesArena">Правила игры</button>
        <a href="<?= $this->createUrl('game/addRoomArena') ?>" class="btn btn-danger">Создать битву</a>
    </div>
    <div style="margin-top: 5px; float: right;">
        <a href="<?= $this->createUrl('game/myFightsComplete') ?>" class="btn btn-success">Мои завершенные битвы
            <? if ($countFights > 0): ?>
                (<?= $countFights ?>)
            <? endif; ?>
        </a>
        <a href="<?= $this->createUrl('game/HistpryFights') ?>" class="btn btn-info">История битв</a>
    </div>
    <div style="clear: both; height: 1px;"></div>

    </p>

    <div class="kranshteyn_hr_100"></div>


    <p class="text_general_100">
        Комнаты ожидающие игроков!
    </p>

    <table class="table table-bordered"
           style=" width: 900px; margin-left: auto; margin-right: auto;">

        <thead>
        <tr>
            <th>
                Создал битву
            </th>
            <th>
                Сумма ставки
            </th>
            <th>
                Количество игроков
            </th>
            <th>
                Сумма выйгрыша
            </th>
            <th>
                Присоединиться
            </th>
        </tr>
        </thead>

        <tbody>


        <? foreach ($current_games as $game): ?>

            <? $ship_warior = $game->warior_ship; ?>

            <tr style="color:#ffffff;">
                <td style="position: relative; width: 105px; height: 100px;">
                    <?= $ship_warior->name_ship; ?>

                    <? if (isset($ship_warior->gfx)): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $ship_warior->gfx; ?>">
                    <? endif; ?>

                    <? if ($ship_warior->gfx_speed != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $ship_warior->gfx_speed; ?>">
                    <? endif; ?>

                    <? if ($ship_warior->gfx_power != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $ship_warior->gfx_power; ?>">
                    <? endif; ?>

                    <? if ($ship_warior->gfx_defend != ''): ?>
                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="<?= $ship_warior->gfx_defend; ?>">
                    <? endif; ?>

                </td>
                <td>

                    <?= $game->summ; ?> <?= $game->getTypeMoney(); ?>
                </td>
                <td>
                    <?= $game->getCountPlayers() ?> / <?= $game->quantity ?>
                </td>
                <td>
                    <?= round($game->summ * $game->quantity * 0.8, 2) ?> <?= $game->getTypeMoney(); ?>
                </td>
                <td>
                    <? if ($ship != null): ?>
                        <? if ($player->id == $game->creator_id): ?>
                            <a class="btn disabled">Мой бой (ожидаем игроков)</a>
                        <? elseif ($game->getDubleJoin($player->id)): ?>
                            <a class="btn disabled">Вы уже вступили</a>
                        <? else: ?>
                            <a href="<?= $this->createUrl('game/joinRoom', array('id' => $game->id)) ?>"
                               id="room<?= $game->id ?>" class="btn btn-danger">Вступить в бой</a>
                        <? endif; ?>
                    <? else: ?>
                        <a href="<?= $this->createUrl('game/joinRoom', array('id' => $game->id)) ?>"
                           id="room<?= $game->id ?>" class="btn btn-danger">Вступить в бой</a>
                    <? endif; ?>
                </td>

            </tr>

        <? endforeach; ?>


        </tbody>
    </table>


    <br>
    <br>

</div>

<? $this->widget("application.widgets.ModalRulesArena"); ?>



