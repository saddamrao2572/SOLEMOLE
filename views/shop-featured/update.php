<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopFeatured */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Shop Featured',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Featureds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shop-featured-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
