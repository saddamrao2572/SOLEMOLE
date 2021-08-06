<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalesPurchaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-purchase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'sellername') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'imei') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'cnic') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'fault') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'warranty') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
