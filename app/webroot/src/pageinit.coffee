$(document).on "pageshow", "#geolocationDemo", ->
	# use geolocation and show location on map
	mooredatabase.geolocation_initialize_map()
	mooredatabase.geolocation_initialize()
	return

$(document).on "pageshow", "#settings", ->
	$('.featureMethod').each (index) ->
		featureSupported = eval("Modernizr." + $(@).attr('id'))
		if featureSupported
			$(this).html('<img src="/img/Green-Circle-32.png" alt="Feature supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text())
		else
			$(this).html('<img src="/img/Red-Circle-32.png" alt="Feature not supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text())
  return
  
# draw chart when Sightings By Month page loads
$(document).on "pageshow", "#speciesDialog", ->
  speciesId = $('#speciesId').val()
  $.ajax
    type : 'GET'
    url : '/api/sightings_by_month/' + speciesId
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartSpeciesSightingsByMonth(data)
      return
  return