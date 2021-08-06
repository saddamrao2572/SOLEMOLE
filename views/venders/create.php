<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Venders */

$this->title = Yii::t('app', 'Create Venders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venders-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
