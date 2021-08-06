<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaleReturn */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sale Return',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Returns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sale-return-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
