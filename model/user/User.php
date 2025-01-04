<?php
require __DIR__ . '/../connection.php';


class User extends Connection{
	private $conn;

	public function __construct(){
		$this->conn = Connection::connect();
	}

	private function allData($data) {
    	$result = [];
    	while ($row = $data->fetch_assoc()) {
        	// Mengonversi array asosiatif menjadi objek
       	 	$result[] = (object) $row;
    	}
    	return $result;
	}


	public function getAllData(){
		$query = $this->conn->query("SELECT * FROM users");
		$result = $this->allData($query);
		return $result;

	}	

}


