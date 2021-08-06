<?php

 header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('connection.php');
$params =  (array)json_decode(file_get_contents('php://input'), TRUE);

if(!empty($params))
{	$name = $params['name'];
	$email = $params['email'];
	$cell_no = $params['cell_no'];
	$address = $params['address'];
	$type = $params['type'];
	$password = $params['password'];
	$q="INSERT INTO customer (name,email,cell_no,address,type,password) VALUES ('$name','$email','$cell_no','$address','$type','$password')" ;
		//echo $q;
		$data = mysqli_query($con,$q);
		if($data)
		{
		echo json_encode(array("message"=>"Successfully Registerd","status"=>1));

		}
		else
		{
			echo json_encode(array("message"=>mysqli_error($data) ,"status"=>0));
			// echo json_encode(array("message" => "Not insserted."));
			//"Oops! Something went wrong "
		}
	
	
}else{
	
	echo json_encode(array("status"=>2,"message" => "Empty parameter."));
}

?>