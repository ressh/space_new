<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.10.2015
 * Time: 21:29
 */

$countMissions = Missions::model()->count(
    new CDbCriteria(array
    (
        'condition' => 'id_player = :id_player and ( status = 1 or status = 2 )',
        'params' => array(':id_player' => $player->id)
    )));

if( $ship != null )
    $countFights = $ship->getNewFightsArenaCount();
else
    $countFights = 0;

?>

<br>


    <div class="kranshteyn_hr_100"></div>
    <div class="">


    <? if (isset($ship)) : ?>

        <a href="<?= Yii::app()->createUrl('game/magazine') ?>" class="btn btn-lg btn-info">Магазин <i
                class="fa fa-cart-arrow-down"></i></a>

        <a href="<?= Yii::app()->createUrl('player/DifferenceFuel') ?>" class="btn btn-lg btn-success ">
            Собрать ( + <?= $ship->getMoneyWorkTodey() ?> <img width="15" src="/images/gold.png"> )
        </a>

        <a href="<?= $this->createUrl('mission/GetMyMission') ?>" class="btn btn-lg btn-info" data-toggle="tooltip">Мои
            миссии
            <? if ($countMissions > 0): ?>
                (<?= $countMissions ?>)
            <? endif; ?> <i class="fa fa-check-square"></i>
        </a>

        <a href="<?= $this->createUrl('game/myFightsComplete') ?>" class="btn btn-info">Мои битвы
            <? if( $countFights > 0 ):?>
            (<?= $countFights ?>)
            <? endif; ?> <i class="fa fa-anchor"></i>
        </a>


        <a href="/iframes/space_shooter/index.html" class="btn btn-lg btn-info">Мини-игра <i class="fa fa-gamepad"></i></a>

    <? else: ?>

        <a href="#" class="btn btn-lg btn-info" disabled="disabled">Магазин</a>

        <a href="#" class="btn btn-lg btn-default" disabled="disabled">Собрать</a>

        <a href="#" class="btn btn-lg btn-info" disabled="disabled" data-toggle="tooltip">Мои
            миссии <i class="fa fa-check-square"></i>
        </a>

        <a href="#>" disabled="disabled" class="btn btn-info">Мои битвы <i class="fa fa-anchor"></i>
        </a>


        <a href="#" disabled="disabled" class="btn btn-lg btn-info">Мини-игра <i class="fa fa-gamepad"></i></a>

    <? endif; ?>


    </div>
    <div class="kranshteyn_hr_100"></div>


<div class="window_my_ship">
    <img class="window_img" src="/images/window.png">
    <img class="krepezh_img" src="/images/krepesh.png">

    <div class="kranshteyn"></div>

    <? if ($ship == null): ?>

        <div class="btn_sell_ship">
            <a href="<?= $this->createUrl('player/addship') ?>" class="btn btn-lg btn-success">
                Купить корабль <i class="fa fa-space-shuttle"></i>
            </a>
        </div>

        <? $this->widget("application.widgets.NoShip"); ?>

    <? else: ?>


        <div class="btn_sell_ship">
            <a data-toggle="modal" data-target="#Sellship" class="btn btn-lg btn-default">Продать
                корабль <i class="fa fa-mail-reply"></i></a>
        </div>

        <div class="fuel_indicator">
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar"
                     aria-valuenow="<?= $ship->getFuelPersent(); ?>" aria-valuemin="0"
                     aria-valuemax="100" style="width: <?= $ship->getFuelPersent(); ?>%">
                    <span class="sr-only">Топливо  <?= $ship->getFuelPersent(); ?>%</span>
                </div>
            </div>
        </div>

        <div class="fuel_hours_info">Вместительность бака: <?= $ship->getHoursToFuel(); ?> ч. полета</div>
        <div class="chance_2x_info">Шанс получить двойную прибыль: <?= $ship->getChance2x(); ?>%</div>


        <? $this->widget("application.widgets.shipGfx", array('ship' => $ship)); ?>


    <? endif; ?>

</div>

<div class="content">

