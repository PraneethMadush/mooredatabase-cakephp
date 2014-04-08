<?php
class ReportsController extends AppController {
	public function index() {
		$this -> species_all();
	}

	public function species_all() {

		// default action for the reports controller
		$sighting_set = $this -> Report -> listSpeciesAll();
		$this -> set('sighting_set', $sighting_set);
		$this -> render('/Reports/species_all');
	}

	public function species_dialog($id) {
		$id = ( int )$id;
		$bird = $this -> Report -> getSpecies($id);
		$this -> set('bird', $bird);
		$this -> render('/Reports/species_dialog');
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
		$returnArray = array();
		for ($i = 0; $i < 12; $i++) {
			$rowArray = array($monthArray[$i], 0);
			array_push($returnArray, $rowArray);
		}

		// update array elements with counts from database; take
		// first three letters of month so horizontal legends aren't
		// tilted or truncated
		foreach ($monthSet as $month) {
			$returnArray[$month[0]['monthNumber'] - 1] = array(substr($month[0]['monthName'], 0, 1), $month[0]['sightingCount']);
		}

		// render view/JSON
		$this -> set('results', $returnArray);
		$this -> render('/Reports/sightings_by_month');
	}

	public function birding_locations() {
		$location_set = $this -> Report -> listLocations();
		$this -> set('location_set', $location_set);
		$this -> render('/Reports/birding_locations');
	}

	public function location_detail($location_id) {
		$id = ( int )$location_id;
		$location = $this -> Report -> getLocation($id);
		$this -> set('location', $location);
		$sighting_set = $this -> Report -> listSightingsForLocation($id);
		$this -> set('sighting_set', $sighting_set);
		$this -> render('/Reports/location_detail');
	}

	public function species_by_month() {
		$month_set = $this -> Report -> listSpeciesByMonth();
		$this -> set('month_set', $month_set);
		$this -> render('/Reports/species_by_month');
	}

	public function species_by_month_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$monthSet = $this -> Report -> listSpeciesByMonth();

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$return_arr = array();
		foreach ($monthSet as $month) {
			$row_array = array(substr($month[0]['monthName'], 0, 1), $month[0]['speciesCount']);
			array_push($return_arr, $row_array);
		}

		// render view/JSON
		$this -> set('results', $return_arr);
		$this -> render('/Reports/species_by_month_json');
	}

	public function species_by_order() {
		$order_set = $this -> Report -> listSpeciesByOrder();
		$this -> set('order_set', $order_set);
		$this -> render('/Reports/species_by_order');
	}

	public function species_by_order_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$orderSet = $this -> Report -> listSpeciesByOrder();

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$return_arr = array();
		foreach ($orderSet as $order) {
			$row_array = array($order['aou_order']['order_name'], $order[0]['speciesCount']);
			array_push($return_arr, $row_array);
		}

		// render view/JSON
		$this -> set('results', $return_arr);
		$this -> render('/Reports/species_by_order_json');
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
		$this -> set('order_name', $order_name);
		$this -> set('title_for_layout', 'Order ' . $order_name);
		$this -> set('sighting_set', $sighting_set);
		$this -> render('/Reports/species_by_order_list');
	}

	public function species_by_month_list($monthNumber) {

		// sanitize parameter and parse to get month number and name
		$monthNumber = ( int )$monthNumber;
		$timestamp = mktime(0, 0, 0, $monthNumber, 1, 2005);
		$monthName = date("F", $timestamp);

		// get the data
		$sighting_set = $this -> Report -> listSpeciesForMonth($monthNumber);

		// pass some data to the view and render the view
		$this -> set('sighting_set', $sighting_set);
		$this -> set('monthName', $monthName);
		$this -> set('monthNumber', $monthNumber);
		$this -> set('title_for_layout', $monthName);
		$this -> render('/Reports/species_by_month_list');
	}

}