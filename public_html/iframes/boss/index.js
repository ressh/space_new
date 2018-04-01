$(document).ready(function () {
    init();

    $('.btn_exit_boss').on('click', function(){
        window.location.href = "/bossFights/index";
    });

    $('.btn_again_boss').on('click', function() {
        location.reload();
    })
})

var canvas, stage, exportRoot;

function init() {
    canvas = document.getElementById("canvas");
    images = images || {};


    var manifest = [
        {src:"/iframes/boss/images/asterOskol.png", id:"asterOskol"},
        {src:"/iframes/boss/images/back.jpg", id:"back"},
        {src:"/iframes/boss/images/bang2.png", id:"bang2"},
        {src:"/iframes/boss/images/Bitmap16.jpg", id:"Bitmap16"},
        {src:"/iframes/boss/images/Bitmap17.jpg", id:"Bitmap17"},
        {src:"/iframes/boss/images/Bitmap18.jpg", id:"Bitmap18"},
        {src:"/iframes/boss/images/Bitmap27.jpg", id:"Bitmap27"},
        {src:"/iframes/boss/images/Bitmfew16.png", id:"Bitmfew16"},
        {src:"/iframes/boss/images/bullet2.png", id:"bullet2"},
        {src:"/iframes/boss/images/callcentericons.png", id:"callcentericons"},
        {src:"/iframes/boss/images/fwefwe.jpg", id:"fwefwe"},
        {src:"/iframes/boss/images/message_icon_blasters.jpg", id:"message_icon_blasters"},
        {src:"/iframes/boss/images/message_icon_flag.jpg", id:"message_icon_flag"},
        {src:"/iframes/boss/images/message_icon_swords.jpg", id:"message_icon_swords"},
        {src:"/iframes/boss/images/window.png", id:"window"}
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

var ship;
var boss;

function handleComplete() {
    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();
    stage.enableMouseOver();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    var back = new createjs.Bitmap('/iframes/lookFight/images/backs/' + Math.floor( 1 + Math.random() * 21 ) + '.jpg' );
    exportRoot.lay.addChild( back );

    var containerStars = new createjs.Container();
    exportRoot.lay.addChild( containerStars );

    intervalStars = setInterval( function(){

        var star = new lib.Star();
        star.x = 0 + Math.random() * 940;
        star.y = 0 + Math.random() * 750;

        star.scaleX = scaleY = 0.5 + Math.random() * 1;
        star.alpha = 0.3;

        containerStars.addChild( star );

        setTimeout( function() {
            containerStars.removeChild( star );
        }, 2300 );

    }, 300 );

    ship = new lib.ShepFly();

    var stand_gfx = new createjs.Bitmap(gfx);
    var stand_gfx_gun = new createjs.Bitmap(gfx_gun);
    var stand_gfx_engine = new createjs.Bitmap(gfx_engine);
    var stand_gfx_defend = new createjs.Bitmap(gfx_defend);

    stand_gfx.scaleX = stand_gfx.scaleY = 0.4;
    stand_gfx_gun.scaleX = stand_gfx_gun.scaleY = 0.4;
    stand_gfx_engine.scaleX = stand_gfx_engine.scaleY = 0.4;
    stand_gfx_defend.scaleX = stand_gfx_defend.scaleY = 0.4;

    ship.layer.addChild(stand_gfx);
    ship.layer.addChild(stand_gfx_gun);
    ship.layer.addChild(stand_gfx_engine);
    ship.layer.addChild(stand_gfx_defend);

    ship.defend.visible = false;

    exportRoot.addChild(ship);

    ship.x = 480;
    ship.y = 600;
    ship.rotation = -90;

    var data = {
        images: ["/images/ships/boss/" + boss_gfx],
        frames: {width: 138, height: 163, count:3},
        animations: {
            helth100: [0],
            helth50: [1],
            helth0: [2]
        }
    };

    var spriteSheet = new createjs.SpriteSheet(data);
    boss = new createjs.Sprite(spriteSheet, "helth100");
    boss.x = 405;
    boss.y = 60;

    exportRoot.lay.addChild(boss);

    $('.btn_kill_boss').on('click', function () {

        $('.btn_kill_boss').hide();
        addFigthBulletShip();

    })
}

var bossDead = false;
var playerDead = false;

var intervalBoss;
var intervalPlayer

function addFigthBulletShip() {
    intervalPlayer = setInterval(function () {

        var bullet = new lib.Bullet();
        exportRoot.addChild(bullet);

        if (Math.random() > 0.5)
            bullet.x = ship.x - 33;
        else
            bullet.x = ship.x + 15;

        bullet.y = ship.y - 50;

        createjs.Tween.get(bullet)
            .to({y: boss.y + 90}, 600, createjs.Ease.cubicOut).call(
            function () {
                addBangBoss(bullet, true);
            }
        );

    }, 800);

    intervalBoss = setInterval(function () {

        var bullet = new lib.Bullet2();
        exportRoot.addChild(bullet);


        bullet.x = boss.x + 65;

        bullet.y = boss.y + 80;
        bullet.alpha = 0.5;

        createjs.Tween.get(bullet)
            .to({y: ship.y, alpha: 1}, 800, createjs.Ease.cubicIn).call(
            function () {
                addBangPlayer(bullet, true);
            }
        );

    }, 1100);

    setTimeout(function () {

        if (winSumm != 0) {
            boss.gotoAndStop("helth50");

            setTimeout(function () {
                boss.gotoAndStop('helth0');
                setTimeout(function () {
                    bossDead = true;
                }, 3000);
            }, 4000);
        }
        else
        {
            boss.gotoAndStop("helth50");
            setTimeout(function () {
                boss.gotoAndStop('helth0');
                playerDead = true;
            }, 3000 );
        }

    }, 5000);
}

function addStarsBoss() {

    for (var f = 0; f < 200; f++) {
        var PI2 = Math.PI * 2;
        var angle = Math.random() * PI2;

        var x = boss.x + 50 + Math.random() * 40;
        var y = boss.y + 70 + Math.random() * 40;

        var star = new lib.Crash();
        star.x = x;
        star.y = y;
        star.gotoAndStop( Math.floor( Math.random() * star.timeline.duration ) );
        star.scaleX = scaleY = 0.5 + Math.random() * 1;

        exportRoot.addChild(star);

        var vectorY;
        var vectorX;

        var rndL = Math.random() * 120;

        vectorY = rndL * Math.cos(angle);
        vectorX = rndL * Math.sin(angle);

        createjs.Tween.get(star).to({
            y: star.y + vectorY,
            x: star.x + vectorX
        }, 2500, createjs.Ease.quintOut).call(function () {
        });

    }

    var smoke = new lib.Smoke();
    smoke.alpha = 0.3;
    smoke.scaleX = smoke.scaleY = 0.8;
    exportRoot.addChild( smoke );
    smoke.x = ship.x;
    smoke.y = ship.y;

    createjs.Tween.get(smoke)
        .to({alpha: 0.7, scaleX: 1.5, scaleY:1.5}, 3000, createjs.Ease.linear).call(
        function() {

            createjs.Tween.get(smoke)
                .to({alpha: 0.1, scaleX: 2.2, scaleY:2.2}, 4000, createjs.Ease.linear).call(
                function() {

                    exportRoot.removeChild( smoke );

                }
            )

        }
    );


}

function addStarsPlayer() {


    for (var f = 0; f < 200; f++) {
        var PI2 = Math.PI * 2;
        var angle = Math.random() * PI2;

        var x = ship.x - 20 + Math.random() * 40;
        var y = ship.y - 20 + Math.random() * 40;

        var star = new lib.Crash();
        star.x = x;
        star.y = y;
        star.gotoAndStop( Math.floor( Math.random() * star.timeline.duration ) );
        star.scaleX = scaleY = 0.5 + Math.random() * 1;

        exportRoot.addChild(star);

        var vectorY;
        var vectorX;

        var rndL = Math.random() * 120;

        vectorY = rndL * Math.cos(angle);
        vectorX = rndL * Math.sin(angle);

        createjs.Tween.get(star).to({
            y: star.y + vectorY,
            x: star.x + vectorX
        }, 2500, createjs.Ease.quintOut).call(function () {
        });

    }

    var smoke = new lib.Smoke();
    smoke.alpha = 0.3;
    smoke.scaleX = smoke.scaleY = 0.8;
    exportRoot.addChild( smoke );
    smoke.x = ship.x;
    smoke.y = ship.y;

    createjs.Tween.get(smoke)
        .to({alpha: 0.7, scaleX: 1.5, scaleY:1.5}, 3000, createjs.Ease.linear).call(
        function() {

            createjs.Tween.get(smoke)
                .to({alpha: 0.1, scaleX: 2.2, scaleY:2.2}, 4000, createjs.Ease.linear).call(
                function() {

                    exportRoot.removeChild( smoke );

                }
            )

        }
    );

}


function addBangBoss(bullet, isRemoveBullet) {
    var data = {
        images: ["/iframes/boss/images/bang2.png"],
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


    animation.gotoAndPlay("bang");

    if( bossDead == true )
    {
        addStarsBoss();

        $('.text_stage').html( "Сумма: " + winSumm + ' <img width="35" src="/images/gold.png">' );
        $('.win_boss').css('display', 'block');

        createjs.Tween.get(ship)
            .to({y: -100, alpha: 0.5}, 2800, createjs.Ease.cubicIn).call(
            function () {
                $('.btn_exit_boss').css('display', 'block');
            }
        );

        clearInterval( intervalPlayer );
        clearInterval( intervalBoss );

        boss.visible = false;

        createjs.Tween.get(animation)
            .to({alpha: 0}, 500, createjs.Ease.linear)
            .call(handleComplete);

        function handleComplete() {

            bullet.removeChild(animation);

            if (isRemoveBullet)
                exportRoot.removeChild(bullet);

        }

        animation.gotoAndPlay("bang");

    }
    else
    {
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

}

function addBangPlayer(bullet, isRemoveBullet) {
    var data = {
        images: ["/iframes/boss/images/bang2.png"],
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

    if( playerDead == true )
    {
        addStarsPlayer();

        $('.loose_boss').css('display', 'block');

        createjs.Tween.get(boss)
            .to({y: 1000, alpha: 0.5}, 2800, createjs.Ease.cubicIn).call(
            function () {
                $('.btn_exit_boss').css('display', 'block');
                $('.btn_again_boss').css('display', 'block');
            }
        );


        clearInterval( intervalPlayer );
        clearInterval( intervalBoss );

        ship.visible = false;

        createjs.Tween.get(animation)
            .to({alpha: 0}, 500, createjs.Ease.linear)
            .call(handleComplete);

        function handleComplete() {

            bullet.removeChild(animation);

            if (isRemoveBullet)
                exportRoot.removeChild(bullet);

        }

        animation.gotoAndPlay("bang");

    }
    else
    {
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

}