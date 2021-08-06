<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['shop/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['shop/featured'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="background-white p20 mb50">

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
<?php Pjax::begin(['id'=>'reviews']); ?>   
<table class="table table-hover">
    <thead>
	
    <tr style="
    background: #253d52;
    color: white;
">

        <th style="color:white;">Name</th>
        <th style="color:white;">Shop Type</th>
        <th style="color:white;">Start Date</th>
        <th style="color:white;">End Date</th>
        <th style="color:white;">Status</th>
       
       
        
        <th style="color:white;">Action</th>
      </tr>
    </thead>
    <tbody style="    border: solid 1px #44444447;">
	
	

<?php foreach($model as $shop){ ?>

<tr>
        <td><?=$shop->name?></td>
        <td><?=$shop->shop_type?></td>
     
      
       
		 <?php 
		 $FeaturedInfo=\app\models\ShopFeatured::find()->where(['shop_id'=>$shop->id])->one();
		 $alreadyIn=true;
if	(!isset($FeaturedInfo))
{
	$FeaturedInfo= new \app\models\ShopFeatured();
	$alreadyIn=false;
}	 ?>
        <td><input type="date" value="<?=$FeaturedInfo->start_date?>"  class="form-control" name="featured_start_time"></td>
        
		<td>
			<input type="date" value="<?=$FeaturedInfo->end_date?>" class="form-control" name="featured_close_time">
		</td>
		<td>
			<label class="<?=($alreadyIn==true ? 'label label-success' : 'label label-danger');?>"><?=($alreadyIn==true ? 'Featured' : 'Un Featured');?></label>
		</td>
        <td  data-id="<?=Yii::$app->util->encrypt($shop->id);?>">
		
			<a href="javascript://" data-id="<?=Yii::$app->util->encrypt($shop->id);?>" class="btn btn-success accept"><i data-id="<?=Yii::$app->util->encrypt($shop->id);?>" class="glyphicon glyphicon-ok "></i></a>
		
		
		<a href="javascript://" data-id="<?=Yii::$app->util->encrypt($shop->id);?>" class="btn btn-danger reject"><i data-id="<?=Yii::$app->util->encrypt($shop->id);?>" class="	glyphicon glyphicon-remove "></i></a>
</td>
</tr>
      <?php } ?>   
      
      
    </tbody>
  </table>
	
<?php Pjax::end(); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$urlAccept = Url::to(['shop/accept']);
$urlReject = Url::to(['shop/reject']);
 ?>
<script>
$(document).ready(function(){
    $(".accept").click(function(){
        var id = $(this).attr('data-id');
		var start=$(this).closest("tr").find("input[name=featured_start_time]").val();
		var close=$(this).closest("tr").find("input[name=featured_close_time]").val();
		
			var data = {'id':id,'start':start,'close':close};
			
			$.post("<?=$urlAccept ?>",data, function(res){
				var response = $.parseJSON(res);
				if(response.status == 'success'){
					//$.pjax.reload({container:"#reviews"});
					location.reload();
				}
			});
    });
	$(".reject").click(function(){
        var id = $(this).attr('data-id');
			var start=$(this).closest("tr").find("input[name=featured_start_time]").val();
		var close=$(this).closest("tr").find("input[name=featured_close_time]").val();
		
			var data = {'id':id,'start':start,'close':close};
			$.post("<?=$urlReject ?>",data, function(res){
				var response = $.parseJSON(res);
				if(response.status == 'success'){
					//$.pjax.reload({container:"#reviews"});
					location.reload();
				}
			});
    });
});
</script>