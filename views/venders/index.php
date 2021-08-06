<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Venders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
						<li><a href="<?=url::to(['venders/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['venders/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="venders-index">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'name',
            
            'created_at',
            

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
