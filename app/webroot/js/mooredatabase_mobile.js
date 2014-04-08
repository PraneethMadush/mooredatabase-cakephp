// Generated by CoffeeScript 1.6.3
(function() {
  var geolocation_initialize, geolocation_initialize_map, geolocation_show_position, jsonFlickrFeed, listTweets, listVideos, listWordpressCategories, listWordpressPosts, listWordpressPostsForCategory;

  window.mooredatabase = {};

  listTweets = function(data) {
    var output;
    output = '<ul data-role="listview" class="ui-listview">';
    $.each(data, function(key, val) {
      var name, text, thumbnail;
      text = data[key].text;
      thumbnail = data[key].user.profile_image_url;
      name = data[key].user.name;
      text = text.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(i) {
        var url;
        url = i.link(i);
        return url;
      });
      text = text.replace(/[@]+[A-Za-z0-9-_]+/g, function(i) {
        var item, url;
        item = i.replace("@", '');
        url = i.link("http://twitter.com/" + item);
        return url;
      });
      text = text.replace(/[#]+[A-Za-z0-9-_]+/g, function(i) {
        var item, url;
        item = i.replace("#", '%23');
        url = i.link("http://search.twitter.com/search?q=" + item);
        return url;
      });
      output += '<li>';
      output += '<img src="' + thumbnail + '" alt="Photo of ' + name + '">';
      output += '<div>' + text + '<br /><br />' + data[key].created_at + '</div>';
      return output += '</li>';
    });
    output += '</ul>';
    return $('#tweetlist').html(output);
  };

  mooredatabase.listTweets = listTweets;

  listWordpressPosts = function(data) {
    var excerpt, output, tempDiv, val, _i, _len, _ref;
    output = '<ul data-role="listview" data-filter="true">';
    _ref = data.posts;
    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
      val = _ref[_i];
      tempDiv = document.createElement('tempDiv');
      tempDiv.innerHTML = val.excerpt;
      $('a', tempDiv).remove();
      excerpt = tempDiv.innerHTML;
      output += '<li>';
      output += '<a href="' + val.url + '">';
      output += '<h3>' + val.title + '</h3>';
      output += '<p>' + val.date + '</p>';
      output += '<p>' + excerpt + '</p>';
      output += '</a>';
      output += '</li>';
    }
    output += '</ul>';
    $('#postlist').html(output);
    $("#blogrecent").trigger('create');
    return true;
  };

  mooredatabase.listWordpressPosts = listWordpressPosts;

  listWordpressCategories = function(data) {
    var output, val, _i, _len, _ref;
    output = '<ul data-role="listview" data-filter="true" data-count-theme="c">';
    output += '<li>';
    output += '<a href="blogrecent.html">';
    output += '<h3>Recent Posts</h3>';
    output += '<p>Ten most recent posts.</p>';
    output += '<span class="ui-li-count">10 Posts</span>';
    output += '</a>';
    output += '</li>';
    _ref = data.categories;
    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
      val = _ref[_i];
      if (val.post_count > 0) {
        output += '<li>';
        output += '<a href="blogpostlist.html?category=' + val.title + '&slug=' + val.slug + '" data-ajax="true">';
        output += '<h3>' + val.title + '</h3>';
        output += '<p>' + val.description + '</p>';
        output += '<span class="ui-li-count">' + val.post_count + ' Posts</span>';
        output += '</a>';
        output += '</li>';
      }
    }
    output += '</ul>';
    $('#categorylist').html(output);
    $('#blogcategories').trigger('create');
    return true;
  };

  mooredatabase.listWordpressCategories = listWordpressCategories;

  listWordpressPostsForCategory = function(data) {
    var excerpt, output, tempDiv, val, _i, _len, _ref;
    output = '<ul data-role="listview" data-filter="true">';
    _ref = data.posts;
    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
      val = _ref[_i];
      tempDiv = document.createElement('tempDiv');
      tempDiv.innerHTML = val.excerpt;
      $('a', tempDiv).remove();
      excerpt = tempDiv.innerHTML;
      output += '<li>';
      output += '<a href="' + val.url + '">';
      output += '<h3>' + val.title + '</h3>';
      output += '<p>' + val.date + '</p>';
      output += '<p>' + excerpt + '</p>';
      output += '</a>';
      output += '</li>';
    }
    output += '</ul>';
    $('#postlist').html(output);
    $('#blogpostlist').trigger('create');
    return true;
  };

  mooredatabase.listWordpressPostsForCategory = listWordpressPostsForCategory;

  jsonFlickrFeed = function(data) {
    var blocktype, i, link, output, title, _i, _ref;
    output = '';
    for (i = _i = 0, _ref = data.items.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {
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
    var description, i, id, output, thumbnail, title, _i, _ref;
    output = '<ul data-role="listview" data-filter="true">';
    for (i = _i = 0, _ref = data.feed.entry.length; 0 <= _ref ? _i < _ref : _i > _ref; i = 0 <= _ref ? ++_i : --_i) {
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
