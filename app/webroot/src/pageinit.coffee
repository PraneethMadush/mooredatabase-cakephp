$(document).on "pageshow", "#youtube", ->
	$.getJSON 'http://gdata.youtube.com/feeds/users/893TheCurrent/uploads?alt=json-in-script&amp;max-results=30&callback=?',(data) ->
		mooredatabase.listVideos(data)
		true
	true
		
# run Canvas animation when graphics demo page loads, remove it when
# page is not showing to conserve CPU, etc.
$(document).on "pageshow", "#graphicsDemo", ->
	if Modernizr.canvas
		mooredatabase.initAnimation()
	true
		
$(document).on "pagehide", "#graphicsDemo", ->
	if Modernizr.canvas
		mooredatabase.stopAnimation()
	true
		
$(document).on "pageshow", "#geolocationDemo", ->
	# use geolocation and show location on map
	mooredatabase.geolocation_initialize_map()
	mooredatabase.geolocation_initialize()
	true

$(document).on "pageshow", "#settings", ->
	$('.featureMethod').each (index) ->
		featureSupported = eval("Modernizr." + $(@).attr('id'))
		if featureSupported
			$(this).html('<img src="/img/Green-Circle-32.png" alt="Feature supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text())
		else
			$(this).html('<img src="/img/Red-Circle-32.png" alt="Feature not supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text())
  true
	
# draw jqPlot chart when Species By Month page loads
$(document).on "pageshow", "#speciesByMonth", ->
	if Modernizr.canvas
		$.ajax
			type : 'POST'
			url : '/reports/species_by_month_json'
			dataType : 'json'
			success : (data) ->
				mooredatabase.drawChartSpeciesByMonth(data)
  true
				
# draw jqPlot chart when Sightings By Month page loads
$(document).on "pageshow", "#speciesDialog", ->
	if Modernizr.canvas
		speciesId = $('#speciesId').val()
		$.ajax
			type : 'POST'
			url : '/reports/sightings_by_month/' + speciesId
			dataType : 'json'
			success : (data) ->
				mooredatabase.drawChartSpeciesSightingsByMonth(data)
  true
  				
# draw jqPlot chart when Species By Order page loads
$(document).on "pageshow", "#speciesByOrder", ->
	if Modernizr.canvas
		$.ajax
			type : 'POST'
			url : '/reports/species_by_order_json'
			dataType : 'json'
			success : (data) ->
				mooredatabase.drawChartSpeciesByOrder(data)
  true
  				
$(document).on 'pageshow', '#slideshow1', (e) ->
	currentPage = $(e.target)
	options = {}
	photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options, currentPage.attr('id'))
	true
  
$(document).on 'pagehide', '#slideshow1', (e) ->
	currentPage = $(e.target)
	photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'))
	if photoSwipeInstance?
		PhotoSwipe.detatch(photoSwipeInstance)
	true