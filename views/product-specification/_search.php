<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecificationSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="#!">Add New</a> </li>
							<li><a href="#!">Edit</a> </li>
							<li><a href="#!">Update</a> </li>
							<li class="divider"></li>
							<li><a href="#!"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="#!"><i class="material-icons">subject</i>View All</a> </li>
							<li><a href="#!"><i class="material-icons">play_for_work</i>Download</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="product-specification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'os') ?>

    <?= $form->field($model, 'dimensions') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'sim') ?>

    <?php // echo $form->field($model, 'colors') ?>

    <?php // echo $form->field($model, '2g') ?>

    <?php // echo $form->field($model, '3g') ?>

    <?php // echo $form->field($model, '4g') ?>

    <?php // echo $form->field($model, 'cpu') ?>

    <?php // echo $form->field($model, 'chipset') ?>

    <?php // echo $form->field($model, 'gpu') ?>

    <?php // echo $form->field($model, 'technology') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'resulation') ?>

    <?php // echo $form->field($model, 'protection') ?>

    <?php // echo $form->field($model, 'extrafeatures') ?>

    <?php // echo $form->field($model, 'builtin') ?>

    <?php // echo $form->field($model, 'card') ?>

    <?php // echo $form->field($model, 'back_cam') ?>

    <?php // echo $form->field($model, 'back_feature') ?>

    <?php // echo $form->field($model, 'front_cam') ?>

    <?php // echo $form->field($model, 'wlan') ?>

    <?php // echo $form->field($model, 'bluetooth') ?>

    <?php // echo $form->field($model, 'gps') ?>

    <?php // echo $form->field($model, 'usb') ?>

    <?php // echo $form->field($model, 'nfc') ?>

    <?php // echo $form->field($model, 'infrared') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'sensor') ?>

    <?php // echo $form->field($model, 'audio') ?>

    <?php // echo $form->field($model, 'browser') ?>

    <?php // echo $form->field($model, 'messaging') ?>

    <?php // echo $form->field($model, 'games') ?>

    <?php // echo $form->field($model, 'torch') ?>

    <?php // echo $form->field($model, 'extra') ?>

    <?php // echo $form->field($model, 'cpacity') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'warranty') ?>

    <?php // echo $form->field($model, 'talk_time') ?>

    <?php // echo $form->field($model, 'stand_by') ?>

    <?php // echo $form->field($model, 'generation') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
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
