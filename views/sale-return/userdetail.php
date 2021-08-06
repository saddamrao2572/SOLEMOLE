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
    $newid= \Yii::$app->util->decrypt($_GET['id']);

    $lastdetail=\app\models\SaleReturn::find()->where(['id'=>$newid])->one();
    $buyerslpr=\app\models\SalesPurchase::find()->where(['shop_id'=>$lastdetail->shop_id, 'product_id'=>$lastdetail->product_id, 'type'=>'sell'])->one();
    if (empty($buyerdetail)) {
      $buyernps=\app\models\NewProductSale::find()->where(['shop_id'=>$lastdetail->shop_id, 'product_id'=>$lastdetail->product_id])->one();
    }
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
           <h4><img src="/img/post-add1.png" alt="post-add" class="img-fluid">  Serach Your Product To Sale</h4>
           <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
            <ul id="dr-list" class="dropdown-content">
              <li class="divider"></li>
              <li><a href="<?=url::to(['sale-return/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
            </ul>
          <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                  <div class="tab-inn ad-tab-inn">
            <div class="hom-cre-acc-left hom-cre-acc-right">
          <div class="db-list-com tz-db-table" style="height: auto;">
            <div class="ds-boar-title">
              
              <h2>Enter Your Buyer Informations</h2>
             
            </div>

            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin(['method'=> 'post' , 'action' => '/sale-return/updateprevious',  'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="newid" value="<?= $newid ;?>" />
                <h4>Product Details</h4>
                <br>
                <h3 style="font-size: 20px;">Prevoius Details</h3>
                <br>
                <div class="row" >
                  
                  
                  <div class="input-field col s12 m4">
                    <span>Previous Counted Price </span>
                    <input type="text" class="validate" placeholder="Paid Amount" id="paid" name="paid" readonly="" value="<?php
                    if(!empty($buyerslpr))
                    {
                      echo($buyerslpr->price);
                    }
                    elseif(!empty($buyernps))
                    {
                      echo($buyernps->price);
                    }
                    ?>">
                  </div>
                  <div class="input-field col s12 m4">
                    <span>Prevoius Paid Amount </span>
                    <input type="text" class="validate" placeholder="Paid Amount" id="paid" name="paid" readonly="" value="<?php
                    if(!empty($buyerslpr))
                    {
                      echo($buyerslpr->paid);
                    }
                    elseif(!empty($buyernps))
                    {
                      echo($buyernps->paid);
                    }
                    ?>">
                  </div>
                </div>
                <br>
                <h3 style="font-size: 20px;">New Details</h3>
                <br>
                <div class="row">
                  <div class="input-field col s12 m3">
                    <span>Quantity </span>
                    <input type="text" class="validate" name="quantity" value="<?= $lastdetail->quantity ?>" readonly>
                  </div>
                  <div class="input-field col s12 m3">
                    <span>New Counted Price </span>
                    <input type="text" class="validate" name="newprice" value="<?= $lastdetail->price ?>" readonly="">
                  </div>
                  <div class="input-field col s12 m3">
                    <span>New Paid Amount </span>
                    <input type="text" class="validate" name="discount" placeholder="Paid Amount" required="">
                  </div>
                  <div class="input-field col s12 m3">
                    <span>Deduction</span>
                    <input type="text" class="validate" name="deduct" placeholder="Discount" required="">
                  </div>
                  <div class="input-field col s12 m12">
                    <span>Reasons For Return </span>
                    <textarea id="textarea1" class="materialize-textarea" name="reason" placeholder="Descriptions" required=""></textarea>
                  </div>
                  
                  
                </div>
                <h4>Buyer Details</h4>
                <div class="row">
                  <div class="input-field col s12 m3 buy" >
                    <span>Buyer Name </span>
                    <input type="text" class="validate" name="buyername" readonly="" placeholder="Customer Name" value="<?php
                    if(!empty($buyerslpr))
                    {
                      echo($buyerslpr->name);
                    }
                    elseif(!empty($buyernps))
                    {
                      echo($buyernps->buyername);
                    }
                    ?>" required>
                      
                  </div>
                  <div class="input-field col s12 m3 buy" >
                    <span>Contact# </span>
                    <input type="text" class="validate" name="contact"  placeholder="Mobile" value="<?php
                    if(!empty($buyerslpr))
                    {
                      echo($buyerslpr->contact);
                    }
                    elseif(!empty($buyernps))
                    {
                      echo($buyernps->contact);
                    }

                    ?>" required>
                      
                  </div>
                  <div class="input-field col s12 m3">
                    <span>CNIC </span>
                    <input type="text" class="validate" readonly="" placeholder=" CNIC" name="cnic" value="<?php
                    if(!empty($buyerslpr))
                    {
                      echo($buyerslpr->cnic);
                    }
                    elseif(!empty($buyernps))
                    {
                      echo($buyernps->cnic);
                    }
                    ?>" required>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m4">
                    <span>Profile </span>
                    <img src="/<?php
                    if(!empty($buyerslpr))
                    {
                      echo(\Yii::$app->util->getSalepurchaseDirectory($buyerslpr->shop_id,$buyerslpr->id).$buyerslpr->img );
                    }
                    elseif(!empty($buyernps))
                    {
                      echo(\Yii::$app->util->getNewsaleDirectory($buyernps->id).$buyernps->img );
                    }
                    ?>" class="img-rounded" style="width: 100px;">
                    
                  </div>
                  <!--  -->
              </div>

                

                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" name="btn_user"  class="btn btn-default pull-right col s12 m3" value="Next"> 

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

      <!--RIGHT SECTION-->
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


     <!--  <script>
    $(document).ready(function () {
        $('#searchbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/new-product-sale/search",
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
</script> -->




<!-- <script>
    $(document).ready(function(){
        $("#searchbox").change(function(event){
           var pname = $("#searchbox").val();
       
            $.get("/new-product-sale/valueshow?pn="+pname,function(data){
                $("#dataget").empty();
                $("#dataget").append(data);
                $(".img").show();
                
               // $(".btn-default").show();
            });

            

        });
    });

</script> -->


