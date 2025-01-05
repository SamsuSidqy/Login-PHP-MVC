<?php

class MiddlewareMain{


	public static function ExpiredSession($expired){
		$cekExpired = time() - $expired;
		$expiredTime = 240; // 4 Menit / 240 Detik

		if ($cekExpired > $expiredTime) {
			$_SESSION['authentication'] = false;
			$_SESSION['user'] = null;
			$_SESSION['expired'] = null;
			return true;
		}else{
			return false;
		}

	}

}