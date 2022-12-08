<?php 
	$action = isset($_GET['action']) ? $_GET['action'] : '';

    if($action == 'login'){
		include_once("controller/controller.php");
		$controller = new Login();
		$controller->loginCustomer();
	}else{
		include_once("controller/controller.php");
		$controller = new Login();
		$controller->showLoginPage();
	}


    ?>