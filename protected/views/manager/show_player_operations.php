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


<div class="container">

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