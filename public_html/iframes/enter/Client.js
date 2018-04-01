(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 1
	this.spaceman = new lib.Symbol7();
	this.spaceman.setTransform(79.6,149,1,1,0,0,0,21.6,39.5);

	// Layer 2
	this.ship = new lib.Symbol6();
	this.ship.setTransform(64.4,44.8,1,1,0,0,0,45,27.5);

	// Layer 3
	this.back = new lib.Symbol13();
	this.back.setTransform(263,191,1,1,0,0,0,263,191);

	this.addChild(this.back,this.ship,this.spaceman);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,-14,526,396.1);


// symbols:
(lib.asterOskol = function() {
	this.initialize(img.asterOskol);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3,3);


(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,526,382);


(lib.bang2 = function() {
	this.initialize(img.bang2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,240,40);


(lib.Bitmap16 = function() {
	this.initialize(img.Bitmap16);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,7,8);


(lib.Bitmap17 = function() {
	this.initialize(img.Bitmap17);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,9,8);


(lib.Bitmap18 = function() {
	this.initialize(img.Bitmap18);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,480,400);


(lib.bonus3 = function() {
	this.initialize(img.bonus3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.bullet2 = function() {
	this.initialize(img.bullet2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,125,25);


(lib.fire = function() {
	this.initialize(img.fire);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,800,74);


(lib.fire2 = function() {
	this.initialize(img.fire2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,63,54);


(lib.fire3 = function() {
	this.initialize(img.fire3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,50,36);


(lib.fwefwe = function() {
	this.initialize(img.fwefwe);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,526,382);


(lib.gun2 = function() {
	this.initialize(img.gun2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.hend = function() {
	this.initialize(img.hend);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,12,30);


(lib.item_art_18 = function() {
	this.initialize(img.item_art_18);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.movement = function() {
	this.initialize(img.movement);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.ms_001 = function() {
	this.initialize(img.ms_001);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,400,434);


(lib.ms_002 = function() {
	this.initialize(img.ms_002);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,400,434);


(lib.ms_003 = function() {
	this.initialize(img.ms_003);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,400,434);


(lib.myShip3 = function() {
	this.initialize(img.myShip3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.raid_boss01 = function() {
	this.initialize(img.raid_boss01);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,352,262);


(lib.raid_boss01_02 = function() {
	this.initialize(img.raid_boss01_02);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,352,262);


(lib.raid_boss01_03 = function() {
	this.initialize(img.raid_boss01_03);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,352,262);


(lib.raid_boss02 = function() {
	this.initialize(img.raid_boss02);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,352,153);


(lib.ship_ruh = function() {
	this.initialize(img.ship_ruh);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.spaceman = function() {
	this.initialize(img.spaceman);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,54,99);


(lib.stantion = function() {
	this.initialize(img.stantion);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,399,310);


(lib.stantion2 = function() {
	this.initialize(img.stantion2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,399,310);


(lib.stantion3 = function() {
	this.initialize(img.stantion3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,399,310);


(lib.Tween1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.hend();
	this.instance.setTransform(-3.9,-9.9,0.667,0.667);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-3.9,-9.9,8,20);


(lib.Symbol13 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.back();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,526,382);


(lib.Symbol8 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.stantion();
	this.instance.setTransform(0,0,0.845,0.845);

	this.instance_1 = new lib.stantion2();
	this.instance_1.setTransform(0,0,0.845,0.845);

	this.instance_2 = new lib.stantion3();
	this.instance_2.setTransform(0,0,0.845,0.845);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,337.2,262);


(lib.Symbol5 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.item_art_18();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.Symbol4 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 2
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(3,1,1).p("ACPj9QiuEkDWDXAg3mdQkUGvFGGM");
	this.shape.setTransform(-31.2,41.1);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape}]},11).to({state:[{t:this.shape}]},9).to({state:[]},1).wait(14));

	// Layer 1
	this.instance = new lib.bonus3();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance}]},34).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.syCellMainShip = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.ms_002();
	this.instance.setTransform(-130.3,-67.1);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-130.3,-67.1,400,434);


(lib.syBlinker = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["#FFFFFF","rgba(255,255,255,0.298)","rgba(255,255,255,0)"],[0,0.345,1],0,0,0,0,0,4.7).s().p("AghAiQgPgOgBgUQABgUAPgOQAOgPATAAQAUAAAPAPQAOAOAAAUQAAAUgOAOQgPAQgUgBQgTABgOgQg");
	this.shape.setTransform(5,5);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,10,10);


(lib.Crash = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.asterOskol();
	this.instance.setTransform(-1.5,-1.4);

	this.instance_1 = new lib.Bitmap16();
	this.instance_1.setTransform(2.5,2.8,0,0);

	this.instance_2 = new lib.Bitmap17();
	this.instance_2.setTransform(4.6,4.1,0,0);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-1.5,-1.4,3,3);


(lib.NitroFlame = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,0,0,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(11.2,47.2,0.633,0.734);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,22.4,94.4);


(lib.Fire = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["#00CC33","rgba(21,21,21,0)","#151515","#151515","#151515"],[0,1,1,1,1],0,0,0,0,0,36.2).s().p("Aj9D+QhphqgBiUQABiUBphpQBphpCUgBQCUABBqBpQBqBpgBCUQABCUhqBqQhqBqiUgBQiUABhphqg");
	this.shape.setTransform(1,2);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-34.9,-33.9,72,72);


(lib.Bullet = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bullet2();
	this.instance.setTransform(28,0,0.224,0.224,0,0,180);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,28,5.6);


(lib.Symbol7 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.spaceman();
	this.instance.setTransform(0,0,0.798,0.798);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance}]},121).wait(1));

	// Layer 2
	this.instance_1 = new lib.Tween1("synched",0);
	this.instance_1.setTransform(27.9,27.1,1,1,0,0,0,-2.7,-9.4);

	this.timeline.addTween(cjs.Tween.get(this.instance_1).to({regX:-2.7,rotation:-160.7,x:31.3,y:28.7},49).to({rotation:-149.5,x:31.4,y:28.6},6).to({startPosition:0},1).to({rotation:-160.7,x:31.3,y:28.7},6).to({startPosition:0},1).to({rotation:-149.5,x:31.4,y:28.6},6).to({startPosition:0},1).to({rotation:-160.7,x:31.3,y:28.7},6).to({startPosition:0},1).to({rotation:-149.5,x:31.4,y:28.6},6).to({startPosition:0},1).to({rotation:-160.7,x:31.3,y:28.7},6).to({startPosition:0},1).to({regX:-2.6,rotation:0,x:27.9,y:27.1},30).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,65.1,83);


(lib.Symbol3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.NitroFlame();
	this.instance.setTransform(11.2,59.7,0.554,1.264,0,0,0,11.2,47.2);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1).to({regY:47.3,scaleX:0.65,scaleY:1.19,y:56.3},0).wait(1).to({regY:47.2,scaleX:0.74,scaleY:1.11,y:52.5},0).wait(1).to({scaleX:0.67,scaleY:1.2,y:56.6},0).wait(1).to({scaleX:0.6,scaleY:1.29,y:60.7},0).wait(1));

	// Layer 2
	this.instance_1 = new lib.NitroFlame();
	this.instance_1.setTransform(11,47.2,1.067,1,0,0,0,11.2,47.2);

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(1).to({scaleX:0.35,x:1.7},0).wait(1).to({regX:11.1,scaleX:0.29,x:10.7},0).wait(1).to({regX:11.2,scaleX:0.24,x:19.7},0).wait(1).to({scaleX:1,x:11.2},0).wait(1));

	// Layer 3
	this.instance_2 = new lib.NitroFlame();
	this.instance_2.setTransform(11.2,47.2,1,1,0,0,0,11.2,47.2);

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(1).to({scaleX:0.24,x:19.7},0).wait(1).to({scaleX:0.27,x:10.8},0).wait(1).to({regX:11.3,scaleX:0.3,x:1.7},0).wait(1).to({regX:11.2,scaleX:1.07,x:11},0).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-0.9,0,23.9,119.4);


(lib.ShepFly = function() {
	this.initialize();

	// Layer 3
	this.instance = new lib.movement();
	this.instance.setTransform(15.5,-19.1,0.258,0.258);

	// Layer 4
	this.instance_1 = new lib.gun2();
	this.instance_1.setTransform(23.2,-21.7,0.274,0.274);

	// Layer 1
	this.instance_2 = new lib.myShip3();
	this.instance_2.setTransform(23.2,-27.1,0.298,0.298);

	// Layer 2
	this.fire = new lib.Symbol3();
	this.fire.setTransform(31.4,35.5,1,1,89.3,0,0,13.9,13.8);

	this.addChild(this.fire,this.instance_2,this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-74.3,-27.1,236.3,119.4);


(lib.syCellMainShipBlinks = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.syBlinker();
	this.instance.setTransform(12.5,-60.1,1,1,0,0,0,5,5);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(46).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).wait(1));

	// Layer 8
	this.instance_1 = new lib.syBlinker();
	this.instance_1.setTransform(104.8,-7.3,1,1,0,0,0,5,5);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(40).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(6));

	// Layer 7
	this.instance_2 = new lib.syBlinker();
	this.instance_2.setTransform(-12.7,-60.1,1,1,0,0,0,5,5);
	this.instance_2.alpha = 0;
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(30).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(16));

	// Layer 6
	this.instance_3 = new lib.syBlinker();
	this.instance_3.setTransform(104.8,7.9,1,1,0,0,0,5,5);
	this.instance_3.alpha = 0;
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(30).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(16));

	// Layer 5
	this.instance_4 = new lib.syBlinker();
	this.instance_4.setTransform(-104.7,-7.3,1,1,0,0,0,5,5);
	this.instance_4.alpha = 0;
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(13).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(33));

	// Layer 4
	this.instance_5 = new lib.syBlinker();
	this.instance_5.setTransform(12.5,60.4,1,1,0,0,0,5,5);
	this.instance_5.alpha = 0;
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(13).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(33));

	// Layer 3
	this.instance_6 = new lib.syBlinker();
	this.instance_6.setTransform(-12.7,60.4,1,1,0,0,0,5,5);
	this.instance_6.alpha = 0;
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(4).to({_off:false},0).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(42));

	// Layer 2
	this.instance_7 = new lib.syBlinker();
	this.instance_7.setTransform(-104.7,7.8,1,1,0,0,0,5,5);
	this.instance_7.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(1).to({alpha:0.5},0).wait(1).to({alpha:1},0).wait(1).to({alpha:0.857},0).wait(1).to({alpha:0.714},0).wait(1).to({alpha:0.571},0).wait(1).to({alpha:0.429},0).wait(1).to({alpha:0.286},0).wait(1).to({alpha:0.143},0).wait(1).to({alpha:0},0).to({_off:true},1).wait(46));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-109.7,2.8,10,10);


(lib.mcCellMainShipAnim = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.syCellMainShip();
	this.instance.setTransform(0,0,1,1,0,0,0,200,217);
	this.instance.shadow = new cjs.Shadow("rgba(0,0,0,1)",0,17,8);
	this.instance.cache(-131,-68,404,438);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).wait(40));

	// Layer 3
	this.fire = new lib.Symbol3();
	this.fire.setTransform(-28.3,-206,3.167,1,-118.8,0,0,13.9,13.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.fire}]}).wait(40));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-330.3,-284.1,417.2,434);


(lib.ScreenFinal = function() {
	this.initialize();

	// Layer 2
	this.generator = new lib.Symbol5();
	this.generator.setTransform(-93.9,315.4,1,1,0,0,0,50,50);

	this.radio = new lib.Symbol4();
	this.radio.setTransform(648,215.4,1,1,0,0,0,50,50);

	// Layer 1
	this.instance = new lib.Bitmap18();

	this.addChild(this.instance,this.radio,this.generator);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-143.9,0,842,400);


(lib.Symbol6 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.syCellMainShipBlinks();
	this.instance.setTransform(301.7,53.4);
	this.instance.shadow = new cjs.Shadow("#FF0000",0,0,5);
	this.instance.compositeOperation = "lighter";
	this.instance.cache(-111,1,14,14);

	// Layer 3
	this.ship = new lib.mcCellMainShipAnim();
	this.ship.setTransform(368.2,194.3,0.744,0.744);

	// Layer 4
	this.stantion = new lib.Symbol8();
	this.stantion.setTransform(299.9,99.7,1,1,0,0,0,168.6,131);

	// Layer 5
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["rgba(0,0,0,0.498)","rgba(0,0,0,0)"],[0,1],10,-5.9,0,10,-5.9,47.3).s().p("AlhDLQinhdAPiMQAQiOC8htIAFgDIMjG8IgFACQi9Btj7AMIg2ACQjVAAiUhSg");
	this.shape.setTransform(169.6,168.7,1,1,0,0,0,-12.4,7);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.rf(["rgba(0,0,0,0.498)","rgba(0,0,0,0)"],[0,1],10,-5.9,0,10,-5.9,47.3).s().p("AlhDLQinhdAPiMQAQiOC8htIAFgDIMjG8IgFACQi9Btj7AMIg2ACQjVAAiUhSg");
	this.shape_1.setTransform(242.6,209.2,1,1,0,0,0,-12.4,7);

	this.addChild(this.shape_1,this.shape,this.stantion,this.ship,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(122.3,-31.2,346.2,337.1);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;