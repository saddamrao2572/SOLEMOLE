<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Shop;


/* @var $this yii\web\View */
/* @var $model app\models\Promos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promos-form">

   <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
   
  

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
	<?php
    if(isset($model->video))
	{?>
		
<video width="320" height="240" controls>
  <source src="/uploads/promo/<?=$model->video?>" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
 
</video>
<p>select new video to replace</p>
		
<?php	}		
	
	?>

	<?=$form->field($model, 'video')->widget(FileInput::classname(), [ 'options' => ['accept' => 'video/*'], ]);?>

   
	

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
