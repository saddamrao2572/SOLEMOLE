<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopMessages */

$this->title = Yii::t('app', 'Create Shop Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
