<?php
App::uses('AppModel', 'Model');
class Report extends Model {

	// add these because we're bypassing the CakePHP model machinery and 
	// executing SQL directly using PDO
	public $name = 'NoTableModel';
    public $useTable = false;

	public function listSpeciesAll() {
		$sql = "SELECT
		          aou_list.id,
				  aou_order.order_name,
				  aou_order.notes AS order_notes,		
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.family,
				  aou_list.subfamily,
				  (	SELECT COUNT(DISTINCT aou_list2.id)
				  	FROM
				  	sighting sighting2
				  	INNER JOIN aou_list aou_list2
				  		ON sighting2.aou_list_id = aou_list2.id
				    INNER JOIN aou_order ao2
				  		ON aou_list2.order = ao2.order_name
				  	WHERE
				  	aou_order.order_name = ao2.order_name) order_species_count,
				  COUNT(*) AS sightings,
				  MAX(trip.trip_date) AS last_seen
				  FROM
				  trip
				  INNER JOIN sighting
				  	ON trip.id = sighting.trip_id
				  INNER JOIN aou_list
				  	ON sighting.aou_list_id = aou_list.id
				  INNER JOIN aou_order
				  	ON aou_list.order = aou_order.order_name
				  GROUP BY
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.order,
				  aou_list.family,
				  aou_list.subfamily				  
				  ORDER BY aou_order.order_name ASC, aou_list.common_name ASC;";
		return $this->getDataSource()->fetchAll($sql);
	}    

	public function getSpecies($id) {
	     $sql = "SELECT
        		  aou_list.id,
                  aou_order.order_name,
                  aou_order.notes AS order_notes,       
                  aou_list.common_name,
                  aou_list.scientific_name,
                  aou_list.family,
                  aou_list.subfamily,
                  COUNT(*) AS sightings,
				  MAX(trip.trip_date) AS last_seen,
				  MIN(RIGHT(MAKEDATE(YEAR(trip.trip_date),DAYOFYEAR(trip.trip_date)),5)) AS earliestSighting,
				  MAX(RIGHT(MAKEDATE(YEAR(trip.trip_date),DAYOFYEAR(trip.trip_date)),5)) AS latestSighting
                  FROM
                  sighting
                  INNER JOIN trip
                  	ON sighting.trip_id = trip.id
                  INNER JOIN aou_list
                    ON sighting.aou_list_id = aou_list.id
                  INNER JOIN aou_order
                    ON aou_list.order = aou_order.order_name
                  WHERE
                  aou_list.id = {$id}                
                  GROUP BY
                  aou_list.id,
                  aou_order.order_name,
                  aou_order.notes,                      
                  aou_list.common_name,
                  aou_list.scientific_name,
                  aou_list.order,
                  aou_list.family,
                  aou_list.subfamily";
        // must put results in temp variable before calling array_pop() or an
        // E_STRICT error occurs
        $results = $this->getDataSource()->fetchAll($sql);
		return array_pop($results);
	}

	public function listMonthsForSpecies($id) {
	  	$sql = "SELECT
				MONTH(t.trip_date) AS monthNumber,
				MONTHNAME(t.trip_date) AS monthName,
				COUNT(DISTINCT s.id) AS sightingCount
				FROM
				sighting s
				INNER JOIN trip t
					ON s.trip_id = t.id
				WHERE
				s.aou_list_id = {$id}
				GROUP BY
				MONTH(t.trip_date)
				ORDER BY 1";
		return $this->getDataSource()->fetchAll($sql);
	}

	public function listLocations() {
		$sql = "SELECT
                location.* ,
				(SELECT COUNT(*) 
				 FROM trip
				 WHERE trip.location_id = location.id) AS trip_count,
				(SELECT COUNT(DISTINCT sighting.aou_list_id) 
				 FROM
				 trip
				 INNER JOIN sighting
				 	ON trip.id = sighting.trip_id
				 INNER JOIN aou_list
				 	ON sighting.aou_list_id = aou_list.id
				 WHERE
				 trip.location_id = location.id) AS species_count
				FROM location
				ORDER BY location_name ASC";		
		return $this->getDataSource()->fetchAll($sql);			
	}	

	public function getLocation($id) {
		$sql = "SELECT * FROM location WHERE id = {$id};";
		$result = $this->getDataSource()->fetchAll($sql);
		return array_pop($result);
	}

	public function listSightingsForLocation($id) {
		$sql = "SELECT
		          aou_list.id,
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.order,
				  aou_list.family,
				  aou_list.subfamily,
				  COUNT(DISTINCT sighting.id) AS sightings,
				  MAX(trip.trip_date) AS last_seen
				  FROM
				  trip
				  INNER JOIN sighting
				  	ON trip.id = sighting.trip_id
				  INNER JOIN aou_list
				  	ON sighting.aou_list_id = aou_list.id
				  WHERE
				  trip.location_id = {$id}
				  GROUP BY
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.order,
				  aou_list.family,
				  aou_list.subfamily				  
				  ORDER BY aou_list.common_name ASC";
		  return $this->getDataSource()->fetchAll($sql);
	}

