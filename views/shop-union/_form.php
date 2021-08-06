<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ShopUnion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shop-union-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'association_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'president_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'president_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gen_sec_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gen_sec_number')->textInput(['maxlength' => true]) ?>

  	 <?= $form->field($model, 'city_id')
	  ->dropDownList(
	   ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
	   [
	   
				'prompt'=>'Select City', 
				'class'=>'form-group', 
				
	 ]    // options
	  )->label(false)
	 ?>

 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
