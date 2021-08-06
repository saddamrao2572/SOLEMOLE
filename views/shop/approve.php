<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\models\City;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'APROVE | Branches');

?><div class="tz-2 tz-2-admin">
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









<div class="background-white p20 mb50">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
<?php Pjax::begin(['id'=>'reviews']); ?> 

<style>
.table > thead > tr > th {
    color:white !important;
}
</style>
<br>
<table class="table table-hover">
    <thead>
	<?php if(isset($model)){ ?>
    <tr style="
    background: #009f8b;
    color: white;
">
        <th>Name</th>
        <th>City</th>
        <th>Requester</th>
        
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody style="    border: solid 1px #44444447;">
	<?php foreach($model as $brn){ 
	
	$city = app\models\City::find()->where(['id'=>$brn->city_id])->one();
	

	
	$user= app\models\User::find()->where(['id'=>$brn->created_by])->one();

	?>
	      
		<tr>
        <td><?php if (isset($brn)){echo $brn->name;} ?></td>
        <td><?php if(isset($city)){echo $city->name;}?></td>
		
	
        <td><?php
		if(isset($user))
		{
		echo $user->username;
		}?></td>
        
	
        
		
		<td>
			<label class="<?=($brn->status==1 ? 'label label-success' : 'label label-danger');?>"><?=($brn->status==1 ? 'Approve' : 'Not Approve');?></label>
		</td>
        <td >
	<?php 	if(isset($user) ) {
		if($user->username=='admin' || $user->username=='superadmin'){
		echo '<b>Created by SuperAdmin</b>'; } else {
		?>
		<a href="javascript://" data-id="<?=Yii::$app->util->encrypt($brn->id);?>" class="btn btn-success"><i data-id="<?=Yii::$app->util->encrypt($brn->id);?>" class="glyphicon glyphicon-ok accept"></i></a>
		
		<a href="javascript://" data-id="<?=Yii::$app->util->encrypt($brn->id);?>" class="btn btn-danger"><i data-id="<?=Yii::$app->util->encrypt($brn->id);?>" class="	glyphicon glyphicon-remove reject"></i></a>
		<?php }
		} ?>
</td>
        
      </tr>
	
	<?php  }
	
	}else {
		
		echo "No company Featured till now.";
	}?>
      
      
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
$urlAccept = Url::to(['shop/acceptshop']);
$urlReject = Url::to(['shop/rejectshop']);
 ?>
<script>
$(document).ready(function(){
    $(".accept").click(function(){
        var id = $(this).attr('data-id');
		
			var data = {'id':id};
			
			$.post("<?=$urlAccept ?>",data, function(res){
				var response = $.parseJSON(res);
				if(response.status == 'success'){
					location.reload();
					$.pjax.reload({container:"#reviews"});
				}
			});
    });
	$(".reject").click(function(){
        var id = $(this).attr('data-id');
		
			var data = {'id':id};
			$.post("<?=$urlReject ?>",data, function(res){
				var response = $.parseJSON(res);
				if(response.status == 'success'){
					location.reload();
					$.pjax.reload({container:"#reviews"});
				}
			});
    });
});
</script>