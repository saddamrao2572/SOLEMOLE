<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SalesPurchase */

$this->title = Yii::t('app', 'Create Sales Purchase');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sales Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-purchase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
