<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 30.10.2015
 * Time: 13:38
 */

?>

<div class="content">
    <h3>История заявок</h3>

    <div class="kranshteyn_hr_100"></div>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Сумма</td>
            <td>Время</td>

            <td>Тип счета</td>
            <td>Статус</td>
        </tr>
        </thead>
        <tbody>

        <? foreach ( $history as $pay) : ?>

            <tr>
                <td><?= $pay->summ ?></td>
                <td><?= $pay->time ?></td>
                <td><?= $pay->getTextTypeSchet() ?></td>
                <td><?= $pay->getTextStatus() ?></td>
            </tr>

        <? endforeach; ?>
        </tbody>
    </table>


</div>