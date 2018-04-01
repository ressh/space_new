(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 3
	this.instance = new lib.stantion();
	this.instance.setTransform(284,121.5,1.267,1.267);

	this.ship = new lib.ShepFly();
	this.ship.setTransform(-119.5,195.8,1.188,1.188,0,0,0,80.8,33.6);

	// Layer 5 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("EglfAeFMAAAg8JMBK+AAAMAAAA8Jg");
	mask.setTransform(240,192.5);

	// Layer 6
	this.space = new lib.Symbol9();
	this.space.setTransform(1560,134.8,1,0.962,0,0,0,1560,140);

	this.space.mask = mask;

	this.addChild(this.space,this.ship,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-303.9,0,3424,385);


// symbols:
(lib.asterOskol = function() {
	this.initialize(img.asterOskol);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3,3);


(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3120,400);


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


(lib.bonus5 = function() {
	this.initialize(img.bonus5);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.bullet2 = function() {
	this.initialize(img.bullet2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,125,25);


(lib.callcentericons = function() {
	this.initialize(img.callcentericons);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,192,214);


(lib.gun2 = function() {
	this.initialize(img.gun2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.item_art_18 = function() {
	this.initialize(img.item_art_18);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.movement = function() {
	this.initialize(img.movement);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.myShip = function() {
	this.initialize(img.myShip);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.myShip2 = function() {
	this.initialize(img.myShip2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


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


(lib.stantion = function() {
	this.initialize(img.stantion);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,150,150);


(lib.Symbol9 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.back();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,3120,400);


(lib.Symbol6 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.myShip3();
	this.instance.setTransform(0,7.2,0.275,0.275);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,7.2,127.8,110);


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


(lib.Crash = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.asterOskol();
	this.instance.setTransform(-1.5,-1.4);

	this.instance_1 = new lib.Bitmap16();
	this.instance_1.setTransform(-2.4,-2.7,0.671,0.671);

	this.instance_2 = new lib.Bitmap17();
	this.instance_2.setTransform(-4.5,-4);

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
	this.type = new lib.Symbol6();
	this.type.setTransform(99,33.5,1,1,0,0,0,71.8,61.7);

	// Layer 2
	this.fire = new lib.Symbol3();
	this.fire.setTransform(31.4,35.5,1,1,89.3,0,0,13.9,13.8);

	this.addChild(this.fire,this.type,this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-74.3,-21.7,229.4,110.8);


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

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;