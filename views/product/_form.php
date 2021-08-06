<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Category;
use yii\models\Venders;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['product/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['product/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">

<div class="product-form">

       <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


	 <div class="select-wrapper">
		<?= $form->field($model, 'category_id')
			->dropDownList(
				ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
				['prompt'=>'Select Category','class'=>'select-dropdown' ]    // options
			);
	 ?>
	 </div>
	 <div class="select-wrapper">
		<?= $form->field($model, 'brand_id')
			->dropDownList(
				ArrayHelper::map(\app\models\Brand::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
				['prompt'=>'Select Brand','class'=>'select-dropdown' ]    // options
			);
	 ?>
	 </div>
	 
	 <div class="select-wrapper">
		<?= $form->field($model, 'vender_id')
			->dropDownList(
				ArrayHelper::map(\app\models\Venders::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
				['prompt'=>'Select Vender','class'=>'select-dropdown' ]    // options
			);
	 ?>
	 </div>


   

     <div class="select-wrapper">
	<?php
    echo $form->field($model, 'type')->dropDownList(['all' => 'All', 'new' => 'New','old' => 'Old'],['prompt'=>'Select Type','class'=>'select-dropdown']);

	?>
	</div>


    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series')->textInput(['maxlength' => true]) ?>

	<?=$form->field($model, 'thumbnail')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
