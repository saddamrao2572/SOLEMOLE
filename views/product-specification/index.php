<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSpecificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Specifications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['product-specification/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="product-specification-index">

 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_id',
            'description',
            'os',
            'dimensions',
            // 'weight',
            // 'sim',
            // 'colors',
            // '2g',
            // '3g',
            // '4g',
            // 'cpu',
            // 'chipset',
            // 'gpu',
            // 'technology',
            // 'size',
            // 'resulation',
            // 'protection',
            // 'extrafeatures',
            // 'builtin',
            // 'card',
            // 'back_cam',
            // 'back_feature',
            // 'front_cam',
            // 'wlan',
            // 'bluetooth',
            // 'gps',
            // 'usb',
            // 'nfc',
            // 'infrared',
            // 'data',
            // 'sensor',
            // 'audio',
            // 'browser',
            // 'messaging',
            // 'games',
            // 'torch',
            // 'extra',
            // 'cpacity',
            // 'price',
            // 'warranty',
            // 'talk_time',
            // 'stand_by',
            // 'generation',

            ['class' => 'yii\grid\ActionColumn'],
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
