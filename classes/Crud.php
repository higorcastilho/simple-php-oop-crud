<?php
	include_once 'DbConfig.php';
	
	class Crud extends DbConfig {

		public function __construct() {
			parent::__construct();
		}

		public function getData($query) {

			$stmt = $this->conn->prepare($query);

			if ($stmt == false) {
				return false;
			}

			$rows = array();

			while($row = $stmt->fetchAll()) {
				$rows[] = $row;
			}

			return $rows;
		}

		public function execute($query) {
			$stmt = $this->conn->prepare($query);
			if ($stmt == false) {
				echo 'Error: cannot execute the command';
				return false;
			} else {
				return true;
			}
		}

		public function delete($id, $table) {
			$query = "DELETE FROM $table WHERE id = $id";

			$stmt = $this->conn->prepare($query);

			if ($stmt == false) {
				echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			} else {
				return true;
			}
		}

		/*public function escape_string($value) {
			return $this->connection->real_escape_string($value);
		}*/
	}
?>