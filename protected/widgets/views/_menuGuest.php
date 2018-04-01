<?
$count = ArenaRoom::model()->countByAttributes(array(
    'is_complete'=> '0'
));

$countMissions = Missions::model()->countByAttributes( array(
    'status'=>"0"
) );
?>

<div class="menu">

    <div class="top_menu">
            <?= CHtml::link( 'Арена <i class="fa fa-anchor"></i>', Yii::app()->createUrl( 'game/Arena' ), array('class' => 'btn btn-danger')) ?>
            <?= CHtml::link( 'Миссии <i class="fa fa-check-square-o"></i>', Yii::app()->createUrl( 'mission/Missions' ), array('class' => 'btn btn-danger')) ?>
            <?= CHtml::link( 'Битва Боссов <i class="fa fa-fighter-jet"></i>', Yii::app()->createUrl( 'bossFights/index' ), array('class' => 'btn btn-danger')) ?>
    </div>

    <ul class="navigation">
        <li>
            <?= CHtml::link( 'Главная <i class="fa fa-institution"></i>', Yii::app()->createUrl( 'site/index' ), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link( 'Топ игроков <i class="fa fa-star"></i>', Yii::app()->createUrl( 'game/galactic' ), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link( 'Об игре <i class="fa fa-exclamation-circle"></i>', Yii::app()->createUrl( 'game/news' ), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link( 'Техподдержка <i class="fa fa-phone-square"></i>', Yii::app()->createUrl( 'game/support' ), array('class' => 'btn btn-info')) ?>
        </li>
        <li style="margin-left:50px;">
            <?= CHtml::link( 'Вход <i class="fa fa-level-up"></i>', Yii::app()->createUrl( 'player/login2' ), array('class' => 'btn btn-info')) ?>
        </li>
        <li>
            <?= CHtml::link( 'Регистрация <i class="fa fa-user-plus"></i>', Yii::app()->createUrl( 'player/create2' ), array('class' => 'btn btn-info')) ?>
        </li>
    </ul>

</div>