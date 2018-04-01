<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 2:07
 */
?>

<div class="text_general">
    <?  $ship  = $referal->getReferalShip(); ?>
    <? if( $ship != null ): ?>
        <div style="position: relative;">

            <img src='<?= $ship->gfx ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
            <? if( $ship->gfx_speed != '' ): ?>
                <img src='<?= $ship->gfx_speed ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
            <? endif; ?>
            <? if( $ship->gfx_power != '' ): ?>
                <img src='<?= $ship->gfx_power ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
            <? endif; ?>
            <? if( $ship->gfx_defend != '' ): ?>
                <img src='<?= $ship->gfx_defend ?>' width='60' style='position: absolute; top: -7px; left:20px;'>
            <? endif; ?>
        </div>
    <? endif; ?>
    <h3 style="margin-left: 100px; width: 500px;">История финансовых операций - <?= $name ?></h3>
</div>

<div class="kranshteyn_hr_100"></div>

<div class="content">

    <?php
    /**
     * Created by PhpStorm.
     * User: Паха
     * Date: 10.11.2016
     * Time: 18:23
     */
    $this->layout = '';
    Yii::app()->clientScript->scriptMap['jquery.js'] = false;
    ?>

    <link rel="stylesheet" href="/css/theme-table.css">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://mottie.github.io/tablesorter/docs/js/jquery-latest.min.js"></script>

    <script type="text/javascript" src="https://mottie.github.io/tablesorter/docs/js/prettify.js"></script>


    <script type="text/javascript" src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="http://tablesorter.com/addons/pager/jquery.tablesorter.pager.js"></script>
    <script type="text/javascript" src="https://mottie.github.io/tablesorter/js/widgets/widget-storage.js"></script>
    <script type="text/javascript" src="https://mottie.github.io/tablesorter/js/widgets/widget-filter.js"></script>


    <div style="position:relative;">


        <table id="myTable" class="tablesorter table">
            <thead>
            <th>Тип операции</th>
            <th>Тип валюты</th>
            <th>Сумма</th>
            <th>Время</th>
            </thead>
            <? foreach ($operations as $operation): ?>
                <tr>
                    <td><?= $operation->getTextOperation() ?></td>
                    <td><?= $operation->getTextMoney() ?></td>
                    <td><?= $operation->summ . $operation->getIconMoney(); ?></td>
                    <td><?= $operation->date ?></td>

                </tr>
            <? endforeach; ?>
        </table>

    </div>



    <script>
        $(function () {
            var dupe = true;

            $('table').on('filterEnd', function (event, c) {
                $('#show-filter').html('[ "' + c.lastSearch.join('", "') + '" ]');
            });
            $('.search').click(function () {
                var $this = $(this),
                    filter = [],
                    col = $this.attr('data-column');
                if (col === 'all') {
                    col = $('#myTable')[0].config.columns;
                }
                filter[col] = $this.text();
                $.tablesorter.setFilters($('#myTable'), filter);
            });
        });
    </script>

    <script>

        $(document).ready(function () {
            $("#myTable")
                .tablesorter({
                    theme: 'blue', widthFixed: true, duplicateSpan: true, widgets: ['zebra', 'filter'], widgetOptions: {
                        filter_external: 'input.search', filter_reset: '.reset'
                    }
                })
                .tablesorterPager({container: $("#pager"), size: 100});

            $('.sort').click(function () {
                // it is still possible to use 'a', 'd', 'n', 's' or 'o' on the second column
                // see http://mottie.github.io/tablesorter/docs/#sorton
                $('#myTable').trigger('sorton', [[[$(this).text(), 'n']]]);
            });

        });

    </script>

</div>