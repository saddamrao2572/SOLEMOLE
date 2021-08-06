<?php

header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");





include('connection.php');

//$dv=$_POST;
//PRINT_r($dv);
//exit;
$params = (array) json_decode(file_get_contents('php://input'), TRUE);



if(!empty($params))
{
	
	$model = $params['model'];
	$condition = $params['condition'];
	$type = $params['type'];
	$car_no = $params['car_no'];
	$retail_shop_id = $params['retail_shop_id'];
	$rent = $params['rent'];
	
	$q="UPDATE  cars SET `model`='$model',`condition`='$condition',`car_no`='$car_no',`type`='$type',`rent`='$rent' WHERE id = '$id'" ;
	
    $data = mysqli_query($con,$q);
	
		if($data)
		{
			print_r($data);
			//echo $row['model'];
			
			
		echo json_encode(array("message"=>"Successfully Registerd".$params,"status"=>1));

		}
		else
		{
			
			echo json_encode(array("message"=>"Oops! Something went wrong " ,"status"=>0));
			
			
		}
	
	
}
else{
	
	echo json_encode(array("status"=>2,"message" => "Empty parameter."));
}

?>