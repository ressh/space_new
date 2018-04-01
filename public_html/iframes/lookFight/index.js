/**
 * Created by Александр on 24.10.2015.
 */

$(document).ready(function () {
    init();
})

var canvas, stage, exportRoot;

var isFirstAdding = true;

function init() {
    canvas = document.getElementById("canvas");
    images = images || {};

    var manifest = [
        {src:"/iframes/lookFight/images/asterOskol.png", id:"asterOskol"},
        {src:"/iframes/lookFight/images/back.jpg", id:"back"},
        {src:"/iframes/lookFight/images/bang2.png", id:"bang2"},
        {src:"/iframes/lookFight/images/Bitmfew16.png", id:"Bitmfew16"},
        {src:"/iframes/lookFight/images/Bitmap17.jpg", id:"Bitmap17"},
        {src:"/iframes/lookFight/images/Bitmap18.jpg", id:"Bitmap18"},
        {src:"/iframes/lookFight/images/Bitmap27.jpg", id:"Bitmap27"},
        {src:"/iframes/lookFight/images/bullet2.png", id:"bullet2"},
        {src:"/iframes/lookFight/images/callcentericons.png", id:"callcentericons"},
        {src:"/iframes/lookFight/images/fwefwe.jpg", id:"fwefwe"},
        {src:"/iframes/lookFight/images/message_icon_blasters.jpg", id:"message_icon_blasters"},
        {src:"/iframes/lookFight/images/message_icon_flag.jpg", id:"message_icon_flag"},
        {src:"/iframes/lookFight/images/message_icon_swords.jpg", id:"message_icon_swords"},
        {src:"/iframes/lookFight/images/window.png", id:"window"}
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

    addFighters();

    $('#start_round').click(function () {
        addVisualStrategy();
        $('#start_round').hide();
    });


    $('#next_level').click(function () {

        step += 1;

        $('#round').html(step + 1);

        players.forEach(function (player, id) {
            player.remove();
            player.addship();

        });


        addFighters();
        addVisualStrategy();


    })

}

function addFighters() {

    players.forEach(function (player, id) {

        if (player.getIsDead() == false) {

            $('#player' + player.id).html(player.getName() + " - " + player.getNameGunt(player.getPlayerStrategyForStep()));

            player.addshipMap(id);
            player.getship().addItemStrategiIcon(player.getPlayerStrategyForStep());
        }
    })

}


var step = 0;
var winners = [];

function addVisualStrategy() {

    winners.length = 0;

    // Опросить каждого игрока о стратегии
    players.forEach(function (player) {

        if( player.getIsDead() == true )
            return;

        var ansver = player.ansverPlayer();

        if (player.getWin() == true) {
            winners.push(player);
        }
    })

    players.forEach( function(player) {

        if( player.getIsDead() == true )
            return;

        player.setAnimationForPlayer();

    } )


    if (winners.length == 1) {
        $('#text_round').html('<span style="font-size: 18px; ">Победитель</span><br>' + winners[0].getName());
        $('#next_level').hide();
    }
    else if (winners.length == 0) {
        $('#text_round').text('Ничья');


        if( step >= 10 )
        {
            $('#next_level').hide();
            $('.panel_info').hide();
        }
        else
        {
            $('#next_level').show();
        }

    }
    else {
        $('#next_level').show();
    }


}





