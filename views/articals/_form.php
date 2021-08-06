<?php

use yii\helpers\Html;

use kartik\widgets\FileInput;
use app\models\ArticalCategory;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Articals */
/* @var $form yii\widgets\ActiveForm */
?>
<style>

.radio-inline, .checkbox-inline {
    display: inline-block;
    padding-left: 121px!important;
    margin-bottom: 0;
    font-weight: normal;
    vertical-align: middle;
    cursor: pointer;
}

</style>
<div class="articals-form">

  <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>

      
  
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	
	

	 
	 <?php 
	 if(isset($model->thumbnail))
	 {   ?>
 <div class="inline">
		 <img src="/uploads/articals/<?=$model->thumbnail?>" style="    width: 9%;" />
		 <p>If you select new image pervious will be updated. </p>
	</div>
	
	<?php }
	  ?>
	 
    	

    <?=$form->field($model, 'thumbnail')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
    
	 <?=  $form->field($model, 'content')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'en',
        'minHeight' => 400,
        'imageUpload' => Url::to(['/artical/image-upload']),
        'imageDelete' => Url::to(['/artical/file-delete']),
        'imageManagerJson' => Url::to(['/artical/images-get']),
    ],
    'plugins' => [
        'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset',              
    ],
]);?>
	
	

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
