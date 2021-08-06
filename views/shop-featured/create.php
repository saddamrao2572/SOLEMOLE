<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopFeatured */

$this->title = Yii::t('app', 'Create Shop Featured');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Featureds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-featured-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
