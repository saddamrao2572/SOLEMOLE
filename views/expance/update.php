<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expance */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Expance',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="expance-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
