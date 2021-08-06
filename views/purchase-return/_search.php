<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseReturnSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-return-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shop_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'off') ?>

    <?php // echo $form->field($model, 'reasone') ?>

    <?php // echo $form->field($model, 'whole_sel_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
