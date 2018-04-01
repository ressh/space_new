<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.10.2015
 * Time: 19:23
 */
?>

<div class="content">

    <div class="kranshteyn_hr_100"></div>


<div class="text_general">
    <h3>Купить корабль</h3>

</div>


    <p class="text_general_100">
        <img src="/images/girl.png" align="left" width="110">
        Вы покупаете корабль один раз и <b>навсегда</b>. После покупки он начинает <b>приносить <img width="15" src="/images/gold.png"></b>. Корабль <b>не
            требует</b> никаких дополнительных вложений. Чем больше вы улучшаете корабль, тем <b>больше <img width="15" src="/images/gold.png"></b> он
        приносит. Улучшая корабль, вы получаете дополнительные бонусы!
        Например: шанс получения 2-х прибыли, уменьшение времени миссий, шанс завершить миссию удачно, увеличение
        процентов прибыли! <br><br>
        Игрок может <b>выводить</b> <img width="15" src="/images/gold.png"> на <b>электронный</b> кошелек или <b>мобильный</b> телефон (мтс, мегафон, билайн, payeer, QIWI, Я.Деньги ).
    </p>


    <? foreach(  Yii::app()->params['ships_settings'] as $ship ):   ?>

        <div class="kranshteyn_hr_100"></div>

        <h3>
            <?= $ship['icon'] ?><span style="color:red; font-weight: bold;"> <?= $ship['name'] ?></span>


        <? if ($player->getSummBuy() >= $ship['summ']) : ?>
            <span style="float:right;">
                <a data-toggle="modal" name="<?= $ship['name'] ?>"
                   id="<?= $ship['id'] ?>" data-target="#myModalTutorial"
                   class="btn btn-success btn-lg btn_buy">Купить</a>
            </span>
        <? else: ?>

            <?
            $summ_need = $ship['summ'] - $player->getSummBuy();
            ?>

            <span style="float:right;">
                <a class="btn btn-lg disabled">Купить</a>
                <a class="btn btn-info"
                   href="<?= $this->createUrl('player/addPay', array('summ_need' => $summ_need)) ?>">Недостаточно
                    денег, пополнить на <?= $summ_need ?></a>
            </span>

        <? endif; ?>

        </h3>

        <div style="float: left; padding: 5px;"><?= $ship['face'] ?></div>
        <table class="table table-bordered" style="float:left;
    width:750px;" >
            <tbody>
            <tr>

                <td> Цена корабля:</td>
                <td><span class="" name="<?= $ship['type'] ?>"
                          id="summ<?= $ship['id'] ?>"><?= $ship['summ'] ?>
                        <img width="35" src="/images/gold.png"></span></td>
            </tr>
            <tr>
                <td> Чистая прибыль:</td>
                <td>
                    <span class="">  от <?= $ship['persent_summ'] ?> <img width="35" src="/images/gold.png"></span> в
                    месяц
                </td>
            </tr>


            </tbody>
        </table>


        <iframe scrolling="no" width="900" height="400" src="/iframes/addship/<?= $ship['type'] ?>.php"
                style="border:none;"></iframe>

        <br><br>


    <? endforeach; ?>


    <div class="kranshteyn_hr_100"></div>

    <div style="" class="modal fade modal_ship_buy" id="myModalTutorial" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center;">

                <button type="button" class="btn_close_modal white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 id="title_modal"></h3>

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'form-ship-buy',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'converter-form'),
                )); ?>

                <div class="convert-item">


                    <div class="form-group">
                        <span class="value-name-convert">Стоимость корабля: <span id="summ_modal"></span></span>
                        <?php echo $form->hiddenField($model, 'type_ship', array('value' => '')); ?>

                    </div>
                    <br><br>

                    <div class="form-group">
                        <?php echo $form->labelEx($model, 'name_ship', array('class' => 'control-label col-sm-2')); ?>
                        <div class="col-sm-10">
                            <?php echo $form->textField($model, 'name_ship'); ?>
                        </div>
                        <small>Как корабль назовешь, так он и поплывет!</small>
                    </div>
                    <br><br>

                    <p class="btn-convert">
                        <button class="btn btn-info" type="submit">Купить</button>
                    </p>


                    <?php $this->endWidget(); ?>

                </div>
            </div>
        </div>


    </div>

    <script>
        $('.btn_buy').click(function (e) {
            e.preventDefault();

            $('#title_modal').text(e.target.name);
            $('#summ_modal').text($('#summ' + e.target.id).text());
            $('#Ship_type_ship').val( $('#summ' + e.target.id).attr('name') );

        });
    </script>

