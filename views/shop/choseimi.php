<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
?>


<!--CENTER SECTION-->

      <div class="tz-2 pull-left" style="margin-left: -3%; ">
        <div class="tz-2-com tz-2-main">
          <h4>IMEI</h4>
          <div class="db-list-com tz-db-table">
            <div class="ds-boar-title">
              <h2>Choose IMEI</h2>
             
            </div>
             <span id="imi-availability-status1" style="font-size:12px;"></span>
            <div class="tz2-form-pay tz2-form-com">
              <form class="col s12" style="height: auto;" action="/shop/saveproduct" method="post">
                
            <?php 
           if(isset($quantity) && $quantity!=null){
                for ($i=0; $i<$quantity; $i++){
                  
                  ?>
                <div class="row"  >
			
       
      
                  <div class="input-field col s3">
                     <input type="text" class="validate sameimei" name="sameimei[]" id="sameimei" placeholder="Same IMI" value="<?=$model->sameimei?>" >
                    
                  </div>
                  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
				    
                  <div class="input-field col s5">
                    <input type="text" id="imi" class="validated imi" name="imei[]"  placeholder="IMI" >
                   
                  </div>
                  <div class="input-field col s3">
                    <!-- <input type="radio" name="condition" value="" class="validate "> New    
                    <input type="radio" name="condition" value=""> Old  -->
                     <select class="condition" name="condition[]">

                      <option value="1">NEW</option>
                      <option value="2">OLd</option>
                      
                    </select>  
                    
                  </div>
                </div>

                <?php }
              } ?>
              <input type="text" class="hidden" name="insertid" value="<?php echo $model->id; ?>">
                
                <div class="row">
                  <div class="input-field col s11">
                    <input type="submit" value="Next"  id="submit" class="btn btn-default pull-right col s12 m3" style="padding-bottom: 40px"> 
                  </div>
                </div>
              </form>
            </div>
      
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->
      <div class="tz-2 pull-right" style="margin-top: 0%; margin-left: 2%; max-width: 400px;"  >
        <div class="tz-2-com tz-2-main">
          <h4>Product</h4>
          <div class="db-list-com tz-db-table">
            <div class="ds-boar-title">
              <h2>Selected Product Details</h2>
             
            </div>
            <div class="tz2-form-pay tz2-form-com">
              <form class="col s12" style="height:240px">
                <div class="row">
                  
                  <div class="input-field col s6">
                    <input type="text" class="validate" value="Nickname: <?=$model->nickname?>" >
                    <label>Nick Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input type="text" class="validate" value="Same Imei: <?=$model->sameimei?>" >
                    <label>Same Brand IMEI</label>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Quantity: <?=$modell->quantity?>">
                    
                  </div>
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Price: <?=$model->price?>">
                    
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Invoice: <?=$one->price?>">
                    
                  </div>
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Stock: <?=$one->price?>">
                    
                  </div>
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Discount: <?=$modell->discount?>">
                    
                  </div>
                  <div class="input-field col s12 m6">
                    <input type="text" class="validate" value="Seller: <?=$modelll->name?>">
                  
                  </div>
                </div>

                
              
                
                
                <!-- <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" value="Next" class="btn btn-default pull-right col s12 m3" > 
                  </div>
                </div> -->
              </form>
            </div>
     
          </div>
        </div>
      </div>
<style type="text/css">
  [type="radio"]:not(:checked), [type="radio"]:checked {

    position: inherit !important;
    left: -9999px !important;
    opacity: inherit !important;
    color: red !important;
    background-color: black !important;
    display: initial !important;

}
</style>
<script src="/assets/35d78f24/jquery.js"></script>

<script type="text/javascript">

 $('.imi').keyup(function(event){
	check_current();
//$("#loaderIcon").show();
	var dataimi = {'imi':$(this).val(),'sameimei':$(".sameimei").val()};
jQuery.ajax({
url: "/shop/imicheck",
data:dataimi,
type: "POST",
success:function(data){
$("#imi-availability-status1").html(data);
//$("#loaderIcon").hide();
},
error:function (){}
});
});
function check_current() {
	var imi=$("#imi").val();
[1, 2, 3].every(function(elem, i, array){return array.lastIndexOf(elem) === i});
}
</script>
