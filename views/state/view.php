<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\State */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['state/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['state/update/','id'=>$model->id])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['state/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['state/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="state-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         
            'name',
           [
				'attribute'=>'country_id',
				'label'=>'Country',
				'value'=>$model->country->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\Country::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
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
