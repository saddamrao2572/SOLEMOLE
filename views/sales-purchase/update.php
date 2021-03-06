<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalesPurchase */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sales Purchase',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sales-purchase-update">

    <h1></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
