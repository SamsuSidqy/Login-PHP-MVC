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
		$this->conn->close();
		return $result;
	}	

	public function cekEmail($email){
		$query = $this->conn->prepare("SELECT * FROM users WHERE email=?");
		$query->bind_param("s",$email);
		$query->execute();
		$result = $query->get_result()->num_rows;
		return $result;
	}

	public function authenticate($email,$password){
		$query = $this->conn->prepare("SELECT * FROM users WHERE email=?");
		$query->bind_param("s",$email);

		// Jalankan query dan ambil hasilnya
	    if ($query->execute()) {
	        $result = $query->get_result();
	        
	        // Jika ada pengguna yang ditemukan
	        if ($result->num_rows > 0) {
	            $user = $result->fetch_assoc();
	            
	            // Cek password menggunakan password_verify
	            $cekPassword = password_verify($password, $user['password']);
	            
	            if ($cekPassword) {
	                return [true, $user];
	            } else {
	                return [false, null];  // Password tidak cocok
	            }
	        } else {
	            return [false, null];  // Pengguna tidak ditemukan
	        }
	    } else {
	        // Jika query gagal dieksekusi
	        return [false, null];  // Atau bisa juga menambahkan pesan error
	    }

	}

	public function getUser(){
		if (isset($_SESSION['id'])) {
			$query = $this->conn->prepare("SELECT * FROM users WHERE id=?");
			$query->bind_param("s",$_SESSION['id']);
			// Jalankan query dan ambil hasilnya
		    if ($query->execute()) {
		        $result = $query->get_result();
		        
		        // Jika ada pengguna yang ditemukan
		        if ($result->num_rows > 0) {
		            $user = $result->fetch_assoc();
		            return [true, $user];		            
		        } else {
		            return [false, null];  // Pengguna tidak ditemukan
		        }
		    } else {
		        // Jika query gagal dieksekusi
		        return [false, null];  // Atau bisa juga menambahkan pesan error
		    }
		}else{
			return [false,null];
		}
	}

	public function insertUser($email,$username,$password,$name){
		$query = $this->conn->prepare("INSERT INTO users (email,username,password,name) VALUES 
			(?,?,?,?)");
		$query->bind_param("ssss",$email,$username,$password,$name);	

	    if ($query->execute()) {	    
	        if ($query->affected_rows  > 0) {	        	        	

	        	return [true,$query->insert_id];
	        }else{
	        	$query->close();
	    		$this->conn->close();

	        	return [false,null];
	        }
	    } else {
	    	$query->close();
	    	$this->conn->close();

	        return [false,null];
	    }	    	   
	}

	public function updateUser($username,$name,$email){
		$query = $this->conn->prepare("UPDATE users SET username=?,name=?,email=?");
		$query->bind_param("sss",$username,$name,$email);	

	    if ($query->execute()) {	    
	        if ($query->affected_rows  > 0) {	        	        	

	        	return [true,$query->insert_id];
	        }else{
	        	$query->close();
	    		$this->conn->close();

	        	return [false,null];
	        }
	    } else {
	    	$query->close();
	    	$this->conn->close();

	        return [false,null];
	    }
	}

}


