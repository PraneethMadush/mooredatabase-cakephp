'use strict';

birdingApp.controller('SpeciesByYearChartController', function SpeciesByYearChartController($http, $scope) {
	$http.get('/api/species_by_year').success(function(data) {
		mooredatabase.drawChartSpeciesByYear(data);
	});
});
birdingApp.controller('SpeciesByOrderChartController', function SpeciesByOrderChartController($http, $scope) {
	$http.get('/api/species_by_order').success(function(data) {
		mooredatabase.drawChartSpeciesByOrder(data);
	});
});
birdingApp.controller('SpeciesByOrderController', function SpeciesByOrderController($http, $scope) {
	$http.get('/api/species_by_order_detail').success(function(data) {
		$scope.orders = data;
	});
});
birdingApp.controller('SpeciesByMonthController', function SpeciesByMonthController($http, $scope) {
	$http.get('/api/species_by_month').success(function(data) {
		mooredatabase.drawChartSpeciesByMonth(data);
		$scope.months = data;
	});
});
birdingApp.controller('BirdingLocationsController', function BirdingLocationsController($http, $scope) {
	$http.get('/api/birding_locations').success(function(data) {
		$scope.locations = data;
	});
});
birdingApp.controller('CountiesController', function CountiesController($http, $scope) {
	$http.get('/api/species_by_county').success(function(data) {
		mooredatabase.drawChartSpeciesByCounty(data);
	});
});
birdingApp.controller('DucksAndWarblersController', function DucksAndWarblersController($http, $scope) {
	$http.get('/api/two_species_by_month').success(function(data) {
		mooredatabase.drawChartTwoSpeciesByMonth(data);
	});
});
birdingApp.controller('TopTwentyController', function TopTwentyController($http, $scope) {
	$http.get('/api/top_twenty').success(function(data) {
		$scope.birds = data;
	});
});
birdingApp.controller('AllSpeciesController', function AllSpeciesController($http, $scope) {
	$http.get('/api/species_all').success(function(data) {
		$scope.birds = data;
	});
});
birdingApp.controller('SpeciesDialogController', function SpeciesDialogController($http, $scope, $routeParams) {
	$scope.id = $routeParams.id;
	alert($routeParams.id);
	$http.get('/api/sightings_by_month/', {
		params : {
			"id" : $routeParams.id
		}
	}).success(function(data) {
		$scope.bird = data;
	});
});
