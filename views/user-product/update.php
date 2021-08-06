<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Product',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
