var canvas, stage, exportRoot, manifestCount;


function init() {
    canvas = document.getElementById("canvas");
    images = images || {};

    var manifest = [
        {src: "images/back.jpg", id: "back"},
        {src: "images/bang.png", id: "bang"},
        {src: "images/Bitmap1.jpg", id: "Bitmap1"},
        {src: "images/body.png", id: "body"},
        {src: "images/bullet.png", id: "bullet"},
        {src: "images/bullet2.png", id: "bullet2"},
        {src: "images/china.png", id: "china"},
        {src: "images/edw.png", id: "edw"},
        {src: "images/gun.png", id: "gun"},
        {src: "images/gun3.png", id: "gun3"},
        {src: "images/ino.png", id: "ino"},
        {src: "images/movement2.png", id: "movement2"},
        {src: "images/myShip2.png", id: "myShip2"},
        {src: "images/right_btn.jpg", id: "right_btn"},
        {src: "images/shipkadavr.png", id: "shipkadavr"},
        {src: "images/shipkadavr1.png", id: "shipkadavr1"},
        {src: "images/shipkadavr2.png", id: "shipkadavr2"},
        {src: "images/weffwef.png", id: "weffwef"}
    ];

    manifestCount = manifest.length;

    var loader = new createjs.LoadQueue(false);
    loader.addEventListener("fileload", handleFileLoad);
    loader.addEventListener("complete", handleComplete);
    loader.loadManifest(manifest);
}

var loadCount = 0;

function handleFileLoad(evt) {
    if (evt.item.type == "image") {
        images[evt.item.id] = evt.result;

        progress();
    }
}

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


var enemyPosition;

function handleComplete() {
    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    exportRoot.enemy.gotoAndStop(0);

    enemyPosition = exportRoot.enemy.y;

    addStandingEnemy();

}

function addStandingEnemy() {
    createjs.Tween.get(exportRoot.enemy)
        .to({y: exportRoot.enemy.y + 10}, 1500, createjs.Ease.quadInOut)
        .call(handleComplete);

    function handleComplete() {
        createjs.Tween.get(exportRoot.enemy)
            .to({y: exportRoot.enemy.y - 10}, 1500, createjs.Ease.quadInOut)
            .call(addStandingEnemy);
    }
}

function addDialog() {
    setDialog($('.player'), 'Вот и встретились, тебе не скрыться!', 1, 7000);
    setDialog($('.nlo'), 'Меня тошнит от вашего языка!', 7000, 4000);
    setDialog($('.player'), 'Можешь не слушать...Уничтожить!', 11000, 4000);
    setDialog($('.nlo'), 'Твааааарь человеческая!', 15000, 3000);

    addMoney('+760', 20000);

    createjs.Tween.get(exportRoot.sheep)
        .to({x: exportRoot.sheep.x + 180}, 1500, createjs.Ease.cubicOut)
        .call(handleComplete);
    function handleComplete() {


    createjs.Tween.get(exportRoot.sheep.fire)
        .to({alpha: 0.2}, 500, createjs.Ease.cubicOut)


        setTimeout(function () {
            addBattle();
        }, 13000);

    }

}

function addBattle() {

    var fires = 0;
    var framesEnemy = 0;
    var intervalFire;

        intervalFire = setInterval(function () {

            if (fires > 2) {
                framesEnemy++;

                if (framesEnemy >= 3) {
                    clearInterval(intervalFire);
                    addEnemyBang();
                    return;
                }

                exportRoot.enemy.gotoAndStop(framesEnemy);
                fires = 0;
            }

            fires++;
            addFireShip();

        }, 500);

    function addEnemyBang() {
        exportRoot.enemy.visible = false;
        exportRoot.enemy2.visible = true;
        exportRoot.enemy2.y = exportRoot.enemy.y;

        destroyEnemy();
    }


}

function destroyEnemy() {

    exportRoot.enemy2.children.forEach(
        function (item) {
            var PI2 = Math.PI * 2;
            var angle = Math.random() * PI2;


            var vectorY;
            var vectorX;

            vectorY = 170 * Math.cos(angle);
            vectorX = 170 * Math.sin(angle);


            createjs.Tween.get(item).to({
                y: item.y + vectorY,
                x: item.x + vectorX,
                rotation: Math.random() * 90
            }, 12500, createjs.Ease.quartOut);

            addBang(item, false);

        });

    setDialog($('.player'), 'Еще один уничтожен!', 5000, 6000);

    setTimeout(function () {
        createjs.Tween.get(exportRoot.sheep)
            .to({x: exportRoot.sheep.x + 780}, 4500, createjs.Ease.cubicIn)

        exportRoot.sheep.fire.alpha = 1;


    }, 12000);


}


function addFireShip() {
    var rnd = randomIntFromInterval(0, 1);
    var bullet = new lib.Bullet();

    switch (rnd) {
        case 0:
            bullet.x = 124;
            bullet.y = 120;
            break;

        case 1:
            bullet.x = 124;
            bullet.y = 165;
            break;
    }

    exportRoot.addChild(bullet);

    createjs.Tween.get(bullet)
        .to({x: 343}, 400, createjs.Ease.linear)
        .call(handleComplete);

    function handleComplete() {
        addBang(bullet, true);
    }
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
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

    animation.x -= 20;
    animation.y -= 17;
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

function addMoney(summ, wait) {
    setTimeout(function () {

        $('.money_set').html(summ + ' <img width="13" src="/images/gold.png">');
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
