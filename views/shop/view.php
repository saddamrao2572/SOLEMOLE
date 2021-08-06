<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\models\City;
use yii\models\State;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Shop */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['shop/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['shop/update/','id'=>$model->id])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['shop/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['shop/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-view">

    

  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'shop_type',
           [
                  'attribute'=>'logo',
                  'value'=>('/uploads/shop_logo/'.$model->id .'/' . $model->logo),
                  'format' => ['image',['width'=>'50','height'=>'50']],
          
              ],
            
			[
                  'attribute'=>'cover',
                  'value'=>('/uploads/shop_cover/'.$model->id .'/' . $model->cover),
                  'format' => ['image',['width'=>'50','height'=>'50']],
          
              ],
            'about',
			 /*[
				'attribute'=>'city_id',
				'label'=>'City',
				'value'=>City.name,
				
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
			 ],*/
            'street',
            'land_line',
            'mobile',
            'fb',
            'twiter',
            
            'created_at',
            
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
