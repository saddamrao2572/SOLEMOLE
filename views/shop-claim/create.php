<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopClaim */

$this->title = Yii::t('app', 'Create Shop Claim');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Claims'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-claim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
