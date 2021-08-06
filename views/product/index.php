<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
								<li><a href="<?=url::to(['product/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['product/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="product-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        
            'name',
            'imei',
			[
			
			'attribute'=>'category_id',
			'label'=>'Category',
			'value'=>'category.name'
			],
           
            [
			
			'attribute'=>'vender_id',
			'label'=>'Vender',
			'value'=>'venders.name'
			],
            // 'type',
            // 'status',
            // 'created_by',
            // 'created_at',
            // 'quantity',
            // 'price',
            // 'model',
            // 'series',
            // 'thumbnail',
            // 'barcode',
            // 'conditon',
			
			[
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {gallery} {specification} {delete}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'delete' => function ($url, $model) {
								return Html::a('<i class="fa fa-trash-o"></i>', $url, [
									'title' => Yii::t('app', 'Delete'),
									'data-pjax'=>'0',
								]);
							},
							'gallery' => function ($url, $model) {
								return Html::a('<i class="fa fa-picture-o"></i>', $url, [
									'title' => Yii::t('app', 'Gallery'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							},
							'specification' => function ($url, $model) {
								return Html::a('<i class="fa fa-plus-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Product Specification'),
									'data-pjax'=>'0',
								]);
							}
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/product/update','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/product/view','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'delete') {
								$url = Url::to(['/product/delete','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'gallery') {
								$url = Url::to(['/product/gallery','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							
							if ($action === 'specification') {
								$url = Url::to(['/product-specification/create','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
						}
					],

            
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
