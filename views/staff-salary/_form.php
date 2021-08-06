<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Staff;
use app\models\Shop;

/* @var $this yii\web\View */
/* @var $model app\models\StaffSalary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-salary-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	<div class="col-md-6">
	
	<label>Shop</label>
	 <?= $form->field($model, 'shop_id')
	  ->dropDownList(
	   ArrayHelper::map(\app\models\Shop::find()->where(['status'=>1])->all(), 'id', 'name'),          // Flat array ('id'=>'label')
	   [
	   
				'prompt'=>'Select Shop', 
				'class'=>'', 
	   'onchange'=>'
					$.post( "shop?id='.'"+$(this).val(), function( data ) {
					  $( "select#staffsalary-staff_id" ).html( data );
					});'   ]    // options
	  )->label(false)
	 ?>
	 
	 
     <br>
	 </div>
	 <div class="col-md-6">

    
	<label>Staff</label>
	<?= $form->field($model, 'staff_id')
	  ->dropDownList(
	   ArrayHelper::map(\app\models\Staff::find()->where(['status'=>1])->all(), 'id', 'name'),       // Flat array ('id'=>'label')
	   [
	   
				'prompt'=>'Select Staff', 
				'class'=>'',
	   'onchange'=>'
					$.post( "salary?id='.'"+$(this).val(), function( data ) {
					 // $( "select#staffsalary-pending" ).html( data );
					 
					 var data1=JSON.parse(data);
					  
					 // console.log(data1.salary);
					  $("#staffsalary-salary" ).val(data1.salary) ;
					  $("#staffsalary-pending" ).val(data1.pend) ;
					  var total= parseInt(data1.pend) + parseInt(data1.salary);
					  $("#staffsalary-total" ).val(total) ;
					  
					});'   ]    // options
	  )->label(false)
	 ?>
     <br>
	 </div>
	 </div>
	 
	 
	 <div class="row">
	 <div class="col-md-6">
    <label>Month</label>
	<span>
     <select name="month" class="">
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
     </select> 
</span>
<br>
	</div>
	<div class="col-md-6">
  <?= $form->field($model, 'year')->textInput(['readOnly'=>true ,'value'=>date('Y')]) ?>
<br>
	</div>
	
	</div>
	

     <div class="row">
	 <div class="col-md-3">
	  
    <?= $form->field($model, 'pending')->textInput(['class'=>'changer']) ?>
	</div>
	<div class="col-md-3">

    <?= $form->field($model, 'salary')->textInput(['class'=>'changer']) ?>
	</div>
	<div class="col-md-3">
	

    <?= $form->field($model, 'total')->textInput(['readOnly'=>true]) ?>
	</div>
	<div class="col-md-3">

    <?= $form->field($model, 'paid')->textInput() ?>
	</div>
	</div>

  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".changer").change(function(){
        alert("The text has been changed.");
    });
});
</script>
