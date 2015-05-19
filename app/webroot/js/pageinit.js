(function() {

  $(document).on("pageshow", "#geolocationDemo", function() {
    mooredatabase.geolocation_initialize_map();
    mooredatabase.geolocation_initialize();
  });

  $(document).on("pageshow", "#settings", function() {
    return $('.featureMethod').each(function(index) {
      var featureSupported;
      featureSupported = eval("Modernizr." + $(this).attr('id'));
      if (featureSupported) {
        $(this).html('<img src="/img/Green-Circle-32.png" alt="Feature supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text());
      } else {
        $(this).html('<img src="/img/Red-Circle-32.png" alt="Feature not supported" height="20px" style="vertical-align:middle" />&nbsp;' + $(this).text());
      }
    });
  });

  $(document).on("pageshow", "#speciesDialog", function() {
    var speciesId;
    speciesId = $('#speciesId').val();
    $.ajax({
      type: 'GET',
      url: '/api/sightings_by_month/' + speciesId,
      dataType: 'json',
      success: function(data) {
        // mooredatabase.drawChartSpeciesSightingsByMonth(data);
      }
    });
  });

}).call(this);