	public function listSpeciesByMonth() {
		$sql = "SELECT
				MONTH(t.trip_date) AS monthNumber,
				MONTHNAME(t.trip_date) AS monthName,
				COUNT(DISTINCT l.id) AS speciesCount,
				COUNT(DISTINCT t.id) AS tripCount
				FROM
				aou_list l
				INNER JOIN sighting s
					ON l.id = s.aou_list_id
				INNER JOIN trip t
					ON s.trip_id = t.id
				GROUP BY
				MONTH(t.trip_date)
				ORDER BY 1";
		return $this->getDataSource()->fetchAll($sql);
	}

	public function listSpeciesForMonth($monthNumber) {
		$sql = "SELECT
		          aou_list.id,
				  aou_order.order_name,
				  aou_order.notes AS order_notes,		
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.family,
				  aou_list.subfamily,
				  (	SELECT COUNT(DISTINCT aou_list.id)
				  	FROM
				  	trip
				    INNER JOIN sighting
				  		ON trip.id = sighting.trip_id
				  	INNER JOIN aou_list
				  		ON sighting.aou_list_id = aou_list.id
				    INNER JOIN aou_order ao2
				  		ON aou_list.order = ao2.order_name
				  	WHERE
				  	aou_order.order_name = ao2.order_name AND
				  	MONTH(trip.trip_date) = {$monthNumber}) AS order_species_count,
				  COUNT(*) AS sightings,
				  MAX(trip.trip_date) AS last_seen,
				  MONTHNAME(trip.trip_date) AS monthName
				  FROM
				  trip
				  INNER JOIN sighting
				  	ON trip.id = sighting.trip_id
				  INNER JOIN aou_list
				  	ON sighting.aou_list_id = aou_list.id
				  INNER JOIN aou_order
				  	ON aou_list.order = aou_order.order_name
				  WHERE
				  MONTH(trip.trip_date) = {$monthNumber}				  	
				  GROUP BY
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.order,
				  aou_list.family,
				  aou_list.subfamily	
				  ORDER BY aou_list.common_name ASC";		
		return $this->getDataSource()->fetchAll($sql);
	}

	public function listSpeciesByOrder() {
		$sql = "SELECT
				  aou_order.id,
				  aou_order.order_name,
				  aou_order.notes AS order_notes,
				  ( SELECT COUNT(*)
                    FROM
                    aou_list aol2
                    WHERE
                    aol2.order = aou_order.order_name) AS order_species_count_all,		
				  COUNT(DISTINCT aou_list.id) AS speciesCount
				  FROM
				  sighting
				  INNER JOIN aou_list
				  	ON sighting.aou_list_id = aou_list.id
				  INNER JOIN aou_order
				  	ON aou_list.order = aou_order.order_name
				  GROUP BY
				  aou_order.order_name,
				  aou_order.notes				  
				  ORDER BY COUNT(DISTINCT aou_list.id) DESC";
		return $this->getDataSource()->fetchAll($sql);
	}

	public function listSpeciesForOrder($id) {
		$sql = "SELECT
		          aou_list.id,
				  aou_order.order_name,
				  aou_order.notes AS order_notes,		
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.family,
				  aou_list.subfamily,
				  (	SELECT COUNT(DISTINCT aou_list.id)
				  	FROM
				  	sighting
				  	INNER JOIN aou_list
				  		ON sighting.aou_list_id = aou_list.id
				    INNER JOIN aou_order ao2
				  		ON aou_list.order = ao2.order_name
				  	WHERE
				  	aou_order.order_name = ao2.order_name) AS order_species_count,
 				  COUNT(*) AS sightings,
				  MAX(trip.trip_date) AS last_seen
				  FROM
				  trip
				  INNER JOIN sighting
				  	ON trip.id = sighting.trip_id
				  INNER JOIN aou_list
				  	ON sighting.aou_list_id = aou_list.id
				  INNER JOIN aou_order
				  	ON aou_list.order = aou_order.order_name
				  WHERE
				  aou_order.id = {$id}				  	
				  GROUP BY
				  aou_list.id,
				  aou_list.common_name,
				  aou_list.scientific_name,
				  aou_list.order,
				  aou_list.family,
				  aou_list.subfamily				  
				  ORDER BY aou_order.order_name ASC, aou_list.common_name ASC";	
		return $this->getDataSource()->fetchAll($sql);	
	}
}