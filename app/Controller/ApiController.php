<?php
class ApiController extends AppController {

	// Api controller uses Report model
	public $uses = array('Report');

	public function species_by_month() {

		// perform the search
		$monthSet = $this -> Report -> listSpeciesByMonth();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($monthSet as $month) {
			foreach ($month as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function two_species_by_month() {

		// perform the search
		$monthSet = $this -> Report -> listTwoSpeciesByMonth();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($monthSet as $month) {
			foreach ($month as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_by_year() {

		// perform the search
		$yearSet = $this -> Report -> listSpeciesByYear();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($yearSet as $year) {
			foreach ($year as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_by_county() {

		// perform the search
		$countySet = $this -> Report -> listSpeciesByCounty();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($countySet as $county) {
			foreach ($county as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function birding_locations() {

		// perform the search
		$countySet = $this -> Report -> listLocations();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($countySet as $county) {
			foreach ($county as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_by_order_detail() {

		// perform the search
		$orders = $this -> Report -> listSpeciesByOrder();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($orders as $order) {
			foreach ($order as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function location_detail($location_id) {

		// perform the search
		$id = ( int )$location_id;
		$locations = $this -> Report -> getLocation($id);
		// print_r($locations);

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($locations as $location) {
			array_push($results, $location);
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_by_order() {

		// perform the search
		$orderSet = $this -> Report -> listSpeciesByOrder();
		// print_r($orderSet);
		// die();

		// color array
		$colorArray = array("#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333", "#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74", "#754DEB", "#DDDDDD", "#999999", "#333333");

		// Retrieve and store in array the results of the query
		// jQuery is looking for 'value' key
		$results = array();
		$row = array();
		$i = 0;
		foreach ($orderSet as $order) {
			foreach ($order as $data) {
				$row = array('orderName' => $data['order_name'], 'speciesCount' => $data['speciesCount'], 'color' => $colorArray[$i], 'url' => '/reports/species_by_order_list/' . $data['id']);
				array_push($results, $row);
			}
			$i++;
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function sightings_by_month($id) {

		// perform the search
		$species_id = ( int )$id;
		$monthSet = $this -> Report -> listMonthsForSpecies($species_id);

		// color and month arrays
		$colorArray = array("#FF0F00", "#FF6600", "#FF9E01", "#FCD202", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74");
		$monthArray = array('J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D');

		// add all 12 months with sightings 0 to array first; so
		// we get a chart showing all 12 months with no gaps
		$results = array();
		$row = array();
		for ($i = 0; $i < 12; $i++) {
			$row = array('monthLetter' => $monthArray[$i], 'sightingCount' => 0, 'color' => $colorArray[$i], 'common_name' => $monthSet[0][0]['common_name'], 'monthName' => date("F", mktime(0, 0, 0, $i + 1, 10)));
			array_push($results, $row);
		}

		// update array element for count with counts from database
		foreach ($monthSet as $month) {
			$results[$month[0]['monthNumber'] - 1]['sightingCount'] = $month[0]['sightingCount'];
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);
	}

	public function top_twenty() {

		// top twenty species by sightings
		$sighting_set = $this -> Report -> listTopTwenty();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($sighting_set as $sighting) {
			foreach ($sighting as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_all() {

		// top twenty species by sightings
		$sighting_set = $this -> Report -> listSpeciesAll();

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($sighting_set as $sighting) {
			foreach ($sighting as $data) {
				array_push($results, $data);
			}
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

	public function species_dialog($id) {

		$id = ( int )$id;
		$bird = $this -> Report -> getSpecies($id);

		// Retrieve and store in array the results of the query
		// CakePHP nests each row in an object [], so we need to
		// extract into a format that translates to JSON correctly
		$results = array();
		foreach ($bird as $data) {
			array_push($results, $data);
		}

		// no view to render
		$this -> autoRender = false;
		$this -> response -> type('json');
		$json = json_encode($results);
		$this -> response -> body($json);

	}

}
