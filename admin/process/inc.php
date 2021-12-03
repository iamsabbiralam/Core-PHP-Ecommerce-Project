<?php
	require("../../conn/database.php");
	require("../../model/model.php");
	require("../../classess/session.php");
	require("../../classess/validation.php");
	require("../../classess/view.php");

	Session::init();
	
	if(!Session::checkSession("email")){
		header("location:../index.php?msg=Login First");
	}