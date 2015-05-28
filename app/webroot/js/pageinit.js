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

  $(document).on("pageshow", "#index", function() {
    $.ajax({
      type: 'GET',
      url: '/api/species_by_year',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByYear(data);
      }
    });
  });

  $(document).on("pageshow", "#birdingLocations", function() {
    $.ajax({
      type: 'GET',
      url: '/api/species_by_county',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByCounty(data);
      }
    });
  });

  $(document).on("pageshow", "#speciesByMonth", function() {
    $.ajax({
      type: 'GET',
      url: '/api/species_by_month',
      dataType: 'json',
      success: function(data) {
        var rendered, speciesByMonthView, template;
        mooredatabase.drawChartSpeciesByMonth(data);
        speciesByMonthView = {
          species: data
        };
        template = $('#speciesByMonthTemplate').html();
        Mustache.parse(template);
        rendered = Mustache.render(template, speciesByMonthView);
        $('#speciesByMonthContent').html(rendered);
        $('#speciesByMonthListView').listview().listview('refresh');
      }
    });
  });

  $(document).on("pageshow", "#topTwenty", function() {
    $.ajax({
      type: 'GET',
      url: '/api/top_twenty',
      dataType: 'json',
      success: function(data) {
        var rendered, template, topTwentyView;
        topTwentyView = {
          species: data
        };
        template = $('#topTwentyTemplate').html();
        Mustache.parse(template);
        rendered = Mustache.render(template, topTwentyView);
        $('#topTwentyContent').html(rendered);
        $('#topTwentyListView').listview().listview('refresh');
      }
    });
  });

  $(document).on("pageshow", "#speciesAll", function() {
    $.ajax({
      type: 'GET',
      url: '/api/species_all',
      dataType: 'json',
      success: function(data) {
        var rendered, speciesAllView, template;
        speciesAllView = {
          species: data,
          count: data.length
        };
        template = $('#speciesAllTemplate').html();
        Mustache.parse(template);
        rendered = Mustache.render(template, speciesAllView);
        $('#speciesAllContent').html(rendered);
        $('#speciesAllListView').listview().listview('refresh');
        $('#speciesAllCountListView').listview().listview('refresh');
      }
    });
  });

  $(document).on("pageshow", "#twoSpeciesByMonth", function() {
    $.ajax({
      type: 'GET',
      url: '/api/two_species_by_month',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartTwoSpeciesByMonth(data);
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
        mooredatabase.drawChartSpeciesSightingsByMonth(data);
      }
    });
  });

  $(document).on("pageshow", "#speciesByOrder", function() {
    $.ajax({
      type: 'GET',
      url: '/api/species_by_order',
      dataType: 'json',
      success: function(data) {
        mooredatabase.drawChartSpeciesByOrder(data);
      }
    });
  });

}).call(this);
