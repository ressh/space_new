/**
 * Created by Александр on 23.09.2015.
 */
var Asterid = function()
{

    var data

    if( randomIntFromInterval( 1,2) == 1 )
    {
        data = {
            frames: [0, 1, 2, 3, 4, 5,6 ,7, 8,9,10,11,12,13, 14],
            speed: Math.random() * 0.5 + 0.3
        }
    }
    else
    {
        data = {
            frames: [14,13,12,11,10,9,8,7,6,5,4,3,2,1],
            speed: Math.random() * 0.5 + 0.3
        }
    }

    var data = {
        images: ["images/asteroids.png"],
        frames: {width: 25, height: 25, count: 15},
        animations: {
            fly: data
        }
    };


    var spriteSheet = new createjs.SpriteSheet(data);
    var animation = new createjs.Sprite(spriteSheet, "fly");

    animation.x = Math.random() * 200 + 180;
    animation.y = Math.random() * 230;
    animation.scaleX = animation.scaleY = Math.random() * 1.3 + 0.8;

    exportRoot.addChild(animation);

    this.gfx = animation;

    var polygon;

    this.addTimerLive = function(  )
    {

        polygon = new createjs.Shape();
        polygon.graphics.beginStroke("red");
        polygon.graphics.moveTo(exportRoot.ship.x+110, exportRoot.ship.y).lineTo(animation.x + animation.scaleX * 25/2 , animation.y + animation.scaleX * 25/2);
        polygon.alpha = 0.6;
        exportRoot.addChild( polygon );

        var fire = new lib.Fire();
        fire.x = animation.x + animation.scaleX * 25/2;
        fire.y = animation.y + animation.scaleX * 25/2;
        exportRoot.addChild( fire );

        setTimeout( function(){

            exportRoot.removeChild( animation );
            exportRoot.removeChild( polygon );
            exportRoot.removeChild( fire );

            addBang();

        }, 600 +  Math.random() * animation.scaleX * 1000 );
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
        bang.x = animation.x;
        bang.y = animation.y;

        createjs.Tween.get(bang)
            .to({alpha: 0}, 200, createjs.Ease.linear)
            .call(handleComplete);

        function handleComplete() {
            exportRoot.removeChild(bang);

            addMoney('+' + ( Math.random() * 5 ).toFixed(2) , 300);

        }

        bang.gotoAndPlay("bang");
    }

}

function addMoney(summ, wait) {
    setTimeout(function () {

        $('.money_set').html( "<div style='padding: 5px; text-align: center;'>" + summ + ' <img width="13" src="/images/gold.png"></div>');
        $('.money_set').show("fast", function () {
            setTimeout(function () {
                $('.money_set').hide("fast");
            }, 700);
        })
    }, wait);
}