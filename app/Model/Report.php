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
			$sql = "CALL proc_listSpeciesAll();";
			$result = $this -> getDataSource() -> fetchAll($sql);
			Cache::write($key, $result);
		}
		return $result;
	}

	/**
	 * Query for Top Twenty page.
	 *
	 * @return array of results
	 */
	public function listTopTwenty() {
		$key = __METHOD__;
		$result = Cache::read($key);
		if ($result == FALSE) {
			$sql = "CALL proc_listTopTwenty();";
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
			$sql = "CALL proc_getSpecies(:id);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => (int)$id));
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
			$sql = "CALL proc_listMonthsForSpecies(:id);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => (int)$id));
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
			$sql = "CALL proc_listLocations();";
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
			$sql = "CALL proc_getLocation(:id);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => (int)$id));
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
			$sql = "CALL proc_listSightingsForLocation(:id);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => (int)$id));
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
			$sql = "CALL proc_listSpeciesByMonth();";
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
			$sql = "CALL proc_listTwoSpeciesByMonth();";
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
			$sql = "CALL proc_listSpeciesByYear();";
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
			$sql = "CALL proc_listSpeciesByCounty();";
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
			$sql = "CALL proc_listSpeciesForMonth(:monthNumber);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('monthNumber' => (int)$monthNumber));
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
			$sql = "CALL proc_listSpeciesByOrder();";
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
			$sql = "CALL proc_listSpeciesForOrder(:id);";
			$result = $this -> getDataSource() -> fetchAll($sql, array('id' => (int)$id));
			Cache::write($key, $result);
		}
		return $result;
	}

}
