<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shop */

$this->title = 'Featured';
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

   

    <?= $this->render('_featured', [
        'model' => $model,
    ]) ?>

</div>
