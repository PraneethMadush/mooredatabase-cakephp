<?php
class ReportsController extends AppController {
    
    public function index() {
    	$this->species_all();
    }

    public function species_all() {

    	// default action for the reports controller
        $this->loadModel("Report");
        $sighting_set = $this->Report->listSpeciesAll();
        $this->set('sighting_set',$sighting_set);
		$this->render('/Reports/species_all');

    }

    public function species_dialog() {

    	$id = (int)$this->params['url']['id'];
        $this->loadModel("Report");
        $bird = $this->Report->getSpecies($id);
        $this->set('bird',$bird);
		$this->render('/Reports/species_dialog');

    }

    public function sightings_by_month() {

        // disable layout
        $this->layout = null;

        // perform the search
        $species_id = (int)$this->params['url']['id'];
        $this->loadModel("Report");
        $monthSet = $this->Report->listMonthsForSpecies($species_id);
 
        // add all 12 months with sightings 0 to array first; so
        // we get a chart showing all 12 months with no gaps
        $monthArray = array('J','F','M','A','M',
                            'J','J','A','S','O',
                            'N','D');
        $returnArray = array();
        for($i = 0; $i < 12; $i++) {
            $rowArray = array($monthArray[$i],0);
            array_push($returnArray,$rowArray);         
        }

        // update array elements with counts from database; take
        // first three letters of month so horizontal legends aren't
        // tilted or truncated
        foreach($monthSet as $month) {
            $returnArray[$month[0]['monthNumber'] - 1] = array(substr($month[0]['monthName'],0,1),$month[0]['sightingCount']);
        }

        // render view/JSON
        $this->set('results',$returnArray);
        $this->render('/Reports/sightings_by_month');
  
    }

    public function birding_locations() {

        $this->loadModel("Report");
        $location_set = $this->Report->listLocations();
        $this->set('location_set',$location_set);
        $this->render('/Reports/birding_locations');

    }

    public function location_detail() {

        $id = (int)$this->params['url']['id'];
        $this->loadModel("Report");
        $location = $this->Report->getLocation($id);
        $this->set('location',$location);
        $sighting_set = $this->Report->listSightingsForLocation($id);
        $this->set('sighting_set',$sighting_set);
        $this->render('/Reports/location_detail');

    }

}