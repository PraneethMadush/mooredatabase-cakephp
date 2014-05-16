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

		// color array
		$colorArray = array("#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74");

		// add all 12 months with sightings 0 to array first; so
		// we get a chart showing all 12 months with no gaps
		$monthArray = array('J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D');
		$results = array();
		for ($i = 0; $i < 12; $i++) {
			$rowArray = array($monthArray[$i], 0, $colorArray[$i], $monthSet[0][0]['common_name']);
			array_push($results, $rowArray);
		}

		// update array element for count, initialized to 0, with counts from database
		foreach ($monthSet as $month) {
			$results[$month[0]['monthNumber'] - 1][1] = $month[0]['sightingCount'];
		}

		// reformat as JSON
		$jsonResults = array();
		foreach ($results as $result) {
			$month = array('monthLetter' => $result[0], 'sightingCount' => $result[1], 'color' => $result[2], 'common_name' => $result[3]);
			array_push($jsonResults, $month);
		}
		$results = $jsonResults;
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
		// CakePHP nests each row in an object [], so we need to
		// extract into more standard JSON format
		$results = array();
		foreach ($monthSet as $month) {
			foreach ($month as $data) {
				array_push($results, $data);
			}
		}
		$this -> set(compact('results'));
	}

	public function species_by_year_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$yearSet = $this -> Report -> listSpeciesByYear();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into more standard JSON format
		$results = array();
		foreach ($yearSet as $year) {
			foreach ($year as $data) {
				array_push($results, $data);
			}
		}
		$this -> set(compact('results'));
	}

	public function species_by_month_2_orders_json() {

		// disable layout
		$this -> layout = null;

		// perform the search
		$monthSet = $this -> Report -> listSpeciesByMonth2Orders();

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$results = array();
		foreach ($monthSet as $month) {
			$row_array = array($month['l']['orderName'], substr($month[0]['monthName'], 0, 1), $month[0]['speciesCount']);
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

		// color array
		$colorArray = array("#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333", "#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333");

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$results = array();
		$i = 0;
		foreach ($orderSet as $order) {
			$row_array = array('orderName' => $order['aou_order']['order_name'], 'speciesCount' => $order[0]['speciesCount'], 'color' => $colorArray[$i]);
			array_push($results, $row_array);
			$i++;
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
