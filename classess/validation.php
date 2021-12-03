<?php
	class Validation{
		private $error = "";
		private $is_error = false;

		/*$post_value = array[
			array => ["0" => "email", "1" => "required:email"],
			array => ["0" => "pass", "1" => "required:pass"],
		];*/

		public function __construct($post_value){
			foreach ($post_value as $value) {
				$rules = explode(":",$value[1]);
				foreach ($rules as $v) {
					if($v != "image" && $v != "image_required"){
						$this->{$v}($_REQUEST[$value[0]]);
					}
					elseif($v == "image_required"){
						$this->image_required($_FILES[$value[0]]);
					}
					else{
						$this->image($_FILES[$value[0]],"products/");
					}
				}
			}
		}

		// required validation check
		public function required($val){
			if(isset($val) && !empty($val)){
				return true;
				}
				$this->is_error = true;
				$this->error .= "Fill all the required field.<br>";
			}
			// image required validation check
			public function image_required($val){
				if(isset($val['name']) && !empty($val['name'])){
					return true;
				}
				$this->is_error = true;
				$this->error .= "Required Image.<br>";
			}


		// email format check
		public function email($email){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				if(!$this->is_error){
					$this->error .= "Invalid Email.<br>";
				}
				$this->is_error = true;
			}
			else{
				return true;
			}
		}
		// password format check
		public function password($pwd){
			$uppercase = preg_match('@[A-Z]@', $pwd);
			$lowercase = preg_match('@[a-z]@', $pwd);
			$number = preg_match('@[0-9]@', $pwd);

			if(!$uppercase || !$lowercase || !$number || strlen($pwd) < 8){
				if(!$this->is_error){
					$this->error .= "Password Should at-least contain 1 Uppercase, 1 Lower case, 1 Number and not less than 8 charechters.<br>";
				}
				$this->is_error = true;
			}
			else{
				return true;
			}
		}

		// image checker
			public function image($img,$path){
				$new_path = "../assets/".$path;
				$target_file = $new_path.basename($img["name"]);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// size checker
				if ($img["size"] > 50000000) {
				  if(!$this->is_error){
				  	$this->error .= "File too large.<br>";
				  }
				  $this->is_error = true;
				}
				elseif(
					$imageFileType != "jpg" && 
					$imageFileType != "png" && 
					$imageFileType != "jpeg" && 
					$imageFileType != "gif" 
				) {
					  if(!$this->is_error){
					  $this->error .= "Sorry, Only jpg, png, jpeg and gif files are allowed.<br>";
					}
					$this->is_error = true;
				}
				// image existence checker
					elseif (file_exists($target_file)) {
					  if(!$this->is_error){
					  $this->error .= "Sorry, file already exist.";
					}
					$this->is_error = true;
				}
					else{
						return true;
					}
			}

		// dob checker
		/*public function dob($dob){
			if(!checkdate($dob){
				if(!$this->is_error){
					$this->error .= "Invalid date format.<br>";
				}
				$this->is_error = true;
			}
			else{
				return true;
			}
		}*/

			// msg checker
		public function isError(){
			if($this->is_error){
				return $this->error;
			}
			return false;
		}
	}
?>