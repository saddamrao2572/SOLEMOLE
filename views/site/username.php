<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update Username';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="page-title">
            <h1><?= $this->title ?></h1>
        </div><!-- /.page-title -->

		
		<?php $form = ActiveForm::begin([
			'id' => 'login-form',
		]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->hint('Please note that username cannot be chnaged later on') ?>

        <div class="form-group pull-right">
            <?= Html::submitButton('Update Username', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

		<?php ActiveForm::end(); ?>
	</div>
</div>
