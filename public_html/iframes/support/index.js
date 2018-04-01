var canvas, stage, exportRoot;
var dialogs = [];

function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"images/asterOskol.png", id:"asterOskol"},
        {src:"images/back.jpg", id:"back"},
        {src:"images/bang2.png", id:"bang2"},
        {src:"images/Bitmap16.jpg", id:"Bitmap16"},
        {src:"images/Bitmap17.jpg", id:"Bitmap17"},
        {src:"images/Bitmap18.jpg", id:"Bitmap18"},
        {src:"images/bonus3.png", id:"bonus3"},
        {src:"images/bonus5.png", id:"bonus5"},
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/callcentericons.png", id:"callcentericons"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/myShip.png", id:"myShip"},
        {src:"images/myShip2.png", id:"myShip2"},
        {src:"images/myShip3.png", id:"myShip3"},
        {src:"images/raid_boss01.png", id:"raid_boss01"},
        {src:"images/raid_boss01_02.png", id:"raid_boss01_02"},
        {src:"images/raid_boss01_03.png", id:"raid_boss01_03"},
        {src:"images/raid_boss02.png", id:"raid_boss02"},
        {src:"images/ship_ruh.png", id:"ship_ruh"},
        {src:"images/stantion.png", id:"stantion"}
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

    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 250 }, 2000, createjs.Ease.cubicOut).call( function(){

            createjs.Tween.get(exportRoot.ship.fire )
                .to({alpha: 0.1 }, 1000, createjs.Ease.cubicOut);

        } );


    setDialog( $('.player'), 'Здравствуйте, у меня к вам вопрос!', 2000, 4000 );
    setDialog( $('.support'), 'Здравствуйте сэр! Чем мы можем вам помочь?', 6000, 4000 );

    setDialog( $('.player'), 'Я отобрал генератор у торговца, мне нужно его продать!', 10000, 4000 );
    setDialog( $('.support'), 'Отправляйтесь на черный рынок, созвездие Скорпиона', 14000, 4000 );

    setDialog( $('.player'), 'Так подождите, запишу... Соз-ве-з-ди-е', 18000, 4000 );
    setDialog( $('.support'), 'Там находится лавочка Черного Джо', 22000, 4000 );

    setDialog( $('.player'), 'Понял ребята, вы супер!', 26000, 4000 );
    setDialog( $('.support'), 'Всегда рады помочь!', 30000, 4000 );



    createjs.Tween.get(exportRoot.ship).wait(30000)
        .to({rotation: 22 }, 2000, createjs.Ease.cubicIn).call( function() {

            createjs.Tween.get(exportRoot.ship)
                .to({rotation: 45}, 2000, createjs.Ease.cubicOut).call(function () {

                    createjs.Tween.get(exportRoot.ship.fire)
                        .to({alpha: 1 }, 500, createjs.Ease.cubicIn);

                    createjs.Tween.get(exportRoot.ship)
                        .to({x: 700, y: 700}, 5000, createjs.Ease.cubicIn);

                });
        });

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
