<?php 
require_once 'Model/Model.php';

class BookModel extends Model
{
	
	function index(){
		//$querySelect=$this->connection->prepare("SELECT * FROM books");
		$querySelect = $this->connection
		->prepare("SELECT books.*,
			categories.name AS cate_name
			FROM books
			INNER JOIN categories ON books.cate_id = categories.id");

		$querySelect->execute();
		$books=$querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $books;
	}

	function store($arr_params = []){
		$queryInsert=$this->connection->prepare("INSERT INTO books(cate_id,code,name,price) VALUES(:cate_id,:code,:name,:price) ");
		$isInsert=$queryInsert->execute($arr_params );
		return $isInsert;
	}

	function getBookById($id){
		$query=$this->connection->prepare("SELECT * FROM books WHERE id=:id");
		$arr_param = [
			':id' => $id
		];
		//$querySelect ->bindParam(':id',$id);
		$query->execute($arr_param);
		$getid=$query->fetchAll(PDO::FETCH_ASSOC);
		return $getid[0];//bat buoc
	}

	function update($book=[]){
		$queryUpdate=$this->connection->prepare("UPDATE books SET cate_id=:cate_id,code=:code,name=:name,price=:price,updated_at=:updated_at WHERE id = :id ");
		$isUpdate=$queryUpdate->execute($book);
		return $isUpdate;
	}

	function destroy($id){
		$queryDelete=$this->connection->prepare("DELETE FROM books WHERE id=:id");
		$queryDelete->bindParam(':id',$id);
		$isDelete=$queryDelete->execute();
		return $isDelete;
	}



}



?>