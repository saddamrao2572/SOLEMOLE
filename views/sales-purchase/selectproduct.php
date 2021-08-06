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

use yii\helpers\JSON;
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
ul.typeahead.dropdown-menu {
    position: unset;
}
.toast
{
  background-color: green;
 </style>

<!--CENTER SECTION-->
      <div class="tz-2 tz-2-admin">
        <div class="tz-2-com tz-2-main">
           <h4><img src="/img/post-add1.png" alt="post-add" class="img-fluid">  Search Your Product To Sale or Purchase</h4>
           <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
           <ul id="dr-list" class="dropdown-content">
            
        
              <li class="divider"></li>
              
              <li class="menu-item-stick-left"><a href="<?=url::to(['order/viewcart'])?>" ><i class="fa fa-shopping-cart"></i><span class="item-label-sale item-label">
                <?php
                    $session = Yii::$app->session;
                    //session_start();
                    //print_r($_SESSION['cartItem']);
                    //exit();
                    if(!isset($_SESSION['cartItem']))
                    {

                    //  $_SESSION['cartItem'] = [];
                      echo "<font color='red'>0</font>";
                    }else
                    {
                      $countItem=count($_SESSION['cartItem']);
                      echo "<font color='red'>" . $countItem . "</font>";
                      
                    }
                    ?></span></a></li>
                    <?= \odaialali\yii2toastr\ToastrFlash::widget([
                        'options' => [
                          'positionClass' => 'toast-top-right',
                          'background-color'=>'Green',
                        ]
                    ]);?>
              
          </ul>
          <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                  <div class="tab-inn ad-tab-inn">
            <div class="hom-cre-acc-left hom-cre-acc-right">
          <div class="db-list-com tz-db-table" style="height: auto;">
            <div class="ds-boar-title">
              
              <h2>Search Mobiles in TextBox Below & Click on the name</h2>
             
            </div>

            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin([ 'options' => ['id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
               <input type="hidden" name="shopid" value="<?= $shopid ?>" id="shopid">

                <div class="row" >
                   <div class="input-field col s6" >
                    <span>Search Your Product </span>
                      <input type="text" class="validate" name="product" id="searchbox" placeholder="Search Product/IMEI"> 
                   </div>
                  
                </div>
                <div class="row choice" style="margin-top: 4%;" hidden="true">
                  <div class="input-field col s6" >
                    <span>Select Sale/Purchase </span>
                      <select name="type" id="type" required="">
                        <option value="">What you want???</option>
                        <option value="sale">Sale</option>
                        <option value="purchase">Purchase</option>
                      </select>
                   </div>
                </div>
                <div id="dataget"></div>

               <input type="hidden" name="" id="quantity" value="1">

                <div class="row">
                  <div class="input-field col s12">
                    <!-- <input type="submit" name="btn_cart"  class="btn btn-default pull-right col s12 m3" value="Add To Cart"> --> 
                    <a  href="javascript://"  id="btnCart" class="btn btn-default pull-right col s12 m3"><i class="fa fa-plus" ></i> Add To Cart</a>
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

  #btnCart:hover
  {
    color: white;
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnCart').click(function(){
      var shid=$("#shopid").val();
      var prid=$("#productid").val();
      var brid=$("#brandid").val();
      var type=$("#type").val();
     // var nkname=$("#nickname").val();
      var brimei=$("#imei").val();
      var totprice=$("#price").val();
      var paidprice=$("#paid").val();
      var fualt=$("#fualt").val();
      var warranty=$("#warranty").val();
      var condition=$("#condition").val();
      var assec=$("#assec").val();

      // $('i', btn).removeClass('single_add_to_cart_button');
      // $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
        //$('#ywapo_value_1').removeClass('ywapo_miss_required');
        var quantity=$('#quantity').val();
        var data = 
        {
          'shid':shid,
          'prid':prid,
          'brid':brid,
          'type':type,
          'brimei':brimei,
          'totprice':totprice,
          'paidprice':paidprice,
          'fualt':fualt,
          'warranty':warranty,
          'condition':condition,
          'assec':assec,
          'quantity':quantity
        };
        alert(data);
        console.log(data);

      $.ajax({
        method: "POST",
        url: "/order/cart",
        data: data

      })
      .done(function( msg ) {

        var data = JSON.parse(msg);
        if(data.status == 'success') {
          //alert('123');
          location.reload();
        }
        return false;
      });

    });
  });

</script>

