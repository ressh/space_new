var canvas, stage, exportRoot;
var dialogs = [];

function init() {
    canvas = document.getElementById("canvas");
    images = images || {};


    var manifest = [
        {src:"images/asterOskol.png", id:"asterOskol"},
        {src:"images/back.jpg", id:"back"},
        {src:"images/bang2.png", id:"bang2"},
        {src:"images/Bitmap16.jpg", id:"Bitmap16"},
        {src:"images/Bitmap17.jpg", id:"Bitmap17"},
        {src:"images/Bitmap18.jpg", id:"Bitmap18"},
        {src:"images/bonus3.png", id:"bonus3"},
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/myShip3.png", id:"myShip3"},
        {src:"images/raid_boss01.png", id:"raid_boss01"},
        {src:"images/raid_boss01_02.png", id:"raid_boss01_02"},
        {src:"images/raid_boss01_03.png", id:"raid_boss01_03"},
        {src:"images/raid_boss02.png", id:"raid_boss02"},
        {src:"images/ship_ruh.png", id:"ship_ruh"}
    ];

    manifestCount = manifest.length;

    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(manifest);
}

function handleFileLoad(evt) {
    if (evt.item.type == "image") {
        images[evt.item.id] = evt.result; progress();
    }
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
    infinitySpaceMove()

    setDialog($('.player'), "Приём...Прием!", 1000, 3000);
    setDialog($('.girlfriend'), "Дорогой привет! Я так рада тебя слышать!!!", 4000, 4000);
    setDialog($('.player'), "Привет любимая!", 8000, 3000);
    setDialog($('.girlfriend'), "Дорогой! У меня есть для тебя приятная новость!", 11000, 4000);
    setDialog($('.player'), "Какая?", 15000, 2000);
    setDialog($('.girlfriend'), "Я беременна!", 17000, 3000);
    setDialog($('.player'), "О боже! Любимая! Я так рад! Как мы назовем ребенка?", 20000, 5000);
}

function setInformChild(name) {

    for (var i=0; i<dialogs.length; i++) {
        clearTimeout(dialogs[i]);
    }


    setDialog($('.girlfriend'), "Я думаю - <strong>&nbsp;&nbsp;&nbsp;" + name + "</strong>", 0, 5000);
    setDialog($('.player'), "Отличное имя!", 5000, 3000);

}

function setInformEmail() {

    for (var i=0; i<dialogs.length; i++) {
        clearTimeout(dialogs[i]);
    }


    setDialog($('.player'), "Я заработал немало денег! У меня есть для тебя подарок!", 0, 7000);
}

function setInformPassword() {

    for (var i=0; i<dialogs.length; i++) {
        clearTimeout(dialogs[i]);
    }


    setDialog($('.girlfriend'), "Это замечательно! Ты сильно устал?", 0, 4000);
}

