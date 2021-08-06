<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shop */

$this->title = Yii::t('app', 'Create Shop');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
