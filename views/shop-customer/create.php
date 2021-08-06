<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopCustomer */

$this->title = Yii::t('app', 'Create Shop Customer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
