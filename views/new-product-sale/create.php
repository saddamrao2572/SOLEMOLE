<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NewProductSale */

$this->title = Yii::t('app', 'Create New Product Sale');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Product Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-product-sale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
