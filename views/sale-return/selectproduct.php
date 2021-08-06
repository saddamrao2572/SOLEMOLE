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
    $shopid=$_GET['shop'];
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
           <h4><img src="/img/post-add1.png" alt="post-add" class="img-fluid">  Serach Your Product To Sale or Purchase</h4>
           <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
           <ul id="dr-list" class="dropdown-content">
            
        
              <li class="divider"></li>
              
              <li><a href="<?=url::to(['sale-return/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
              
          </ul>
         
          <div class="db-list-com tz-db-table" style="height: auto;">
            <div class="ds-boar-title">
              
              <h2>Search Mobiles in TextBox Below & Click on the name</h2>
             
            </div>

            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin(['method'=> 'post' , 'action' => '/sale-return/postvalues',  'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input type="hidden" id="shopid" name="shopid" value="<?= $shopid ;?>" />
                <div class="row" >
                   <div class="input-field col s12" >
                    <span>Search Your Product </span>
                      <input type="text" class="validate" name="product" id="searchbox" placeholder="Enter Product Name/Product IMEI/Model Name"> 
                   </div>

                  
                </div>
                
                <div id="dataget"></div>

                

                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" name="btn_salereturn"  class="btn btn-default pull-right col s12 m3" value="Next"> 

                  </div>
                </div>


              <?php ActiveForm::end(); ?>
            </div>
      
          </div>
        </div>
      </div>
    

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
  ul.typeahead.dropdown-menu {
    position: unset;
}
  </style>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="../../jquery-3.3.1.js"></script>

  <script>
    $(document).ready(function () {
        $('#searchbox').typeahead({
            source: function (query, result) {
              var shopid=$('#shopid').val();
              //alert(shopid);
              var data={'query' : query , 'shopid' : shopid};
                $.ajax({
                    url: "/sale-return/search",

                    data: data ,            
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
           var shop = $("#shopid").val();
           var data1 = {'pn':pname , 'shopid':shop};
           //console.log(data1);
           
            $.get("/sale-return/valueshow",{'pn':pname , 'shopid':shop},function(data){
                $("#dataget").empty();
                $("#dataget").append(data);
                //$(".img").show();
                
               // $(".btn-default").show();
            });

            

        });
    });

</script>


