<?php
	session_start();
	class Login {
		private $logins = [];
		public function __construct(){
			$logins = file_get_contents ('login-parol.json');
			$this->logins = json_decode ($logins, true);
		}
		public function avtorizatsiya ($login, $pas= "" ){
			foreach ($this->logins as $alogin){
				if ($alogin['login'] == $login && $alogin['pas'] == $pas && $pas != ""){
					$_SESSION['user'] = $alogin;
					$_SESSION['user'] ['role'] = 'admin';
					
					return true;	
				}
			}
			$_SESSION['user']['name'] = $login;
			$_SESSION['user'] ['role'] = 'user';
			return true;
			
		}
		
		function getUserRole() {
			return $_SESSION['user'] ['role'];
		}
		
		function isAdmin() {
			if ($_SESSION['user'] ['role'] == 'admin' ){
				return  true;
			}
			return false;
		}
		function getUserName() {
			return $_SESSION['user']['name'];
		}
	}
	
?>
