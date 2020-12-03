<?php 
session_start();

// luy ý mọi hoạt động sẽ chạy từ file index này

 
 date_default_timezone_set('Asia/Ho_Chi_Minh');
// //echo date('H:i:s d-m-Y');
// echo "bây giờ là:".date("Y-m-d h:i:sa", time());

// (1) kt xem có tồn tai controller và action 
//$controller là lấy ra tên controller và $action là phương thức của controller ấy
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Category';
//lấy ra action
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
print_r($controller);//Category
echo "<hr>";
print_r($action);//index
echo "<hr>";

//(2)
$controller = ucfirst($controller);
//nối chuỗi Controller.php để thành tên 1 file
$fileController = $controller . "Controller.php";
print_r($fileController);//CategoryController.php
echo "<hr>";


// (3)tạo đường dẫn tới file Controller 
$pathController = "Controller/$fileController";
print_r($pathController);//Controller/CategoryController.php
echo "<hr>";

// (4)
if (!file_exists($pathController)) {
    die("Trang bạn tìm không tồn tại");
}
require_once "$pathController";


//(5) tạo đới tượng từ file Controller
$classController = $controller."Controller";
$object = new $classController();
print_r($classController); //CategoryController
echo "<hr>";

//(6) kt và trỏ tới phương thức của Controller
if (!method_exists($object, $action)) {
    die("Phương thức $action không tồn tại trong class $classController");
}
$object->$action();//mặt định khi vào trang $object->index của CategoryController.php



 ?>