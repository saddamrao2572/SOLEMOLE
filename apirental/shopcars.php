<?php
//header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('connection.php');


$params = (array) json_decode(file_get_contents('php://input'), TRUE);


if(!empty($_GET))
{
	$id = $_GET['id'];
	
	$q="SELECT * FROM cars WHERE `retail_shop_id`='$id'";
	$data=mysqli_query($con,$q);
	
   
	
	
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
			echo json_encode(array("message"=>"Oops! Something went wrong " ,"status"=>0));
		}
	
	
}
else{
	
	echo json_encode(array("status"=>2,"message" => "Empty parameter."));
}

?>