(function() {

  $(document).on("pageshow", "#youtube", function() {
    $.getJSON('http://gdata.youtube.com/feeds/users/893TheCurrent/uploads?alt=json-in-script&amp;max-results=30&callback=?', function(data) {
      mooredatabase.listVideos(data);
    });
  });

  $(document).on("pageshow", "#graphicsDemo", function() {
    if (Modernizr.canvas) mooredatabase.initAnimation();
  });

  $(document).on("pagehide", "#graphicsDemo", function() {
    if (Modernizr.canvas) mooredatabase.stopAnimation();
  });

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

  $(document).on("pageshow", "#index", function() {
    $.ajax({
      type: 'GET',
      url: '/reports/species_by_year_json',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByYear(data);
      }
    });
  });

  $(document).on("pageshow", "#birdingLocations", function() {
    $.ajax({
      type: 'GET',
      url: '/reports/species_by_county_json',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByCounty(data);
      }
    });
  });

  $(document).on("pageshow", "#speciesByMonth", function() {
    $.ajax({
      type: 'GET',
      url: '/reports/species_by_month_json',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByMonth(data);
      }
    });
  });

  $(document).on("pageshow", "#speciesDialog", function() {
    var speciesId;
    speciesId = $('#speciesId').val();
    $.ajax({
      type: 'GET',
      url: '/reports/sightings_by_month/' + speciesId,
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesSightingsByMonth(data);
      }
    });
  });

  $(document).on("pageshow", "#speciesByOrder", function() {
    $.ajax({
      type: 'GET',
      url: '/reports/species_by_order_json',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByOrder(data);
      }
    });
  });

  $(document).on('pageshow', '#slideshow1', function(e) {
    var currentPage, options, photoSwipeInstance;
    currentPage = $(e.target);
    options = {};
    photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options, currentPage.attr('id'));
  });

  $(document).on('pagehide', '#slideshow1', function(e) {
    var currentPage, photoSwipeInstance;
    currentPage = $(e.target);
    photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));
    if (photoSwipeInstance != null) PhotoSwipe.detatch(photoSwipeInstance);
  });

}).call(this);
