<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductReviewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-reviews-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'facility_score') ?>

    <?php // echo $form->field($model, 'staff_score') ?>

    <?php // echo $form->field($model, 'atmosphere_score') ?>

    <?php // echo $form->field($model, 'overall_score') ?>

    <?php // echo $form->field($model, 'pros') ?>

    <?php // echo $form->field($model, 'cons') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
