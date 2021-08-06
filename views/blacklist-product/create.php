<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BlacklistProduct */

$this->title = Yii::t('app', 'Create Blacklist Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blacklist Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
