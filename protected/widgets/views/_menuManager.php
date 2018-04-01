<?
$count = ArenaRoom::model()->countByAttributes(array(
    'is_complete' => '0'
));

$countMissions = Missions::model()->countByAttributes( array(
    'status'=>"0"
) );

?>

<div class="menu">



    <ul class="navigation">
        <li>
            <?= CHtml::link('Мой корабль <i class="fa fa-institution"></i>', Yii::app()->createUrl('player/Myship'), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link('Общая статистика ', Yii::app()->createUrl('manager'), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link('Заявки ', Yii::app()->createUrl('manager/payouts'), array('class' => 'btn btn-info')) ?>
        </li>
    </ul>

</div>