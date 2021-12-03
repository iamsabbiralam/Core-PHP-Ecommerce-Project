<?php
	class Views
	{
		public $data = "";
		public function render($name,$data=false,$folder=""){
			if($data){
				$this->data = $data;
			}
			ob_start();
			require("../views/".$folder.$name.".php");
		}
	}