<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessDay */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Business Day',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="business-day-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
