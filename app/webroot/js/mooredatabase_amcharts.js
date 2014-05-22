(function() {
	var drawChartSpeciesSightingsByMonth, drawChartSpeciesByOrder, drawChartSpeciesByMonth, drawChartSpeciesByYear;
	drawChartSpeciesByYear = function(chartData) {
		var chart;
		chart = AmCharts.makeChart("chartdivYears", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "yearNumber",
			"categoryAxis" : {
				"gridPosition" : "start",
				"axisAlpha" : 0,
				"tickLength" : 0
			},
			"valueAxes" : [{
				"position" : "left",
				"axisAlpha" : 0,
				"tickLength" : 0
			}],
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "top-right",
			"startDuration" : 0,
			"legend" : {
				"data" : [{
					"title" : "Species",
					"color" : "#00a9ff"
				}, {
					"title" : "Trips",
					"color" : "#FF6600"
				}],
				"align" : "center",
			},
			"graphs" : [{
				"type" : "column",
				"valueField" : "speciesCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "Species: [[value]]",
				"fillColors" : "#00a9ff",
				"lineColor" : "#00a9ff",
				"fillAlphas" : 1,
				"lineAlpha" : 1,
				"type" : "column",
			}, {
				"type" : "smoothedLine",
				"fillAlphas" : 0,
				"lineAlpha" : 1,
				"lineColor" : "#FF6600",
				"lineThickness" : 2,
				"bullet" : "round",
				"bulletSize" : 3,
				"bulletBorderThickness" : 3,
				"bulletBorderColor" : "#FFFFFF",
				"useLineColorForBulletBorder" : true,
				"bulletBorderAlpha" : 1,
				"valueField" : "tripCount",
				"labelPosition" : "top",
				"labelText" : "[[value]]",
				"balloonText" : "Trips: [[value]]"
			}]
		});
	};
	mooredatabase.drawChartSpeciesByYear = drawChartSpeciesByYear;

	drawChartSpeciesByCounty = function(chartData) {
		var Chart;
		chart = AmCharts.makeChart("chartdivCounties", {
			"type" : "serial",
			"theme" : "none",
			"columnWidth:" : 0.6,
			"columnSpacing" : 5,
			"dataProvider" : chartData,
			"startDuration" : 1,
			"fontFamily" : "Helvetica, Arial, sans serif",
			"creditsPosition" : "bottom-right",
			"graphs" : [{
				"balloonText" : "Species:[[value]]",
				"fillColors" : "#a500ff",
				"lineColors" : "#a500ff",
				"fillAlphas" : 0.8,
				"lineAlpha" : 0.2,
				"title" : "Income",
				"type" : "column",
				"valueField" : "speciesCount"
			}, {
				"balloonText" : "Trips:[[value]]",
				"fillColors" : "#00e238",
				"lineColor" : "#00e238",
				"fillAlphas" : 0.8,
				"lineAlpha" : 0.2,
				"title" : "Expenses",
				"type" : "column",
				"valueField" : "tripCount"
			}],
			"legend" : {
				"data" : [{
					"title" : "Species",
					"color" : "#a500ff"
				}, {
					"title" : "Trips",
					"color" : "#00e238"
				}],
				"align" : "center",
			},
			"rotate" : true,
			"categoryField" : "countyName",
			"categoryAxis" : {
				"gridPosition" : "start",
				"position" : "left"
			}
		});
	};
	mooredatabase.drawChartSpeciesByCounty = drawChartSpeciesByCounty;

	drawChartSpeciesByMonth = function(chartData) {
		var chart;
		chart = AmCharts.makeChart("chartdivMonths", {
			"type" : "serial",
			"dataProvider" : chartData,
			"categoryField" : "monthLetter",
			"categoryAxis" : {
				"gridPosition" : "start",
				"axisAlpha" : 0,
				"tickLength" : 0
			},
			"valueAxes" : [{
				"position" : "left",
				"axisAlpha" : 0,
				"tickLength" : 0
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
				"balloonText" : "Species: [[value]]",
				"urlField" : "url"
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
				"balloonText" : "Trips: [[value]]",
				"urlField" : "url"
			}]
		});
	};
	mooredatabase.drawChartSpeciesByMonth = drawChartSpeciesByMonth;

	drawChartSpeciesSightingsByMonth = function(chartData) {
		var chart;
		chart = AmCharts.makeChart("chartdivSpecies", {
			"type" : "serial",
			"startDuration" : 1,
			"dataProvider" : chartData,
			"titles" : [{
				"text" : chartData[0].common_name
			}],
			"categoryField" : "monthLetter",
			"categoryAxis" : {
				"gridPosition" : "start",
				"axisAlpha" : 0,
				"tickLength" : 0
			},
			"valueAxes" : [{
				"axisAlpha" : 0,
				"position" : "left",
				"tickLength" : 0
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
		var chart;
		chart = AmCharts.makeChart("chartdivOrders", {
			"type" : "serial",
			"rotate" : true,
			"dataProvider" : chartData,
			"creditsPosition" : "bottom-right",
			"fontFamily" : "Helvetica, Arial, sans serif",
			"valueAxes" : [{
				"position" : "left"
			}],
			"startDuration" : 1,
			"graphs" : [{
				"balloonText" : "<b>[[category]]: [[value]]</b>",
				"fillAlphas" : 0.9,
				"lineAlpha" : 0.2,
				"type" : "column",
				"valueField" : "speciesCount",
				"lineColor" : "color",
				"colorField" : "color",
				"urlField" : "url",
			}],
			"depth3D" : 20,
			"angle" : 30,
			"chartCursor" : {
				"categoryBalloonEnabled" : false,
				"cursorAlpha" : 0,
				"zoomable" : false
			},
			"categoryField" : "orderName",
			"categoryAxis" : {
				"tickLength" : 0,
				"axisAlpha" : 0
			}
		});
	};
	mooredatabase.drawChartSpeciesByOrder = drawChartSpeciesByOrder;

}).call(this);
