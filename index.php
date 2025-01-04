<?php  
session_start();



require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



if (isset($_GET['page'])) {

	$value = $_GET['page'];

	if ($value == 'login') {
		include 'view/user/login.php';
	}else if ($value == 'register') {
		include 'view/user/register.php';
	}else{
		include 'view/errors/404.php';
	}
	
}else{
	if ($_SESSION['authentication'] && $_SESSION['user'] != null) {
		include 'view/dashboard/index.php';	
	}else{
		header('Location:' . $_ENV['ADDRESS'] . '?page=login&message=LoginRequired');
	}
}


?>