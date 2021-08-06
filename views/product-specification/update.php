<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecification */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Specification',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Specifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-specification-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
