<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NewProductSale */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'New Product Sales'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="new-product-sale-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shop_id',
            'created_at',
            'contact',
            'brand_id',
            'product_id',
            'nickname',
            'buyername',
            'sameimei',
            'price',
            'paid',
            'created_by',
            'quantity',
            'discount',
            'status',
            'img',
            'cnic',
            'warranty',
        ],
    ]) ?>

</div>
