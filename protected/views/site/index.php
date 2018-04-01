<?php

$this->pageTitle = Yii::app()->name;

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl . "/js/jquery.shutter/jquery.shutter.js");
$cs->registerCssFile($baseUrl . "/js/jquery.shutter/jquery.shutter.css");


$cs->registerCssFile($baseUrl . "/css/presentationCycle.css");
$cs->registerScriptFile($baseUrl . "/js/jquery.cycle.all.min.js");
$cs->registerScriptFile($baseUrl . "/js/presentationCycle.js");

?>


<div class="contant">


    <div class="window_general">
        <img class="window_img" src="/images/window.png">
        <img class="krepezh_img" src="/images/krepesh.png">

        <div class="kranshteyn"></div>

        <div class="girl_image">

            <div id="presentation_container" class="pc_container">
                <div class="pc_item">
                    <div class="desc">
                        <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Купи корабль</h3>
                        <div style="margin-top: -12px; margin-left: 60px;">Собирай каждый день <img width="15" src="/images/gold.png">
                        </div>
                    </div>
                    <img src="/images/slider/slide1.jpg" alt="slide1"/>
                </div>
                <div class="pc_item">
                    <div class="desc" style="left: 0px;">
                        <h3>Выводи прибыль или прокачивай!</h3>
                        Собирай прибыль и выводи на любые электронные кошельки! Но для начала нужно купить космический корабль!
                    </div>
                    <img src="/images/slider/slide2.jpg" alt="slide2"/>
                </div>
                <div class="pc_item">
                    <div class="desc" style="left: 0px;">
                        <h3>Будь лучшим</h3>
                        <div style="margin-top: -10px;">
                            В игре есть множество различных уровней и персонажей. Каждый персонаж имеет уникальные
                            характеристики корабля, свой набор уникальных улучшений!
                        </div>
                    </div>
                    <img src="/images/slider/slide3.jpg" alt="slide3"/>
                </div>
                <div class="pc_item">
                    <div class="desc">
                        <br>
                        <h3>Побеждай</h3>
                        Прилетай на арену, учавствуй в битвах с боссами вместе с другими игроками, получай призы &nbsp; <img width="25" src="/images/gold.png">
                    </div>
                    <img src="/images/slider/slide4.jpg" alt="slide4"/>
                </div>
                <div class="pc_item">
                    <div class="desc">
                        <h3>Выполняй миссии</h3>
                        Миссии генерируются каждый раз, когда к нам приходит новый игрок. Чем круче кораблик, тем больше
                        миссий он может выполнять. Например пират (самый крутой корабль в игре) может выполнять миссии
                        всех типов кораблей.
                    </div>
                    <img src="/images/slider/slide5.jpg" alt="slide5"/>
                </div>
                <div class="pc_item">
                    <div class="desc">
                        <h3>6. Общайся</h3>
                        Приглашай игроков. За каждого нового игрока и его донаты ты будешь получать &nbsp; <img
                            width="25" src="/images/gold.png"> &nbsp<br>
                        <i style="font-size: 10px;"><img width="15" src="/images/gold.png"> можно выводить на электронные кошельки! </i>

                    </div>
                    <img src="/images/slider/slide000.jpg" alt="slide5"/>
                </div>
            </div>

            <script type="text/javascript">
                presentationCycle.init();
            </script>

        </div>

    </div>

    <div class="text_general">
        <p style="margin-top:20px;">
        <h3>Присоединяйся и выигрывай!</h3>

        <br><br>

        <img src="/images/monument.png" align="left" width="100" hspace="10"><b>SpaceWarsGame</b> - это онлайн-игра, про
        космос!
        Смысл игры - купить корабль и собирать прибыль каждый день! <b><span style="color:#ff2626;">Прибыль можно выводить на любые электронные
            кошельки!</b></span>

        </p>
    </div>

    <p style="color:#ffffff;">
        Зарегистрируйся, заходи в свой кабинет, пообщайся с игроками и купи корабль! Ты увидишь настоящий, враждебный или дружный мир
        космоса!
    </p>
    <br>
    <div class="kranshteyn_hr_100"></div>
    <br>
    <div class="seller_div">
        <div class="red"
             style="font-size: 21px; font-weight: bold; position: absolute; z-index: 1000; left:10px; bottom:10px;"><img
                src="/images/worker.png" width="55"> Добытчик
        </div>
        <a onclick="startWork()" id="btn_worker" class="btn_demo"></a>
        <iframe id="worker" scrolling="no" width="428" height="280" src="/iframes/worker/index.php"
                style="border:none;"></iframe>
    </div>
    <div class="right_block_seller text_general_100" style="float: right; width:440px;">
        Добытчик - это самый простой персонаж в игре, он может выполнять миссии по добыче ископаемых, участвовать на
        арене, улучшать оружие и двигатель.
        <br>
        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <td>Стоимость</td>
                <td><span class="bold_red">90 <img width="15" src="/images/gold.png"></span></td>
            </tr>
            <tr>
                <td>Зарабатывает</td>
                <td><span class="bold_red"> от 22 руб./мес. </span></td>
            </tr>
        </table>
    </div>
    <div style="clear: both; height: 10px;"></div>
    <div class="kranshteyn_hr_100"></div>
    <div class="seller_div">
        <div class="red"
             style="font-size: 21px; font-weight: bold; position: absolute; z-index: 1000; left:10px; bottom:10px;"><img
                src="/images/killer.png" width="55"> Воин
        </div>
        <a onclick="startBattle()" id="btn_fighter" class="btn_demo"></a>
        <iframe id="fighter" scrolling="no" width="428" height="280" src="/iframes/voin/index.php"
                style="border:none;"></iframe>
    </div>
    <div class="right_block_seller text_general_100" style="float: right; width:440px;">
        Воин - более продвинутый персонаж, которому доступна масса улучшений! Воину доступны все виды двигателей,
        оружия, защиты.
        <br>
        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <td>Стоимость</td>
                <td><span class="bold_red">1290 <img width="15" src="/images/gold.png"> (скидка 700 <img width="15" src="/images/gold.png">)</span></td>
            </tr>
            <tr>
                <td>Зарабатывает</td>
                <td><span class="bold_red">от 536 руб./мес. </span></td>
            </tr>
        </table>


    </div>

    <div style="clear: both; height: 10px;"></div>


    <div class="kranshteyn_hr_100"></div>


    <div class="seller_div">

        <div class="red"
             style="font-size: 21px; font-weight: bold; position: absolute; z-index: 1000; left:10px; bottom:10px;"><img
                src="/images/seller.png" width="55"> Торговец
        </div>

        <a onclick="startSeller()" id="btn_seller" class="btn_demo"></a>
        <iframe id="seller" scrolling="no" width="428" height="280" src="/iframes/torgovec/index.php"
                style="border:none;"></iframe>
    </div>

    <div class="right_block_seller text_general_100" style="float: right; width:440px;">

        Продвинутый персонаж. Кто ищет стабильный небольшой доход! Хорошо прокачивается! Использует не все типы
        вооружений.

        <br>
        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <td>Стоимость</td>
                <td><span class="bold_red">990 <img width="15" src="/images/gold.png"></span></td>
            </tr>
            <tr>
                <td>Зарабатывает</td>
                <td><span class="bold_red">от 347 руб./мес. </span></td>
            </tr>
        </table>

    </div>

    <div style="clear: both; height: 10px;"></div>

    <div class="kranshteyn_hr_100"></div>

    <div class="seller_div">

        <div class="red"
             style="font-size: 21px; font-weight: bold; position: absolute; z-index: 1000; left:10px; bottom:10px;"><img
                src="/images/pirat.png" width="55"> Пират
        </div>

        <a onclick="startReket()" id="btn_pirat" class="btn_demo"></a>
        <iframe id="pirat" scrolling="no" width="428" height="280" src="/iframes/pirat/index.php"
                style="border:none;"></iframe>
    </div>

    <div class="right_block_seller text_general_100" style="float: right; width:440px;">

        Пираты живут по принципу - все или ничего! Добро пожаловать в стаю самых отъявленных пиратов! Пиратам доступны
        все улучшения!

        <br>

        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <td>Стоимость</td>
                <td><span class="bold_red">4990 <img width="15" src="/images/gold.png"></span></td>
            </tr>
            <tr>
                <td>Зарабатывает</td>
                <td><span class="bold_red">от 2216 руб./мес. </span></td>
            </tr>
        </table>

    </div>

    <div style="clear: both; height: 10px;"></div>


    <div class="kranshteyn_hr_100"></div>


    <br>
    <br>


