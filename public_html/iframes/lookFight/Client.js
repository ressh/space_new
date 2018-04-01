(function (lib, img, cjs) {

var p; // shortcut to reference prototypes

// stage content:
(lib.Client = function() {
	this.initialize();

	// Layer 6
	this.lay = new lib.Symbol6();
	this.lay.setTransform(470,375,1,1,0,0,0,470,375);

	this.addChild(this.lay);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,940,750);


// symbols:
(lib.asterOskol = function() {
	this.initialize(img.asterOskol);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,3,3);


(lib.back = function() {
	this.initialize(img.back);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,940,750);


(lib.bang2 = function() {
	this.initialize(img.bang2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,240,40);


(lib.Bitmap17 = function() {
	this.initialize(img.Bitmap17);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,9,8);


(lib.Bitmap18 = function() {
	this.initialize(img.Bitmap18);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,480,400);


(lib.Bitmap27 = function() {
	this.initialize(img.Bitmap27);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,412,128);


(lib.Bitmfew16 = function() {
	this.initialize(img.Bitmfew16);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,7,8);


(lib.bullet2 = function() {
	this.initialize(img.bullet2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,125,25);


(lib.callcentericons = function() {
	this.initialize(img.callcentericons);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,192,214);


(lib.fwefwe = function() {
	this.initialize(img.fwefwe);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,6,7);


(lib.message_icon_blasters = function() {
	this.initialize(img.message_icon_blasters);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.message_icon_flag = function() {
	this.initialize(img.message_icon_flag);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.message_icon_swords = function() {
	this.initialize(img.message_icon_swords);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.window = function() {
	this.initialize(img.window);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,560,335);


(lib.WindowStrategy = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.window();
	this.instance.setTransform(-269.9,-161.9,0.964,0.964);

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-269.9,-161.9,540,323.1);


(lib.Symbol15 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Bitmap27();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance,p:{scaleX:1,scaleY:1,x:0,y:0}}]}).to({state:[{t:this.instance,p:{scaleX:1.1,scaleY:1.1,x:-20.5,y:-6.3}}]},1).to({state:[{t:this.instance,p:{scaleX:0.95,scaleY:0.95,x:10.3,y:3.2}}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,412,128);


(lib.Symbol14 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.message_icon_flag();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance,p:{scaleX:1,scaleY:1,x:0,y:0}}]}).to({state:[{t:this.instance,p:{scaleX:1.1,scaleY:1.1,x:-6.3,y:-6.3}}]},1).to({state:[{t:this.instance,p:{scaleX:0.95,scaleY:0.95,x:3.2,y:3.2}}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.Symbol13 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.message_icon_swords();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance,p:{scaleX:1,scaleY:1,x:0,y:0}}]}).to({state:[{t:this.instance,p:{scaleX:1.1,scaleY:1.1,x:-6.3,y:-6.3}}]},1).to({state:[{t:this.instance,p:{scaleX:0.95,scaleY:0.95,x:3.2,y:3.2}}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.Symbol8 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.message_icon_blasters();

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance,p:{scaleX:1,scaleY:1,x:0,y:0}}]}).to({state:[{t:this.instance,p:{scaleX:1.1,scaleY:1.1,x:-6.3,y:-6.3}}]},1).to({state:[{t:this.instance,p:{scaleX:0.95,scaleY:0.95,x:3.2,y:3.2}}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,128,128);


(lib.Symbol6 = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.back();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,940,750);


(lib.Symbol5 = function() {
	this.initialize();

	// Layer 2
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(0,0,0,0)","rgba(255,255,255,0.188)","#151515","#151515","#151515"],[0.267,1,1,1,1],-71,0,71.1,0).s().p("An1H2QjRjQABkmQgBklDRjRQDQjPElgBQEmABDQDPQDQDRABElQgBEmjQDQQjQDRkmgBQklABjQjRg");
	this.shape.setTransform(223.4,103.6);

	// Layer 1
	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.lf(["rgba(0,0,0,0)","#0033FF","#151515","#151515","#151515"],[0.267,1,1,1,1],-165.7,0,165.8,0).s().p("AySLYQnmkuAAmqQAAmpHmkvQHlktKtAAQKuAAHlEtQHmEvAAGpQAAGqnmEuQnlEuquAAQqtAAnlkug");
	this.shape_1.setTransform(140.5,103.1);

	this.addChild(this.shape_1,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-25.2,0,331.5,206.2);


(lib.Symbol4 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("rgba(0,153,102,0.008)").s().p("Ar9JJIAAyRIX6AAIAASRg");
	this.shape.setTransform(76.6,58.5);

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,153.2,117);


(lib.ScreenFinal = function() {
	this.initialize();

	// Layer 1
	this.instance = new lib.Bitmap18();

	this.addChild(this.instance);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(0,0,480,400);


(lib.Crash = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.asterOskol();
	this.instance.setTransform(-1.5,-1.4);

	this.instance_1 = new lib.Bitmfew16();
	this.instance_1.setTransform(-1.2,-1.3,0.331,0.331);

	this.instance_2 = new lib.Bitmap17();
	this.instance_2.setTransform(-0.9,-0.7,0.189,0.189);

	this.instance_3 = new lib.fwefwe();
	this.instance_3.setTransform(-1,-1.2,0.332,0.332);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).to({state:[{t:this.instance_3}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-1.5,-1.4,3,3);


(lib.ItemStrategy = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.message_icon_blasters();
	this.instance.setTransform(0,0,0.609,0.609);

	this.instance_1 = new lib.message_icon_swords();
	this.instance_1.setTransform(0,0,0.609,0.609);

	this.instance_2 = new lib.message_icon_flag();
	this.instance_2.setTransform(0,0,0.609,0.609);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance_1}]},1).to({state:[{t:this.instance_2}]},1).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,78,78);


(lib.Fire = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["#FF0000","rgba(21,21,21,0)","#151515","#151515","#151515"],[0,1,1,1,1],0,0,0,0,0,36.2).s().p("Aj9D+QhphqgBiUQABiUBphpQBphpCUgBQCUABBqBpQBqBpgBCUQABCUhqBqQhqBqiUgBQiUABhphqg");
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


(lib.ShineShape_mc_inside1 = function() {
	this.initialize();

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgJAHIhOADIBMgKIgChQIANBQIBYAAIhYAHIADBJg");

	this.addChild(this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-8.7,-8,17.6,16.2);


(lib.Smoke = function() {
	this.initialize();

	// Слой 2
	this.shape = new cjs.Shape();
	this.shape.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],0,0,0,0,0,28.4).s().p("AjEDEQhRhRgBhzQABgrAMgoQATg/AygyQBShSByAAQBzAABRBSIANAOQBFBNAABpQAABzhSBRQgRASgSANQgfAXgkANQgXAIgaAEQgWAEgXgBQhyAAhShSg");
	this.shape.setTransform(-4.2,-28.4);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],-4.3,0,0,-4.3,0,24.8).s().p("AgrD3QhbAAhDg6QASgNARgSQBShRAAhyQAAhqhFhNQAygaA8AAQBlABBIBHQBIBJAABlQAABKgmA7QgPAWgTATQhGBGhhADIgGAAg");
	this.shape_1.setTransform(32.1,-24.6);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],0.6,0,0,0.6,0,28.9).s().p("AjADGQgVgVgQgXQguhEAAhWQAAh1BThSQBDhEBagMQgMAoAAAsQAAB0BQBPQBSBSBzAAQAYAAAWgDQgTBCg0A1QhTBSh1AAQhzAAhShSg");
	this.shape_2.setTransform(-27.3,-8.8);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],0,-5.4,0,0,-5.4,34).s().p("AjrC1QhihiAAiJQgBhKAdg/QAPAXAVAVQBTBSB0AAQB0AABShSQA0g1AThCQAagEAXgIQA0A5AVBGQANAuAAAzQABCJhjBiQhSBThwANQgVACgVAAQiJAAhihig");
	this.shape_3.setTransform(-19.6,25.8);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],-0.2,0,0,-0.2,0,37.5).s().p("AkIEGQhVhUgThvQBwgNBThQQBihiAAiLQAAg0gOguQAqgJAuAAIAcABQCHAJBiBjQBTBSATBtQAHAiAAAkQAACZhtBtQhtBtiYAAQiaAAhthtg");
	this.shape_4.setTransform(21.5,46.8);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.rf(["#000000","rgba(0,0,0,0)"],[0,1],-0.1,0.6,0,-0.1,0.6,26.3).s().p("AgZA/QhihgiGgKQAJg1AfgsQBjgCBGhGQATgUAPgWIANAAQBqAABNBNQBMBMAABqQAABshMBNQgvAvg7ASQgUhthRhTg");
	this.shape_5.setTransform(50.1,14.1);

	// Слой 1
	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.rf(["#333333","rgba(0,0,0,0)"],[0,1],0,0,0,0,0,81.3).s().p("Ao2I2QjqjqgBlMQABlKDqjsQDsjqFKgBQFMABDqDqQDsDsgBFKQABFMjsDqQjqDslMgBQlKABjsjsg");
	this.shape_6.setTransform(2.8,4.8);

	this.addChild(this.shape_6,this.shape_5,this.shape_4,this.shape_3,this.shape_2,this.shape_1,this.shape);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-77.3,-75.3,160.4,160.4);


(lib.WindowBtns = function() {
	this.initialize();

	// Layer 2
	this.btnAdd = new lib.Symbol15();
	this.btnAdd.setTransform(7,43,1,1,0,0,0,206,64);
	this.btnAdd.visible = false;
	new cjs.ButtonHelper(this.btnAdd, 0, 1, 2);

	// Layer 1
	this.btn3 = new lib.Symbol14();
	this.btn3.setTransform(97,-20.9);
	new cjs.ButtonHelper(this.btn3, 0, 1, 2);

	this.btn2 = new lib.Symbol13();
	this.btn2.setTransform(3,43,1,1,0,0,0,64,64);
	new cjs.ButtonHelper(this.btn2, 0, 1, 2);

	this.btn1 = new lib.Symbol8();
	this.btn1.setTransform(-156.9,43,1,1,0,0,0,64,64);
	new cjs.ButtonHelper(this.btn1, 0, 1, 2);

	// Layer 3
	this.instance = new lib.window();
	this.instance.setTransform(-269.9,-162.5,0.964,0.964);

	this.addChild(this.instance,this.btn1,this.btn2,this.btn3,this.btnAdd);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-269.9,-162.5,540,323.1);


(lib.ShepFly = function() {
	this.initialize();

	// Layer 6
	this.defend = new lib.Symbol5();
	this.defend.setTransform(23.9,-1,1,1,0,0,0,165.8,103.1);

	// Layer 1
	this.back_layer = new lib.Symbol4();
	this.back_layer.setTransform(12.9,-27.1,1,1,0,0,0,76.6,58.5);

	// Layer 5
	this.layer = new lib.Symbol4();
	this.layer.setTransform(12.9,-27.1,1,1,0,0,0,76.6,58.5);

	this.addChild(this.layer,this.back_layer,this.defend);
}).prototype = p = new cjs.Container();
p.nominalBounds = new cjs.Rectangle(-167.1,-104.1,331.5,206.2);


(lib.Star = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 2
	this.instance = new lib.ShineShape_mc_inside1();
	this.instance.setTransform(-0.8,-1.1);
	this.instance.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({x:0,y:0,alpha:1},10).to({scaleX:1.6,scaleY:1.6,rotation:-359.9},24,cjs.Ease.get(-0.62)).to({scaleX:0.18,scaleY:0.18,rotation:0},25).wait(1));

	// Layer 1
	this.instance_1 = new lib.ShineShape_mc_inside1();
	this.instance_1.setTransform(1.6,2);
	this.instance_1.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).to({x:0,y:0,alpha:1},10).to({scaleX:0.18,scaleY:0.18,rotation:360},49).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-10.4,-10.3,22.5,22.5);

})(lib = lib||{}, images = images||{}, createjs = createjs||{});
var lib, images, createjs;