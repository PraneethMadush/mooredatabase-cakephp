'use strict'

window.mooredatabase = {}

# make this map variable visible to entire namespace
mooredatabase.geolocation_map = null
geolocation_initialize_map = ->
  myOptions = 
    zoom : 4
    mapTypeControl : false
    streetViewControl : false
    navigationControl : true
    navigationControlOptions : {
      style : google.maps.NavigationControlStyle.SMALL
    }
    mapTypeId : google.maps.MapTypeId.ROADMAP
  mooredatabase.geolocation_map = new google.maps.Map(document.getElementById("map_canvas"), myOptions)
  true
mooredatabase.geolocation_initialize_map = geolocation_initialize_map
  
geolocation_initialize = ->
  if geo_position_js.init()
    $('#current').html("Receiving...")
    geo_position_js.getCurrentPosition mooredatabase.geolocation_show_position, ->
      document.getElementById('current').innerHTML = "Couldn't get location"
    { enableHighAccuracy : true }
  else
    $('#current').html("Functionality not available")
  true
mooredatabase.geolocation_initialize = geolocation_initialize

geolocation_show_position  = (p) ->
  $('#current').html("Latitude " + p.coords.latitude.toFixed(2) + " Longitude " + p.coords.longitude.toFixed(2))
  pos = new google.maps.LatLng(p.coords.latitude, p.coords.longitude)
  mooredatabase.geolocation_map.setCenter(pos)
  mooredatabase.geolocation_map.setZoom(14)
  marker = new google.maps.Marker {
    position : pos,
    map : mooredatabase.geolocation_map,
    title : 'You are here'
  }
  true
mooredatabase.geolocation_show_position = geolocation_show_position