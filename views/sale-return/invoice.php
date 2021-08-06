<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
use app\models\Shop;
use app\models\Brand;
use kartik\widgets\FileInput;
use  yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use yii\widgets\ActiveForm;
?>

<?php 

	if (!empty($details)) {

		

?>	
<?php
$proname=\app\models\Product::find()->where(['id'=>$details->product_id])->one();
$brname=\app\models\Brand::find()->where(['id'=>$details->brand_id])->one();
$user_id=\Yii::$app->util->loggedinUserId();
$useremail=\app\models\User::find()->where(['id' => $user_id])->one();
$username=\app\models\UserDetails::find()->where(['user_id'=>$user_id])->one();
$shopdetails=\app\models\Shop::find()->where(['id'=>$details->shop_id])->one();
 ?>			
<!--CENTER SECTION-->

<style type="text/css">
	.invo-sub{
		font-size: 16px !important;
	}
	[class~=invoice-1-logo] span {
    font-size: 18.5pt !important;
}
[class~=tz-db-table] table tr th {
    color: white;
}
thead
{
	background-color: #253d52;
}
#invo-tot {
    font-size: 18px !important;
    color:  #253d52 !important;
}
</style>
			<div class="tz-2 tz-2-admin">
				<div class="tz-2-com tz-2-main">
					<h4>Invoice</h4>
					<a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
		            <ul id="dr-list" class="dropdown-content">
			            <li class="divider"></li>
			            <li><a href="<?=url::to(['sale-return/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
			        </ul>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<!-- <h2>Details Of Selected Item </h2> -->
							
						</div>
						<div class="invoice">
							<div class="invoice-1">
								<div class="invoice-1-logo">
									<img src="/uploads/shop_logo/<?= $shopdetails->id ?>/<?= $shopdetails->logo ?>" class="img-rounded no-print" alt="image" style="width: 150px; height: 150px;"><span><?= $shopdetails->name ?></span>
								</div>
								<div class="invoice-1-add">
									<div class="invoice-1-add-left">
										<h3>Bill To</h3>
										<p><?= $details->customer_name; ?></p>
										<h5>Contact</h5>
										<p><?= $details->contact; ?></p>

										
									</div>
									<div class="invoice-1-add-right">
										<ul>

											<li><span>Invoice Number</span><?= Yii::$app->util->getTrackid(); ?></li>
											<li><span>Date</span> <?php echo date('Y-m-d h:i:s'); ?></li>
											<li><span>Payment Terms</span> Due on receipt</li>
											<li><span>Due Date</span> <?php echo date('Y-m-d h:i:s'); ?></li>
										</ul>
									</div>
								</div>
								<div class="invoice-1-tab">
									<table class="responsive-table bordered">
										<thead>
											<tr>
												<th>Description</th>
												<th></th>
												<th></th>
												<th>Details</th>
												
											</tr>
										</thead>
										<tbody>
											<!-- -->
											<tr>
												<td>Product Name</td>
												<td></td>
												<td></td>
												<td class="invo-sub"><?= $proname->name; ?></td>									
											</tr>
											<tr>
												<td>Brand Name</td>
												<td></td>
												<td></td>
												<td class="invo-sub"><?= $brname->name; ?></td>									
											</tr>
											<tr>
												<td>Returned IMEI</td>
												<td></td>
												<td></td>
												<td class="invo-sub">
<?php 
	
$saledimei=\app\models\SaleReturnImei::find()->where(['sale_return_id'=>$details->id])->all();
foreach ($saledimei as $key ) {
	   	echo "<li>" . $key->returned_imei ."</li>";
	   }
	   
?>
											
											<tr>
												<td>Warranty</td>
												<td></td>
												<td></td>
												<td class="invo-sub"><?php 
							                    if (!empty($details->warranty)) {
							                    	echo $details->warranty;
							                    }else{
							                    	echo "No Warranty";
							                    } ?></td>									
											</tr>
											<tr>
												<td>Quantity</td>
												<td></td>
												<td></td>
												<td class="invo-sub"><?= $details->quantity ?> </td>									
											</tr>
											<tr>
												<td>Reason For Return</td>
												<td></td>
												<td></td>
												<td class="invo-sub"><?= $details->reasone ?> </td>									
											</tr>
							


										</tbody>
									</table>								
								</div>
							</div>
							<div class="invoice-2">
								<div class="invoice-price">
									<table class="responsive-table bordered">
										<thead>
											
											<tr>
												<th>Pricing Info.</th>
												<th></th>
												<th>Total Due</th>
											</tr>
										</thead>
										<tbody>
											
											<tr>
												<td>Company Price</td>
												<td id="invo-date"></td>
												<td id="invo-tot"><?= $details->price; ?></td>									
											</tr>
											<tr>
												<td>Deduction Applied</td>
												<td></td>
												
												<td id="invo-tot"><?php 
							                    if (!empty($details->deduct)) {
							                    	echo $details->deduct;
							                    }else{
							                    	echo "0";
							                    } ?></td>									
											</tr>
											<tr>
												<td>Paid Amount</td>
												<td></td>
												
												<td id="invo-tot"><?php 
							                    if (!empty($details->paid)) {
							                    	echo $details->paid;
							                    }else{
							                    	echo "0";
							                    } ?></td>									
											</tr>
											<tr style="background-color: #253d52; ">
												<td style="color: white;"><b>Total Remaining</b></td>
												<td></td>
												
												<td id="invo-date" style="color: white;">Rs: <?php 
							                    if (!empty($details->paid) || !empty($details->deduct)) {
							                    	$Remaining=$details->paid +$details->deduct;
							                    	// print_r($Remaining);
							                    	// exit();
	$sale = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')) FROM sale_return where id=$details->id;   ");
        $sales = $sale->queryScalar();
          
							                    	echo $sales-$Remaining;
							                    }else{
							                    	echo "0";
							                    } ?></td>									
											</tr>											
										</tbody>
									</table>								
								</div>							
							</div>
							<div class="invoice-print no-print">
								<p>Thank you,<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> 
								<a href="<?=url::to(['sale-return/index'])?>" class="waves-effect waves-light btn-large "><i class="fa fa-arrow-left"></i> Return</a>
								<a href="<?=url::to(['sale-return/update?id='.$details->id])?>" class="waves-effect waves-light btn-large "><i class="fa fa-pencil"></i> Edit</a>
								
								<button  onclick="jQuery.print('.invoice')" class="waves-effect waves-light btn-large pull-right" style="font-size: 16px;background: #1970d8;"><i class="fa fa-print fa-2x"></i> Print</button>
							</div>
						</div>
					</div>
				</div>
			</div>

                


 <?php 
       }
   
   ?>


   

<script type="text/JavaScript" src="/js/jquery.print.js" />


 