<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Expance */

$this->title = Yii::t('app', 'Create Expance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expance-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
