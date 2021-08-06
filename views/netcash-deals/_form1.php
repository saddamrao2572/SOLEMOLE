<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductDeals */
/* @var $form yii\widgets\ActiveForm */
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

<div class="product-deals-form">

    <?php $form = ActiveForm::begin(['action' => '/product-deals/create']); ?>
	
	 <div class="row">
                  <div class="input-field col s12 ">
				  
				  <label>Product</label> <br>
                    <input type="text" class="validate paker" id="sellerbox"  name="sellername" required="">
                    <label>Product name</label>
                  </div>
                  
                </div>
				<br>
				<div id="product-info" class="box-inn-sp ad-inn-page">
				<!--Render the post    -->
				
				
			   </div>
				
				
				
				
    <div class="row"> 
	<div class="col-md-4">
	

    <?= $form->field($model, 'shop_name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-4">

    <?= $form->field($model, 'person_name')->textInput() ?>
	</div>
	
  <div class="col-md-4">

    <?= $form->field($model, 'contact_no')->textInput() ?>
	
	</div>

  </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
      $('#sellerbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/netcash-deals/searchtwo",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
				
				//console.log(item);
			
				//$obj = json_decode(item);
             
				
              return item;
                        }));
                    }
                });
            }
        });
		
	// $('.validate').on('keyup',function(event){
		// if(event.which==13){
			
			
		// var name =$(this).val();
		// alert(name);
		
		// }
	// }); 
	
	//on click  evebnt
	$(document).on('click', '.dropdown-item', function () {
    
	var name =$('#sellerbox').val();
	     $('#product-info').html('');
	var data = 'name='+ name;
			$.ajax({
				method: "POST",
				url: "/netcash-deals/product-info",
				data: data,
				success: function(html) {
					alert("Success");
					 
					 $("#product-info").html(html);
				},
				error: function() {
					alert('Error occured');
				}
			})
	
	
	
	
	});
	   ////
		
    });

</script>

