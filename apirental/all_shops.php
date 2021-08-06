<?php

header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('connection.php');


// $params = (array) json_decode(file_get_contents('php://input'), TRUE);



// if(!empty($params))
// {
	
	
	
	$q="SELECT * FROM shop";
	$data=mysqli_query($con,$q);
    //$row=mysqli_fetch_array($data);
	
		if($data)
		{
			
			 while($r=mysqli_fetch_object($data))
					{
						$res[]=$r;
					}

				
			
		   	echo json_encode($res);

		}
		else
		{
			
			echo json_encode(array("message"=>$params ,"status"=>0));
			// echo json_encode(array("message" => "Not insserted."));
			//"Oops! Something went wrong "
		}
	
	
// }
// else{
	
	// echo json_encode(array("status"=>2,"message" => "Empty parameter."));
// }

?>