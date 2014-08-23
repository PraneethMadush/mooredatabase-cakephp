<?php
App::uses('AppModel', 'Model');
class Report extends Model {

	// add these because we're bypassing the CakePHP model machinery and
	// executing SQL directly using PDO
	public $name = 'NoTableModel';
	public $useTable = false;

	/**
	 * Query for All Species page.
	 *
	 * @return array of results
	 */
	public function listSpeciesAll() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
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
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for All Species page.
	 *
	 * @return array of results
	 */
	public function listTopTwenty() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
			          aou_list.id,
					  aou_list.common_name,
					  COUNT(*) AS sightings
					  FROM
					  sighting
					  INNER JOIN aou_list
					  	ON sighting.aou_list_id = aou_list.id
					  GROUP BY
					  aou_list.id				  
					  ORDER BY sightings DESC, aou_list.common_name ASC
					  LIMIT 20;";
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}
	
	/**
	 * Query for species dialog / detail page.
	 *
	 * @param int $id
	 * @return array of results
	 */
	public function getSpecies($id) {
		$key = __METHOD__ . strval($id);
		$result = Cache::read($key);
		if ($result == FALSE) {
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
                      aou_list.id = :id                
                      GROUP BY
                      aou_list.id,
                      aou_order.order_name,
                      aou_order.notes,                      
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.order,
                      aou_list.family,
                      aou_list.subfamily";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => $id));
			Cache::write($key, $result);
		}
		return array_pop($result);
	}

	/**
	 * Query to list species' sightings by month.
	 * Used on species dialog page.
	 *
	 * @param int $id
	 */
	public function listMonthsForSpecies($id) {
		$key = __METHOD__ . strval($id);
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
					MIN(l.common_name) AS common_name,
			        MONTH(t.trip_date) AS monthNumber,
			        MONTHNAME(t.trip_date) AS monthName,
			        COUNT(DISTINCT s.id) AS sightingCount
			        FROM
			        sighting s
			        INNER JOIN trip t
			            ON s.trip_id = t.id
			        INNER JOIN aou_list l
			        	ON s.aou_list_id = l.id
			        WHERE
			        s.aou_list_id = :id
			        GROUP BY
			        MONTH(t.trip_date)
			        ORDER BY 1";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => $id));
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for list on Birding Locations page.
	 *
	 * @return array of results
	 */
	public function listLocations() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
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
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query to obtain location detail.
	 *
	 * @param int $id
	 * @return array of results
	 */
	public function getLocation($id) {
		$key = __METHOD__ . strval($id);
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT * FROM location WHERE id = :id;";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => $id));
			Cache::write($key, $result);
		}
		return array_pop($result);
	}

	/**
	 * Query for list of species sighted at location on location detail page.
	 *
	 * @param int $id
	 * @return array of results
	 */
	public function listSightingsForLocation($id) {
		$key = __METHOD__ . strval($id);
		$result = Cache::read($key);
		if ($result == FALSE) {
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
                      trip.location_id = :id
                      GROUP BY
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.order,
                      aou_list.family,
                      aou_list.subfamily                  
                      ORDER BY aou_list.common_name ASC";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => $id));
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for list of species by month.
	 *
	 * @return array of results
	 */
	public function listSpeciesByMonth() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
					MONTH(t.trip_date) AS monthNumber,
					CONCAT('/reports/species_by_month_list/',MONTH(t.trip_date)) AS url,
					MONTHNAME(t.trip_date) AS monthName,
					LEFT(MONTHNAME(t.trip_date),1) AS monthLetter,
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
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for list of species by month.
	 *
	 * @return array of results
	 */
	public function listTwoSpeciesByMonth() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
					    MONTH(t.trip_date) AS monthNumber,
					    MONTHNAME(t.trip_date) AS monthName,
					    LEFT(MONTHNAME(t.trip_date), 1) AS monthLetter,
					    COUNT(DISTINCT(CASE WHEN l.order = 'Anseriformes' THEN l.id ELSE NULL END)) AS speciesCountAnseriformes,
						COUNT(DISTINCT(CASE WHEN l.order = 'Passeriformes' THEN l.id ELSE NULL END)) AS speciesCountPasseriformes
					FROM
					    aou_list l
					        INNER JOIN
					    sighting s ON l.id = s.aou_list_id
					        INNER JOIN
					    trip t ON s.trip_id = t.id
					WHERE
						l.order IN ('Anseriformes','Passeriformes')
					GROUP BY MONTH(t.trip_date)
					ORDER BY 1;";
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for list of species by year.
	 *
	 * @return array of results
	 */
	public function listSpeciesByYear() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
					YEAR(t.trip_date) AS yearNumber,
					COUNT(DISTINCT l.id) AS speciesCount,
					COUNT(DISTINCT t.id) AS tripCount
					FROM
					aou_list l
					INNER JOIN sighting s
						ON l.id = s.aou_list_id
					INNER JOIN trip t
						ON s.trip_id = t.id
					WHERE
					YEAR(t.trip_date) >= 2010
					GROUP BY
					YEAR(t.trip_date)
					ORDER BY 1";
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for list of species by county.
	 *
	 * @return array of results
	 */
	public function listSpeciesByCounty() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
					  MIN(location.county_name) AS countyName,
					  COUNT(DISTINCT aou_list.id) AS speciesCount,
					  COUNT(DISTINCT trip.id) AS tripCount
					  FROM
					  trip
					  INNER JOIN location
					  	ON trip.location_id = location.id				  
					  INNER JOIN sighting
					  	ON trip.id = sighting.trip_id
					  INNER JOIN aou_list
					  	ON sighting.aou_list_id = aou_list.id
					  GROUP BY
					  location.county_name				  
					  ORDER BY 2 DESC";
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query to list species for a month.
	 *
	 * @param int $monthNumber
	 * @return array of results
	 */
	public function listSpeciesForMonth($monthNumber) {
		$key = __METHOD__ . strval($monthNumber);
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
                      aou_list.id,
                      aou_order.order_name,
                      aou_order.notes AS order_notes,       
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.family,
                      aou_list.subfamily,
                      ( SELECT COUNT(DISTINCT aou_list.id)
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
                      MONTH(trip.trip_date) = :monthNumber                  
                      GROUP BY
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.order,
                      aou_list.family,
                      aou_list.subfamily    
                      ORDER BY aou_list.common_name ASC";
			$result = $this -> getDataSource() -> fetchAll($sql, array('monthNumber' => $monthNumber));
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query to list species by order.
	 *
	 * @return array of results
	 */
	public function listSpeciesByOrder() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
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
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query to list species sighted for an order.
	 *
	 * @param int $id
	 * @return array of results
	 */
	public function listSpeciesForOrder($id) {
		$key = __METHOD__ . strval($id);
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "SELECT
                      aou_list.id,
                      aou_order.order_name,
                      aou_order.notes AS order_notes,       
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.family,
                      aou_list.subfamily,
                      ( SELECT COUNT(DISTINCT aou_list.id)
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
                      aou_order.id = :id                    
                      GROUP BY
                      aou_list.id,
                      aou_list.common_name,
                      aou_list.scientific_name,
                      aou_list.order,
                      aou_list.family,
                      aou_list.subfamily                  
                      ORDER BY aou_order.order_name ASC, aou_list.common_name ASC";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => $id));
			Cache::write($key, $result);
		}
		return $result;
	}

}
