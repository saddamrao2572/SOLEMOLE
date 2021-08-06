<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopLikes */

$this->title = Yii::t('app', 'Create Shop Likes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Likes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-likes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
