<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductReviews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-reviews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'shop_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'facility_score')->textInput() ?>

    <?= $form->field($model, 'staff_score')->textInput() ?>

    <?= $form->field($model, 'atmosphere_score')->textInput() ?>

    <?= $form->field($model, 'overall_score')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pros')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cons')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