<div class="text_my_ship">
    <? if ($player->gold_partner == 1): ?>
        <h3>Мой корабль | <span class="gold_text">ПАРТНЕР</span></h3>
    <? else: ?>
        <h3>Мой корабль </h3>
    <? endif; ?>


    <? if ($ship != null): ?>
        <p>
                Доход: <span class="bold_red"><?= $ship->getMoneyPrognozMonth(); ?> <img width="25"
                                                                                         src="/images/gold.png">/мес. </span>
            | <span
                class="bold_red"><?= $ship->getMoneyPrognozDay(); ?> <img width="25"
                                                                          src="/images/gold.png">/день </span>
        </p>
    <? else: ?>
        <p>
            Чтобы начать зарабатывать, купите корабль!
        </p>
    <? endif; ?>

    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>Покупка</td>
            <td><?= $player->getSummBuy() ?> <img width="25" src="/images/gold.png"></td>
                <td><a href="<?= $this->createUrl('player/addPay') ?>" class="btn btn-success">Пополнить <i
                            class="fa fa-sign-in"></i></a></td>
                <td><a href="<?= $this->createUrl('player/GetHistoryBays') ?>" class="btn btn-info">История <i
                            class="fa fa-signal"></i></a></td>
        </tr>
        <tr>
            <td>Сбережения</td>
            <td> <?= $player->getSummExit() ?> <img width="25" src="/images/gold.png"></td>
                <td><a href="<?= Yii::app()->createUrl('player/OutSumm') ?>" class="btn btn-lg btn-success">Вывод из
                        игры <i class="fa fa-sign-out"></i> </a><br></td>
            <td>

                <a href="<?= Yii::app()->createUrl('player/ChangeOutSummToBuy') ?>" class="btn btn-lg btn-danger">Вывод
                    для покупок +10%</a>
            </td>
        </tr>
        </tbody>
    </table>


        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>Рефералы<br>
                <small>До <b>25%</b> на баланс для покупок и до <b>40%</b> на баланс вывода!</small>
                    <small>Ваша реферальная ссылка</small>
                    <code><?= Yii::app()->getBaseUrl(true) ?>/?ref=<?= $player->id ?></code>
                <small>Используйте <a href="https://goo.gl/">goo.gl</a> для защиты.</small>
                    <br>
               Пригласить реф-ов через:
                <idv>
                    <img class="img_share" width="20" src="/images/btns/s_fb1.png" onclick="clickShareGroupFb()">&nbsp;
                    <img class="img_share" width="20" src="/images/btns/s_vk1.png" onclick="clickShareGroup()">
                </idv>
                </td>
                <td><?= $statistic->referals ?></td>
                <td>
                    <a href="<?= $this->createUrl('player/MyReferals') ?>" class="btn btn-info">Мои реф-лы <i
                            class="fa fa-group"></i></a>
                <br><br>
                    <a href="<?= $this->createUrl('player/OpenReferalsInfo') ?>" class="btn btn-info">Информация <i
                            class="fa fa-exclamation-circle"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

</div>


<? $this->widget("application.widgets.ModalshipSell", array('ship' => $ship)); ?>


<? if (isset($_GET['isBonuce'])): ?>
    <? $this->widget("application.widgets.Modal2xMoneyToday", array('isBonuce' => $_GET['isBonuce'])); ?>
<? endif; ?>

<div style="text-align: left; width: 100%; margin: auto;">
    <div id='chat'></div>
    <?php
    $this->widget('YiiChatWidget',array(
        'chat_id'=>'123',                   // a chat identificator
        'identity'=>1,                      // the user, Yii::app()->user->id ?
        'selector'=>'#chat',                // were it will be inserted
        'minPostLen' => 2,                    // min and
        'maxPostLen' => 300,                   // max string size for post
        'model'=>new ChatHandler(),    // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
        'data'=>'' . $ship->gfx . '|' . $ship->gfx_speed . '|' . $ship->gfx_power . '|' . $ship->gfx_defend . '' ,                 // data passed to the handler
        // success and error handlers, both optionals.
        'onSuccess'=>new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
        'onError'=>new CJavaScriptExpression(
            "function(errorcode, info){  }"),
    ));
    ?>
</div>

    <div id="btn_smile" style="float: left; margin-right: 5px; cursor: pointer;"><img class="smile_icon" width="25"
                                                                                      src="/images/smileicon.png"></div>

<div id="cont_smiles" style="position: relative; display: none;">
<?php $this->widget('application.extensions.smileys.SmileysWidget',array(
        'group' => 'light', // the group of smileys to be shown
    'cssFile'=>'smileys.css', // the file containing the CSS
    'scriptFile'=>'smileys.js',// javascript code for inserting the smileys into textareas
    'containerCssClass'=>'smileys',// the CSS class that wraps all smileys
    'wrapperCssClass'=>'smiley', // the CSS class that wrapps a single smiley
    'textareaId'=>'textarea', // the ID of the textarea where we will put the smileys
    'perRow'=>0,// If this value is greather than 0, after $perRow smileys, a line break will be inserted.
    'forcePublish'=>false,// set to true for one time, after you've added a new smiley group so that the group gets published to assets directory
));?>
</div>

    <div style="clear: both; height: 1px;"></div>
    <br><br>

<script>

    var isVisible = false;

    $('#btn_smile').on( 'click', function() {

            if (isVisible == true) {
            $('#cont_smiles').css( 'display', 'none' );
            $('.smile_icon').attr( 'src', '/images/smileicon.png' );
            isVisible = false;
        }
            else {
            $('#cont_smiles').css( 'display', 'block' );

            $('.smile_icon').attr( 'src', '/images/smileicon_close.png' );
            isVisible = true;
        }

    } )

    var mobileAndTabletcheck = function () {
        var check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }
    var isMobile = mobileAndTabletcheck();

    function clickShareGroupFb() {

        if (isMobile == true) {
            myWin = window.open(encodeURI("http://www.facebook.com/sharer.php?u=" + "http://spacewarsgame.ru/?ref=" + "<?= $player->id ?>"), "displayWindow", "width=520,height=300,left=350,top=170,status=no,toolbar=no,menubar=no");
        }
        else {
            myWin = window.open(encodeURI("http://www.facebook.com/sharer.php?s=100&p[url]=" + "http://spacewarsgame.ru/?ref=" + "<?= $player->id ?>" + "&p[title]=jknfnweknkje"), "displayWindow", "width=520,height=300,left=350,top=170,status=no,toolbar=no,menubar=no");
        }

    }

    function clickShareGroup() {
        window.open(decodeURI("http://vk.com/share.php?url=" + "http://spacewarsgame.ru/?ref=" + "<?= $player->id ?>"), "_blank");
    }

    </script>
</div>