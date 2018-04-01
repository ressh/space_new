(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 6
	this.back = new lib.Symbol1();
	this.back.setTransform(10,11,1,1,0,0,0,10,11);

	this.addChild(this.back);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,20,22);


// symbols:
(lib._12 = function() {
	this.initialize(img._12);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,50,80);


(lib.arrow = function() {
	this.initialize(img.arrow);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,200,111);


(lib.aw_asteroids_0 = function() {
	this.initialize(img.aw_asteroids_0);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,100,100);


(lib.OpenArrowBtn = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.aw_asteroids_0();
	this.instance.setTransform(-50.9,-50.9);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("Am9A0QgRgTAAghQgBgSAHgPQAEgKAIgIQAIgJAKgDQAMgGARAAQAeAAASATQASATAAAfQAAAggRAUQgTASgeAAQgeAAgSgSgAmogiQgLAMAAAWQAAAXALAMQALALAQAAQAQAAALgLQALgNAAgWQAAgWgLgMQgKgLgRAAQgRgBgKAMgAFeBEIAAiGIAbAAIAAA2IAlAAQAaAAAMAMQAMAKgBARQABAOgIAKQgHAKgJADQgJAEgRAAgAF5AsIAbAAIASgBQAFgBAEgFQAEgEAAgGQAAgKgHgEQgGgEgQgBIgdAAgAEIBEIAAhwIgpAAIAAgWIBsAAIAAAWIgnAAIAABwgACxBEIAAiGIAcAAIAACGgAAwBEIAAiGIAcAAIAAA2IAlAAQANAAALAEQAKADAIAJQAGAKAAANQAAAOgGAKQgIAKgJADQgIAEgRAAgABMAsIAbAAIARgBQAGgBADgFQAEgEAAgGQAAgJgGgFQgHgEgQgBIgcAAgAhNBEIAAiGIAsAAQAZAAAHACQAKACAIALQAIAKAAAQQAAANgEAJQgFAGgHAFQgHAEgFACQgKACgTAAIgRAAIAAA0gAgxgFIAOAAQARAAAFgCQAGgCADgFQACgEAAgHQAAgGgDgFQgFgFgHgCIgUgBIgMAAgAh9BEIgQgjIgCgEIgDgGQgGgKgDgDQgEgCgGAAIAAA8IgbAAIAAiGIAbAAIAAA5QAJAAADgFQADgDAHgSQAJgWAIgFQAJgGATAAIAEAAIAAAVIgEAAQgJAAgEACQgDACgDAEIgHASIgFAMQgDAFgHAEQAIAAAGAIQAGAIAIAOIASAmgAkXBEIAAhwIgoAAIAAgWIBsAAIAAAWIgoAAIAABwg");
	this.shape.setTransform(-2.7,60.4);

	this.addChild(this.shape,this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-50.9,-50.9,100,118.5);


(lib.Symbol1 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("rgba(69,69,69,0.008)").s().p("AhjBtIAAjaIDGAAIAADag");
	this.shape.setTransform(10,11);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,20,22);


(lib.Money = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.arrow();
	this.instance.setTransform(27,14.9,0.27,0.27,180);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-26.9,-15,54,30);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;