<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['country/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['country/update/','id'=>$model->id])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['country/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['country/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="country-view">

   

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'id',
            'name',
        ],
    ]) ?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
