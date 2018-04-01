(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 3
	this.ship = new lib.ShepFly();
	this.ship.setTransform(-130.9,143.2,1,1,0,0,0,39.2,31.4);

	// Layer 5 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("EghbAV3MAAAgruMBC3AAAMAAAArug");
	mask.setTransform(214,140);

	// Layer 6
	this.space = new lib.Symbol9();
	this.space.setTransform(1560,140,1,1,0,0,0,1560,140);

	this.space.mask = mask;

	this.addChild(this.space,this.ship);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-244.5,0,3364.6,280);


// symbols:
(lib.asteroids = function() {
	this.initialize(img.asteroids);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,375,25);


(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3120,280);


(lib.bang2 = function() {
	this.initialize(img.bang2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,240,40);


(lib.bullet2 = function() {
	this.initialize(img.bullet2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,125,25);


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


(lib.myShip3 = function() {
	this.initialize(img.myShip3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.myShip4 = function() {
	this.initialize(img.myShip4);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.ship_ruh = function() {
	this.initialize(img.ship_ruh);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.Symbol9 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.back();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,3120,280);


(lib.Fire = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["rgba(255,11,53,0.8)","rgba(104,48,190,0.2)"],[0,1],0,0,0,0,0,5.4).s().p("AghAjQgPgPAAgUQAAgTAPgPQAOgOATAAQAUAAAOAOQAPAPAAATQAAAUgPAPQgOAOgUAAQgTAAgOgOg");
	this.shape.setTransform(-0.3,0);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-5.3,-4.9,9.9,9.9);


(lib.NitroFlame = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(255,255,255,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(11.2,47.2,0.633,0.734);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,22.4,94.4);


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

	// Layer 1
	this.instance = new lib.myShip4();
	this.instance.setTransform(22.5,-23.2,0.286,0.286);

	// Layer 2
	this.fire = new lib.Symbol3();
	this.fire.setTransform(31.4,35.5,1,1,89.3,0,0,13.9,13.8);

	this.addChild(this.fire,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-74.3,-23.2,230,114.5);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;