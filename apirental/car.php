<?php

// header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");





include('connection.php');


$params = (array) json_decode(file_get_contents('php://input'), TRUE);




if(!empty($params))
{
	
   
	
	$model = $params['model'];
	$condition = $params['condition'];
	$type = $params['type'];
	$car_no = $params['car_no'];
	$retail_shop_id = $params['retail_shop_id'];
	$rent = $params['rent'];
	
	
	
	
	$q="INSERT INTO `cars` (`model`,`condition`,type,car_no,retail_shop_id,rent) VALUES ($model,$condition,'$type',$car_no,$retail_shop_id,$rent)" ;
		//echo $q;
		$data = mysqli_query($con,$q);
		
		if($data)
		{
		echo json_encode(array("message"=>"Successfully Registerd","status"=>1));

		}
		else
		{
			echo json_encode(array("message"=>"Oops! Something went wrong ".mysqli_error($con),"status"=>0));
			
			//
			
			// echo json_encode(array("message" => "Not insserted."));
		}
	
	
}else{
	
	echo json_encode(array("status"=>2,"message" => "Empty parameter."));
}

?>