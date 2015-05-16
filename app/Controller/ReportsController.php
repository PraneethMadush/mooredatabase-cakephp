<?php
class ReportsController extends AppController {

	public function index() {
		$this -> species_all();
	}

	public function species_all() {

		// default action for the reports controller
		$sighting_set = $this -> Report -> listSpeciesAll();
		$this -> set(compact('sighting_set'));
	}

	public function top_twenty() {

		// top twenty species by sightings
		$sighting_set = $this -> Report -> listTopTwenty();
		$this -> set(compact('sighting_set'));
	}

	public function species_dialog($id) {
		$id = ( int )$id;
		$bird = $this -> Report -> getSpecies($id);
		$this -> set(compact('bird'));
	}

	public function birding_locations() {
		// empt action; everything is done with AngularJS and AJAX
	}

	public function location_detail($location_id) {
		$id = ( int )$location_id;
		$location = $this -> Report -> getLocation($id);
		$sighting_set = $this -> Report -> listSightingsForLocation($id);
		$this -> set(compact('location', 'sighting_set'));
	}

	public function species_by_month() {
		$month_set = $this -> Report -> listSpeciesByMonth();
		$this -> set(compact('month_set'));
	}

	public function two_species_by_month() {
		// no work to do; just render a view
	}

	public function species_by_order() {
		$order_set = $this -> Report -> listSpeciesByOrder();
		$this -> set(compact('order_set'));
	}

	public function species_by_order_list($order_id) {

		// sanitize parameter
		$id = ( int )$order_id;

		// get the data
		$sighting_set = $this -> Report -> listSpeciesForOrder($id);

		// pass some data to view and render it
		$count = count($sighting_set);
		$this -> set('count', $count);
		foreach ($sighting_set as $bird) {
			$order_name = $bird['aou_order']['order_name'];
			break;
		}
		$title_for_layout = $order_name;
		$this -> set(compact('order_name', 'title_for_layout', 'sighting_set'));
	}

	public function species_by_month_list($monthNumber) {

		// sanitize parameter and parse to get month number and name
		$monthNumber = ( int )$monthNumber;
		$timestamp = mktime(0, 0, 0, $monthNumber, 1, 2005);
		$monthName = date("F", $timestamp);

		// get the data
		$sighting_set = $this -> Report -> listSpeciesForMonth($monthNumber);

		// pass some data to the view and render the view
		$title_for_layout = $monthName;
		$this -> set(compact('sighting_set', 'monthName', 'monthNumber', 'title_for_layout'));
	}

	public function clear_cache() {

		// clear the cache; view shows success message only
		Cache::clear(false);
		$this -> set('pageId', 'clearCache');
		$this -> set('title_for_layout', 'Cache Cleared');
		$this -> flash("Cache cleared.", "/");
	}

}
