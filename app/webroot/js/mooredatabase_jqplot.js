(function() {
  var drawChartSpeciesByMonth, drawChartSpeciesByOrder;

  drawChartSpeciesByMonth = function(data) {
    var i, plot1, s1, ticks, _ref;
    s1 = Array();
    ticks = Array();
    for (i = 0, _ref = data.length; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
      s1.push(parseInt(data[i][1]));
      ticks.push(data[i][0]);
    }
    return plot1 = $.jqplot('chartSpeciesByMonth', [s1], {
      seriesDefaults: {
        pointLabels: {
          show: true
        }
      },
      series: [
        {
          color: '#FF761C',
          lineWidth: 1.5,
          markerOptions: {
            style: 'filledDiamond',
            size: 5,
            color: '#00f'
          }
        }
      ],
      gridPadding: {
        top: 30,
        right: 5,
        bottom: 30,
        left: 10
      },
      axes: {
        xaxis: {
          renderer: $.jqplot.CategoryAxisRenderer,
          ticks: ticks
        },
        yaxis: {
          pad: 1.20,
          min: 0,
          tickOptions: {
            formatString: '%d'
          }
        }
      }
    });
  };

  mooredatabase.drawChartSpeciesByMonth = drawChartSpeciesByMonth;

  drawChartSpeciesByOrder = function(data) {
    var i, otherTotal, plot1, s1, _ref;
    s1 = Array();
    otherTotal = 0;
    for (i = 0, _ref = data.length; 0 <= _ref ? i < _ref : i > _ref; 0 <= _ref ? i++ : i--) {
      if (i < 4) {
        s1.push(Array(data[i][0], parseInt(data[i][1])));
      } else {
        otherTotal += parseInt(data[i][1]);
      }
    }
    s1.push(Array("Other", otherTotal));
    return plot1 = $.jqplot('chartSpeciesByOrder', [s1], {
      gridPadding: {
        top: 5,
        right: 5,
        bottom: 5,
        left: 5
      },
      seriesDefaults: {
        renderer: jQuery.jqplot.PieRenderer,
        rendererOptions: {
          showDataLabels: true,
          padding: 5,
          shadowDepth: 3,
          dataLabelThreshold: 2,
          dataLabelNudge: 15
        }
      },
      legend: {
        show: true,
        location: 'e'
      }
    });
  };

  mooredatabase.drawChartSpeciesByOrder = drawChartSpeciesByOrder;

}).call(this);
