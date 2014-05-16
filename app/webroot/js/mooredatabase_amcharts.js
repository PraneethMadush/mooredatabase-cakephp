(function() {
	var drawChartSpeciesSightingsByMonth, drawChartSpeciesByOrder, drawChartSpeciesByMonth, drawChartSpeciesByYear;
	drawChartSpeciesByYear = function(chartData) {
		var chart = AmCharts.makeChart("chartdivYears", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "yearNumber",
			"theme" : "dark",
			"categoryAxis" : {
				"title" : "Year"
			},
			"valueAxes" : [{
				"position" : "left",
				"title" : "Count"
			}],
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"startDuration" : 0,
			"legend" : {
				"data" : [{
					"title" : "Species",
					"color" : "#45D4FF"
				}, {
					"title" : "Trips",
					"color" : "#FF6600"
				}],
				"align" : "center",
			},
			"graphs" : [{
				"type" : "smoothedLine",
				"lineAlpha" : 1,
				"lineColor" : "#45D4FF",
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
	mooredatabase.drawChartSpeciesByYear = drawChartSpeciesByYear;

	drawChartSpeciesByMonth = function(chartData) {
		var chart = AmCharts.makeChart("chartdivMonths", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "monthLetter",
			"theme" : "dark",
			"categoryAxis" : {
				"title" : "Month"
			},
			"valueAxes" : [{
				"position" : "left",
				"title" : "Count"
			}],
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"startDuration" : 0,
			"legend" : {
				"data" : [{
					"title" : "Species",
					"color" : "#45D4FF"
				}, {
					"title" : "Trips",
					"color" : "#FF6600"
				}],
				"align" : "center",
			},
			"graphs" : [{
				"type" : "smoothedLine",
				"lineAlpha" : 1,
				"lineColor" : "#45D4FF",
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
		var chart = AmCharts.makeChart("chartdivSpecies", {
			"type" : "serial",
			"startDuration" : 1,
			"dataProvider" : chartData,
			"theme" : "dark",
			"titles" : [{
				"text" : chartData[0].common_name
			}],
			"categoryField" : "monthLetter",
			"categoryAxis" : {
				"title" : "Month"
			},
			"valueAxes" : [{
				"axisAlpha" : 0.2,
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
				"lineColor" : "color",
				"fillAlphas" : 0.9,
				"lineAlpha" : 0.2,
				"type" : "column",
				"valueField" : "sightingCount"
			}]
		});
	};
	mooredatabase.drawChartSpeciesSightingsByMonth = drawChartSpeciesSightingsByMonth;

	drawChartSpeciesByOrder = function(chartData) {
		var chart = AmCharts.makeChart("chartdivOrders", {
			"type" : "serial",
			"theme" : "dark",
			"rotate" : true,
			"dataProvider" : chartData,
			"creditsPosition" : "bottom-right",
			"fontFamily" : "Helvetica, Arial, sans serif",
			"valueAxes" : [{
				"axisAlpha" : .2,
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
				"lineColor" : "color",
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
