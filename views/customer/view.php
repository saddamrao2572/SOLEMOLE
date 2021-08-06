<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\City;
use yii\models\State;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['customer/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['customer/update/','id'=>$model->id])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['customer/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['customer/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="customer-view">

   

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'name',
            'mobile',
             [
				'attribute'=>'city_id',
				'label'=>'City',
				'value'=>$model->city->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\City::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
			[
				'attribute'=>'state_id',
				'label'=>'State',
				'value'=>$model->state->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\State::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
			[
                  'attribute'=>'img',
                  'value'=>('/uploads/customer/'.$model->id .'/' . $model->img),
                  'format' => ['image',['width'=>'50','height'=>'50']],
          
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
