<html>
<head>

    <title> Дорогой игрок! Твой корабль простаивает и не приносит доход! </title>
</head>
<body style="font-family: 'Conv_bang_whack_pow'" ;>

<h1 style="display: none;"> Дорогой игрок! Твой корабль простаивает и не приносит доход! </h1>


<div style="width:960px; margin-left: auto; margin-right: auto; ">

    <div class="content" style="background: #000000; color:#ffffff;">

        <div style="padding: 10px">
            <img src="http://spacewarsgame.ru/images/GIRL_BIG.png" width="50" hspace="10" align="left"> Уважаемый игрок, Ваш корабль собрал деньги и простаивает, нужно собрать прибыль! В игре появилось множество миссий! Вы можете начать зарабатывать прямо сейчас! <br>
            У нас несколько дней СКИДОК! Сегодня корабль ВОЙНА стоит 1200 <img width="15" src="http://spacewarsgame.ru//images/gold.png"> (скидка 700 <img width="15" src="http://spacewarsgame.ru//images/gold.png">)
            Так же доработана механика игры и множество бонусов! Заходи! <a href="http://spacewarsgame.ru">spacewarsgame.ru</a>
        </div>


        <div class="kranshteyn_hr_100"></div>

        <div style="width:100%; ">

            <h3>Ваш корабль:</h3>

            <table style=" padding: 10px; background: #000000;">
                <tr style="border-bottom: dotted 1px #ffffff;">
                    <td>Класс</td>
                    <td>Хар-ки</td>
                    <td>Корпус</td>
                    <td>Оружие</td>
                    <td>Двигатель</td>
                    <td>Защита</td>
                </tr>
                <tr>
                    <td>
                        <div style="">
                            <?= $name_ship ?><br>
                            <a href="http://spacewarsgame.ru"><img hspace="10" width="40" src="http://spacewarsgame.ru/images/<?= $type_ship ?>.png"></a>
                        </div>
                    </td>
                    <td>
                        <div style="">
                            <i class="fa fa-money"></i> прибыль в день: <?= $money ?> <img width="15" src="http://spacewarsgame.ru//images/gold.png">
                        </div>
                        <div style="">
                            <i class="fa fa-tachometer"></i> топлива осталось: <?= $fuel ?>%
                        </div>
                        <div style="">
                            <i class="fa fa-thumbs-o-up"></i> шанс 2-х прибыль: <?= $chance ?>%
                        </div>
                        <div style="">
                            <i class="fa fa-star-half-o"></i> кол-во битв/побед на Арене: <?= $arena ?>/<?= $wins ?>
                        </div>
                        <div style="">
                            <i class="fa fa-rocket"></i> выполнил миссий: <?= $count ?>
                        </div>
                        <div style="">
                            <i class="fa fa-reddit-alien"></i> убил боссов: <?= $win_boss ?>
                        </div>
                    </td>
                    <td>
                        <a href="http://spacewarsgame.ru"><img src='http://spacewarsgame.ru/<?= $gfx ?>' width='250''></a>
                    </td>
                    <td>
                        <? if( $gfx_power != '0' ): ?>
                        <a href="http://spacewarsgame.ru">
                            <img src='http://spacewarsgame.ru/images/items/<?= $type_ship ?>/guns/avatar/<?= $gfx_power ?>.png' width='75'></a>
                        <? endif; ?>
                    </td>
                    <td>
                        <? if( $gfx_speed != '0' ): ?>
                        <a href="http://spacewarsgame.ru"><img src='http://spacewarsgame.ru/images/items/<?= $type_ship ?>/engines/avatar/<?= $gfx_speed ?>.png' width='75' ></a>
                        <? endif; ?>
                    </td>
                    <td>
                        <? if( $gfx_defend != '0' ): ?>
                        <a href="http://spacewarsgame.ru"><img src='http://spacewarsgame.ru/images/items/<?= $type_ship ?>/defend/avatar/<?= $gfx_defend ?>.png' width='75' ></a>
                        <? endif; ?>
                    </td>

                </tr>




            </table>

        </div>

        <div class="kranshteyn_hr_100"></div>


        <a style="font-size: 26px; font-weight: bold;" href="http://spacewarsgame.ru">spacewarsgame.ru</a>


    </div>

</div>

</body>
</html>