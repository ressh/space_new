<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 25.10.2015
 * Time: 19:51
 */

?>

<div class="text_general">
    <h3>Мои завершенные битвы</h3>

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
                Сумма ставки
            </th>
            <th>
                Количество игроков
            </th>
            <th>
                Сумма выйгрыша
            </th>
            <th>
                Просмотр
            </th>
        </tr>
        </thead>

        <tbody>


        <? foreach ($rooms as $game): ?>

            <? $winner_ship = $game->winner_ship; ?>


            <tr style="color:#ffffff;">
                <td style="position: relative; width: 105px; height: 100px;">

                    <? if ($winner_ship != null): ?>


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

                    <? else: ?>

                        <? if ($game->winner_id == 0): ?>
                            Ничья
                        <? endif; ?>

                        <img width="120" style="position: absolute; top:14px; left:0px;"
                             src="/images/noShip1.png">

                    <? endif; ?>


                </td>
                <td>
                    <?= $game->summ; ?> <?= $game->getTypeMoney() ?>
                </td>
                <td>
                    <?= $game->getCountPlayers() ?> / <?= $game->quantity ?>
                </td>
                <td>
                    <? if ($game->winner_id == $player->id): ?>
                        <a href="<?= $this->createUrl( 'game/getMoneyWin', array( 'id'=>$game->id ) ) ?>" class="btn btn-success">Забрать приз <?= $game->getMoneyWin(); ?> <img width="35" src="/images/gold.png"></a>
                    <? elseif( $game->winner_id == 0 ): ?>
                        <a href="<?= $this->createUrl( 'game/getMoneyNothin', array( 'id'=>$game->id ) ) ?>" class="btn btn-info">Забрать ставку <?= $game->summ ?> <img width="35" src="/images/gold.png"></a>
                    <? else: ?>
                        <a href="<?= $this->createUrl( 'game/CloseFight', array( 'id'=>$game->id ) ) ?>" class="btn">Закрыть битву</a>
                    <? endif; ?>


                </td>
                <td>
                    <a href="<?= $this->createUrl( 'game/lookFight', array( 'id'=>$game->id ) ) ?>" class="btn btn-danger">Смотреть битву</a>
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



