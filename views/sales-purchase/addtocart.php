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


?>				<input type="hidden" name="productid" value="<?= $product->id ?>">

				<input type="hidden" name="brandid" value="<?= $product->brand_id ?>">
				<input type="hidden" name="invoice" value="<?= Yii::$app->util->getTrackid(); ?>">
                <div class="row">
                  <div class="input-field col s3">
                    <span>Product Name </span>
                    <input type="text" class="validate"  id="pname" name="pname" value="<?= $product->name; ?>" readonly>
                  </div>

                	<div class="input-field col s3">
                		<span>Nick Name </span>
                    <input type="text" class="validate" placeholder="Nick Name" id="nickname" name="nickname" value="<?= $shoproduct->nickname; ?>">
                  </div>

                  <div class="input-field col s12 m3">
                  	<span>Brand IMEI </span>
                    <input type="text" class="validate" placeholder="Brand IMEI" id="imei" name="imei" value="<?= $product->imei; ?>" >
                  </div>

                  <div class="input-field col s12 m4">
                  	<span>Company Price </span>
                    <input type="text" class="validate" placeholder="Company Price" id="price" name="price" readonly="" value="<?= $product->price; ?>">

                  </div>

                  <div class="input-field col s12 m10">
                  	<span>Fualts in Product </span>
                    <textarea id="fualt" name="fualt" rows="3" class="validate" placeholder="Enter All Fualts that Your product have..." style="height: 100px" required=""></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12 m4">
                  	<span>Warranty Remaining </span>
                    <input type="text" class="validate" placeholder="Warranty" id="warranty" name="warranty" required="">
                  </div>
                  <div class="input-field col s12 m3" >
                  	<span>Condition </span>
                    <input type="text" class="validate" placeholder="Condition" max="10" min="4" name="condition" id="condition" value="Old" readonly="">
                  </div>

                  <div class="input-field col s12 m3">
                  	<span>Discount </span>
                    <input type="text" class="validate" name="discount" id="discount" placeholder="Discount" required="">
                  </div>
                </div>

              <style type="text/css">
                .caret{ display: none; }
              </style>
 <?php 
       }
       else{
        echo "<h3 style='color:red;'> Sorry This Product is not available for your shop... Please first import this product to your stock.</h3>";
       }

   ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#type").change(function () {
            if ($(this).val() == "sell") {

                $(".buy").hide();
                $(".sell").show();
            } else if($(this).val() == "purchase"){
                $(".sell").hide();
                $(".buy").show();
                document.getElementById("nickname").readOnly = true;
                document.getElementById("imei").readOnly = true;
                document.getElementById("discount").readOnly = true;
                document.getElementById("condition").readOnly = true;
            }
        });
    });
</script>



