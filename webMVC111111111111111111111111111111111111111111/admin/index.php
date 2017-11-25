<?php  
	
	$controller = "category";
	if(isset($_GET['ctrl'])){
		$controller = $_GET['ctrl'];
	}

	$action = "List";
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

	$controllerName = ucfirst($controller)."Controller";
	$FileController = __DIR__."/controllers/".$controllerName.".php";

	if(file_exists($FileController)){
		require_once($FileController);
		$controller = new $controllerName();
		$actionName = "action".ucfirst($action);
		if(method_exists($controller,$actionName)){
			$controller->$actionName();
		}else{
			echo "404 action khong ton tai";
		}

	}else{
		echo "404 File Controller Khong ton tai";
	}


?>