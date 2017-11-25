<?php  
	class Database{
		private $dsn = "mysql:host=localhost;dbname=phoneshop";
		private $user = "root";
		private $pass = "";
		private $db = "";
		private $pre = "";
		private $_sql = "";

		public function Database(){
			try{
				$this->db = new PDO($this->dsn,$this->user,$this->pass);
				$this->db->query("SET NAMES UTF8");
			}catch(PDOException $e){
				echo $e->getMessage();
				die();
			}
		}


		public function setQuery($sql){
			return $this->_sql = $sql;
		}

		public function execute($options=[]){
			$this->pre = $this->db->prepare($this->_sql);
			if($options){
				for($i=0;$i<count($options);$i++){
					$this->pre->bindValue($i+1,$options[$i]);
				}
			}
			$this->pre->execute();
			return $this->pre;
		}

		public function loadARow($options=[]){
			if(!$options){
				if(!$result = $this->execute())
					return false;
			}else{
				if(!$result = $this->execute($options)){
					return false;
				}
			}
			return $this->pre->fetch(PDO::FETCH_ASSOC);
		}

		public function loadAllRow($options=[]){
			if(!$options){
				if(!$result = $this->execute())
					return false;
			}else{
				if(!$result = $this->execute($options))
					return false;
			}
			return $this->pre->fetchAll(PDO::FETCH_ASSOC);
		}

	}

?>