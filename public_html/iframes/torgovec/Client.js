(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 3
	this.shipDrift = new lib.shipDrift();
	this.shipDrift.setTransform(203.5,195.2,1,1,0,0,0,56.9,56);

	// Layer 2
	this.shipFly = new lib.ShepFly();
	this.shipFly.setTransform(173.8,224.5,1,1,-133.2,0,0,27.1,9.8);
	this.shipFly.visible = false;

	// Layer 1
	this.instance = new lib.Bitmap1();

	this.addChild(this.instance,this.shipFly,this.shipDrift);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,428,380);


// symbols:
(lib.Bitmap1 = function() {
	this.initialize(img.Bitmap1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,428,380);


(lib.china = function() {
	this.initialize(img.china);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,185);


(lib.left_btn = function() {
	this.initialize(img.left_btn);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,49,32);


(lib.right_btn = function() {
	this.initialize(img.right_btn);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,49,32);


(lib.window = function() {
	this.initialize(img.window);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,560,335);


(lib.Tween1 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.china();
	this.instance.setTransform(-18.2,56,0.56,0.56,-133.5);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-56.8,-55.9,113.7,112);


(lib.NitroFlame = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(70,203,236,0.8)","rgba(104,48,190,0.2)"],[0,1],2.4,-65.2,2.4,66.8).s().p("Ag1JIQgSgugdiCQgZhygakvQgZkqAAipQABhOA3gvQAygpBGABQBHgBAyApQA4AvAABOQgBCxgVEiQgXEygYBvQgdCCgSAuQgYA6gjABQgfgBgYg6g");
	this.shape.setTransform(11.2,47.2,0.633,0.734);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,22.4,94.4);


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
	this.instance = new lib.china();
	this.instance.setTransform(0,0,0.56,0.56);

	// Layer 2
	this.instance_1 = new lib.Symbol3();
	this.instance_1.setTransform(26.8,14.4,1,1,-177.7,0,0,13.9,13.7);

	this.addChild(this.instance_1,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,-91.5,56,195.1);


(lib.shipDrift = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.Tween1("synched",0);
	this.instance.setTransform(56.9,56);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,113.7,112);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;