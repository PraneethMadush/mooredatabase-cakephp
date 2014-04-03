window.mooredatabase = {}

listTweets = (data) ->

  output = '<ul data-role="listview" class="ui-listview">'

  $.each(data, (key, val) ->
    text = data[key].text
    thumbnail = data[key].user.profile_image_url
    name = data[key].user.name

    # make links of URL's embedded in tweet
    text = text.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, (i) ->
      url = i.link(i)
      return url
    )

    # make links of the handles embedded in tweets
    text = text.replace(/[@]+[A-Za-z0-9-_]+/g, (i) ->
      item = i.replace("@", '')
      url = i.link("http://twitter.com/" + item)
      return url
    )

    # make links of the hash tags embedded in tweets
    text = text.replace(/[#]+[A-Za-z0-9-_]+/g, (i) ->
      item = i.replace("#", '%23')
      url = i.link("http://search.twitter.com/search?q=" + item)
      return url
    )

    output += '<li>'
    output += '<img src="' + thumbnail + '" alt="Photo of ' + name + '">'
    output += '<div>' + text + '<br /><br />' + data[key].created_at + '</div>'
    output += '</li>'
  )
  #go through each tweet
  output += '</ul>'
  $('#tweetlist').html(output)
mooredatabase.listTweets = listTweets


listWordpressPosts = (data) ->
  output = '<ul data-role="listview" data-filter="true">'
  for val in data.posts
    # remove "Continue reading..." link from excerpt
    tempDiv = document.createElement('tempDiv')
    tempDiv.innerHTML = val.excerpt
    $('a', tempDiv).remove()
    excerpt = tempDiv.innerHTML
    
    # concatenate list item with link to article
    output += '<li>'
    output += '<a href="' + val.url + '">'
    output += '<h3>' + val.title + '</h3>'
    output += '<p>' + val.date + '</p>'
    output += '<p>' + excerpt + '</p>'
    output += '</a>'
    output += '</li>'
  
  # go through each post
  output += '</ul>'
  $('#postlist').html(output)
  # reapply CSS
  $("#blogrecent").trigger('create')
  true
mooredatabase.listWordpressPosts = listWordpressPosts

listWordpressCategories = (data) ->
  output = '<ul data-role="listview" data-filter="true" data-count-theme="c">'
  # add Recent Posts as category to begin with
  output += '<li>'
  output += '<a href="blogrecent.html">'
  output += '<h3>Recent Posts</h3>'
  output += '<p>Ten most recent posts.</p>'
  output += '<span class="ui-li-count">10 Posts</span>'
  output += '</a>'
  output += '</li>'
  # now add the categories
  for val in data.categories
    # concatenate list item with link to category listing
    # exclude categories with no posts (parent categories mostly)
    if val.post_count > 0
      output += '<li>'
      output += '<a href="blogpostlist.html?category=' + val.title + '&slug=' + val.slug + '" data-ajax="true">'
      output += '<h3>' + val.title + '</h3>'
      output += '<p>' + val.description + '</p>'
      output += '<span class="ui-li-count">' + val.post_count + ' Posts</span>'
      output += '</a>'
      output += '</li>'
      
  # go through each post
  output += '</ul>'
  $('#categorylist').html(output)
  # do this to page so CSS is applied
  $('#blogcategories').trigger('create')
  true
mooredatabase.listWordpressCategories = listWordpressCategories

listWordpressPostsForCategory = (data) ->
  output = '<ul data-role="listview" data-filter="true">'
  for val in data.posts
    # remove "Continue reading..." link from excerpt
    tempDiv = document.createElement('tempDiv')
    tempDiv.innerHTML = val.excerpt
    $('a', tempDiv).remove()
    excerpt = tempDiv.innerHTML

    # concatenate list item with link to article
    output += '<li>'
    output += '<a href="' + val.url + '">'
    output += '<h3>' + val.title + '</h3>'
    output += '<p>' + val.date + '</p>'
    output += '<p>' + excerpt + '</p>'
    output += '</a>'
    output += '</li>'
    
  # go through each post
  output += '</ul>'
  $('#postlist').html(output)
  # do this to page so CSS is applied
  $('#blogpostlist').trigger('create')
  true
mooredatabase.listWordpressPostsForCategory = listWordpressPostsForCategory

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