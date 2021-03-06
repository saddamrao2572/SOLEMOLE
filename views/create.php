<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SaleReturn */

$this->title = Yii::t('app', 'Create Sale Return');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sale Returns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-return-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
