<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewProductSale */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'New Product Sale',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Product Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="new-product-sale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
