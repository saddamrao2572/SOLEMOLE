<?php 
use yii\helpers\Url;
?>
<style type="text/css">
	[class~=tz-2] {
    
    width: -webkit-fill-available;
}
</style>
<div class="tz-2">
				<div class="tz-2-com tz-2-main">
					<h4>Invoice</h4>
					<div class="db-list-com tz-db-table">
						<div class="ds-boar-title">
							<h2>Shop Products</h2>
							<p>Here is the invoice of your purchased product, Click to print the Invoice</p>
						</div>
						<div class="invoice">
							<div class="invoice-1">
								<div class="invoice-1-logo">
									<img src="/uploads/customer/<?=$seller->id?>/<?=$seller->img?>" alt=""><span>Invoice</span>
								</div>
								<div class="invoice-1-add">
									<div class="invoice-1-add-left">
										<?php 
					$shop = \app\models\Shop::find()->where(['id'=>$shopproduct->shop_id])->one();
										   ?>

										<h3><?php if(isset($shop) && $shop!=null){echo $shop->name;} ?></h3>
										<p>Owner: You</p>
										<h5>Bill To</h5>
										<p>Name: <?=$seller->name?></p>
										<p>CNIC: <?=$seller->cnic?></p>
										<p>Mobile: <?=$seller->mobile?></p>
									</div>
									<div class="invoice-1-add-right">
										<ul>
											<li><span>Invoice Number</span><?php rand(1000,1000000); ?></li>
											<li><span>Date</span> <?=$shopproduct->created_at?></li>
											<li><span>Quantity</span> <?=$wholesell->quantity?></li>
										</ul>
									</div>
								</div>
								<div class="invoice-1-tab">
									<table class="responsive-table bordered">
										<thead>
											<tr>
												
												<th>Price</th>
												<th>Discount</th>
												<th>Subtotal</th>
												<th>Paid</th>
												<th>Remainings</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?=$shopproduct->price?></td>
												<td><?=$wholesell->discount?></td>
												<td><?=$wholesell->total_price?></td>
												<td><?=$shopproduct->paid?></td>
												<td class="invo-sub"><?=$wholesell->total_price - $shopproduct->paid?></td>	 								
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
												<th>Product</th>
												<th>Brand</th>
												<th>Imei</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach ($imeis as $imei) { ?>
											<tr><?php
											$product = \app\models\Product::find()->where(['id'=>$shopproduct->product_id])->one();
											$brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one();
											
											 ?>

												<td><?=$product->name?></td>
												<td id="invo-date"><?=$brand->name?></td>
												<td id="invo-tot"><?=$imei->imei?></td>	
																			
											</tr>			
												<?php } ?>												
										</tbody>
									</table>								
								</div>							
							</div>
							<div class="invoice-print">
							<p>Thank you,<br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p> <a href="<?=Url::to(['/shop/selectdetails'])?>" class="waves-effect waves-light btn-large">Import More...</a><a href="<?=Url::to(['/shop/purchaseinvoice','invoice'=>'print'])?>" target="_blank" class="waves-effect waves-light btn-large">Print</a>  </div>
						</div>
					</div>
				</div>
			</div>