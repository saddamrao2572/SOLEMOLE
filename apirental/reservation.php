<?php



// header("Content-Type: multipart/form-data; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include('connection.php');



$params = (array) json_decode(file_get_contents('php://input'), TRUE);




if(!empty($params))

{
	
	$car_id = $params['car_id'];
     
    $customer_id = $params['customer_id'];

	$status = $params['status'];

	$location = $params['location'];

	$destination = $params['destination'];
	
	$duration = $params['duration'];
	$event_type= $params['event_type'];
	$driver_status = $params['driver_status'];
	$cnic_image = $params['cnic_image'];
	$security_amount = $params['security_amount'];
	
	

	

	$q="INSERT INTO reservation (car_id,customer_id,status,location,destination,duration,event_type,driver_status,security_amount,cnic_image) VALUES ('$car_id','$customer_id','$status','$location','$destination','$duration','$event_type','$driver_status','$security_amount','$cnic_image')" ;

		//echo $q;

		$data = mysqli_query($con,$q);

		if($data)

		{

		echo json_encode(array("message"=>"Successfully Shop Created","status"=>1));



		}

		else

		{

			echo json_encode(array("message"=>"Oops! Something went wrong ","status"=>0));

			// echo json_encode(array("message" => "Not insserted."));

		}

	

	

}else{

	

	echo json_encode(array("status"=>2,"message" => "Empty parameter."));

}



?>