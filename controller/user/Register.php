<?php

require_once __DIR__ . '/../../view/template.php';


class Register{

	public static function Index($page,$type){
		$views = new Template();		
		return $views->view($page,$type);
	}

}
