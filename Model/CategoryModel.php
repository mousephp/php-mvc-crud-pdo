<?php 
require_once 'Model/Model.php';

class CategoryModel extends Model{
	// public $id;
	// public $name;

	function index(){

        //truy vấn
		$querySelect = $this->connection->prepare("SELECT * FROM categories");
		//            Thực thi truy vấn
		$querySelect->execute();
		//            Lấy dữ liệu thật
		$category = $querySelect->fetchAll(PDO::FETCH_ASSOC);

		return $category;
	}

	
//them
	public function insert($param = []) {
        //tạo và thực thi truy vấn
		$queryInsert = $this->connection->prepare("INSERT INTO categories(name) 
			VALUES (:name) ");

		$isInsert = $queryInsert->execute($param);
		
		return $isInsert;
	}



//lay id 
	public function getCateById($id) {
		$querySelect = $this->connection->prepare("SELECT * FROM categories WHERE id=:id");
		$querySelect ->bindParam(':id',$id);
		$querySelect ->execute();

		$cate = $querySelect->fetchAll(PDO::FETCH_ASSOC);

		return $cate[0];
	}

//sua (luy y sử dụng dấu ` ` hoặc không sử dụng trong truong csdl)
	public function update($cate = []) {
		
		$queryUpdate =$this->connection->prepare("UPDATE categories SET name = :name, updated_at = :updated_at WHERE id = :id ");//
		//print_r($queryUpdate);
		$isUpdate=$queryUpdate->execute($cate);
		
		return $isUpdate;
	}

//delete
	public function delete($id = null) {
		
		$queryDelete =$this->connection->prepare("DELETE FROM categories WHERE id = :id");
		$queryDelete->bindParam(':id',$id);
		$isDelete = $queryDelete->execute();

		return $isDelete;
	}


	
}

?>