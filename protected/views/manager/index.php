<?php
/**
 * Created by PhpStorm.
 * User: Паха
 * Date: 26.01.2017
 * Time: 0:22
 */

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();


?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="content">

    <h3>Статистика</h3>

    <div class="kranshteyn_hr_100"></div>


    <div style="position: relative;">
        <div id="donutchart" style="width: 940px; height: 500px;"></div>
    </div>



    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Ожидаемые выплаты <?= $allDolg ?> руб.', <?= $allDolg ?>],
                ['Выплачено <?= $allOuts ?> руб.', <?= $allOuts ?>],

            ]);

            var options = {
                title: 'График выплат',
                pieHole: 0.2,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>


    <div class="kranshteyn_hr_100"></div>

    <h3>Текущие донаты</h3>

    <div id="chart_div"></div>

    <div class="kranshteyn_hr_100"></div>


    <script>

        google.charts.setOnLoadCallback(drawDualY);

        function drawDualY() {
            var data = new google.visualization.DataTable();
            data.addColumn('timeofday', 'Время');
            data.addColumn('number', 'Сумма');

            data.addRows([
                <? foreach ( $pays as $pay ): ?>
                [{v: [8, 0, 0], f: '<?= $pay->time ?>'}, <?= $pay->summ ?>],
                <? endforeach; ?>
            ]);

            var options = {
                chart: {
                    title: 'Последние 10 пополнений в игре',
                },
                series: {
                    0: {axis: 'Сумма руб.'},
                },
                axes: {
                    y: {
                        MotivationLevel: {label: 'Сумма'},
                    }
                },
                hAxis: {
                    title: 'Time of Day',
                    format: 'h:mm a',
                    viewWindow: {
                        min: [7, 30, 0],
                        max: [17, 30, 0]
                    }
                },
                vAxis: {
                    title: 'Rating (scale of 1-10)'
                }
            };

            var material = new google.charts.Bar(document.getElementById('chart_div'));
            material.draw(data, options);
        }
    </script>

</div>

