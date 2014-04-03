drawChartSpeciesByMonth = (data) ->

  # extract two arrays from the JSON data returned above:
  # s1 is an array with number of species;
  # ticks is an array of month names
  s1 = Array()
  ticks = Array()
  for i in [0...data.length]
    s1.push(parseInt(data[i][1]))
    ticks.push(data[i][0])

  # draw the chart
  plot1 = $.jqplot 'chartSpeciesByMonth', [s1],
    seriesDefaults :
      pointLabels :
        show : true
    series : [
      color : '#FF761C'
      lineWidth : 1.5
      markerOptions :
        style : 'filledDiamond'
        size : 5
        color : '#00f'
    ]
    gridPadding :
      top : 30
      right : 5
      bottom : 30
      left : 10
    axes :
      xaxis : 
        renderer : $.jqplot.CategoryAxisRenderer
        ticks : ticks
      yaxis : 
        pad : 1.20
        min : 0
        tickOptions : 
          formatString : '%d'
mooredatabase.drawChartSpeciesByMonth = drawChartSpeciesByMonth
  
drawChartSpeciesByOrder = (data) ->

  # extract two arrays from the JSON data returned above:
  # s1 is an array with number of species;
  # ticks is an array of order names
  s1 = Array()
  otherTotal = 0
  for i in [0...data.length]
    if i < 4
      s1.push(Array(data[i][0], parseInt(data[i][1])))
    else
      otherTotal += parseInt(data[i][1])

  # add the "Other" total to the array
  s1.push(Array("Other", otherTotal))

  # draw the chart
  plot1 = $.jqplot 'chartSpeciesByOrder', [s1],
    gridPadding :
      top : 5
      right : 5
      bottom : 5
      left : 5
    seriesDefaults :
      # Make this a pie chart.
      renderer : jQuery.jqplot.PieRenderer
      rendererOptions :
        # Put data labels on the pie slices.
        # By default, labels show the percentage of the slice.
        showDataLabels : true
        padding : 5
        shadowDepth : 3
        dataLabelThreshold : 2
        dataLabelNudge : 15
    legend :
      show : true
      location : 'e'
mooredatabase.drawChartSpeciesByOrder = drawChartSpeciesByOrder