<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Shop;

/* @var $this yii\web\View */
/* @var $model app\models\ShopPost */
/* @var $form yii\widgets\ActiveForm */

$id = \Yii::$app->util->loggedinUserId();
?>

<div class="shop-post-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
	
	<label> Shop </label>
    <?= Html::activeDropDownList($model, 'shop_id', ArrayHelper::map(Shop::find()->where(['created_by'=>$id])->all(), 'id', 'name'),['class'=>'','prompt' => 'Select Shop']);	?>
	<br>
	

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    
	<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    

  

	<?=$form->field($model, 'thumnail')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
	
	<?= $form->field($storiesimage, 'img[]')->widget(FileInput::classname(), [
					'options' => ['accept' => 'image/*','multiple' => true],
					'pluginOptions' => [
						'initialPreview'=>[
							
						],
						'overwriteInitial'=>false,
						'maxFileSize'=>1024*25,
						'fileActionSettings' => [
							'uploadIcon' =>'',
						],
						
						'uploadUrl' =>'uu',
					],
					'pluginEvents' => [
						"filebatchuploadcomplete" => "function(event, files, extra) { 
							$.pjax.reload({container:'#gallery-pjax'});
							$(event.currentTarget).fileinput('clear');;
						}",
						//"filereset" => "function() { log("filereset"); }",
					],
				]);
			?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
