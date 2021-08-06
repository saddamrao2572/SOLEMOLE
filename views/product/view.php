<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\models\Category;
use yii\models\Brand;
use yii\models\Venders;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['product/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['product/update/','id'=>Yii::$app->util->encrypt($model->id)])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['product/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['product/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="product-view">

  

   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'name',
            'imei',
           
			[
				'attribute'=>'category_id',
				'label'=>'Category',
				'value'=>$model->category->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
           
			[
				'attribute'=>'vender_id',
				'label'=>'Venders',
				'value'=>$model->venders->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\Venders::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
			 [
				'attribute'=>'brand_id',
				'label'=>'Brand',
				'value'=>$model->brand->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\Brand::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
            'type',
            
           
            'created_at',
            'quantity',
            'price',
            'model',
            'series',
             [
                  'attribute'=>'thumbnail',
                  'value'=>('/uploads/product/'.$model->id .'/' . $model->thumbnail),
                  'format' => ['image',['width'=>'50','height'=>'50']],
          
              ],
            'barcode',
            'conditon',
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
