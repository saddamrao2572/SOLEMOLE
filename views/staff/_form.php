<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Shop;
use app\models\ShopSearch;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]);?>

<label> Shop </label>
    <?= Html::activeDropDownList($model, 'shop_id', ArrayHelper::map(Shop::find()->where(['created_by'=>Yii::$app->util->loggedinUserId()])->all(), 'id', 'name'),['class'=>'','prompt' => 'Select Shop']); ?>
 <br>
	 
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cnic')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contect')->textInput() ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

	 <?=$form->field($model, 'thumbnail')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>

    <?php 
  if(isset($model->thumbnail))
  {
  ?>
  <img style = "    height: 170px;
    width: 12%;" src="/uploads/staff/<?=$model->thumbnail?>"/>
  <p>If you change the image pervious will be replaced.</p>
  <?php  } ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
