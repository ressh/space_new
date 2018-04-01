/**
 * Created by Александр on 28.10.2015.
 * корабль игрока
 */
var Ship = function (gfx, gfx_gun, gfx_engine, gfx_defend, player_this) {

    var ship = new lib.ShepFly();

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

    this.ship = ship;

    this.remove = function()
    {
        exportRoot.removeChild(ship);
        createjs.Tween.removeAllTweens();

        stars.forEach( function( star ) {

            exportRoot.removeChild( star );

        } );

        stars.length = 0;

        if( fire != null )
            exportRoot.lay.removeChild( fire );

        if( polygon != null )
            exportRoot.lay.removeChild( polygon );
    }

    this.addshipMap = function (id) {

        var PI2 = Math.PI * 2;
        var angle = (id + 1) / players.length * PI2;

        var x = 470;
        var y = 375;

        vectorY = 270 * Math.cos(angle);
        vectorX = 270 * Math.sin(angle);

        ship.x = x + vectorX;
        ship.y = y + vectorY;

        ship.angle = angle;

        var angle = Math.atan2(375 - ship.y, 450 - ship.x);
        angle = angle * (180 / Math.PI);

        if (angle < 0)
            angle = 360 - (-angle);

        ship.rotation = angle;
        exportRoot.addChild(ship);

    }

    this.startAnimationRoundNothin = function (currentGun) {

        switch (currentGun) {
            case "1":
                addLaser(ship);
                break
            case "2":
                addAbordaj(ship, 1000);
                break;
            case "3":
                addDefend(ship);
                break;
        }
    }

    this.startAnimationWin = function () {

        var currentGun = player_this.getPlayerStrategyForStep();

        switch (currentGun) {
            case "1":
                addLaserWin(ship);
                break
            case "2":
                addAbordajWin(ship);
                break;
            case "3":
                addDefend(ship);
                break;
        }

        console.log( 'start_anim_win' );

    }

    var objects = [];

    this.addItemStrategiIcon = function (id) {

        var itemStrategi = new lib.ItemStrategy();
        itemStrategi.y -= 70;
        ship.addChild(itemStrategi);
        itemStrategi.gotoAndStop(parseInt(id) - 1);
        itemStrategi.scaleX = itemStrategi.scaleY = 0.5;

        objects.push(itemStrategi);
    }

    this.addDead = function()
    {
        addBang();
    }


    function addAbordajWin( ship )
    {

        var vectorY_1 = 30 * Math.cos(ship.angle);
        var vectorX_1 = 30 * Math.sin(ship.angle);

        var vectorY_2 = 240 * Math.cos(ship.angle);
        var vectorX_2 = 240 * Math.sin(ship.angle);

        createjs.Tween.get(ship)
            .to({x: ship.x - vectorX_1, y: ship.y - vectorY_1}, 300, createjs.Ease.cubicIn).call(
            function () {

                createjs.Tween.get(ship)
                    .to({x: ship.x - vectorX_2, y: ship.y - vectorY_2}, 300, createjs.Ease.elasticOut).call(
                    function () {


                        createjs.Tween.get(ship)
                            .to({
                                x: ship.x + vectorX_1 + vectorX_2,
                                y: ship.y + vectorY_1 + vectorY_2
                            }, 700, createjs.Ease.quintInOut).call(function () {



                            });
                        ;


                    }
                )

            })

    }



    function addLaserWin()
    {
        players.forEach( function( player ){

            if( player_this.getIsDead() == true )
                return;


            if( player.getLoose() == true )
            {
                polygon = new createjs.Shape();
                polygon.graphics.beginStroke("red");
                polygon.graphics.moveTo(ship.x, ship.y).lineTo( player.getship().ship.x,player.getship().ship.y );
                polygon.alpha = 0.6;
                exportRoot.lay.addChild(polygon);

                fire = new lib.Fire();
                fire.x = player.getship().ship.x;
                fire.y = player.getship().ship.y;
                exportRoot.lay.addChild(fire);

                console.log( "add_laser" );
            }

        } )

    }


    var fire = null;
    var polygon = null;

    function addLaser(ship) {


        polygon = new createjs.Shape();
        polygon.graphics.beginStroke("red");
        polygon.graphics.moveTo(ship.x, ship.y).lineTo(470, 375);
        polygon.alpha = 0.6;
        exportRoot.lay.addChild(polygon);

        fire = new lib.Fire();
        fire.x = 470;
        fire.y = 375;
        exportRoot.lay.addChild(fire);

    }


    function addAbordaj(ship, time) {


        var vectorY_1 = 10 * Math.cos(ship.angle);
        var vectorX_1 = 10 * Math.sin(ship.angle);

        var vectorY_2 = 40 * Math.cos(ship.angle);
        var vectorX_2 = 40 * Math.sin(ship.angle);

        createjs.Tween.get(ship)
            .to({x: ship.x - vectorX_1, y: ship.y - vectorY_1}, 300, createjs.Ease.cubicIn).call(
            function () {

                createjs.Tween.get(ship)
                    .to({x: ship.x - vectorX_2, y: ship.y - vectorY_2}, 300, createjs.Ease.elasticOut).call(
                    function () {


                        createjs.Tween.get(ship)
                            .to({
                                x: ship.x + vectorX_1 + vectorX_2,
                                y: ship.y + vectorY_1 + vectorY_2
                            }, 700, createjs.Ease.quintInOut).call(function () {

                                addAbordaj(ship, 4000);

                            });
                        ;


                    }
                )

            })


    }


    function addDefend(ship) {

        console.log( "ADD_DEFEND" );

        ship.defend.visible = true;
        ship.defend.alpha = 0.1;

        createjs.Tween.get(ship.defend).wait( 100 * Math.random() )
            .to({alpha: 0.5}, 300, createjs.Ease.cubicIn)

    }



    function addBang()
    {
        var data = {
            images: ["/iframes/lookFight/images/bang2.png"],
            frames: {width: 40, height: 37, count: 6},
            animations: {
                bang: [0, 5, false]
            }
        };

        var spriteSheet = new createjs.SpriteSheet(data);
        var bang = new createjs.Sprite(spriteSheet);

        exportRoot.addChild(bang);
        bang.x = ship.x - 170;
        bang.y = ship.y - 173;
        bang.scaleX = bang.scaleY = 9;

        createjs.Tween.get(bang)
            .to({alpha: 0}, 200, createjs.Ease.linear)
            .call(handleComplete);

        function handleComplete() {
            exportRoot.removeChild(bang);
        }

        bang.gotoAndPlay("bang");

        starsFly();
    }

    var stars = [];

    function starsFly()
    {


        for( var f = 0; f<200; f++)
        {
            var PI2 = Math.PI * 2;
            var angle=Math.random()*PI2;

            var x = ship.x - 20 + Math.random() * 40;
            var y =  ship.y - 20 + Math.random() * 40;

            var star = new lib.Crash();
            star.x = x;
            star.y = y;
            star.gotoAndStop( Math.floor( Math.random() * star.timeline.duration ) );

            star.scaleX = scaleY = 0.5 + Math.random() * 1;

            exportRoot.addChild( star );

            var vectorY;
            var vectorX;

            var rndL = Math.random()*120;

            vectorY= rndL*Math.cos(angle);
            vectorX= rndL*Math.sin(angle);

            stars.push( star );

            createjs.Tween.get(star).to({ y:star.y + vectorY, x:star.x + vectorX }, 2500, createjs.Ease.quintOut ).call( function() {});

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

}