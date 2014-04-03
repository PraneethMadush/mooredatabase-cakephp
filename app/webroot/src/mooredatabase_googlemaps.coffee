initialize_map = (latitude, longitude, zoomLevel, mapElement, mapType) ->
  map = new google.maps.Map document.getElementById(mapElement),
    zoom : zoomLevel
    center : new google.maps.LatLng(latitude, longitude)
    mapTypeId : mapType
    options : 
      panControl : false
      zoomControl : true
      mapTypeControl : false
      scaleControl : false
      streetViewControl : false
      overviewMapControl : false
  marker = new google.maps.Marker
    position : new google.maps.LatLng(latitude, longitude)
    map : map
    title : latitude.toFixed(3) + " " + longitude.toFixed(3)
  true
mooredatabase.initialize_map = initialize_map