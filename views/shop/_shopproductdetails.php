    <?php

use yii\helpers\Url;
$this->title="View Product";
 ?>
    <tr>
    	<?php
		$product = \app\models\Product::find()->where(['id'=>$model->product_id])->one(); 
		$brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one(); 
		?>
		<td><span class="list-img"><img src="/uploads/product/<?=$product->id?>/<?=$product->thumbnail?>" alt="product-img"></span></td>
		<td><a href="#"><span class="list-enq-name"><?=$product->name?> </span><span class="list-enq-city">Rs. <?=$model->price?></span></a> </td>
		<td><b class="text-warning"><?=$brand->name?></b></td>
		<?php
		$shop = \app\models\Shop::find()->where(['id'=>$model->shop_id])->one(); 
		?>
		<td> <span class="label label-lg label-default">

			<?php if(isset($shop) && $shop!=null){ echo $shop->name;}else{
				echo "No Shop added";
			} ?>
				
			</span>
		</td>
		<td> <span class="label label-primary"></span> </td>
		<td> <?php if($model->status==0){?><span class="label label-danger">Pending</span><?php }else{ ?>
		<span class="label label-success">Pending</span> <?php }?>  </td>
		<td> <a href="<?=url::to(['/shop/viewproduct','pid'=>$model->id])?>"><i class="fa fa-eye"></i></a> </td>
		<td> <a href="<?=url::to(['/shop/updateproduct','pid'=>$model->id])?>"><i class="fa fa-edit"></i></a> </td>
	</tr>