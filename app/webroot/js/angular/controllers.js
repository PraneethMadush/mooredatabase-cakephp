'use strict';

birdingApp.controller('SpeciesByMonthController', 
	function SpeciesByMonthController($http, $scope) {
		$http.get('/api/species_by_month').success(function(data) {
	    	mooredatabase.drawChartSpeciesByMonth(data);			
	    	$scope.months = data;
	  	});
}); 
birdingApp.controller('BirdingLocationsController', 
	function BirdingLocationsController($http, $scope) {
		$http.get('/api/birding_locations').success(function(data) {
	    	$scope.locations = data;
	  	});
		$http.get('/api/species_by_county').success(function(data) {
	    	mooredatabase.drawChartSpeciesByCounty(data);
	  	});	  	
});