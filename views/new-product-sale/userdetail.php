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
    $newid=$_GET['id'];
    // print_r($shopid);
    // exit();
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
              <li><a href="<?=url::to(['new-product-sale/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
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
              
                <?php $form = ActiveForm::begin(['method'=> 'post' , 'action' => '/new-product-sale/updateprevious',  'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" name="newid" value="<?= $newid ;?>" />
                <div class="row" >
                  
                  
                </div>
                
                <div class="row">
                  <div class="input-field col s12 m3 buy" >
                    <span>Buyer Name </span>
                    <input type="text" class="validate" name="buyername" id="customername" placeholder="Customer Name" required="">
                      
                  </div>
                  <div class="input-field col s12 m3 buy" >
                    <span>Contact# </span>
                    <input type="text" class="validate" name="contact" id="customername" placeholder="Mobile" required="">
                      
                  </div>
                  <div class="input-field col s12 m3">
                    <span>Enter CNIC </span>
                    <input type="text" class="validate" placeholder=" CNIC" name="cnic" id="cnic" required="">
                  </div>
                  <div class="input-field col s12 m4">
                    <span>Paid Amount </span>
                    <input type="text" class="validate" placeholder="Paid Amount" id="paid" name="paid" required="">
                  </div>
                  <div class="input-field col s12 m10">
                    <span>Select Your Image Not Product </span>

                    <?=$form->field($model, 'img', ['labelOptions'=>['style'=>'color:#4267b2']])->widget(FileInput::classname(), [ 'options' => ['accept' => 'profile_image/*' , 'class' =>'validate' , 'name'=>'img'], ] )->label(false) ?>
                  </div>
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


