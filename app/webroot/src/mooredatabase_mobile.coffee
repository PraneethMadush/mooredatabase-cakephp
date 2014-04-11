window.mooredatabase = {}

jsonFlickrFeed = (data) ->
  output = ''
  for i in [0...data.items.length]
    title = data.items[i].title
    link = data.items[i].media.m.substring(0, 56)
    blocktype = if ((i % 3) is 2) then 'c' else if ((i % 3) is 1) then 'b' else 'a'
    output += '<div class="ui-block-' + blocktype + '">'
    output += '<a href="/pages/flickrphoto?link=' + link + '&amp;title=' + title + '" data-transition="fade" >'
    output += '<img src="' + link + '_q.jpg" alt="' + title + '" />'
    output += '</a>'
    output += '</div>'
  $('#photolist').html(output)
  true
mooredatabase.jsonFlickrFeed = jsonFlickrFeed

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

listVideos = (data) ->
  output = '<ul data-role="listview" data-filter="true">'
  for i in [0...data.feed.entry.length]
    # extract some data from the blob
    title = data.feed.entry[i].title.$t
    thumbnail = data.feed.entry[i].media$group.media$thumbnail[0].url
    description = escape(data.feed.entry[i].media$group.media$description.$t)
    id = data.feed.entry[i].id.$t.substring(38)

    # concatenate the listview item
    output += '<li>'
    output += '<a href="/pages/youtubeplayer?id=' + id + '&amp;title=' + title + '" data-transition="fade">'
    output += '<h3 class="movietitle">' + title + '</h3>'
    output += '<img src="' + thumbnail + '" alt="' + escape(title) + '" />'
    output += "</a>"
    output += '</li>'

  output += '</ul>'
  $('#videolist').html(output)
  # reapply CSS
  $("#youtube").trigger('create')
  true
mooredatabase.listVideos = listVideos

# alias the namespaced function above and put it in global namespace; Flickr API looking for function
# of particular name in global namespace
jsonFlickrFeed = (data) ->
  mooredatabase.jsonFlickrFeed(data)
  true
window.jsonFlickrFeed = jsonFlickrFeed