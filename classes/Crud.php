<?php
	include_once 'DbConfig.php';
	
	class Crud extends DbConfig {

		public function __construct() {
			parent::__construct();
		}

		public function getData($query) {

			$stmt = $this->conn->prepare($query);
			$stmt->execute();
			if ($stmt == false) {	
				return false;
			}

			$rows = array();

			while($row = $stmt->fetch()) {
				$rows[] = $row;
			}

			return $rows;
		}

		public function execute($query, $name, $age, $email, $optional) {
			$stmt = $this->conn->prepare($query);
			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':age', $age);
			$stmt->bindValue(':email', $email);
			if (isset($optional["id"])) {
				$stmt->bindValue(':id', $optional["id"]);
			}

			$stmt->execute();
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
			$stmt->execute();
			if ($stmt == false) {
				echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			} else {
				return true;
			}
		}
	}
?>