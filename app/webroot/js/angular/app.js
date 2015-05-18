'use strict';

var birdingApp = angular.module('birdingApp', ['ngRoute']);

birdingApp.config(['$routeProvider',
function($routeProvider) {
	$routeProvider.when('/reports/species_dialog/:id', {
		templateUrl : ' ',
		controller : 'SpeciesDialogController'
	});
}]); 