<script src="http://code.createjs.com/easeljs-0.8.0.min.js"></script>
<script src="http://code.createjs.com/tweenjs-0.6.0.min.js"></script>
<script src="http://code.createjs.com/movieclip-0.8.0.min.js"></script>
<script src="http://code.createjs.com/preloadjs-0.3.0.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="Client.js"></script>
<script src="index.js"></script>

<script>


    var gfx = '<?= $_GET['gfx'] ?>';
    var gfx_gun = '<?= $_GET['gfx_power']; ?>';
    var gfx_engine = '<?= $_GET['gfx_speed']; ?>';
    var gfx_defend = '<?= $_GET['gfx_defend']; ?>';

    var fuel = '100';

</script>

<div style="position: absolute; top:20px; left:17px; width: 560px; height: 335px;">
    <canvas id="canvas" width="530" height="285" style=""></canvas>
</div>

