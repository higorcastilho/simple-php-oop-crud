<?php
class DbConfig {
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'php_oop_crud_database';

	protected $conn;

	public function __construct() {
		if (!isset($this->conn)) {
			$this->conn = new PDO(
				'mysql: host=localhost;dbname=php_oop_crud_database', 'root', '',
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