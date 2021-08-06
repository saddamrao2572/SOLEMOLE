<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Shop;
/* @var $this yii\web\View */
/* @var $model app\models\Facility */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['facility/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['facility/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="facility-form">

    <?php $form = ActiveForm::begin();
    $user_id =Yii::$app->util->loggedinUserId();
	?>
	<label>Shop</label>
	<?= Html::activeDropDownList($model, 'branch_id', ArrayHelper::map(Shop::find()->where(['created_by'=>$user_id])->all(), 'id', 'name'),['class'=>'','prompt' => 'Select Shop']);	?>
	<br>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
