<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopProduct */

$this->title = Yii::t('app', 'Create Shop Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-product-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
