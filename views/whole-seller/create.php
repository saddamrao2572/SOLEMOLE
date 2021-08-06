<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WholeSeller */

$this->title = Yii::t('app', 'Create Whole Seller');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Whole Sellers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whole-seller-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
