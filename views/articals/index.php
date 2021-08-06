<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['facility/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['facility/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="facility-index">


   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Articals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'title',
//'content',   
		 // 'created_by',
            'created_at',
            // 'status',
            // 'thumbnail',

            [
						'class' => 'yii\grid\ActionColumn',
						'template'=>'{update} {view} {delete} ',
						'buttons'=>[
							'update' => function ($url, $model) {
								return Html::a('<i class="fa fa-pencil-square-o"></i>', $url, [
									'title' => Yii::t('app', 'Update'),
									'data-pjax'=>'0',
								]);
							},
							'delete' => function ($url, $model) {
								return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
									'title' => Yii::t('app', 'Delete'),
									'data-pjax'=>'0',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('<i class="fa fa-eye"></i>', $url, [
									'title' => Yii::t('app', 'View'),
									'data-pjax'=>'0',
								]);
							},
							
						],
						'urlCreator' => function ($action, $model, $key, $index) {
							if ($action === 'update') {
								$url = Url::to(['/articals/update','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							if ($action === 'delete') {
								$url = Url::to(['/articals/delete/','id'=>Yii::$app->util->encrypt($model->id)]); // your own url generation logic
								return $url;
							}
							
							if ($action === 'view') {
								$url = url::to(['/articals/detail/'.Yii::$app->util->encrypt($model->id)]); 
								// your own url generation logic
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