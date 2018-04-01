(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 4
	this.enemy2 = new lib.EnemyDestroy();
	this.enemy2.setTransform(341.8,139.1,0.666,0.666,0,0,180,103.2,96.5);
	this.enemy2.visible = false;

	// Layer 5
	this.enemy = new lib.Enemy();
	this.enemy.setTransform(344,139.2,0.69,0.69,0,0,180,100,100);

	this.sheep = new lib.ShepFly();
	this.sheep.setTransform(-130.9,143.2,1,1,0,0,0,39.2,31.4);

	// Layer 1 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("EghbAV3MAAAgruMBC3AAAMAAAArug");
	mask.setTransform(214,140);

	// Layer 6
	this.instance = new lib.back();
	this.instance.setTransform(-1518,0);

	this.instance.mask = mask;

	this.addChild(this.instance,this.sheep,this.enemy,this.enemy2);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-1518,0,3120,280);


// symbols:
(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3120,280);


(lib.bang = function() {
	this.initialize(img.bang);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,240,40);


(lib.Bitmap1 = function() {
	this.initialize(img.Bitmap1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,428,380);


(lib.body = function() {
	this.initialize(img.body);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,111,170);


(lib.bullet = function() {
	this.initialize(img.bullet);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,75,25);


(lib.bullet2 = function() {
	this.initialize(img.bullet2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,125,25);


(lib.china = function() {
	this.initialize(img.china);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,185);


(lib.edw = function() {
	this.initialize(img.edw);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,40,68);


(lib.gun = function() {
	this.initialize(img.gun);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,39,30);


(lib.gun3 = function() {
	this.initialize(img.gun3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.ino = function() {
	this.initialize(img.ino);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,23,37);


(lib.movement2 = function() {
	this.initialize(img.movement2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.myShip2 = function() {
	this.initialize(img.myShip2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,465,400);


(lib.right_btn = function() {
	this.initialize(img.right_btn);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,49,32);


(lib.shipkadavr = function() {
	this.initialize(img.shipkadavr);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.shipkadavr1 = function() {
	this.initialize(img.shipkadavr1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.shipkadavr2 = function() {
	this.initialize(img.shipkadavr2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.weffwef = function() {
	this.initialize(img.weffwef);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,123,58);


(lib.Tween1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.china();
	this.instance.setTransform(-18.2,56,0.56,0.56,-133.5);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-56.8,-55.9,113.7,112);


(lib.Symbol8 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.ino();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,23,37);


(lib.Symbol7 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.gun();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,39,30);


(lib.Symbol6 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.edw();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,40,68);


(lib.Symbol5 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.weffwef();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,123,58);


(lib.Symbol4 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.body();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,111,170);


(lib.NitroFlame = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(255,0,0,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(11.2,47.2,0.633,0.734);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,22.4,94.4);


(lib.Enemy = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.shipkadavr();

	this.instance_1 = new lib.shipkadavr1();

	this.instance_2 = new lib.shipkadavr2();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.Bullet2 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bullet2();
	this.instance.setTransform(0,0,0.424,0.424);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,53,10.6);


(lib.Bullet = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bullet();
	this.instance.setTransform(0,0,0.165,0.088);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,12.4,2.2);


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
	this.instance = new lib.movement2();
	this.instance.setTransform(10.3,-33.3,0.327,0.327);

	// Layer 4
	this.instance_1 = new lib.gun3();
	this.instance_1.setTransform(5.5,-33.3,0.327,0.327);

	// Layer 1
	this.instance_2 = new lib.myShip2();
	this.instance_2.setTransform(0,-34.5,0.327,0.327);

	// Layer 2
	this.fire = new lib.Symbol3();
	this.fire.setTransform(21.9,35.5,1,1,89.3,0,0,13.9,13.8);

	this.addChild(this.fire,this.instance_2,this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-83.8,-34.5,246.3,132.1);


(lib.SheepDrift = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween1("synched",0);
	this.instance.setTransform(56.9,56);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({scaleX:1.09,scaleY:1.09},39).to({startPosition:0},1).to({scaleX:1,scaleY:1},39).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(56.9,56,113.7,112);


(lib.EnemyDestroy = function() {
	this.initialize();

	// Layer 2
	this.instance = new lib.Symbol7();
	this.instance.setTransform(42.5,34,1,1,0,0,0,19.5,15);

	// Layer 3
	this.instance_1 = new lib.Symbol4();
	this.instance_1.setTransform(78.5,96.5,1,1,0,0,0,55.5,85);

	// Layer 4
	this.instance_2 = new lib.Symbol6();
	this.instance_2.setTransform(26.5,107.5,1,1,0,0,0,20,34);

	// Layer 1
	this.instance_3 = new lib.Symbol8();
	this.instance_3.setTransform(122.5,97,1,1,0,0,0,11.5,18.5);

	// Layer 5
	this.instance_4 = new lib.Symbol5();
	this.instance_4.setTransform(138.5,107.5,1,1,0,0,0,61.5,29);

	this.addChild(this.instance_4,this.instance_3,this.instance_2,this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(6.5,11.5,193.5,170);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;