(function() {
	var drawChartSpeciesSightingsByMonth, drawChartSpeciesByOrder, drawChartSpeciesByMonth;

	drawChartSpeciesByMonth = function(chartData) {

		var chart = AmCharts.makeChart("chartdiv", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "monthLetter",
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
				"lineThickness" : 2,
				"bullet" : "round",
				"bulletBorderThickness" : 2,
				"bulletBorderColor" : "#FFFFFF",
				"valueField" : "speciesCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "Species: [[value]]"
			}, {
				"type" : "smoothedLine",
				"lineAlpha" : 1,
				"lineColor" : "#FF6600",
				"lineThickness" : 2,
				"bullet" : "diamond",
				"bulletBorderThickness" : 2,
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
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"depth3D" : 20,
			"angle" : 30,
			"graphs" : [{
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"fillColor" : "#FF6600",
				"balloonText" : "Sightings: [[value]]",
				"fillAlphas" : 0.8,
				"lineAlpha" : 0.2,
				"type" : "column",
				"valueField" : "sightingCount"
			}]
		});

	};
	mooredatabase.drawChartSpeciesSightingsByMonth = drawChartSpeciesSightingsByMonth;

	drawChartSpeciesByOrder = function(chartData) {

		var chart = AmCharts.makeChart("chartdiv", {
			"type" : "pie",
			"theme" : "none",
			"dataProvider" : chartData,
			"valueField" : "speciesCount",
			"titleField" : "orderName",
			"groupPercent" : 3,
			"fontFamily" : "Helvetica, Arial, sans serif",
			"startDuration" : 0.5,
			"startEffect" : "easeInSine",
			"creditsPosition" : "bottom-left"
		});

	};
	mooredatabase.drawChartSpeciesByOrder = drawChartSpeciesByOrder;

}).call(this);
