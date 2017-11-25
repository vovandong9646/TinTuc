<?php  
	require_once(__DIR__."/Database.php");
	class Category extends Database{

		public function getCategory(){
			$sql = "SELECT * FROM categories LIMIT 10";
			$this->setQuery($sql);
			$categories = $this->loadAllRow();
			return $categories;
		}

		public function add($name){
			$sql = "INSERT INTO categories (name) VALUES (?)";
			$this->setQuery($sql);
			$this->execute([$name]);
		}

		public function getName($name){
			$sql = "SELECT * FROM categories WHERE name = ?";
			$this->setQuery($sql);
			$exist = $this->loadARow([$name]);
			return $exist;
		}

		public function getNameById($id){
			$sql = "SELECT * FROM categories WHERE id=?";
			$this->setQuery($sql);
			$nameById = $this->loadARow([$id]);
			return $nameById;
		}

		public function update($name,$id){
			$sql = "UPDATE categories SET name = ? WHERE id = ?";
			$this->setQuery($sql);
			$update = $this->execute([$name,$id]);
			return $update;
		}
		public function delete($id){
			$sql = "DELETE FROM categories WHERE id = ?";
			$this->setQuery($sql);
			$delete = $this->execute([$id]);
			return $delete;
		}

	}


?>