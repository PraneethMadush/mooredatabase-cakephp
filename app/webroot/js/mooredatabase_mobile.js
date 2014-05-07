(function() {
  var geolocation_initialize, geolocation_initialize_map, geolocation_show_position, jsonFlickrFeed, listVideos;

  window.mooredatabase = {};

  jsonFlickrFeed = function(data) {
    var blocktype, i, link, output, title, _ref;
    output = '';
    for (i = 0, _ref = data.items.length; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
      title = data.items[i].title;
      link = data.items[i].media.m.substring(0, 56);
      blocktype = (i % 3) === 2 ? 'c' : (i % 3) === 1 ? 'b' : 'a';
      output += '<div class="ui-block-' + blocktype + '">';
      output += '<a href="/pages/flickrphoto?link=' + link + '&amp;title=' + title + '" data-transition="fade" >';
      output += '<img src="' + link + '_q.jpg" alt="' + title + '" />';
      output += '</a>';
      output += '</div>';
    }
    $('#photolist').html(output);
    return true;
  };

  mooredatabase.jsonFlickrFeed = jsonFlickrFeed;

  mooredatabase.geolocation_map = null;

  geolocation_initialize_map = function() {
    var myOptions;
    myOptions = {
      zoom: 4,
      mapTypeControl: false,
      streetViewControl: false,
      navigationControl: true,
      navigationControlOptions: {
        style: google.maps.NavigationControlStyle.SMALL
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    mooredatabase.geolocation_map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    return true;
  };

  mooredatabase.geolocation_initialize_map = geolocation_initialize_map;

  geolocation_initialize = function() {
    if (geo_position_js.init()) {
      $('#current').html("Receiving...");
      geo_position_js.getCurrentPosition(mooredatabase.geolocation_show_position, function() {
        return document.getElementById('current').innerHTML = "Couldn't get location";
      });
      ({
        enableHighAccuracy: true
      });
    } else {
      $('#current').html("Functionality not available");
    }
    return true;
  };

  mooredatabase.geolocation_initialize = geolocation_initialize;

  geolocation_show_position = function(p) {
    var marker, pos;
    $('#current').html("Latitude " + p.coords.latitude.toFixed(2) + " Longitude " + p.coords.longitude.toFixed(2));
    pos = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
    mooredatabase.geolocation_map.setCenter(pos);
    mooredatabase.geolocation_map.setZoom(14);
    marker = new google.maps.Marker({
      position: pos,
      map: mooredatabase.geolocation_map,
      title: 'You are here'
    });
    return true;
  };

  mooredatabase.geolocation_show_position = geolocation_show_position;

  listVideos = function(data) {
    var description, i, id, output, thumbnail, title, _ref;
    output = '<ul data-role="listview" data-filter="true">';
    for (i = 0, _ref = data.feed.entry.length; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
      title = data.feed.entry[i].title.$t;
      thumbnail = data.feed.entry[i].media$group.media$thumbnail[0].url;
      description = escape(data.feed.entry[i].media$group.media$description.$t);
      id = data.feed.entry[i].id.$t.substring(38);
      output += '<li>';
      output += '<a href="/pages/youtubeplayer?id=' + id + '&amp;title=' + title + '" data-transition="fade">';
      output += '<h3 class="movietitle">' + title + '</h3>';
      output += '<img src="' + thumbnail + '" alt="' + escape(title) + '" />';
      output += "</a>";
      output += '</li>';
    }
    output += '</ul>';
    $('#videolist').html(output);
    $("#youtube").trigger('create');
    return true;
  };

  mooredatabase.listVideos = listVideos;

  jsonFlickrFeed = function(data) {
    mooredatabase.jsonFlickrFeed(data);
    return true;
  };

  window.jsonFlickrFeed = jsonFlickrFeed;

}).call(this);
