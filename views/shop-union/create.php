<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopUnion */

$this->title = Yii::t('app', 'Create Shop Union');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Unions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-union-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
