<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<style type="text/css">

  .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
  .tt-menu { width:300px; }
  ul.typeahead{margin:0px;padding:10px 0px;}
  ul.typeahead.dropdown-menu li a {padding: 10px !important;  border-bottom:#CCC 1px solid;color:#FFF;}
  ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
  .bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
  .demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #1f3f41;
    outline: 0;
  }
 
</style>
         
<!--CENTER SECTION-->
      <div class="tz-2">
        <div class="tz-2-com tz-2-main">
          <h4>product Details</h4>
          <div class="db-list-com tz-db-table">
            <div class="ds-boar-title">
              <h2>Choose Details for Select Product</h2>
             
            </div>
            <?php 
            if(isset($model) && $model!=null){
            ?>
            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin([ 'action'=>'/shop/createshopproduct','options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form','class'=>'col s12']]); ?>
                <div class="row">
                  <div class="input-field col s12">
                    <select id="product_sel">
                      <option value="" disabled selected>Select Product</option>
                      <?php
              if(isset($model) && $model!=null){
                $j = 0;
                foreach ($model as $product) {
                  if($selected==$j){
                ?>
                <option value="<?=$j?>" selected><?=$product->name?></option>

                      <?php }else{
                      ?>
                      <option value="<?=$j?>"><?=$product->name?></option>
                    <?php }
                       $j++;
                      }
                    }?>
                    </select>
                    <input type="number" name="product_d" class="hidden" value="<?php if(isset($model) && $model!=null){ echo $model[$selected]['id']; } ?>">
                  </div>
                  
                  
                </div>
                <div class="row">
                  <div class="input-field col s4">
                   <input type="text" class="validate" name="nickname" id="searchbox" placeholder="Nick name" required="">
                 </div>
                  <div class="input-field col s12 m4">
                    <input type="number" class="validate" id="imeibox" name="sameimi" required="">
                    <label>Same IMEI</label>
                  </div>
                  <div class="input-field col s12 m4">
                    <input type="number" class="validate" id="quantity" name="quantity" required="">
                    <label>Quantity</label>
                  </div>
                  
                </div>
                
 <h3 style="color: #14addb">Price and Discounts</h3>
                <div class="row">
                 
                  <div class="input-field col s12 m4">
                    <input type="number" class="validate" id="price" name="price" required="">
                    <label>Price</label>
                  </div>
                  <div class="input-field col s12 m4">
                    <input type="text" class="validate" id="invoicerate" value="Invoice: <? if(isset($model) && $model!=null){ echo $model[$selected]['price']; } ?>" name="invoicerate" readonly="">
                    
                  </div>
                  <div class="input-field col s12 m4">
                    <input type="number" class="validate" id="discount" name="discount" required="">
                    <label>Discount</label>
                  </div>
                  <div class="input-field col s12 m7">
                    <input type="number" class="validate" id="total" name="total" required="">
                    <label id="hid">Total Amount</label>
                  </div>
                  <div class="input-field col s12 m5">
                    <input type="number" class="validate" id="paid"  name="paid" required="">
                    <label>Paid amount</label>
                  </div>

                </div>
<h3 style="color: #14addb">Seller Information</h3>
                <div class="row">
              
                  <div class="input-field col s12 m7">
                    <input type="text" class="validate" id="sellerbox"  name="sellername" required="">
                    <label>Seller name</label>
                  </div>
                  <div class="input-field col s12 m5">
                    <select class="validate" id="sellercity"  name="sellercity" required="">
                      <option value="" disabled selected>Select City</option>
                        <?php 
                    $cities = app\models\City::find()->all();
                    if(isset($cities) && $cities!=null){
                      foreach ($cities as $city) {
                        ?>
                         <option value="<?=$city->id?>"><?=$city->name?></option>
                        <?php
                      }
                    }
    ?>
                     
                    </select>
                  
                    
                   
                  </div>
                  <div class="input-field col s12 m5">
                    <small>Must add*</small>
                    <input type="number" class="validate" id="sellername"  name="contact" required="">
                    <label style="margin-top: 14px;">Mobile</label>
                  </div>
                  <div class="input-field col s12 m7">
                    <small>Optional*</small>
                    <input type="number" class="validate" id="paid"  name="cnic" required="">
                    <label style="margin-top: 14px;">CNIC No.</label>
                  </div>
                  <div class="input-field col s12 m12">
                    <small>Must add*</small>
                    <input type="file" class="validate" id="paid"  name="seler-img" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" value="Next" class="btn btn-default pull-right col s12 m3" id="btn_submit" >
                  </div>
                </div>
             <?php ActiveForm::end(); ?>
            </div> 
          <?php }else{ 
            if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
            if(isset($_SESSION['shop_id'])){
              $sid = $_SESSION['shop_id'];
            ?>
            <b><h4>No Products Left. <a href="<?=Url::to(['/shop/brands','shop_id'=>$sid])?>"></a></h4></b>;
         <?php } } 
         Yii::$app->session->open();
         ?>
      
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->
      <div class="tz-3">
            <h4>Products (<?=count($model)?>)</h4>
            <ul>
              <?php
              if(isset($model) && $model!=null){
                $i=0;
                foreach ($model as $product) {
                  if($selected==$i){
                ?>
                            <li style="background-color: lightblue;" >
                <a  href="<?=Url::to(['/shop/selectdetails','select'=>$i])?>"> 
                  <h5><?=$product->name?></h5>                
                </a>
              </li>
              <?php }else{ ?>
                          <li>
                <a  href="<?=Url::to(['/shop/selectdetails','select'=>$i])?>"> 
                  <h5><?=$product->name?></h5>                
                </a>
              </li>
              <?php 
              }  
               $i++; }
              }else{
                ?>
                <a  href="#"> 
                  <h5>No products Left</h5>                
                </a>
                <?php 
              }

               ?>
              
            </ul>
          </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
        $('#searchbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/shop/searchtwo",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item;
                        }));
                    }
                });
            }
        });
        $('#imeibox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/shop/searchone",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item;
                        }));
                    }
                });
            }
        });
        $('#sellerbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/shop/searchh",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item;
                        }));
                    }
                });
            }
        });
        $("#quantity").on('change',function(){
          var qty = $(this).val();
          var price = $("#price").val();
          var total_price = qty * price ;
          $("#hid").addClass('hidden');
          $("#total").val(total_price);
        });
         $("#product_sel").change(function(){
    window.location='/shop/selectdetails?select=' + this.value
  });

    });

</script>
