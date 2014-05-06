drawChartSpeciesByMonthNew = function(chartData) {	

	// new chart
	var chart = new AmCharts.AmSerialChart();
	chart.dataProvider = chartData;
	chart.categoryField = "monthLetter";
	chart.fontFamily = "sans serif";
	
	// add species graph to chart
	var graphSpecies = new AmCharts.AmGraph();
	graphSpecies.valueField = "speciesCount";
	graphSpecies.type = "line";
	graphSpecies.bullet = "round";
	graphSpecies.bulletBorderColor = "#FFFFFF";
	graphSpecies.bulletBorderThickness = 2;
	graphSpecies.lineThickness = 2;
	graphSpecies.lineAlpha = 0.5;	
	graphSpecies.lineColor = "blue";
	graphSpecies.labelPosition = "top";
	graphSpecies.labelText = "[[value]]";
	graphSpecies.balloonText = "Species: [[value]]"
	chart.addGraph(graphSpecies);
	
	// add trips graph to chart
	var graphTrips = new AmCharts.AmGraph();
	graphTrips.valueField = "tripCount";
	graphTrips.type = "line";
	graphTrips.bullet = "diamond";
	graphTrips.bulletBorderColor = "#FFFFFF";
	graphTrips.bulletBorderThickness = 2;
	graphTrips.lineThickness = 2;
	graphTrips.lineAlpha = 0.5;	
	graphTrips.lineColor = "green";
	graphTrips.labelPosition = "top";
	graphTrips.labelText = "[[value]]";
	graphTrips.balloonText = "Trips: [[value]]"
	chart.addGraph(graphTrips);	
	
	// add legend
	var legend = new AmCharts.AmLegend();
	legend.data = [{title:"Species", color:"blue"}, {title:"Trips", color:"green"}];
	legend.align = "center";
	chart.addLegend(legend);
	
	// write to the div
	chart.write("chartdiv");
	
	// remove the blurb added by Amcharts
	$("div#chartdiv a").remove();
};
mooredatabase.drawChartSpeciesByMonthNew = drawChartSpeciesByMonthNew;

drawChartSpeciesSightingsByMonth = function(chartData) {	

	// new chart
	var chart = new AmCharts.AmSerialChart();
	chart.dataProvider = chartData;
	chart.categoryField = "monthLetter";
	chart.fontFamily = "sans serif";
	
	// add species graph to chart
	var graphSpecies = new AmCharts.AmGraph();
	graphSpecies.valueField = "sightingCount";
	graphSpecies.type = "line";
	graphSpecies.bullet = "round";
	graphSpecies.bulletBorderColor = "#FFFFFF";
	graphSpecies.bulletBorderThickness = 2;
	graphSpecies.lineThickness = 2;
	graphSpecies.lineAlpha = 0.5;	
	graphSpecies.lineColor = "green";
	graphSpecies.labelPosition = "top";
	graphSpecies.labelText = "[[value]]";
	graphSpecies.balloonText = "Sightings: [[value]]"
	chart.addGraph(graphSpecies);
	
	// write to the div
	chart.write("chartdiv");
	
	// remove the blurb added by Amcharts
	$("div#chartdiv a").remove();
};
mooredatabase.drawChartSpeciesSightingsByMonth = drawChartSpeciesSightingsByMonth;

drawChartSpeciesByOrderNew = function(chartData) {	

	// new chart
	var chart = new AmCharts.AmPieChart();
	chart.valueField = "speciesCount";
	chart.titleField = "orderName";
	chart.dataProvider = chartData;
	chart.fontFamily = "sans serif";
	chart.marginTop = 10;
	chart.groupPercent = 3;
	
	// write to the div
	chart.write("chartdiv");
	
	// remove the blurb added by Amcharts
	$("div#chartdiv a").remove();
};
mooredatabase.drawChartSpeciesByOrderNew = drawChartSpeciesByOrderNew;