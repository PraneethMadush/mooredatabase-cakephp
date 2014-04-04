<?php
App::uses('AppModel', 'Model');
class Report extends Model {

    public $name = 'user'; // just need something here that is in database (users)

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
		return $this->query($sql);
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
                  aou_list.subfamily;";	
		return array_pop($this->query($sql));
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
		return $this->query($sql);	
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
		return $this->query($sql);				
	}	

	public function getLocation($id) {
		$sql = "SELECT * FROM location WHERE id = {$id};";
		return array_pop($this->query($sql));
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
		  return $this->query($sql);
	}

}