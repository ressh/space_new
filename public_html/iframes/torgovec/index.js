/**
 * Created by Александр on 20.09.2015.
 */
var canvas, stage, exportRoot;

var manifestCount;

function init() {
    canvas = document.getElementById("canvas");
    images = images||{};

    var manifest = [
        {src:"images/Bitmap1.jpg", id:"Bitmap1"},
        {src:"images/china.png", id:"china"}
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

function handleComplete() {


    exportRoot = new lib.Client();

    stage = new createjs.Stage(canvas);
    stage.addChild(exportRoot);
    stage.update();

    createjs.Ticker.setFPS(24);
    createjs.Ticker.addEventListener("tick", stage);

    exportRoot.shipFly.visible = false;

}

function startPlay()
{
    //$('.text_comand').html(' - <span style="color:#ff0000;">(станция)</span> Спасибо за груз командир! Куда теперь? ');

    setDialog( $('.stantion'), 'Спасибо за товары дружище!', 1, 4000 );
    setDialog( $('.player'), 'Незачто, слышал вам требуется запретные элементы...', 4000, 5000 );
    setDialog( $('.stantion'), 'Тщщщ... Будем Вам признательны за иридиум!', 10000, 4000 );
    setDialog( $('.player'), 'Ждите, скоро подвезу', 14000, 3000 );

    addMoney( '+112.70', 3000 );
    addMoney( '+18.35', 11000 );


    setTimeout( function() {

        exportRoot.shipFly.visible = true;
        exportRoot.shipDrift.visible = false;



        createjs.Tween.get( exportRoot.shipFly )
            .to({ x:635, y:-200 }, 5500, createjs.Ease.cubicIn )
            .call(handleComplete);
        function handleComplete() {

        }

    }, 15000 );
}


function addMoney( summ, wait )
{
    setTimeout( function() {

        $('.money_set').html(summ + '<img width="13" src="/images/gold.png">');
        $('.money_set').show("fast", function () {
            setTimeout(function () {
                $('.money_set').hide("fast");
            }, 1300);
        })
    }, wait );
}

function setDialog( person, text, wait, time )
{
    setTimeout( function() {

        person.show("fast", function () {

            var span = person.find('.text_comand');
            span.html(text);

            setTimeout(function () {

                span.html('');
                person.hide('fast');

            }, time);

        });

    }, wait );

}