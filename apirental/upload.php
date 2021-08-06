<?php 

 header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('connection.php');
$params =  (array)json_decode(file_get_contents('php://input'), TRUE);

 print_r($_POST);exit;
 
    // echo 'uhhiuahs';exit;
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);
	//echo $file_path;
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path) ){
        echo "success"; 
    } else{
        echo "fail";
    }
// move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_REQUEST["fileName"]);
?>