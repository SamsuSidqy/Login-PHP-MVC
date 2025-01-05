<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();


class Connection{

	public static function connect(){
		$servername = $_ENV['SERVER_DB'];
		$username = $_ENV['USERNAME_DB'];
		$password = $_ENV['PASSWORD_DB'];
		$DB_NAME = $_ENV['NAME_DB'];		

		try {
			$conn = new mysqli($servername, $username, $password,$DB_NAME);
			if (!$conn) {
				echo("Connection failed: " . mysqli_connect_error());
			}
			return $conn;
		} catch (Exception $e) {
			extract([
				'message' => $e
			]);
			die(include(__DIR__ . '/../view/errors/500.php'));
		}
	}





}


