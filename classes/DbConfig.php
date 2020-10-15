<?php
class DbConfig {
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'php_oop_crud_database';

	protected $conn;

	protected function __construct() {
		if (!isset($this->conn)) {
			$dsn = 'mysql: host=' . $this->_host . '; dbname=' . $this->_database;
			$this->conn = new PDO(
				$dsn, $this->_username, $this->_password,
				array(
					PDO::ATTR_PERSISTENT => true
				)
			); 

			if (!$this->conn) {
				echo 'Cannot connect to database server';
				exit;
			}
		}
		return $this->conn;
	}
}
?>