/**
 * Created by Александр on 24.10.2015.
 */

$(document).ready(function () {


    init();

})

var canvas, stage, exportRoot;

function init() {
    canvas = document.getElementById("canvas");
    images = images || {};

    var manifest = [
        {src: "/iframes/arenaAddRoom/images/asterOskol.png", id: "asterOskol"},
        {src: "/iframes/arenaAddRoom/images/back.jpg", id: "back"},
        {src: "/iframes/arenaAddRoom/images/bang2.png", id: "bang2"},
        {src: "/iframes/arenaAddRoom/images/Bitmap16.jpg", id: "Bitmap16"},
        {src: "/iframes/arenaAddRoom/images/Bitmap17.jpg", id: "Bitmap17"},
        {src: "/iframes/arenaAddRoom/images/Bitmap18.jpg", id: "Bitmap18"},
        {src: "/iframes/arenaAddRoom/images/Bitmap27.jpg", id: "Bitmap27"},
        {src: "/iframes/arenaAddRoom/images/bullet2.png", id: "bullet2"},
        {src: "/iframes/arenaAddRoom/images/callcentericons.png", id: "callcentericons"},
        {src: "/iframes/arenaAddRoom/images/message_icon_blasters.jpg", id: "message_icon_blasters"},
        {src: "/iframes/arenaAddRoom/images/message_icon_flag.jpg", id: "message_icon_flag"},
        {src: "/iframes/arenaAddRoom/images/message_icon_swords.jpg", id: "message_icon_swords"},
        {src: "/iframes/arenaAddRoom/images/window.png", id: "window"}
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
    stage.update();
    stage.enableMouseOver();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    addship();
    addWindow();

    flyship()

}

function addship() {
    exportRoot.ship.defend.visible = false;

    var stand_gfx = new createjs.Bitmap(gfx);
    var stand_gfx_gun = new createjs.Bitmap(gfx_gun);
    var stand_gfx_engine = new createjs.Bitmap(gfx_engine);
    var stand_gfx_defend = new createjs.Bitmap(gfx_defend);

    stand_gfx.scaleX = stand_gfx.scaleY = 0.4;
    stand_gfx_gun.scaleX = stand_gfx_gun.scaleY = 0.4;
    stand_gfx_engine.scaleX = stand_gfx_engine.scaleY = 0.4;
    stand_gfx_defend.scaleX = stand_gfx_defend.scaleY = 0.4;

    exportRoot.ship.layer.addChild(stand_gfx);
    exportRoot.ship.layer.addChild(stand_gfx_gun);
    exportRoot.ship.layer.addChild(stand_gfx_engine);
    exportRoot.ship.layer.addChild(stand_gfx_defend);
}

var windowCustom;
var roundNum = 1;
var strategy = '';

function addWindow() {


    if (roundNum > 10) {
        windowCustom = new lib.WindowStrategy();
        windowCustom.x = 618;
        windowCustom.y = -221 // 187
        exportRoot.addChild(windowCustom);

        var arrStrategy = strategy.split('');

        $('#ArenaJoiners_type_gun').val( strategy );

        var int = 0;

        for ( var y=0; y<2; y++ )
        {
            for( var x=0; x<5; x++ ) {

                var item = new lib.ItemStrategy();
                item.x = 88 * x - 220;
                item.y = 88 * y - 70;

                item.gotoAndStop( parseInt( arrStrategy[int] )-1);

                windowCustom.addChild( item );

                int++;

            }

        }

    }
    else {

        windowCustom = new lib.WindowBtns();
        windowCustom.x = 618;
        windowCustom.y = -221 // 187
        exportRoot.addChild(windowCustom);

        windowCustom.btn1.addEventListener('click', addLaser);
        windowCustom.btn2.addEventListener('click', addAbordaj);
        windowCustom.btn3.addEventListener('click', addDefend);
    }


    createjs.Tween.get(windowCustom)
        .to({y: -40, rotation: -7}, 225, createjs.Ease.cubicIn).call(function () {

            createjs.Tween.get(windowCustom).wait(200)
                .to({rotation: 0}, 112, createjs.Ease.linear).call(
                function () {

                    if (roundNum <= 10) {
                        $('.round_info').show();
                        $('.round_num').text(roundNum);
                    }
                    else {
                        $('.round_add').show();
                    }

                }
            )

            createjs.Tween.get(windowCustom)
                .to({y: 187}, 225, createjs.Ease.cubicOut)

        })
}

function flyship() {
    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 250}, 600, createjs.Ease.cubicOut).call(function () {


        });
}

