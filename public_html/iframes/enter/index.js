var canvas, stage, exportRoot;

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
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/fire.png", id:"fire"},
        {src:"images/fire2.png", id:"fire2"},
        {src:"images/fwefwe.jpg", id:"fwefwe"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/hend.png", id:"hend"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/ms_001.png", id:"ms_001"},
        {src:"images/ms_002.png", id:"ms_002"},
        {src:"images/ms_003.png", id:"ms_003"},
        {src:"images/myShip3.png", id:"myShip3"},
        {src:"images/raid_boss01.png", id:"raid_boss01"},
        {src:"images/raid_boss01_02.png", id:"raid_boss01_02"},
        {src:"images/raid_boss01_03.png", id:"raid_boss01_03"},
        {src:"images/raid_boss02.png", id:"raid_boss02"},
        {src:"images/ship_ruh.png", id:"ship_ruh"},
        {src:"images/spaceman.png", id:"spaceman"},
        {src:"images/stantion.png", id:"stantion"},
        {src:"images/stantion2.png", id:"stantion2"},
        {src:"images/stantion3.png", id:"stantion3"}
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

    addshipAnim();

    setDialog($('.friend'), "Приветствую пират!", 0, 5000);
    setDialog($('.player'), "Привет, у меня сегодня плохое предчувствие!", 5000, 5000);
    setDialog($('.friend'), "Да все впорядке, выгружайся свой кантрофакт!", 10000, 3000);
    setDialog($('.player'), "Ок, сейчас разгружаюсь!", 13000, 3000);

    setTimeout( function(){ exportRoot.spaceman.gotoAndStop(1);}, 5000 );

    exportRoot.ship.ship.fire.alpha = 0.2;
    exportRoot.ship.stantion.gotoAndStop(0);
}

function killSpaceman()
{
    for (var i=0; i<dialogs.length; i++) {
        clearTimeout(dialogs[i]);
    }

    setDialog($('.player'), "Б#Я! Петя! Говорил что предчуствие! Надо сваливать!", 0, 5000);

    createjs.Tween.removeTweens( exportRoot.ship.ship );

    createjs.Tween.get(exportRoot.ship.ship.fire)
        .wait(1000)
        .to({alpha: 1}, 1500, createjs.Ease.quadIn).call(
        function() {

            for( var f = 0; f< 40; f++)
            {
                setTimeout( function(){ addBang() }, Math.random() * 7500 );
            }

            setTimeout( function(){ exportRoot.ship.stantion.gotoAndStop(1); }, 2000 );
            setTimeout( function(){ exportRoot.ship.stantion.gotoAndStop(2); }, 5000 );

            createjs.Tween.get(exportRoot.ship.ship)
                .wait(1000)
                .to({x: -118, y:508}, 2500, createjs.Ease.circlIn);
        }
    )

    addBang( true );
}


var dialogs = [];
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

function addBang( isSpaceman )
{

    var data = {
        images: ["images/fire.png"],
        frames: {width: 80, height: 58, count: 10},
        animations: {
            bang: [0, 9, false]
        }
    };

    var spriteSheet = new createjs.SpriteSheet(data);
    var bang = new createjs.Sprite(spriteSheet);




    if( isSpaceman ) {

        exportRoot.addChild(bang);
        bang.x = exportRoot.spaceman.x - 15;
        bang.y = exportRoot.spaceman.y -15;

        var dira = new createjs.Bitmap('images/fire2.png');
        exportRoot.addChild(dira);
        dira.alpha = 0;
        dira.x = bang.x;
        dira.y = bang.y;

        exportRoot.removeChild( exportRoot.spaceman );


        createjs.Tween.get(dira)
            .to({alpha: 1}, 600, createjs.Ease.linear)


    }
    else
    {
        exportRoot.addChild(bang);
        bang.x = 175 + Math.random() * 200;
        bang.y = 25 + Math.random() * 200;

        var dira = new createjs.Bitmap('images/fire3.png');
        exportRoot.back.addChild(dira);
        dira.alpha = 0;
        dira.x = bang.x;
        dira.y = bang.y;

        createjs.Tween.get(dira)
            .to({alpha: 0.6}, 600, createjs.Ease.linear)

    }

    createjs.Tween.get(bang)
        .to({alpha: 0}, 600, createjs.Ease.linear)
        .call(handleComplete);



    function handleComplete() {
        exportRoot.removeChild(bang);

    }

    bang.gotoAndPlay("bang");
}


function addshipAnim() {

    createjs.Tween.get(exportRoot.ship.ship)
        .to({y: exportRoot.ship.ship.y + 10}, 1500, createjs.Ease.quadInOut)
        .call(handleComplete);

    function handleComplete() {
        createjs.Tween.get(exportRoot.ship.ship)
            .to({y: exportRoot.ship.ship.y - 10}, 1500, createjs.Ease.quadInOut)
            .call(addshipAnim);
    }
}