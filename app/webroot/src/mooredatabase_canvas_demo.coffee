# initialize some variables
canvas = null
context = null
bufferCanvas = null
bufferCanvasCtx = null
flakeArray = []
flakeTimer = null
maxFlakes = 45 # 3 words * 15
fontColor = 0
minFontSize = 8
maxFontSize = 36
startY = -37
newFlakeInterval = 200
frameRate = 30
refreshIntervalId = 0

Flake = ->
  this.x = Math.round(Math.random() * context.canvas.width)
  this.y = startY
  this.drift = Math.random()
  this.speed = Math.round(Math.random() * 5) + 1
  # vary the font size
  this.fontSize = Math.round(Math.random() * (maxFontSize - minFontSize)) + minFontSize
  this.font = "bold " + this.fontSize + "px Arial"
  this.length = 100
  # average; updated later with actual length
  # alternate color of font
  if fontColor < 3
    fontColor++
  else
    fontColor = 1

  switch fontColor
    when 1
      this.color = "#000"
      this.text = "MOORE"
      break
    when 2
      this.color = "#F60"
      this.text = "+"
      break
    when 3
      this.color = "#777"
      this.text = "DATABASE"
      break
  true

initAnimation = ->
	# so non-IE won't freak out about initElement()
	# below
	canvas = document.getElementById('myCanvas')
	if canvas and canvas.getContext
		context = canvas.getContext("2d")

		# set up the buffering canvas
		bufferCanvas = document.createElement("canvas")
		if G_vmlCanvasManager?
			G_vmlCanvasManager.initElement(bufferCanvas)
		bufferCanvasCtx = bufferCanvas.getContext("2d")
		bufferCanvasCtx.canvas.width = context.canvas.width
		bufferCanvasCtx.canvas.height = context.canvas.height

		# set interval at which new flakes are added
		flakeTimer = setInterval(addFlake, newFlakeInterval)

		Draw()

		# set frame rate of 30ms per frame
		refreshIntervalId = setInterval(animate, frameRate)
	else
		$('#myCanvasDiv1').attr('style', 'display:none')
mooredatabase.initAnimation = initAnimation

addFlake = ->
	flakeArray[flakeArray.length] = new Flake()
	if flakeArray.length is maxFlakes
		clearInterval(flakeTimer)

blank = ->
	bufferCanvasCtx.fillStyle = "white"
	bufferCanvasCtx.fillRect(0, 0, bufferCanvasCtx.canvas.width, bufferCanvasCtx.canvas.height)

animate = ->
	Update()
	Draw()

stopAnimation = ->
	returnValue = clearTimeout(refreshIntervalId)
	flakeArray.length = 0
	bufferCanvasCtx = null
	context = null
	canvas = null
	bufferCanvas = null
mooredatabase.stopAnimation = stopAnimation

Update = ->
  for i in [0...flakeArray.length]
    if flakeArray[i].y < context.canvas.height
      flakeArray[i].y += flakeArray[i].speed
    if flakeArray[i].y >= context.canvas.height
      flakeArray[i].y = startY
    flakeArray[i].x += flakeArray[i].drift
    if flakeArray[i].x > context.canvas.width
      flakeArray[i].x = -flakeArray[i].length
  		# so word is entirely
  		# off canvas

Draw = ->
  context.save()
  blank()

  for i in [0...flakeArray.length]
    # draw a simple text string using the default settings
    flakeArray[i].length = bufferCanvasCtx.measureText(flakeArray[i].text).width
    bufferCanvasCtx.fillStyle = flakeArray[i].color
    bufferCanvasCtx.font = flakeArray[i].font
    bufferCanvasCtx.fillText(flakeArray[i].text, flakeArray[i].x, flakeArray[i].y)

  # copy the entire rendered image from the buffer canvas to the visible one
  context.drawImage(bufferCanvas, 0, 0, bufferCanvas.width, bufferCanvas.height)
  context.restore()
  true