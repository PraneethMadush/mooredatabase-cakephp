// Generated by CoffeeScript 1.6.3
(function() {
  var Draw, Flake, Update, addFlake, animate, blank, bufferCanvas, bufferCanvasCtx, canvas, context, flakeArray, flakeTimer, fontColor, frameRate, initAnimation, maxFlakes, maxFontSize, minFontSize, newFlakeInterval, refreshIntervalId, startY, stopAnimation;

  canvas = null;

  context = null;

  bufferCanvas = null;

  bufferCanvasCtx = null;

  flakeArray = [];

  flakeTimer = null;

  maxFlakes = 45;

  fontColor = 0;

  minFontSize = 8;

  maxFontSize = 36;

  startY = -37;

  newFlakeInterval = 200;

  frameRate = 30;

  refreshIntervalId = 0;

  Flake = function() {
    this.x = Math.round(Math.random() * context.canvas.width);
    this.y = startY;
    this.drift = Math.random();
    this.speed = Math.round(Math.random() * 5) + 1;
    this.fontSize = Math.round(Math.random() * (maxFontSize - minFontSize)) + minFontSize;
    this.font = "bold " + this.fontSize + "px Arial";
    this.length = 100;
    if (fontColor < 3) {
      fontColor++;
    } else {
      fontColor = 1;
    }
    switch (fontColor) {
      case 1:
        this.color = "#000";
        this.text = "MOORE";
        break;
      case 2:
        this.color = "#F60";
        this.text = "+";
        break;
      case 3:
        this.color = "#777";
        this.text = "DATABASE";
        break;
    }
    return true;
  };

  initAnimation = function() {
    canvas = document.getElementById('myCanvas');
    if (canvas && canvas.getContext) {
      context = canvas.getContext("2d");
      bufferCanvas = document.createElement("canvas");
      if (typeof G_vmlCanvasManager !== "undefined" && G_vmlCanvasManager !== null) {
        G_vmlCanvasManager.initElement(bufferCanvas);
      }
      bufferCanvasCtx = bufferCanvas.getContext("2d");
      bufferCanvasCtx.canvas.width = context.canvas.width;
      bufferCanvasCtx.canvas.height = context.canvas.height;
      flakeTimer = setInterval(addFlake, newFlakeInterval);
      Draw();
      return refreshIntervalId = setInterval(animate, frameRate);
    } else {
      return $('#myCanvasDiv1').attr('style', 'display:none');
    }
  };

  mooredatabase.initAnimation = initAnimation;

  addFlake = function() {
    flakeArray[flakeArray.length] = new Flake();
    if (flakeArray.length === maxFlakes) {
      return clearInterval(flakeTimer);
    }
  };

  blank = function() {
    bufferCanvasCtx.fillStyle = "white";
    return bufferCanvasCtx.fillRect(0, 0, bufferCanvasCtx.canvas.width, bufferCanvasCtx.canvas.height);
  };

  animate = function() {
    Update();
    return Draw();
  };

  stopAnimation = function() {
    var returnValue;
    returnValue = clearTimeout(refreshIntervalId);
    flakeArray.length = 0;
    bufferCanvasCtx = null;
    context = null;
    canvas = null;
    return bufferCanvas = null;
  };

  mooredatabase.stopAnimation = stopAnimation;

  Update = function() {
    var i, _i, _ref, _results;
    _results = [];
    for (i = _i = 0, _ref = flakeArray.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {
      if (flakeArray[i].y < context.canvas.height) {
        flakeArray[i].y += flakeArray[i].speed;
      }
      if (flakeArray[i].y >= context.canvas.height) {
        flakeArray[i].y = startY;
      }
      flakeArray[i].x += flakeArray[i].drift;
      if (flakeArray[i].x > context.canvas.width) {
        _results.push(flakeArray[i].x = -flakeArray[i].length);
      } else {
        _results.push(void 0);
      }
    }
    return _results;
  };

  Draw = function() {
    var i, _i, _ref;
    context.save();
    blank();
    for (i = _i = 0, _ref = flakeArray.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {
      flakeArray[i].length = bufferCanvasCtx.measureText(flakeArray[i].text).width;
      bufferCanvasCtx.fillStyle = flakeArray[i].color;
      bufferCanvasCtx.font = flakeArray[i].font;
      bufferCanvasCtx.fillText(flakeArray[i].text, flakeArray[i].x, flakeArray[i].y);
    }
    context.drawImage(bufferCanvas, 0, 0, bufferCanvas.width, bufferCanvas.height);
    context.restore();
    return true;
  };

}).call(this);
