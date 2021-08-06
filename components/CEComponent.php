<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class CEComponent extends Component {

	//add product or deal in cart
	public function addToCart($shid,$prid,$brid,$type,$brimei,$totprice,$paidprice,$fualt,$warranty,$condition,$assec)
	{
		if(!empty($prid))
		{
			if(!isset($_SESSION['cartItem']))
			{
				$_SESSION['cartItem'] = [];
			}
			if(!isset($_SESSION['cartTotal']))
			{
				$_SESSION['cartTotal'] = [];
			}
			if(!isset($_SESSION['sampleCart']))
			{
				$_SESSION['sampleCart'] = [];
			}
			
			if(isset($_SESSION['cartTotal']) && isset($_SESSION['cartItem']))
			{	
		
				// if (in_array($id, $_SESSION['sampleCart'][id]))
				  // {
				  // print_r($_SESSION['sampleCart']);
					  // exit;
				  // }else{
					  // echo 'not found';
					  // exit;
				  // }
				 
				  
				 if(in_array($prid, array_column($_SESSION['sampleCart'], 'prid'))) {
				 
					$count=-1;
					foreach($_SESSION['sampleCart'] as $row)
					{
						$count++;
						if($row['prid']==$prid)
						{
							//$priceUpdate=$row['price']+$price;
							$quantityUpdate=$row['quantity']+$quantity;
							//$_SESSION['sampleCart'][$count]['price']=$price*$quantityUpdate;
							$_SESSION['sampleCart'][$count]['quantity']=$quantityUpdate;
							
							return true;
						}
						
					}
				}
				else
				{
					$cartItem=array_push($_SESSION['cartItem'],$prid);
					
					$price=$totprice-$paidprice;
					$cartTotal=array_push($_SESSION['cartTotal'],$price);
					$cartDetails=array('shid'=>$shid,'prid'=>$prid, 'brid'=>$brid, 'type'=>$type, 'brimei'=>$brimei, 'totprice'=>$totprice,'paidprice'=>$paidprice,'fualt'=>$fualt,'warranty'=>$warranty,'condition'=>$condition,'assec'=>$assec);
					
					$v=array_push($_SESSION['sampleCart'],$cartDetails);
				
		
				return true;
				}
				  
			}
			else
			{
				return false;
				var_dump('error');
				exit;
			}
		
        }

	}//end of add product or deal in cart
	
}
