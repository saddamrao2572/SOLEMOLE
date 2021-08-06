<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TopTrending */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Top Trending',
]) . $model->Title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Top Trendings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="top-trending-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
