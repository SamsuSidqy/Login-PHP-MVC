<?php  

require_once __DIR__ . '/../../view/template.php';
require_once __DIR__ . '/../../model/user/User.php';


class SettingsController{

	public static function Index($req,$page,$type){
		$views = new Template();
		$user = new User();
		
		list($option,$result) = $user->getUser();

		$data = [
			'username' => $result['username'],
			'name' => $result['name'],
			'email' => $result['email']
		];

		return $views->view($page,$type,$data);
	}


	public static function HandleUpdate($req,$page,$type){
		$value = extract($req);
		$user = new User();

		if ($value) {
			$username = $req['username'];
			$name = $req['name'];
			$email = $req['email'];

			list($option,$result) = $user->updateUser($username,$name,$email);
			if ($option) {
				$_SESSION['user'] = $req['username'];
				header('Location:' . $_ENV['ADDRESS'] . '?page=' . $page);

			}
		}
	}
}