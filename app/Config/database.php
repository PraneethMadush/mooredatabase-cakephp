<?php
class DATABASE_CONFIG {
	public $test = array();
	public $default = array();
	public $test_prod = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql57test.cd02yxrr7fxm.us-east-1.rds.amazonaws.com',
		'login' => 'birding_readonly',
		'password' => '2N64Op16LQR9fbj',
		'database' => 'birding',
	);
	public $default_prod = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'mysql57test.cd02yxrr7fxm.us-east-1.rds.amazonaws.com',
		'login' => 'birding_readonly',
		'password' => '2N64Op16LQR9fbj',
		'database' => 'birding',
	);
	public $default_dev = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => 'gsnyder56',
		'database' => 'birding',
	);
	public $test_dev = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '127.0.0.1',
		'login' => 'root',
		'password' => 'gsnyder56',
		'database' => 'birding' ,
	);
	function __construct() {
		if (IS_PROD) {
			$this->default = $this->default_prod;
			$this->test = $this->test_prod;
		} else {
			$this->default = $this->default_dev;
			$this->test = $this->test_dev;
		}
	}
}
		