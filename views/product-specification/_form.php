<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecification */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
						
						
							
						
							<li><a href="<?=url::to(['product-specification/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">

<div class="product-specification-form">

    <?php $form = ActiveForm::begin(); ?>

		    <div class="select-wrapper">
				<?= $form->field($model, 'product_id')
					->dropDownList(
						ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
						['prompt'=>'Select Product','class'=>'select-dropdown' ]    // options
					);
			 ?>
			 </div>
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'os')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dimensions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colors')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '2g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '3g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '4g')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chipset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gpu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technology')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resulation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'protection')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extrafeatures')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'builtin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'back_cam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'back_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'front_cam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bluetooth')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infrared')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sensor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'browser')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'messaging')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'games')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'torch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cpacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warranty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'talk_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stand_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'generation')->textInput(['maxlength' => true]) ?>

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
