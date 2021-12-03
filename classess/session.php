<?php
	class Session
	{
		public static function init(){
			session_start();	
		}

		public static function getValue($session_index){
			return $_SESSION[$session_index];
		}

		public static function setValue($session_index,$session_value){
			$_SESSION[$session_index] = $session_value;
		}

		public static function checkSession($session_index){
			if(isset($_SESSION[$session_index])){
				return true;
			}
			return false;
		}

		public static function destroyValues(){
			session_destroy();
		}
	}