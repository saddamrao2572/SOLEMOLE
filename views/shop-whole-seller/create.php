<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopWholeSeller */

$this->title = Yii::t('app', 'Create Shop Whole Seller');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Whole Sellers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-whole-seller-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
