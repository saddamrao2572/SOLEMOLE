<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\City;
use yii\models\State;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
								
							<li><a href="<?=url::to(['customer/create'])?>">Add New</a> </li>
							
							
							<li class="divider"></li>
							
							<li><a href="<?=url::to(['customer/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="customer-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

   
	<div class="select-wrapper">
			<?= $form->field($model, 'city_id')
				->dropDownList(
					ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
					['prompt'=>'Select City','class'=>'select-dropdown' ]    // options
				);
		 ?>
		 </div> 
	   <div class="select-wrapper">
			<?= $form->field($model, 'state_id')
				->dropDownList(
					ArrayHelper::map(\app\models\State::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
					['prompt'=>'Select State','class'=>'select-dropdown' ]    // options
				);
		 ?>
		 </div> 

   
<?=$form->field($model, 'img')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'waves-effect waves-light btn-large full-btn' : 'btn btn-primary']) ?>
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
