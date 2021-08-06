<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Shop Product',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shop-product-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
