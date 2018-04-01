/**
 * Created by Александр on 30.10.2015.
 */
var canvas, stage, exportRoot;

function init() {
    canvas = document.getElementById("canvas");
    images = images || {};

    var manifest = [
        {src:"images/_12.png", id:"_12"},
        {src:"images/arrow.png", id:"arrow"},
        {src:"images/aw_asteroids_0.png", id:"aw_asteroids_0"}
    ];

    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
    if (evt.item.type == "image") {
        images[evt.item.id] = evt.result;
    }
}

function handleComplete() {
    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.enableMouseOver();
    stage.update();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    addMoney();

    var btnOpen = new lib.OpenArrowBtn();
    btnOpen.x = 215;
    btnOpen.y = 167;
    exportRoot.addChild( btnOpen );

    btnOpen.addEventListener( 'click', function() {
        openInfo();
        btnOpen.visible = false;
    } )

}

var moneys = [];

function addMoney() {


    for (var f = 0; f < 45; f++) {

        var money = new lib.Money();

        var PI2 = Math.PI * 2;
        var angle = f/45 * PI2;

        var x = 215;
        var y = 167;

        vectorY = 130 * Math.cos(angle);
        vectorX = 130 * Math.sin(angle);

        money.x = x + vectorX/10;
        money.y = y + vectorY/10;

        money.vectorX = vectorX;
        money.vectorY = vectorY;


        exportRoot.addChild(money);

        moneys.push( money );
    }
}

function openInfo()
{
    moneys.forEach( function( money ){

        var x = 215;
        var y = 167;

        var angle = Math.atan2( 135 - (x + money.vectorX), 217 - ( y + money.vectorY) );
        angle = angle * (180 / Math.PI);

        if (angle < 0)
            angle = 360 - (-angle);


        createjs.Tween.get(money)
            .to({x: x + money.vectorX, y: y + money.vectorY, rotation:-angle  }, 1300, createjs.Ease.cubicIn).call(
            function () {} );

    } );



}