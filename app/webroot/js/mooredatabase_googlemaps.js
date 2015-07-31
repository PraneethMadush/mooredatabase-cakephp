(function() {
  'use strict';
  var initialize_map;

  initialize_map = function(latitude, longitude, zoomLevel, mapElement, mapType) {
    var map, marker;
    map = new google.maps.Map(document.getElementById(mapElement), {
      zoom: zoomLevel,
      center: new google.maps.LatLng(latitude, longitude),
      mapTypeId: mapType,
      options: {
        panControl: false,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
      }
    });
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(latitude, longitude),
      map: map,
      title: latitude.toFixed(3) + " " + longitude.toFixed(3)
    });
    return true;
  };

  mooredatabase.initialize_map = initialize_map;

}).call(this);
