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

	public function species_dialog($id) {
		$id = ( int )$id;
		$bird = $this -> Report -> getSpecies($id);
		$this -> set(compact('bird'));
	}

	public function sightings_by_month($id) {

		// disable layout
		$this -> layout = null;

		// perform the search
		$species_id = ( int )$id;
		$monthSet = $this -> Report -> listMonthsForSpecies($species_id);

		// add all 12 months with sightings 0 to array first; so
		// we get a chart showing all 12 months with no gaps
		$monthArray = array('J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D');
		$results = array();
		for ($i = 0; $i < 12; $i++) {
			$rowArray = array($monthArray[$i], 0);
			array_push($results, $rowArray);
		}

		// update array elements with counts from database; take
		// first three letters of month so horizontal legends aren't
		// tilted or truncated
		foreach ($monthSet as $month) {
			$results[$month[0]['monthNumber'] - 1] = array(substr($month[0]['monthName'], 0, 1), $month[0]['sightingCount']);
		}
		$this -> set(compact('results'));
	}

	public function birding_locations() {
		$location_set = $this -> Report -> listLocations();
		$this -> set(compact('location_set'));
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

	public function species_by_month_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$monthSet = $this -> Report -> listSpeciesByMonth();

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$results = array();
		foreach ($monthSet as $month) {
			$row_array = array(substr($month[0]['monthName'], 0, 1), $month[0]['speciesCount']);
			array_push($results, $row_array);
		}
		$this -> set(compact('results'));
	}

	public function species_by_order() {
		$order_set = $this -> Report -> listSpeciesByOrder();
		$this -> set(compact('order_set'));
	}

	public function species_by_order_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$orderSet = $this -> Report -> listSpeciesByOrder();

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$results = array();
		foreach ($orderSet as $order) {
			$row_array = array($order['aou_order']['order_name'], $order[0]['speciesCount']);
			array_push($results, $row_array);
		}
		$this -> set(compact('results'));
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
		$title_for_layout = 'Order ' . $order_name;
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
