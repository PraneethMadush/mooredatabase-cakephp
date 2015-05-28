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

# draw chart when home page loads
$(document).on "pageshow", "#index", ->
  $.ajax
    type : 'GET'
    url : '/api/species_by_year'
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartSpeciesByYear(data)
      return
  return

# draw chart when home page loads
$(document).on "pageshow", "#birdingLocations", ->
  $.ajax
    type : 'GET'
    url : '/api/species_by_county'
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartSpeciesByCounty(data)
      return
  return
          	
# draw chart when Species By Month page loads
$(document).on "pageshow", "#speciesByMonth", ->
  $.ajax
    type : 'GET'
    url : '/api/species_by_month'
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartSpeciesByMonth(data)
      speciesByMonthView = {species: data}
      template = $('#speciesByMonthTemplate').html()
      Mustache.parse(template)
      rendered = Mustache.render(template, speciesByMonthView)
      $('#speciesByMonthContent').html(rendered)
      $('#speciesByMonthListView').listview().listview('refresh') 
      return
  return
  
$(document).on "pageshow", "#topTwenty", ->
  $.ajax
    type : 'GET'
    url : '/api/top_twenty'
    dataType : 'json'
    success : (data) ->
      topTwentyView = {species: data}
      template = $('#topTwentyTemplate').html()
      Mustache.parse(template)
      rendered = Mustache.render(template, topTwentyView)
      $('#topTwentyContent').html(rendered)
      $('#topTwentyListView').listview().listview('refresh') 
      return
  return  
  
 $(document).on "pageshow", "#speciesAll", ->
  $.ajax
    type : 'GET'
    url : '/api/species_all'
    dataType : 'json'
    success : (data) ->
      speciesAllView = {species: data, count: data.length}
      template = $('#speciesAllTemplate').html()
      Mustache.parse(template)
      rendered = Mustache.render(template, speciesAllView)
      $('#speciesAllContent').html(rendered)
      $('#speciesAllCountListView').listview().listview('refresh')      
      $('#speciesAllListView').listview().listview('refresh')
      return
  return 
  
# draw chart when Species By Month page loads
$(document).on "pageshow", "#twoSpeciesByMonth", ->
  $.ajax
    type : 'GET'
    url : '/api/two_species_by_month'
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartTwoSpeciesByMonth(data)
      return
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
            				
# draw chart when Species By Order page loads
# $(document).on "pageshow", "#speciesByOrder", ->
$(document).on "pageshow", "#speciesByOrder", ->
  $.ajax
    type : 'GET'
    url : '/api/species_by_order'
    dataType : 'json'
    success : (data) ->
      mooredatabase.drawChartSpeciesByOrder(data)
      return
  return