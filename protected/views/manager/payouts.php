<?php
/**
 * Created by PhpStorm.
 * User: Паха
 * Date: 27.01.2017
 * Time: 8:38
 */
?>

<div class="content">

    <h3>Заявки:</h3>

    <div class="kranshteyn_hr_100"></div>



<table class="table">
    <thead>
    <th>Игрок</th>
    <th>Сумма</th>
    <th>Тип счета</th>
    <th>Номер счета</th>
    <th>Время</th>
    <th>Подробнее</th>
    <th>Статус</th>
    </thead>

    <? foreach ($paysOut as $pay) : ?>

        <tr>
            <td>
                <?= $pay->id_player ?>
            </td>
            <td>
                <?= $pay->summ ?>
            </td>
            <td>
                <?= $pay->getTextTypeSchet(); ?>
            </td>
            <td>
                <?= $pay->nomer_schet ?>
            </td>
            <td>
                <?= $pay->time ?>
            </td>
            <td>
                <?= CHtml::link( 'Подробно', Yii::app()->createUrl( 'manager/getInfoPlayer', array( 'id'=>$pay->id_player ) ), array('class' => 'btn btn-info')) ?>
            </td>
            <td>
                <?= CHtml::link( 'Выплатил', Yii::app()->createUrl( 'manager/setPayComplete', array( 'id'=>$pay->id )  ), array('class' => 'btn btn-success')) ?>
            </td>
        </tr>

    <? endforeach; ?>

</table>

    </div>

