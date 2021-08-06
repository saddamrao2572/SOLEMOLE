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
    $updateid=$_GET['sale'];
 

  $updatesale=\app\models\SalesPurchase::find()->where(['id'=>$updateid])->one();
  if (!empty($updatesale)) {
    $Product=\app\models\Product::find()->where(['id'=>$updatesale->product_id])->one();
      if (!empty($Product)) {
        
 ?>
  <style type="text/css">
   .row
   {
    padding: 1% !important;

   }
   [class~=tz2-form-com] form {
    background: #ffffff !important;
}
 </style>
<!--CENTER SECTION-->
      <div class="tz-2 tz-2-admin">
        <div class="tz-2-com tz-2-main">
           <h4><img src="/img/post-add1.png" alt="post-add" class="img-fluid">  Serach Your Product To Sale or Purchase</h4>
           <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
           <ul id="dr-list" class="dropdown-content">
            
        
              <li class="divider"></li>
              
              <li><a href="<?=url::to(['sales-purchase/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
              
          </ul>
          <div class="db-list-com tz-db-table" style="height: auto;">
            <div class="ds-boar-title">
              <h2>Search Mobiles in TextBox Below & Click on the name</h2>
             
            </div>
            <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                  <div class="tab-inn ad-tab-inn">
            <div class="hom-cre-acc-left hom-cre-acc-right">

            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin(['method'=> 'post' , 'action' => '/sales-purchase/updateproduct',  'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="shopid" value="<?= $updatesale->shop_id ;?>" />
                <div class="row" >
                   <div class="input-field col s10" >
                    <span>Search Your Product </span>
                      <input type="text" class="validate" name="product" id="searchbox" placeholder="Enter Product Name/Product IMEI/Model Name" value="<?= $Product->name; ?>" readonly=""> 
                   </div>
                  
                </div>
                <div class="row " style="margin-top: 4%;" >
                  <div class="input-field col s6" >
                    <span>Select buy/sell </span>
                      <select name="type" id="type">
                        <option value="">What you want???</option>
                        <option value="sell">Sell</option>
                        <option value="purchase">Purchase</option>
                      </select>
                   </div>
                </div>

              

          <input type="hidden" name="productid" value="<?= $updatesale->product_id ;?>">

          <input type="hidden" name="brandid" value="<?= $updatesale->brand_id ?>">
          
          
                  <div class="row">
                    <div class="input-field col s3">
                      <span>Nick Name </span>
                      <input type="text" class="validate" placeholder="Nick Name" id="nickname" name="nickname" value="<?= $updatesale->nickname; ?>">
                    </div>
                    <div class="input-field col s12 m3">
                      <span>Brand IMEI </span>
                      <input type="text" class="validate" placeholder="Brand IMEI" id="imei" name="imei" value="<?= $updatesale->imei; ?>" >
                      
                    </div>
                    
                    <div class="input-field col s12 m4">
                      <span>Company Price </span>
                      <input type="text" class="validate" placeholder="Company Price" id="price" name="price" readonly="" value="<?= $updatesale->price; ?>">
                      
                    </div>
                    
                    <div class="input-field col s12 m10">
                      <span>Fualts in Product </span>
                      <textarea id="fualt" name="fualt" rows="3" class="validate" placeholder="Enter All Fualts that Your product have..." style="height: 100px" >
                        <?= $updatesale->fault; ?>
                      </textarea>
                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12 m4">
                      <span>Warranty Remaining </span>
                      <input type="text" class="validate" placeholder="Warranty" id="warranty" name="warranty" value="<?= $updatesale->warranty ;?>">
                      
                    </div>
                    <div class="input-field col s12 m3" >
                      <span>Condition </span>
                      <input type="text" class="validate" placeholder="Condition" max="10" min="4" name="condition" id="condition" value="Old" readonly="">
                    
                    </div>
                    
                    <div class="input-field col s12 m3">
                      <span>Discount </span>
                      <input type="text" class="validate" name="discount" id="discount" placeholder="Discount" value="<?= $updatesale->discount ;?>">
                    </div>
                  </div>

                <style type="text/css">
                  .caret{ display: none; }
                </style>

                  <div class="row">
                    <div class="input-field col s12 m4">
                      <span>Paid Amount </span>
                      <input type="text" class="validate" placeholder="Paid Amount" id="paid" name="paid" value="<?= $updatesale->paid; ?>">
                      
                    </div>
                    <div class="input-field col s12 m3 sell">
                      <span>Seller Name </span>
                      <input type="text" class="validate" id="sellername" name="sellername" placeholder="Seller  Name" value="<?= $updatesale->name ;?>">
                    
                    </div>
                    <div class="input-field col s12 m3 buy" >
                      <span>Buyer Name </span>
                      <input type="text" class="validate" name="customername" id="customername" placeholder="Customer Name" value="<?= $updatesale->name ;?>">
                      
                    </div>
                    <div class="input-field col s12 m3">
                      <span>Enter CNIC </span>
                      <input type="text" class="validate" placeholder=" CNIC" name="cnic" id="cnic" value="<?= $updatesale->cnic ;?>">
                     
                    </div>
                </div>
                <div class="row ">
                  <div class="input-field col s12 m10">

                   <span>Select Your Image Not Product </span>

                    <?=$form->field($model, 'img', ['labelOptions'=>['style'=>'color:#4267b2']])->widget(FileInput::classname(), [ 'options' => ['accept' => 'profile_image/*' , 'class' =>'validate' , 'name'=>'img'], ] )->label(false) ?>
                    
                   

                  </div>
                  <style type="text/css">
                    .fileinput-upload-button
                    {
                      display: none;
                    }
                    .btn-file
                    
                      {
                          background: #253d52;
                          color: white;
                      }
                      .hidden-xs
                      {
                        color: white;
                      }

                  </style>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" name="btn_buysell"  class="btn btn-default pull-right col s12 m3" value="Next"> 

                  </div>
                </div>


              <?php ActiveForm::end(); ?>
            </div>
      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

  <?php 
    } 
  }
  ?>
      <!--RIGHT SECTION-->
     <style>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
        $("#submit").click(function(event){
           $("#dynamic-form").submit();
            });

            

        });
    });
</script> -->

      <script>
    $(document).ready(function () {
        $('#searchbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/sales-purchase/search",
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
    });
</script>




<script>
    $(document).ready(function(){
        $("#searchbox").change(function(event){
           var pname = $("#searchbox").val();
       
            $.get("/sales-purchase/valueget?pn="+pname,function(data){
                $("#dataget").empty();
                $("#dataget").append(data);
                $(".img").show();
                $(".choice").show();
               // $(".btn-default").show();
            });

            

        });
    });

</script>


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
                document.getElementById("warranty").readOnly = true;
                document.getElementById("fualt").readOnly = true;
            }
        });
    });
</script>