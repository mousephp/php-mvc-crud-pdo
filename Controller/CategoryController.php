<?php 
require_once 'Model/CategoryModel.php';
//date_default_timezone_set('Asia/Ho_Chi_Minh');

class CategoryController{
//	function __construct(){}

	public function index(){
		//echo "<h1 class='text-center'>Trang liệt kê sách</h1>";
		$cate = new CategoryModel();
		$category = $cate->index();
		include 'View/Category/listCate.php';
	}

	public function add() {
		$error = '';
        //xử lý submit form
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];

			if (empty($name)) {
				$error = "Name không được để trống";
			}else {
				$cate = new CategoryModel();
				$cateArr = [
					':name' => $name					
				];

				$isInsert = $cate->insert($cateArr);
				if ($isInsert) {
					$_SESSION['success'] = "Thêm mới thành công";
				}
				else {
					$_SESSION['error'] = "Thêm mới thất bại";
				}
				header("Location: index.php?controller=Category&action=index");
				exit();
			}
		}
        //gọi view
		require_once 'View/Category/addCate.php';
	}


	public function edit() {
        // lấy ra thông tin sách dựa theo id đã gắn trên url
        // xử lý validate cho trường hợp id truyền lên không hợp lệ
		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "Tham số không hợp lệ";
			header("Location: index.php?controller=Category&action=index");
			exit();
		}
		if (!is_numeric($_GET['id'])) {
			$_SESSION['error'] = "Id phải là số";
			header("Location: index.php?controller=Category&action=index");
			exit();
		}

		$id = $_GET['id'];
        //gọi model để lấy ra đối tượng sách theo id
		$cateModel = new CategoryModel();
		//$cate duoc truyền sang getCateById và biến $cate sẽ show ra view edit
		$cate = $cateModel->getCateById($id);

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
		$error = '';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
            //check validate dữ liệu
			if (empty($name)) {
				$error = "Name không được để trống";
			}else {
                //xử lý update dữ liệu vào hệ thống
				$cateModel = new CategoryModel();
				$cateArr = [
					'id' => $id,
					'name' => $name,
					'updated_at'=> date("Y-m-d h:i:s", time()),//sử dụng h:i:s=>true, h:i:sa=>false
				];
				//print_r($cateArr);
				$isUpdate = $cateModel->update($cateArr);
				if ($isUpdate) {
					$_SESSION['success'] = "<h4 class='text-center'>Update bản ghi #$id thành công</h4>";
				}
				else {
					$_SESSION['error'] = "<h4 class='text-center'>Update bản ghi #$id thất bại</h4>";
				}
				header("Location: index.php?controller=Category&action=index");
				exit();
			}
		}
        //truyền ra view
		require_once 'View/Category/editCate.php';
	}


	public function delete() {
 		//url trên trình dueyjet sẽ có dạng
		// ?controller=cate&action=delete&id=1
 		//bắt id từ trình duyêt
		$id = $_GET['id'];
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = "ID phải là số";
			header("Location: index.php?controller=Category&action=index");
			exit();
		}

		$cate = new CategoryModel();
		$isDelete = $cate->delete($id);

		if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
            //báo lỗi
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controller=Category&action=index");
		exit();
	}



}


?>
