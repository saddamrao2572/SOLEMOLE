<?php

//header("Content-Type: multipart/form-data; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");





include('connection.php');


$params = (array) json_decode(file_get_contents('php://input'), TRUE);




if(!empty($params))
{
	
	$c = $params['name'];
	
	


		$q="INSERT INTO tbl (name) VALUES ('$c')" ;
		//echo $q;
		$data = mysqli_query($con,$q);
		if($data)
		{
		echo json_encode(array("message" => "Succesfully inserted"));

		}
		else
		{
			echo json_encode(array("message" => "Not insserted."));
		}
	
	
}else{
	
	echo json_encode(array("message" => "Empty parameter."));
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