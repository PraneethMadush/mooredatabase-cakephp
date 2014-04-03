<?php
App::uses('AppModel', 'Model');
class Report extends Model {

    public $name = 'user'; // just need something here that is in database (users)

    public function getLocations() {
        return $this->query("SELECT * FROM location;");
    }

}