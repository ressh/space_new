<?
if( !Yii::app()->user->isGuest )
    $player = Player::model()->findByAttributes(array('email' => Yii::app()->user->id));
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport">


    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta name="description" content="Онлайн-игра SpaceWarsGame - это игра с возможным выводом средств! Игра для тех кому интересна тема космоса и интересны космические битвы! Присоединяйтесь к нам!">
    <meta name="keywords" content="игра с выводом, онайн игра, играть онлайн в космческую игру, игра про космос онлайн, игра с выводом онлайн играть, играть онлайн с выводом, игра с реальным выводом средств">


    <meta property="og:image" content="http://spacewarsgame.ru/images/screen.png" />
    <meta property="og:title" content="Spacewarsgame - онлайн-игра с выводом средств"/>
    <meta property="og:url" content="http://spacewarsgame.ru/?ref=<?= $player->id ?>" />
    <meta property="og:description" content="Я играю и вывожу деньги! Присоединяйся!" />

    <meta name="title" content="Spacewarsgame - онлайн-игра с выводом средств" />
    <meta name="description" content="Я играю и вывожу деньги! Присоединяйся!" />
    <link rel="image_src" href="http://spacewarsgame.ru/images/screen.png" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts/stylesheet.css"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css?v=1"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css3.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <script src="/js/notify.min.js"></script>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <img class="logo" src="/images/girl_logo.png">
        <div style="position: absolute; top:5px; left:7px;">
            <a href="http://vk.com/spacewarsgame"><img width="55" src="/images/vk.png"></a>
        </div>
        <div class="slogan">
            SPACEWARSGAME.RU - от скромного добытчика <br>
            до великого пирата! <br>
        </div>

        <?php $this->widget('application.widgets.MenuManager'); ?>

    </div>
    <!-- header -->



    <div id="body">
        <?= $content; ?>
    </div>

    <div id="footer">
        <div class="down_menu">
            <a href="<?= $this->createUrl( 'site/RulesGame') ?>">Правила игры</a>
        </div>
    </div>

</div>


</body>
</html>