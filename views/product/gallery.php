<?php

use yii\helpers\Html;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ProductImage */

$this->title = Yii::t('app', 'Product Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ProductsImage'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    

    <?= $this->render('_gallery', [
        'model' => $modelproduct,
		'product' => $model,
		
    ]) ?>

</div>
