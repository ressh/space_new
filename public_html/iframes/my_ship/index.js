/**
 * Created by Александр on 05.04.2016.
 */
$(document).ready(function () {
    init();
});


var canvas, stage, exportRoot;

function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"/iframes/my_ship/images/back.jpg", id:"back"},
        {src:"/iframes/my_ship/images/back_1.jpg", id:"back_1"},
        {src:"/iframes/my_ship/images/fwefwe.jpg", id:"fwefwe"},
    ];

    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
    if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleComplete() {
    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();
    stage.enableMouseOver();


    ship = new lib.ShepFly();

    var stand_gfx = new createjs.Bitmap(gfx);
    var stand_gfx_gun = new createjs.Bitmap(gfx_gun);
    var stand_gfx_engine = new createjs.Bitmap(gfx_engine);
    var stand_gfx_defend = new createjs.Bitmap(gfx_defend);

    stand_gfx.scaleX = stand_gfx.scaleY = 0.7;
    stand_gfx_gun.scaleX = stand_gfx_gun.scaleY = 0.7;
    stand_gfx_engine.scaleX = stand_gfx_engine.scaleY = 0.7;
    stand_gfx_defend.scaleX = stand_gfx_defend.scaleY = 0.7;

    ship.layer.addChild(stand_gfx);
    ship.layer.addChild(stand_gfx_gun);
    ship.layer.addChild(stand_gfx_engine);
    ship.layer.addChild(stand_gfx_defend);

    ship.defend.visible = false;

    exportRoot.addChild(ship);

    ship.x = 180;
    ship.y = 100;
    ship.rotation = 0;


    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    if( parseInt( fuel ) > 0 )
        infinitySpaceMove();
    else
        ship.engine_work.visible = false;
}

function infinitySpaceMove()
{
    exportRoot.space.x = 1500;

    createjs.Tween.get(exportRoot.space)
        .to({x: exportRoot.space.x - 2650}, 2000, createjs.Ease.linear )
        .call(handleComplete);

    function handleComplete()
    {
        infinitySpaceMove()
    }


}