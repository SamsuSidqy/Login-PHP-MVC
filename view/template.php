<?php  



class Template{

	public function view($page, $type, $data=[]){
		extract($data);

		if ($type == 'auth') {

			return include 'user/'. $page . '.php';

		}else if($type == 'authenticated'){

			return include 'dashboard/'. $page . '.php';
			
		}
	}

}


