<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserProduct */

$this->title = Yii::t('app', 'Create User Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
