// Generated by CoffeeScript 1.6.3
(function() {
  $(document).on("pageshow", "#blogrecent", function() {
    $.getJSON('http://wordpress.moore-database.com/?json=recentstories&callback=?', function(data) {
      mooredatabase.listWordpressPosts(data);
      return true;
    });
    return true;
  });

  $(document).on("pageshow", "#blogcategories", function() {
    $.getJSON('http://wordpress.moore-database.com/?json=get_category_index&callback=?', function(data) {
      mooredatabase.listWordpressCategories(data);
      return true;
    });
    return true;
  });

  $(document).on("pageshow", "#tweetsold", function() {
    var refreshID;
    $.getJSON('http://twitter.com/status/user_timeline/stephenmoore56.json?count=30&callback=?', function(data) {
      mooredatabase.listTweets(data);
      return true;
    });
    refreshID = setInterval(function() {
      $.getJSON('http://twitter.com/status/user_timeline/stephenmoore56.json?count=30&callback=?', function(data) {
        mooredatabase.listTweets(data);
        return true;
      });
      return true;
    }, 15000);
    return true;
  });

  $(document).on("pageshow", "#tweets", function() {
    var refreshID;
    $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=false&include_rts=false&screen_name=stephenmoore56&count=30&callback=?', function(data) {
      mooredatabase.listTweets(data);
      return true;
    });
    refreshID = setInterval(function() {
      $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=stephenmoore56&count=30&callback=?', function(data) {
        mooredatabase.listTweets(data);
        return true;
      });
      return true;
    }, 15000);
    return true;
  });

  $(document).on("pageshow", "#youtube", function() {
    $.getJSON('http://gdata.youtube.com/feeds/users/893TheCurrent/uploads?alt=json-in-script&amp;max-results=30&callback=?', function(data) {
      mooredatabase.listVideos(data);
      return true;
    });
    return true;
  });

  $(document).on("pageshow", "#graphicsDemo", function() {
    if (Modernizr.canvas) {
      mooredatabase.initAnimation();
    }
    return true;
  });

  $(document).on("pagehide", "#graphicsDemo", function() {
    if (Modernizr.canvas) {
      mooredatabase.stopAnimation();
    }
    return true;
  });

  $(document).on("pageshow", "#geolocationDemo", function() {
    mooredatabase.geolocation_initialize_map();
    mooredatabase.geolocation_initialize();
    return true;
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
      return true;
    });
  });

  $(document).on('change mousedown', "input:radio[name='theme']", function(event) {
    var pageTheme;
    pageTheme = $("input:radio[name='theme']:checked").val();
    $.cookie("theme", pageTheme, {
      expires: 365
    });
    return true;
  });

  $(document).on("pageshow", "#speciesByMonth", function() {
    if (Modernizr.canvas) {
      $.ajax({
        type: 'POST',
        url: 'species_by_month.php',
        dataType: 'json',
        success: function(data) {
          return mooredatabase.drawChartSpeciesByMonth(data);
        }
      });
      return true;
    }
  });

  $(document).on("pageshow", "#speciesDialog", function() {
    var speciesId;
    if (Modernizr.canvas) {
      speciesId = $('#speciesId').val();
      $.ajax({
        type: 'POST',
        url: 'sightings_by_month.php?id=' + speciesId,
        dataType: 'json',
        success: function(data) {
          return mooredatabase.drawChartSpeciesByMonth(data);
        }
      });
      return true;
    }
  });

  $(document).on("pageshow", "#speciesByOrder", function() {
    if (Modernizr.canvas) {
      $.ajax({
        type: 'POST',
        url: 'species_by_order.php',
        dataType: 'json',
        success: function(data) {
          return mooredatabase.drawChartSpeciesByOrder(data);
        }
      });
      return true;
    }
  });

  $(document).on('pageshow', '#slideshow1', function(e) {
    var currentPage, options, photoSwipeInstance;
    currentPage = $(e.target);
    options = {};
    photoSwipeInstance = $("ul.gallery a", e.target).photoSwipe(options, currentPage.attr('id'));
    return true;
  });

  $(document).on('pagehide', '#slideshow1', function(e) {
    var currentPage, photoSwipeInstance;
    currentPage = $(e.target);
    photoSwipeInstance = PhotoSwipe.getInstance(currentPage.attr('id'));
    if (photoSwipeInstance != null) {
      PhotoSwipe.detatch(photoSwipeInstance);
    }
    return true;
  });

}).call(this);
