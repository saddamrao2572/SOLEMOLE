<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductSpecification */

$this->title = Yii::t('app', 'Create Product Specification');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Specifications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-specification-create">

 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
