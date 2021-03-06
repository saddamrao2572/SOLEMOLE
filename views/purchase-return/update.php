<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseReturn */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Purchase Return',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchase Returns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="purchase-return-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
