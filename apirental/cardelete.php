<?php

// header("Content-Type: multipart/form-data; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");





include('connection.php');

//$dv=$_POST;
//PRINT_r($dv);
//exit;
//$params = (array) json_decode(file_get_contents('php://input'), TRUE);



//if(!empty($params))
//{
	
	//$id = $params['id'];
	$id =1;
	
	$q="DELETE FROM cars WHERE id='$id'" ;
    $data = mysqli_query($con,$q);
	
		if($data)
		{
			print_r($data);
			//echo $row['model'];
		//echo json_encode(array("message"=>"Successfully Registerd".$params,"status"=>1));

		}
		else
		{
			echo "njkhk";
			//echo json_encode(array("message"=>$params ,"status"=>0));
			// echo json_encode(array("message" => "Not insserted."));
			//"Oops! Something went wrong "
		}
	
	
//}
//else{
	
	//echo json_encode(array("status"=>2,"message" => "Empty parameter."));
//}

?>