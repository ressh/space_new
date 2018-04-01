<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CreateJS export from Client</title>

    <script src="http://code.createjs.com/easeljs-0.8.0.min.js"></script>
    <script src="http://code.createjs.com/tweenjs-0.6.0.min.js"></script>
    <script src="http://code.createjs.com/movieclip-0.8.0.min.js"></script>
    <script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="Client.js"></script>
    <script src="index.js"></script>
    <script src="asteroid.js"></script>
    <link href="../style.css" rel="stylesheet">


</head>

<body onload="init();" style="margin 0; padding: 0; position: relative;">

<div id="progressBar"><div></div><div id="backLoader"></div></div>

<canvas id="canvas" width="428" height="280" style=""></canvas>

<div class="player dialog" >
    <img src="/images/player_dob.png" class="img_person"  width="35"> <span class="text_comand"></span>
</div>

<div class="loh dialog" >
    <img src="/images/loh_demo.png" class="img_person" width="35"> <span class="text_comand"></span>
</div>

<div class="money_set" style="width: 75px;">
    +112 <img width="15" src="/images/gold.png">
</div>

</body>
</html>