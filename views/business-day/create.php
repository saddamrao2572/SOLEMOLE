<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BusinessDay */

$this->title = Yii::t('app', 'Create Business Day');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Business Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-day-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
