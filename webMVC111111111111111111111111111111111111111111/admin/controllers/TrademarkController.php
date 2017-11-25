<?php  
	require_once(__DIR__."/../models/Trademark.php");
	class TrademarkController{

		public function actionList(){

			$trademarkModel = new Trademark();
			$trademarks = $trademarkModel->getIndex();
			include(__DIR__."/../views/Trademarks/index.php");
		}
	}

?>