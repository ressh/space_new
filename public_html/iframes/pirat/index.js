var canvas, stage, exportRoot;



function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"images/back.jpg", id:"back"},
        {src:"images/bullet2.png", id:"bullet2"},
        {src:"images/gun2.png", id:"gun2"},
        {src:"images/item_art_18.png", id:"item_art_18"},
        {src:"images/movement.png", id:"movement"},
        {src:"images/myShip3.png", id:"myShip3"},
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

    addSellerFly();
    infinitySpaceMove()



}

function addFireShip() {
    var rnd = randomIntFromInterval(0, 1);
    var bullet = new lib.Bullet();

    switch (rnd) {
        case 0:
            bullet.x = 84;
            bullet.y = 120;
            break;

        case 1:
            bullet.x = 84;
            bullet.y = 165;
            break;
    }

    exportRoot.addChild(bullet);

    createjs.Tween.get(bullet)
        .to({x: 313}, 5000, createjs.Ease.linear)
        .call(handleComplete);

    function handleComplete() {

        setDialog($('.player'), 'Повторить?!', 4000, 2000);
        setDialog($('.loh'), 'Нееееет', 6000, 2000);
        setDialog($('.player'), 'Сбрасывай генератор!', 8000, 2500);
        setDialog($('.loh'), 'Ок, только отвали!', 10500, 2000);

        setTimeout( function(){

            exportRoot.generator.visible = true;

            createjs.Tween.get(exportRoot.generator)
                .to({y: exportRoot.generator.y + 30, rotation:190 }, 2500, createjs.Ease.cubicIn )
                .call(handleComplete);

            function handleComplete()
            {
                createjs.Tween.get(exportRoot.seller)
                    .to({x: exportRoot.seller.x + 340 }, 6000, createjs.Ease.cubicIn );

                createjs.Tween.get(exportRoot.generator)
                    .to({x: exportRoot.generator.x - 240, y:exportRoot.generator.y - 30 }, 6000, createjs.Ease.cubicIn).call(
                    function() {

                        exportRoot.generator.visible = false;
                        addMoney( "+9317", 500 );

                        setDialog($('.player'), 'Пора домой! К любимой! Ахаха, вот это куш!', 1000, 8000);

                        setTimeout( function(){

                            createjs.Tween.removeTweens( exportRoot.space );

                            exportRoot.space.x = 1500;

                            createjs.Tween.get(exportRoot.space)
                                .to({x: exportRoot.space.x - 2250}, 2000, createjs.Ease.cubicOut )


                            createjs.Tween.get(exportRoot.ship)
                                .to({x: exportRoot.ship.x + 570}, 2000, createjs.Ease.cubicOut )



                        }, 3000 )


                    }
                )

            }

        }, 12000 );

        addBang(bullet, true);
    }
}

function addBang(bullet, isRemoveBullet) {
    var data = {
        images: ["images/bang.png"],
        frames: {width: 40, height: 37, count: 6},
        animations: {
            bang: [0, 5, false]
        }
    };


    var spriteSheet = new createjs.SpriteSheet(data);


    var animation = new createjs.Sprite(spriteSheet);

    animation.x -= 40;
    animation.y -= 37;

    animation.scaleX = animation.scaleY = 2;

    bullet.addChild(animation);



    createjs.Tween.get(animation)
        .to({alpha: 0}, 200, createjs.Ease.linear)
        .call(handleComplete);

    function handleComplete() {

        bullet.removeChild(animation);

        if (isRemoveBullet)
            exportRoot.removeChild(bullet);

    }

    animation.gotoAndPlay("bang");

}


function startReket()
{
    setDialog($('.player'), 'Генератор новый купил?', 2000, 3000);
    setDialog($('.loh'), 'Отвалите от меня! Что вам нужно?', 5000, 3000);
    setDialog($('.player'), 'Есть закурить?', 8000, 3000);
    setDialog($('.loh'), 'Это не смешно!', 11000, 2000);
    setDialog($('.player'), 'Кажется запустил в тебя SR-09', 13000, 3000);
    setDialog($('.loh'), 'Аааааааа! Помогите!', 16000, 3000);

    setTimeout( function(){
        addFireShip();
    }, 12000 )

    createjs.Tween.get(exportRoot.ship)
        .to({x: exportRoot.ship.x + 170}, 10000, createjs.Ease.linear )
        .call(handleComplete);

    function handleComplete()
    {
        infinitySpaceMove()
    }

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

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function addSellerFly()
{
    createjs.Tween.get(exportRoot.seller)
        .to({y: exportRoot.seller.y + 10}, 1500, createjs.Ease.quadInOut)
        .call(handleComplete);

    function handleComplete() {
        createjs.Tween.get(exportRoot.seller)
            .to({y: exportRoot.seller.y - 10}, 1500, createjs.Ease.quadInOut)
            .call(addSellerFly);
    }
}

function addMoney(summ, wait) {
    setTimeout(function () {

        $('.money_set').html(summ + '<img width="13" src="/images/gold.png">');
        $('.money_set').show("fast", function () {
            setTimeout(function () {
                $('.money_set').hide("fast");
            }, 1300);
        })
    }, wait);
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