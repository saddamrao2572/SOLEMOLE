<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>

<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Choose Products for your Shop</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
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

	
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
           'model',
       
     ['class' => 'yii\grid\CheckboxColumn'],


        ],
    ]); ?>
</div>
<div class="pull-right" style="margin-top: 10px; margin-bottom: 10px">
<button class="btn btn-default">By Shops</button>
<button class="btn btn-default">By Products</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<style type="text/css">
	

element {

}
[type="checkbox"]:not(:checked), [type="checkbox"]:checked {

    position: inherit !important;
    left: -9999px !important;
    opacity: inherit !important;
    color: black !important;
    background-color: black !important;
    display: initial !important;

}
.btn-default:hover {
    color: #fff !important;
    }
</style>