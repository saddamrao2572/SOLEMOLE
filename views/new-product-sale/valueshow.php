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

	if (!empty($shoproduct)) {

		

?>			<input type="hidden" name="productid" value="<?= $product->id ?>">

				<input type="hidden" name="brandid" value="<?= $product->brand_id ?>">
				<input type="hidden" name="invoice" value="<?= Yii::$app->util->getTrackid(); ?>">
				
                <div class="row">
                	<div class="input-field col s3">
                		<span>Nick Name </span>
                    <input type="text" class="validate" placeholder="Nick Name" id="nickname" name="nickname" value="<?= $shoproduct->nickname; ?>">
                  </div>
                 
                  
                  <div class="input-field col s12 m3">
                  	<span>Company Price </span>
                    <input type="text" class="validate" placeholder="Company Price" id="price" name="price" readonly="" value="<?= $shoproduct->price; ?>">
                    
                  </div>
                   <div class="input-field col s12 m3">
                    <span>Warranty</span>
                    <input type="text" class="validate" placeholder="Warranty" id="warranty" name="warranty" value="Full" readonly="">
                    
                  </div>
                  <div class="input-field col s12 m3">
                    <span>Discount </span>
                    <input type="text" class="validate" name="discount" id="discount" placeholder="Discount" required="">
                  </div>
                 
                </div>


 <?php 
       }
       else{
        echo "<h3> Sorry This Product is not available for your shop... Please first import this product to your stock.</h3>";
       }
   
   ?>
              <div class="row">
                <div class="input-field col s12 m3">
                    <span style="font-size: 20px">All Available Imei</span> <br>
                    <br>
   <?php 
   $shopimei=\app\models\ShopProductImei::find()->where([ 'shop_product_id'=>$shoproduct->product_id , 'cndition'=>'new', 'shop_id'=>$shoproduct->shop_id])->all();
   if (!empty($shopimei)) 
   {
     foreach ($shopimei as $availimei) 
     {
    ?>
              
                    <input type="checkbox" class="validate filled-in" placeholder="Warranty" id="warranty" name="available_Imei[]" value="<?= $availimei->imei; ?>"> <span> <?= $availimei->imei; ?> </span><br> 
      <?php 
      }
    }
  ?>
                  </div>
              </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
  [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: inherit;
    left: 0%;
    opacity: 1;
}
</style>