var fire = null;
var polygon = null;

function addLaser(ev) {


    strategy += '1';

    $('.round_info').hide();
    roundNum++;

    windowCustom.btn1.removeEventListener('click', addLaser);
    windowCustom.btn2.removeEventListener('click', addAbordaj);
    windowCustom.btn3.removeEventListener('click', addDefend);

    polygon = new createjs.Shape();
    polygon.graphics.beginStroke("red");
    polygon.graphics.moveTo(180, 80).lineTo(275, 80);
    polygon.alpha = 0.6;
    exportRoot.ship.back_layer.addChild(polygon);

    fire = new lib.Fire();
    fire.x = 370 + 25 / 2;
    fire.y = 180 + 25 / 2;
    exportRoot.addChild(fire);

    createjs.Tween.get(fire)
        .to({x: fire.x + 1000}, 900, createjs.Ease.cubicIn);

    createjs.Tween.get(windowCustom)
        .to({x: windowCustom.x + 1000, rotation: -7}, 900, createjs.Ease.cubicIn)

    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 1000}, 900, createjs.Ease.cubicIn).call(function () {

            reAddship();

        });


}

function addAbordaj() {

    strategy += '2';
    $('.round_info').hide();
    roundNum++;

    windowCustom.btn1.removeEventListener('click', addLaser);
    windowCustom.btn2.removeEventListener('click', addAbordaj);
    windowCustom.btn3.removeEventListener('click', addDefend);

    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 60 * exportRoot.ship.scaleX}, 300, createjs.Ease.cubicIn).call(
        function () {
            createjs.Tween.get(exportRoot.ship)
                .to({x: exportRoot.ship.x + 25}, 300, createjs.Ease.elasticOut).call(
                function () {


                    createjs.Tween.get(exportRoot.ship)
                        .to({x: exportRoot.ship.x + 1000}, 700, createjs.Ease.quintIn).call(function () {

                            reAddship();

                        });
                    ;


                }
            )


            createjs.Tween.get(windowCustom)
                .to({x: windowCustom.x + 1000, rotation: 380}, 1300, createjs.Ease.cubic);


        }
    )
}


function addDefend() {

    strategy += '3';
    $('.round_info').hide();
    roundNum++;

    windowCustom.btn1.removeEventListener('click', addLaser);
    windowCustom.btn2.removeEventListener('click', addAbordaj);
    windowCustom.btn3.removeEventListener('click', addDefend);

    exportRoot.ship.defend.visible = true;
    exportRoot.ship.defend.alpha = 0.1;

    createjs.Tween.get(exportRoot.ship.defend)
        .to({alpha: 0.5}, 300, createjs.Ease.cubicIn).call(
        function () {

            createjs.Tween.get(exportRoot.ship)
                .to({x: exportRoot.ship.x + 1000}, 700, createjs.Ease.quintIn);

            createjs.Tween.get(windowCustom)
                .to({x: windowCustom.x + 1000}, 700, createjs.Ease.quintIn).call(function () {

                    reAddship();

                });
            ;

        }
    )

    createjs.Tween.get(windowCustom)
        .to({x: windowCustom.x + 10, rotation: 10}, 300, createjs.Ease.cubic);

}

function reAddship() {
    exportRoot.ship.defend.visible = false;
    exportRoot.ship.x = -130;


    exportRoot.removeChild(windowCustom);

    if (fire != null && polygon != null) {
        exportRoot.ship.back_layer.removeChild(polygon);
        exportRoot.removeChild(fire);
    }

    flyship()
    addWindow();

}
