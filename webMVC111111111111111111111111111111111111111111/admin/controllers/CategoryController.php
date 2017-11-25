<?php  
	require_once(__DIR__."/../models/Category.php");
	class CategoryController{

		public function actionList(){
			$CateModel = new Category();
			$categories = $CateModel->getCategory();
			include(__DIR__."/../views/Categories/index.php");
		}
		public function actionAdd(){
	
			$CateModel = new Category();

			// kiem tra du lieu co trong khong
			if(isset($_POST['ok'])){
				$name = $_POST['txtCateName'];

				if(empty($name)){
					$error = "Vui lòng Nhập vào trường này";
				}else{
					// kiem tra du lieu co bi trung hay khong
					$exits = $CateModel->getName($name);
					if($exits != FALSE){
						$error = "Dữ Liệu Đã Tồn Tại";
					}else{
						$CateModel->add($name);
						header("location:index.php?ctrl=category");
					}
				}
				

			}

			include(__DIR__."/../views/Categories/addCategory.php");
		}

		public function actionEdit(){
			$id = $_GET['id'];
			$CateModel = new Category();
			$nameOld = $CateModel->getNameById($id);

			if(isset($_POST['ok'])){

				$nameNew = $_POST['txtCateName'];
				if(empty($nameNew)){
					$error = "Dữ Liệu Không Được Trống";
				}else{
					$check = $CateModel->getName($nameNew);
					if($check != FALSE){
						$error = "Dữ Liệu Đã Tồn Tại";
					}else{
						$CateModel->update($nameNew,$id);
						header("location:index.php?ctrl=category");
					}
				}


			}


			include(__DIR__."/../views/Categories/editCategory.php");
		}

		public function actionDelete(){
			$id = $_GET['id'];
			$cateModel = new Category();
			$cateModel->delete($id);
			header("location:index.php?ctrl=category");
		}




	}

?>