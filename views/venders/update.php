<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venders */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Venders',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="venders-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
