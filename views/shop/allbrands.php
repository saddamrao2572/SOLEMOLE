<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
?>

<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Choose brands for your Shop</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
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
<?php 
$sid=$_GET['shop_id']; 
?>
	
	 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
         [
       'label' => 'Product',
       'value' => function ($model) {
       	$count=Product::find()->where(['brand_id'=>$model->id])->count();
           return $count;
       }
     ],
      [
       'label' => 'Status',
       'format' => 'raw',
       'value' => function ($model,$sid) {
       	$check_status= app\models\ShopProduct::find()->where(['brand_id'=>$model->id])->andWhere(['shop_id'=>$_GET['shop_id'] ])->all();
       	if(isset($check_status) && $check_status!=null){
       		return "<label class='label label-lg label-success'>Imported</label>";
       	}else
       	{
           return "<label class='label label-lg label-warning'>Not Yet</label>";
       }
       	} 
     ],
     ['class' => 'yii\grid\CheckboxColumn'],


        ],
    ]); ?>
</div>
<div class="pull-right" style="margin-top: 15px; margin-bottom: 15px">
<button id="next-btn" class="btn btn-lg btn-default">Next</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	 $(function(){
      $('#next-btn').click(function(){
        var val = [];
        $("input[name='selection[]']:checked").each(function(i){
          val[i] = $(this).val();
        });
        //for(var j=0; j<val.length; j++){
        //	if(j!=0){
        //	alert(val[j]);
       // }
       // }
       if(val.length > 0){
       $.post("/shop/getbrands",{
       	value: val
       });
     }else{
      alert('Must Select one Brand');
     }
      });
    });
</script>