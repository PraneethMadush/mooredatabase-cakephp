(function() {
	var drawChartSpeciesSightingsByMonth, drawChartSpeciesByOrder, drawChartSpeciesByMonth;

	drawChartSpeciesByMonth = function(chartData) {

		var chart = AmCharts.makeChart("chartdiv", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "monthLetter",
			"categoryAxis" : {
				"title" : "Month"
			},
			"valueAxes" : [{
				"position" : "left",
				"title" : "Species"
			}],
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"startDuration" : 0.5,
			"startEffect" : "easeInSine",
			"legend" : {
				"data" : [{
					"title" : "Species",
					"color" : "blue"
				}, {
					"title" : "Trips",
					"color" : "#FF6600"
				}],
				"align" : "center"
			},
			"graphs" : [{
				"type" : "smoothedLine",
				"lineAlpha" : 1,
				"lineColor" : "blue",
				"lineThickness" : 1,
				"bullet" : "round",
				"bulletBorderThickness" : 1,
				"bulletBorderColor" : "#FFFFFF",
				"valueField" : "speciesCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "Species: [[value]]"
			}, {
				"type" : "smoothedLine",
				"lineAlpha" : 1,
				"lineColor" : "#FF6600",
				"lineThickness" : 1,
				"bullet" : "diamond",
				"bulletBorderThickness" : 1,
				"bulletBorderColor" : "#FFFFFF",
				"valueField" : "tripCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "Trips: [[value]]"
			}]
		});

	};
	mooredatabase.drawChartSpeciesByMonth = drawChartSpeciesByMonth;

	drawChartSpeciesSightingsByMonth = function(chartData) {

		var chart = AmCharts.makeChart("chartdiv", {
			"type" : "serial",
			"startDuration" : 1,
			"dataProvider" : chartData,
			"categoryField" : "monthLetter",
			"categoryAxis" : {
				"title" : "Month"
			},
			"valueAxes" : [{
				"axisAlpha" : 0,
				"position" : "left",
				"title" : "Sightings"
			}],
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"graphs" : [{
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "<b>Sightings: [[value]]</b>",
				"colorField" : "color",
				"fillAlphas" : 0.9,
				"lineAlpha" : 0.2,
				"type" : "column",
				"valueField" : "sightingCount"
			}]
		});

	};
	mooredatabase.drawChartSpeciesSightingsByMonth = drawChartSpeciesSightingsByMonth;

	drawChartSpeciesByOrder = function(chartData) {

		var chart = AmCharts.makeChart("chartdiv", {
			"type" : "serial",
			"theme" : "none",
			"rotate" : true,
			"dataProvider" : chartData,
			"creditsPosition" : "bottom-right",
			"fontFamily" : "Helvetica, Arial, sans serif",
			"valueAxes" : [{
				"axisAlpha" : 0,
				"position" : "left",
				"title" : "Species Count"
			}],
			"startDuration" : 1,
			"graphs" : [{
				"balloonText" : "<b>[[category]]: [[value]]</b>",
				"fillAlphas" : 0.9,
				"lineAlpha" : 0.2,
				"type" : "column",
				"valueField" : "speciesCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"colorField" : "color"
			}],
			"categoryField" : "orderName",
			"categoryAxis" : {
				"title" : "Order"
			}
		});

	};
	mooredatabase.drawChartSpeciesByOrder = drawChartSpeciesByOrder;

}).call(this);
