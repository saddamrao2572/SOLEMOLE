<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Shops');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['shop/create'])?>">Add New</a> </li>
						
							<li class="divider"></li>
							
							<li><a href="<?=url::to(['shop/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
							
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
            'shop_type',
            //'logo',
            //'cover',
            // 'about',
            // 'city_id',
            // 'state_id',
            // 'street',
             'land_line',
             'mobile',
            // 'fb',
            // 'twiter',
            // 'owner_id',
            // 'created_at',
            // 'lan',
            // 'la',
            // 'lng',
            // 'slug',
            // 'reg_no',
            // 'premieum',
            // 'verified',

            [
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{edit} {view} {delete}{operations}',
						'buttons'=>[
							'edit' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Edit'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							},
							'delete' => function ($url, $model) {
								return Html::a('<i class="fa fa-trash-o"></i>', $url, [
									'title' => Yii::t('app', 'Remove'),
									'data-pjax'=>'0',
								]);
							},
							'operations' => function ($url, $model) {
								return Html::a('&nbsp;&nbsp;<i class="fa fa-briefcase"></i>', $url, [
									'title' => Yii::t('app', 'Add Operations'),
									'data-pjax'=>'0',
								]);
							},
							
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'edit') {
								$url = Url::to(['/shop/update/'. $model->id]); // your own url generation logic
								return $url;
							}
							if ($action === 'delete') {
								$url = Url::to(['/shop/delete',
                                     'id'=>Yii::$app->util->encrypt($model->id)]);								// your own url generation logic
								return $url;
							}
							
							if ($action === 'operations') {
								$url = Url::to(['/shop/operations','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'view') {
								$url = Url::to(['/shop/view/'. $model->id]); // your own url generation logic
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
