<?php  

class Route{

	public static function get($request,$url,$controler){
		if ($request['page'] == $url) {
			return $controler;
		}
	}

}