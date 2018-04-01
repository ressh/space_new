/**
 * Created by Александр on 23.09.2015.
 */
var canvas, stage, exportRoot;
var asteroids = [];

function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"images/asteroids.png", id:"asteroids"},
        {src:"images/back.jpg", id:"back"},
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/myShip3.png", id:"myShip3"},
        {src:"images/myShip4.png", id:"myShip4"},
        {src:"images/ship_ruh.png", id:"ship_ruh"}
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

    addAsteroids()


}


function startWork()
{
    setDialog($('.player'), 'Как надоела эта работа. Надеюсь тут нет пиратов.', 500, 7000);


    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 180}, 2800, createjs.Ease.cubicOut)
        .call(handleComplete);
    function handleComplete() {

        createjs.Tween.get(exportRoot.ship.fire)
            .to({alpha: 0.2}, 500, createjs.Ease.cubicOut)

        var intervalFire;
        var f = 0;

        intervalFire = setInterval( function(){

            if(  f == asteroids.length )
            {
                clearInterval(intervalFire);

                createjs.Tween.get(exportRoot.ship).wait(1200)
                    .to({x: exportRoot.ship.x + 480}, 1500, createjs.Ease.cubicIn)

                return;
            }

            asteroids[f].addTimerLive();

            f++

        }, 1500 );

    }
}


function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function addAsteroids()
{
    for( var f = 0; f<15; f++ ) {

        var asteroid = new Asterid();

        asteroids.push( asteroid );
    }
}

function setDialog(person, text, wait, time) {
    setTimeout(function () {

        person.show("fast", function () {

            var span = person.find('.text_comand');
            span.html(text);

            setTimeout(function () {

                span.html('');
                person.hide('fast');

            }, time);

        });

    }, wait);

}
