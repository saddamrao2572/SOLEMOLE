<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBusinessDay */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['shop-business-day/create'])?>">Add New</a> </li>
							
							
							<li><a href="<?=url::to(['shop-business-day/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-business-day-form">

    <?php $form = ActiveForm::begin(); ?>

   
<div class="select-wrapper">
		<?= $form->field($model, 'business_day_id')
			->dropDownList(
				ArrayHelper::map(\app\models\BusinessDay::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
				['prompt'=>'Select Business Day','class'=>'select-dropdown' ]    // options
			);
	 ?>
	 </div>
	 <div class="select-wrapper">
		<?= $form->field($model, 'shop_id')
			->dropDownList(
				ArrayHelper::map(\app\models\Shop::find()->all(), 'id', 'name'),          // Flat array ('id'=>'label')
				['prompt'=>'Select Shop','class'=>'select-dropdown' ]    // options
			);
	 ?>
	 </div>
  

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
