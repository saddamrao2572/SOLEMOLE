<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopBusinessDay */

$this->title = Yii::t('app', 'Create Shop Business Day');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Business Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-business-day-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
