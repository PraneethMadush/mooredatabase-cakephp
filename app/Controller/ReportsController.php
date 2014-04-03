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
        $bird = array_pop($this->Report->getSpecies($id));
        // print_r($bird);
        // die();
        $this->set('bird',$bird);
		$this->render('/Reports/species_dialog');

    }

}