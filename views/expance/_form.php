<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Shop;

/* @var $this yii\web\View */
/* @var $model app\models\Expance */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['expance/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['expance/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="expance-form">

    <?php $form = ActiveForm::begin(); $user_id =Yii::$app->util->loggedinUserId();
	?>
	
	<label>Shop</label>
	<?= Html::activeDropDownList($model, 'shop_id', ArrayHelper::map(Shop::find()->where(['created_by'=>$user_id])->all(), 'id', 'name'),['class'=>'','prompt' => 'Select Shop']);	?>
	<br>
	
	<div class="row">
	<div class="col-md-7">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-5">
	 <?= $form->field($model, 'ammount')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
	<?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    

   

    
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
