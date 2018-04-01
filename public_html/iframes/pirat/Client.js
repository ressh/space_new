(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 2
	this.seller = new lib.Symbol10();
	this.seller.setTransform(353.7,140.3,0.578,0.578,0,0,0,80.5,80.5);

	// Layer 3
	this.ship = new lib.ShepFly();
	this.ship.setTransform(-130.9,143.2,1,1,0,0,0,39.2,31.4);

	// Layer 4
	this.generator = new lib.generator();
	this.generator.setTransform(330,143.5,0.387,0.387,0,0,0,27,31);

	// Layer 5 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("EghbAV3MAAAgruMBC3AAAMAAAArug");
	mask.setTransform(214,140);

	// Layer 6
	this.space = new lib.Symbol9();
	this.space.setTransform(1560,140,1,1,0,0,0,1560,140);

	this.space.mask = mask;

	this.addChild(this.space,this.generator,this.ship,this.seller);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-244.5,0,3364.6,280);


// symbols:
(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3120,280);


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


(lib.ship_ruh = function() {
	this.initialize(img.ship_ruh);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,200);


(lib.Symbol12 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,70,189,0.8)","rgba(104,48,190,0.2)"],[0,1],22.5,0.7,-22.8,1.3).s().p("AAEA3QhogHgmgIQgtgJgQgGQgUgIAAgMQgBgKAUgJQAQgGAtgLQAngJBmgKQBmgKA7gBQAbAAAQASQAOASABAZQAAAXgOASQgQAUgbAAIgJABQg7AAhcgHg");
	this.shape.setTransform(22.1,12.5,1,1,0,0,0,0,0.2);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.lf(["rgba(0,224,44,0.8)","rgba(104,48,190,0.2)"],[0,1],17.8,1.6,-18,2).s().p("AADBqQhRgPgfgQQgjgSgNgNQgQgPgBgYQAAgUAQgRQAMgMAkgUQAegSBRgSQBQgSAvAAQAVgBANAmQAMAiAAAvQABAvgLAiQgMAlgVABIgEAAQgvAAhNgNg");
	this.shape_1.setTransform(26.7,12.2,1,1,0,0,0,0,0.2);

	this.addChild(this.shape_1,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,44.2,23.9);


(lib.Symbol9 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.back();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,3120,280);


(lib.NitroFlame = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,0,0,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(11.2,47.2,0.633,0.734);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,22.4,94.4);


(lib.generator = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.item_art_18();
	this.instance.setTransform(-3.9,0,0.62,0.62);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-3.9,0,62,62);


(lib.Bullet = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.bullet2();
	this.instance.setTransform(28,0,0.224,0.224,0,0,180);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,28,5.6);


(lib.Tween2 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.Symbol12();
	this.instance.setTransform(0,0.1,1,1,0,0,0,22.1,12);

	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,0,0,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(4.6,0.4,0.633,0.272,89.3);

	this.addChild(this.shape,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-22,-11.9,44.2,23.9);


(lib.Symbol11 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Tween2("synched",0);
	this.instance.setTransform(44.1,12,1,1,0,0,0,22,0);

	this.timeline.addTween(cjs.Tween.get(this.instance).to({regX:21.5,regY:-0.3,scaleX:0.65,x:43.6,y:11.6},9).to({startPosition:0},1).to({regX:22,regY:0,scaleX:1,x:44.1,y:12},9).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(22.1,12,44.2,23.9);


(lib.Symbol10 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.ship_ruh();
	this.instance.setTransform(0,0,0.805,0.805);

	// Layer 2
	this.instance_1 = new lib.Symbol11();
	this.instance_1.setTransform(-3.1,82.2,1,1,0,0,0,22.1,12);

	this.addChild(this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-25.2,0,186.3,161);


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

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;