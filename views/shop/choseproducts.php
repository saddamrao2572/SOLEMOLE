<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
?>
<style type="text/css">
.container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<!--CENTER SECTION-->
      <div class="tz-2">
        <div class="tz-2-com tz-2-main">
          <h4>Selected products</h4>
          <div class="db-list-com tz-db-table">
            <div class="ds-boar-title">
              <h2>Search here for selected brand products</h2>
             
            </div>
            <div class="tz2-form-pay tz2-form-com">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s8">
                    
                    <input type="text" id="txt1" placeholder="Search for products" >
                    
                  </div>
                   
                </div>
                <form>
                <div class="row" id="txtHint" style="margin-top: 10px;">
                  
                  
                </div>
              </form>
                <div class="row">
                  
                  
                </div>

               

               
              
                
                </form>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="toproducts" type="submit" value="Next" class="btn btn-default pull-right col s12 m3" > 
                  </div>
                </div>
              
            </div>
      
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->
      <div class="tz-3">
            <h4>Brands(<?=count($model)?>)</h4>
            <ul>
              <?php if(isset($model) && $model!=null){
                //print_r($model);
                //echo '<br>';
                //$model=array_unique($model);
                //print_r($model);
                //exit;
                for ($i=0; $i<count($model); $i++) {

                  $brand = app\models\Brand::find()->where(['id'=>$model[$i]])->one();
                  $pcount = app\models\Product::find()->where(['brand_id'=>$brand->id])->count();
                  ?> 
                  
                  
              <li>
                <input style="display: inline;" type="checkbox" value="<?=$brand->id?>" name="products" class="brand_checks" checked="">
                <a href="#!">
                  <h5 style="display: inline;"><?=$brand->name?> (<?=$pcount?>)</h5>
                  
                </a>
              
              </li>
           
              <?php 
                }
              } ?>
              
            </ul>
          </div>
          <style type="text/css">
  

element {

}
[type="checkbox"]:not(:checked), [type="checkbox"]:checked {

    position: inherit !important;
    left: -9999px !important;
    opacity: inherit !important;
    color: black !important;
    background-color: black !important;
    display: initial !important;

}
.btn-default:hover {
    color: #fff !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
   $(function(){
    var val = [];
    $('.brand_checks:checked').each(function(i){
     val[i] = $(this).val();
    });
   
    $("#txt1").keyup(function(event){
      $('.brand_checks:checked').each(function(i){
     val[i] = $(this).val();
    });
      if(event.which != 8){
       $.get("/shop/search",{
        pname: $(this).val(),
        value: val,
      },function(data,status){

        $('#txtHint').empty();

        var obj = JSON.parse(data);
        for(var i=0; i<obj.length; i++){
          var str = '<div class="col s6" ><label class="container">'+obj[i].label+'<input type="checkbox" class="products" value="'+obj[i].id+'"><span class="checkmark"></span></label></div>';
          $('#txtHint').append(str);
        }
    $('#txtHint').append('<div class="col s6 pull-right" ><button type="button" class="checkall btn btn-default  pull-right">Select All</button></div>');
          var clicked = false;
$(".checkall").on("click", function() {
  $(".products").prop("checked", !clicked);

  clicked = !clicked;
});
         
        
        
        
      
      });
   }else{
     $('#txtHint').empty();
   }
    }); 

    $("#toproducts").on('click',function(){
      var vall = [];
      $('.products:checked').each(function(i){
     vall[i] = $(this).val();
   });
      if (vall.length > 0) {
      $.post("/shop/sendtoaction",{
        pids : vall,
      });
    }else{
      alert('Search and Select Some Products First');
    }
    });
 

   
   });

</script>