function setInformPasswordRepeat() {

    for (var i=0; i<dialogs.length; i++) {
        clearTimeout(dialogs[i]);
    }

    setDialog($('.player'), "Ахах, нет) <span style='color:#ff0000;'><strong>Вот черт!</strong></span>", 0, 4000);

    createjs.Tween.removeTweens(exportRoot.space);
    createjs.Tween.removeTweens(exportRoot.ship);

    exportRoot.space.x = 0;

    createjs.Tween.get(exportRoot.space)
        .to({x: exportRoot.space.x - 1000}, 4000, createjs.Ease.cubicOut);

    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x - 160, scaleX: 0.5, scaleY: 0.5}, 4000, createjs.Ease.cubicOut);

    createjs.Tween.get(exportRoot.flot)
        .to({x: exportRoot.flot.x - 210 }, 4000, createjs.Ease.cubicOut).call(
        function() {

            setDialog($('.general'), "Вы обвиняетесь в нарушении торгового закона 043/03.", 0, 5000);
            setDialog($('.player'), "Я ничего не делал!", 5000, 3000);
            setDialog($('.general'), "Вы приговорены к СМЕРТИ! Приговор вступает в силу НЕМЕДЛЕННО!", 8000, 3000);
            setDialog($('.player'), "Нееееееет!", 11000, 3000);

            var polygon1;
            var polygon2;
            var polygon3;
            var polygon4;
            var fire;

            setTimeout( function() {

                polygon1 = new createjs.Shape();
                polygon1.graphics.beginStroke("green");
                polygon1.graphics.moveTo( 376, 62).lineTo(exportRoot.ship.x  + 50 , exportRoot.ship.y);
                polygon1.alpha = 0.8;
                exportRoot.addChild( polygon1 );

                polygon2 = new createjs.Shape();
                polygon2.graphics.beginStroke("green");
                polygon2.graphics.moveTo( 376, 115).lineTo(exportRoot.ship.x +  50 , exportRoot.ship.y);
                polygon2.alpha = 0.8;
                exportRoot.addChild( polygon2 );


                polygon3 = new createjs.Shape();
                polygon3.graphics.beginStroke("green");
                polygon3.graphics.moveTo( 376, 301).lineTo(exportRoot.ship.x +  50 , exportRoot.ship.y);
                polygon3.alpha = 0.8;
                exportRoot.addChild( polygon3 );

                polygon4 = new createjs.Shape();
                polygon4.graphics.beginStroke("green");
                polygon4.graphics.moveTo( 376, 355).lineTo(exportRoot.ship.x +  50 , exportRoot.ship.y);
                polygon4.alpha = 0.8;
                exportRoot.addChild( polygon4 );

                fire = new lib.Fire();
                fire.x = exportRoot.ship.x + 50;
                fire.y = exportRoot.ship.y;
                exportRoot.addChild( fire );

            }, 12000 );

            setTimeout( function() {

                exportRoot.ship.visible = false;


                starsFly();
                addBang();
                exportRoot.removeChild( polygon1, polygon2, polygon3, polygon4, fire );

                setTimeout( function() {


                    for (var i=0; i<dialogs.length; i++) {
                        clearTimeout(dialogs[i]);
                    }

                    var screen = new lib.ScreenFinal();
                    exportRoot.addChild( screen );

                    exportRoot.removeChild( exportRoot.ship, exportRoot.flot, exportRoot.space );

                    createjs.Tween.get(screen.radio)
                        .to({x: screen.radio.x - 460, rotation:900 }, 40000, createjs.Ease.quartOut )

                    createjs.Tween.get(screen.generator).wait( 5000 )
                        .to({x: screen.generator.x + 660, rotation:900, scaleX:0.3, scaleY:0.3 }, 20000, createjs.Ease.linear );

                    setDialog($('.girlfriend'), "Любимый! Что случилось? Ты меня слышишь? Прием....Прием! Нееетт!", 5000, 25000);

                }, 2000 );

            }, 14000 );

        }
    );


}


function addBang()
{
    var data = {
        images: ["images/bang2.png"],
        frames: {width: 40, height: 37, count: 6},
        animations: {
            bang: [0, 5, false]
        }
    };

    var spriteSheet = new createjs.SpriteSheet(data);
    var bang = new createjs.Sprite(spriteSheet);

    exportRoot.addChild(bang);
    bang.x = exportRoot.ship.x - 10;
    bang.y = exportRoot.ship.y - 63;
    bang.scaleX = bang.scaleY = 3;

    createjs.Tween.get(bang)
        .to({alpha: 0}, 200, createjs.Ease.linear)
        .call(handleComplete);

    function handleComplete() {
        exportRoot.removeChild(bang);
    }

    bang.gotoAndPlay("bang");
}

function setDialog(person, text, wait, time) {

    dialogs.push(setTimeout(function () {

            person.show("fast", function () {

                var span = person.find('.text_comand');
                span.html(text);

                setTimeout(function () {

                    span.html('');
                    person.hide('fast');

                }, time);

            });

        }, wait)
    );

}

function infinitySpaceMove() {
    exportRoot.space.x = 1500;

    createjs.Tween.get(exportRoot.space)
        .to({x: exportRoot.space.x - 2550}, 2000, createjs.Ease.linear)
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

function starsFly()
{

    for( var f = 0; f<70; f++)
    {
        var PI2 = Math.PI * 2;
        var angle=Math.random()*PI2;


        var x = exportRoot.ship.x + 40;
        var y =  exportRoot.ship.y;


        var star = new lib.Crash();
        star.x = x;
        star.y = y;
        star.gotoAndStop( randomIntFromInterval(0, 2) );

        star.scaleX = scaleY = 0.5 + Math.random() * 1;


        exportRoot.addChild( star );

        var vectorY;
        var vectorX;

        var rndL = randomIntFromInterval( 30, 120 );

        vectorY= rndL*Math.cos(angle);
        vectorX= rndL*Math.sin(angle);


        createjs.Tween.get(star).to({ y:star.y + vectorY, x:star.x + vectorX }, 2500, createjs.Ease.quartOut ).call( function() {});

    }
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
