<html>
<head>
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->getBaseUrl(true) . Yii::app()->request->baseUrl; ?>/css/fonts.css"/>
    <title>  Message from www.freshtoys.us </title>
</head>
<body style="font-family: 'Conv_bang_whack_pow'" ;>

<h1 style="display:none;"> Message from www.freshtoys.us </h1>

<div style="width:960px; margin-left: auto; margin-right: auto; ">

    <div style="height:470px; overflow: hidden;">
        <img width="960px" src="<?= Yii::app()->getBaseUrl(true) . '/images/head-mail.png'; ?>">
    </div>

    <div style="width:600px; margin-left: 120px;">

        <div style="color:#29BDEF; font-size: 18px;">
            Name: <?= $name ?><br>
            Birthday: <?= $date ?>
        </div>


        <br><br>
            <?= $message ?>
        <br> <br>


        Message from &nbsp; <a style="color:#29BDEF;" href="http://freshtoys.us">www.freshtoys.us</a>

    </div>

</div>



</body>
</html>