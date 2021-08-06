<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facility */

$this->title = 'Update Facility: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="facility-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
