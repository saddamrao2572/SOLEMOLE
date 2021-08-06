<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<style type="text/css">
  [class~=tz-3] ul li:active {
    background-color: lightblue !important;
}
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
            <div class="tz2-form-pay tz2-form-com">
              
                <?php $form = ActiveForm::begin([ 'action'=>'/shop/createshopproduct','options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form','class'=>'col s12']]); ?>
                
                

            

                <div class="row">
                  <div class="input-field col s12 m8">
                    <input type="text" class="validate" id="sellerbox"  name="sellername" required="">
                    <label>Seller name</label>
                  </div>
                  
                </div>
                
              
                
                
                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" value="Next" class="btn btn-default pull-right col s12 m3" id="btn_submit" >
                  </div>
                </div>
             <?php ActiveForm::end(); ?>
            </div> 
      
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->
     
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
        // $('#searchbox').typeahead({
            // source: function (query, result) {
                // $.ajax({
                    // url: "/shop/searchh",
          // data: 'query=' + query,            
                    // dataType: "json",
                    // type: "POST",
                    // success: function (data) {
            // result($.map(data, function (item) {
              // return item;
                        // }));
                    // }
                // });
            // }
        // });
        // $('#imeibox').typeahead({
            // source: function (query, result) {
                // $.ajax({
                    // url: "/shop/searchone",
          // data: 'query=' + query,            
                    // dataType: "json",
                    // type: "POST",
                    // success: function (data) {
            // result($.map(data, function (item) {
              // return item;
                        // }));
                    // }
                // });
            // }
        // });
        $('#sellerbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/netcash-deals/searchtwo",
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
