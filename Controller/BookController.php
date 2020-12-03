<?php 
require_once 'Model/BookModel.php';
require_once 'Model/CategoryModel.php';

class BookController
{
	
	public function index(){
		$book=new BookModel;
		$books=$book->index();
		//print_r($books);
		include_once('View/Book/ListBook.php');
	}

	public function create(){
		$error = '';

        //xử lý submit form
		if (isset($_POST['submit'])) {
			print_r('haha');
			$cate_id = $_POST['cate_id'];
			$code = $_POST['code'];
			$name = $_POST['name'];
			$price = $_POST['price'];

			if (empty($code) || empty($name) || empty($price)) {
				$error = " không được để trống";
			}else {
				$book = new BookModel();
				$bookArr = [
					':cate_id' => $cate_id,
					':code' => $code,
					':name' => $name,
					':price' => $price,					
				];

				$isInsert = $book->store($bookArr);
				print_r($isInsert);
				if ($isInsert) {
					$_SESSION['success'] = "<h4 class='text-center'>Thêm mới thành công</h4>";
				}
				else {
					$_SESSION['error'] = "<h4 class='text-center'>Thêm mới thất bại</h4>";
				}
				header("Location: index.php?controller=Book&action=index");
				exit();
			}
		}
		
        //gọi view
		$category=new CategoryModel;
		$categories=$category->index();
		require_once 'View/Book/addBook.php';

	}

	public function edit(){
		$error = '';
		$id=$_GET['id'];

		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "<h4 class='text-center'>Tham số không hợp lệ</h4>";
			header("Location: index.php?controller=book&action=index");
			exit();
		}

		if (!is_numeric($_GET['id'])) {
			$_SESSION['error'] = "<h4 class='text-center'>Id phải là số</h4>";
			header("Location: index.php?controller=book&action=index");
			exit();
		}

		$bookModel = new BookModel;
		//$book duoc truyền sang getCateById và biến $book sẽ show ra view edit
		$book = $bookModel->getBookById($id);

		if (isset($_POST['submit'])) {
			//print_r('haha');
			$cate_id = $_POST['cate_id'];
			$code = $_POST['code'];
			$name = $_POST['name'];
			$price = $_POST['price'];

			if (empty($code) || empty($name) || empty($price)) {
				$error = " không được để trống";
			}else {
				$books = new BookModel();
				$bookArr = [
					'id' => $id, //bat buoc
					':cate_id' => $cate_id,
					':code' => $code,
					':name' => $name,
					':price' => $price,					
					':updated_at' => date('Y-m-d H:i:s',time())
				];

				$isInsert = $books->update($bookArr);
				print_r($isInsert);
				if ($isInsert) {
					$_SESSION['success'] = "<h4 class='text-center'>Sửa mới thành công</h4>";
				}
				else {
					$_SESSION['error'] = "<h4 class='text-center'>Sửa mới thất bại</h4>";
				}
				header("Location: index.php?controller=Book&action=index");
				exit();
			}
		}
		
        //gọi view
		$category=new CategoryModel;
		$categories=$category->index();
		require_once 'View/Book/editBook.php';

	}
	
	public function delete(){
		$id=$_GET['id'];
		if (!isset($id) || !is_numeric($id)) {
			echo "<h4 class='text-center'>id Không hợp lệ</h4>";
			header("Location: index.php?controller=Category&action=index");
			exit();
		}
		$book=new BookModel;
		$isDelete=$book->destroy($id); 

		if ($isDelete) {
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controller=Book&action=index");
		exit();
		
	}


}





?>