</div>

<script>

    var isRegSell = false;
    var isRegKill = false;
    var isRegPir = false;
    var isRegWor = false;

    function startSeller() {

        if (isRegSell == true) {
            window.location.replace("<?= $this->createUrl( 'player/create2' ); ?>");
        }
        else {
            isRegSell = true;
            document.getElementById("seller").contentWindow.startPlay();
           $('#btn_seller').css("background", 'url("../images/btns/reg.jpg")');
        }
    }

    function startBattle() {

        if (isRegKill == true) {
           window.location.replace("<?= $this->createUrl( 'player/create2' ); ?>");
        }
        else {
            isRegKill = true;
            document.getElementById("fighter").contentWindow.addDialog();
            $('#btn_fighter').css("background", 'url("../images/btns/reg.jpg")');
        }
    }

    function startReket() {

        if (isRegPir == true) {
            window.location.replace("<?= $this->createUrl( 'player/create2' ); ?>");
        }
        else {
            isRegPir = true;
            document.getElementById("pirat").contentWindow.startReket();
            $('#btn_pirat').css("background", 'url("../images/btns/reg.jpg")');
        }
    }

    function startWork() {
        if (isRegWor == true) {
            window.location.replace("<?= $this->createUrl( 'player/create2' ); ?>");
        }
        else {
            isRegWor = true;
            document.getElementById("worker").contentWindow.startWork();
            $('#btn_worker').css("background", 'url("../images/btns/reg.jpg")');
        }
    }
</script>
<img style="display: none;" src="/images/btns/get_minerals_a.jpg">
<img style="display: none;" src="/images/btns/kill_a.jpg">
<img style="display: none;" src="/images/btns/sell_a.jpg">
<img style="display: none;" src="/images/btns/get_a.jpg">