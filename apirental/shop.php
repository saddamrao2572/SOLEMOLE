<?php

header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('connection.php');


$params = (array) json_decode(file_get_contents('php://input'), TRUE);

if(!empty($params))
{
	
	$name = $params['shop_name'];
     
    $cell_no = $params['cell_no'];

	$address = $params['address'];

	$customer_id = $params['customer_id'];

	$longitude = $params['longitude'];
	
	$latitude = $params['latitude'];

	

	$q="INSERT INTO shop (shop_name,cell_no,address,customer_id,latitude,longitude) VALUES ('$name','$cell_no','$address','$customer_id','$latitude','$longitude')" ;

		

		$data = mysqli_query($con,$q);   
		
		//$row =mysqli_fetch($data);
		

		if($data)       {
			
			$q2="SELECT MAX( id ) FROM shop";
			
			$data1=mysqli_query($con,$q2);
            $row2=mysqli_fetch_array($data1);
			
			
			$last_id =$row2[0];
		   

		echo json_encode(array("message"=>"Successfully Shop Created","status"=>1,'id'=>$last_id,'shop_name'=>$name,'cell_no'=>$cell_no,'address'=>$address,'customer_id'=>$customer_id));

		}else{
			echo json_encode(array("message"=>"Oops! Something went wrong ","status"=>0));

		}

}else{

	echo json_encode(array("status"=>2,"message" => "Empty parameter."));

}


?>