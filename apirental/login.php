<?php

header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type,Access-Control-Max-Age,Access-Control-Allow-Methods");

include('connection.php');

 $params=$_POST;
// print_r($params['email']);
// exit;

$params = (array) json_decode(file_get_contents('php://input'), TRUE);

if(!empty($params))
{
	$password = $params['password'];
	$email = $params['email'];
	
	$sql = "SELECT * FROM customer WHERE `email`='$email' AND `password`='$password'";
	
	
	
     if($result = mysqli_query($con,$sql))
	 {
		if (mysqli_num_rows($result) > 0) {
			$row = $result->fetch_assoc();							
			echo json_encode(array("message"=>"Successfully Login","status"=>1,'id'=>$row['id'],'name'=>$row['name'],'cell_no'=>$row['cell_no'],'address'=>$row['address'],'type'=>$row['type'],'email'=>$row['email']));
			
			
			
		} else {
			echo json_encode(array("message"=>"Email or Password incorrect","status"=>0));
		}
	 }else {
			echo json_encode(array("message"=>"Empty Username or Password","status"=>3));
		}





		
		// echo json_encode(array("status"=>1));

		
	
	
}else{
	
	echo json_encode(array("status"=>2,"message" => "Empty "));
}

// if(isset($_GET['name']))
// {
// $c = $_GET['name'];


// $q="INSERT INTO tbl (name) VALUES ('$c')" ;
// echo $q;
// $data = mysqli_query($con,$q);
// if($data)
// {
// echo "inserted ";

// }
// else
// {
	// echo "not inserted", mysqli_error($con);
// }
// }
?>