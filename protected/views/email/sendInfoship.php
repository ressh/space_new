<html>
<head>

    <title> Дорогой игрок! Твой корабль простаивает и не приносит доход! </title>
</head>
<body style="font-family: 'Conv_bang_whack_pow'" ;>

<h1 style="display: none;"> Дорогой игрок! Твой корабль простаивает и не приносит доход! </h1>


<div style="width:960px; margin-left: auto; margin-right: auto; ">

    <div class="content" style="width:1200px; margin: auto; background: #000000; color:#ffffff;">

        <div style="padding: 10px">
            У нас появиось множество миссий! Вы можете начать зарабатывать прямо сейчас! <br>
            К тому же несколько дней СКИДОК! Сегодня корабль торговца стоит 490 <img width="15" src="http://spacewarsgame.ru//images/gold.png"> (скидка 500 <img width="15" src="http://spacewarsgame.ru//images/gold.png">)

        </div>


        <div class="kranshteyn_hr_100"></div>

        <div style="width:100%; height:320px; margin-left: 410px; position: relative; text-align: center;">
            <div style="position: absolute; top:40px; left:-400px; font-size: 36px;"><img hspace="10" width="70" src="http://spacewarsgame.ru/images/<?= $type_ship ?>.png"><?= $name_ship ?></div>

            <div style="position: absolute; top:120px; left:-310px; font-size: 16px;">
                <i class="fa fa-money"></i> прибыль в день: <?= $money ?> <img width="15" src="http://spacewarsgame.ru//images/gold.png">
            </div>
            <div style="position: absolute; top:140px; left:-310px; font-size: 16px;">
                <i class="fa fa-tachometer"></i> топлива осталось: <?= $fuel ?>%
            </div>
            <div style="position: absolute; top:160px; left:-310px; font-size: 16px;">
                <i class="fa fa-thumbs-o-up"></i> шанс 2-х прибыль: <?= $chance ?>%
            </div>
            <div style="position: absolute; top:180px; left:-310px; font-size: 16px;">
                <i class="fa fa-star-half-o"></i> кол-во битв/побед на Арене: <?= $arena ?>/<?= $wins ?>
            </div>
            <div style="position: absolute; top:200px; left:-310px; font-size: 16px;">
                <i class="fa fa-rocket"></i> выполнил миссий: <?= $count ?>
            </div>
            <div style="position: absolute; top:220px; left:-310px; font-size: 16px;">
                <i class="fa fa-reddit-alien"></i> убил боссов: <?= $win_boss ?>
            </div>


            <iframe scrolling="no" width="530" height="285" src="http://spacewarsgame.ru/iframes/my_ship/index.php?gfx=<?= $gfx ?>
            &gfx_power=<?= $gfx_power ?>&gfx_speed=<?=  $gfx_speed ?>&gfx_defend=<?= $gfx_defend ?>" style="border:none; text-align: left; margin-right: 500px;"></iframe>


        </div>

        <div class="kranshteyn_hr_100"></div>
    </div>

</div>



</body>
</html>