var canvas, stage, exportRoot;

function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"images/_213.png", id:"_213"},
        {src:"images/asterOskol.png", id:"asterOskol"},
        {src:"images/back.jpg", id:"back"},
        {src:"images/bang2.png", id:"bang2"},
        {src:"images/Bitmap16.jpg", id:"Bitmap16"},
        {src:"images/Bitmap17.jpg", id:"Bitmap17"},
        {src:"images/Bitmap18.jpg", id:"Bitmap18"},
        {src:"images/bonus3.png", id:"bonus3"},
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/dawdaw.png", id:"dawdaw"},
        {src:"images/ee21.png", id:"ee21"},
        {src:"images/efwe.png", id:"efwe"},
        {src:"images/fafas.png", id:"fafas"},
        {src:"images/fefwwef.png", id:"fefwwef"},
        {src:"images/fewf.png", id:"fewf"},
        {src:"images/fewfew.png", id:"fewfew"},
        {src:"images/fewfwe.png", id:"fewfwe"},
        {src:"images/ffewfe.png", id:"ffewfe"},
        {src:"images/figh3.png", id:"figh3"},
        {src:"images/fwefwe.png", id:"fwefwe"},
        {src:"images/gergre.png", id:"gergre"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/item_back001.png", id:"item_back001"},
        {src:"images/item_back004.png", id:"item_back004"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/myShip.png", id:"myShip"},
        {src:"images/myShip2.png", id:"myShip2"},
        {src:"images/myShip3.png", id:"myShip3"},
        {src:"images/myShip4.png", id:"myShip4"},
        {src:"images/raid_boss01.png", id:"raid_boss01"},
        {src:"images/raid_boss01_02.png", id:"raid_boss01_02"},
        {src:"images/raid_boss01_03.png", id:"raid_boss01_03"},
        {src:"images/raid_boss02.png", id:"raid_boss02"},
        {src:"images/sa.png", id:"sa"},
        {src:"images/ship_ruh.png", id:"ship_ruh"},
        {src:"images/sturm3.png", id:"sturm3"},
        {src:"images/theship2.png", id:"theship2"},
        {src:"images/theship22.png", id:"theship22"},
        {src:"images/theship2wefwe.png", id:"theship2wefwe"},
        {src:"images/theshipw22.png", id:"theshipw22"},
        {src:"images/theweffship2.png", id:"theweffship2"},
        {src:"images/werfwe.png", id:"werfwe"}
    ];

    manifestCount = manifest.length;


    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
    if (evt.item.type == "image") { images[evt.item.id] = evt.result; progress(); }
}


var loadCount = 0;
var manifestCount;

function progress() {

    loadCount++;

    var percent = Math.floor((loadCount/manifestCount) * 100);
    var progressBarWidth = ( percent *  $('#progressBar').width() / 100 ) - 20;

    if( percent < 100  )
    {
        $('#progressBar').find('div').css( 'width', progressBarWidth );
    }
    else
    {
        $('#progressBar').css('display', 'none');
        $('#progressBar').find('#backLoader').css('display', 'none');
    }
}

function handleComplete() {
    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    addPiratFly();
    infinitySpaceMove();

    exportRoot.ship.type.gotoAndStop(1);
    exportRoot.ship.gun.gotoAndStop(0);
    exportRoot.ship.defend.gotoAndStop(0);
    exportRoot.ship.engine.gotoAndStop(0);
    exportRoot.ship.fire.alpha =0.3;

    setInterval( function(){

        exportRoot.ship.engine.gotoAndStop( Math.floor( exportRoot.ship.engine.timeline.duration * Math.random() )  );
        exportRoot.ship.gun.gotoAndStop( Math.floor( exportRoot.ship.gun.timeline.duration * Math.random() )  );
        exportRoot.ship.defend.gotoAndStop( Math.floor( exportRoot.ship.defend.timeline.duration * Math.random() )  );

    }, 3000 );
}

function infinitySpaceMove() {
    exportRoot.space.x = 1550;

    createjs.Tween.get(exportRoot.space)
        .to({x: exportRoot.space.x - 2150}, 2000, createjs.Ease.linear)
        .call(handleComplete);

    function handleComplete() {
        infinitySpaceMove()
    }


}

function addPiratFly() {
    createjs.Tween.get(exportRoot.ship)
        .to({y: exportRoot.ship.y + 10}, 1500, createjs.Ease.quadInOut)
        .call(handleComplete);

    function handleComplete() {
        createjs.Tween.get(exportRoot.ship)
            .to({y: exportRoot.ship.y - 10}, 1500, createjs.Ease.quadInOut)
            .call(addPiratFly);
    }
}



function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
