<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopCustomer */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Shop Customer',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shop-customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
