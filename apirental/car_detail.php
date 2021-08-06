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
	
	$id = $params['id'];
	//$id = 1;
	
	$q="SELECT * FROM cars where `id`='$id'";
	$data=mysqli_query($con,$q);
    $row=mysqli_fetch_array($data);
	
		if($data)
		{
			// print_r($data);
		//	echo $row['model'];
		echo json_encode(array("status"=>1,"id"=>$row['id'],'model'=>$row['model'],'condition'=>$row['condition'],'type'=>$row['type'],'car_no'=>$row['car_no'],'retail_shop_id'=>$row['retail_shop_id'],'rent'=>$row['rent']));

		}
		else
		{
			//echo "njkhk";
			echo json_encode(array("message"=>"Oops! Something went wrong " ,"status"=>0));
			
			
		}
	
	
}
else{
	
	echo json_encode(array("status"=>2,"message" => "Empty parameter."));
}

?>