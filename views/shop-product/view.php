<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\models\Product;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\ShopProduct */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
								<li><a href="<?=url::to(['shop-product/create'])?>">Add New</a> </li>
							
							<li><a href="<?=url::to(['shop-product/update/','id'=>$model->id])?>">Update</a> </li>
							<li class="divider"></li>
							<li><a href="<?=url::to(['shop-product/delete/','id'=>$model->id])?>"><i class="material-icons">delete</i>Delete</a> </li>
							<li><a href="<?=url::to(['shop-product/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-product-view">

   

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            [
				'attribute'=>'product_id',
				'label'=>'Product',
				'value'=>$model->product->name,
				
				'widgetOptions'=>[
				  'data'=>ArrayHelper::map(\app\models\Product::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
				]
			 ],
            'created_at',
            
          
            'qty',
            'color',
            'price',
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
