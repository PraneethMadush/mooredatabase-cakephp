<?php
class ReportsController extends AppController {

	//var $uses = array('Report');
    
    public function index() {
    	// this should be the default action for the reports controller;  change
    	// to call another method like species by month or all species.
        $this->loadModel("Report");
        $this->Report->getLocations();
 
        try {
			$this->render('/Reports/index');
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
    }

}