<?php  
	require_once(__DIR__."/Database.php");
	class Trademark extends Database{

		public function getIndex(){
			$sql = "SELECT * FROM trademarks";
			$this->setQuery($sql);
			$trademarks = $this->loadAllRow();
			return $trademarks;
		}

		

	}

?>