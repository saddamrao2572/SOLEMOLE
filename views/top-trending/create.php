<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TopTrending */

$this->title = Yii::t('app', 'Create Top Trending');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Top Trendings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="top-trending-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
