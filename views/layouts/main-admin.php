<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetAdmin;
use yii\helpers\Url;
use app\controllers\Events;
use app\controllers\Work;
AppAssetAdmin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <?= Html::csrfMetaTags() ?>
	<?php
		$title = \Yii::$app->name;
		if(!empty($this->title)) {
			$title = $title . ' | ' . $this->title;
		}
	?>
    <title><?= Html::encode($title ) ?></title>
    <?php $this->head() ?>
	<style>
@font-face {
  font-family: 'Glyphicons Halflings';
  src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot');
  src: url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'),
       url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff2') format('woff2'),
       url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'),
       url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'),
       url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}
.glyphicon {
  position: relative;
  top: 1px;
  display: inline-block;
  font: normal normal 16px/1 'Glyphicons Halflings';
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  margin-right: 4px;
}
/* Add icons you will be using below */
.glyphicon-fire:before {
  content: '\e104';
}
.glyphicon-eye-open:before {
  content: '\e105';
}
</style>
	 
</head>
<body class="">
<?php $this->beginBody() ?>
<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	<?php 
	 $user = app\models\User::find()->where(['id'=>\Yii::$app->util->loggedinUserId()])->one();	 
 if(isset($user)){
	 $user_details = app\models\UserDetails::find()->where(['user_id'=>$user->id])->one();}	 
?>
	<!--== MAIN CONTRAINER ==-->
	<div class="container-fluid sb1">
		<div class="row">
			<!--== LOGO ==-->
			<div class="col-md-2 col-sm-3 col-xs-6 sb1-1"> <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a> <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
				<a href="main.html" class="logo"><img src="/img/logo-dark.png" alt="" /> </a>
			</div>
			<!--== SEARCH ==-->
			<div class="col-md-6 col-sm-6 mob-hide">
				<form class="app-search">
					<input type="text" placeholder="Search..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a> </form>
			</div>
			<!--== NOTIFICATION ==-->
			<div class="col-md-2 tab-hide">
				<?php $luid = \Yii::$app->util->loggedinUserId(); 
$unread_message_count = \app\models\Messages::find()->where(['to'=>$luid,'from'=>$luid])->andWhere(['read'=>0])->count();
				?>
				<div class="top-not-cen"> <a class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o" aria-hidden="true"></i><span>5</span></a> <a class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o" aria-hidden="true"></i><span>5</span></a> <a class='waves-effect btn-noti' href='#'><i class="fa fa-bell-o" aria-hidden="true"></i><span><?=$unread_message_count?></span></a> </div>
			</div>
			<!--== MY ACCCOUNT ==-->
			<div class="col-md-2 col-sm-3 col-xs-6">
				<!-- Dropdown Trigger -->
			
				
				<a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'>
				<?php 	if(isset($user_details)){
					if(!empty($user_details->profile_image)){
				?> 
				<img src="/uploads/user/<?=$user->id?>/profile_image/<?=$user_details->profile_image;?>" alt="" />
				<?php }}else {?> 
				<img src="/img/user/user1.png" alt="" />
				<?php }?> 
			
				
				My Account <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
				<!-- Dropdown Structure -->
				<ul id='top-menu' class='dropdown-content top-menu-sty'>
					<li><a href="admin-setting.html" class="waves-effect"><i class="fa fa-cogs"></i>Admin Setting</a> </li>
					<li><a href="admin-analytics.html"><i class="fa fa-bar-chart"></i> Analytics</a> </li>
					<li><a href="admin-ads.html"><i class="fa fa-buysellads" aria-hidden="true"></i>Ads</a> </li>
					<li><a href="admin-payment.html"><i class="fa fa-usd" aria-hidden="true"></i> Payments</a> </li>
					<li><a href="admin-notifications.html"><i class="fa fa-bell-o"></i>Notifications</a> </li>
					<li><a href="#" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a> </li>
					<li class="divider"></li>
					<li><a href="<?=url::to(['/site/logout'])?>"  class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
				</ul>
			</div>
		</div>
	</div>
	<!--== BODY CONTNAINER ==-->
	<div class="container-fluid sb2">
		<div class="row">
			<div class="sb2-1">
				<!--== USER INFO ==-->
				
				<div class="sb2-12">
					<ul>
						<li><?php 	if(isset($user_details)){
					if(!empty($user_details->profile_image)){
				?> 
				<img src="/uploads/user/<?=$user->id?>/profile_image/<?=$user_details->profile_image;?>" alt="" />
				<?php }}else {?> 
				<img src="/img/user/user1.png" alt="" />
				<?php }?>   </li>
						<li>
							<h5><?=$user->username?> <span> <?=$user->email?></span></h5> </li>
						<li></li>
					</ul>
				</div>
				<!--== LEFT MENU ==-->
				<div class="sb2-13">
					<ul class="collapsible" data-collapsible="accordion">
						<li><a href="<?=url::to(['site/dashboard'])?>" class="menu-active"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a> </li>
						<?php if(\Yii::$app->user->can('superadmin')) {
						?>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>Top trending</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['top-trending/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['top-trending/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-building" aria-hidden="true"></i>Shop</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['shop/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-building" aria-hidden="true"></i>Shop Union</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop-union/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['shop-union/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-building" aria-hidden="true"></i>Approve Shop</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop/branchaprove'])?>">Set Accounts</a> </li>
									
									
								</ul>
							</div>
						</li>
						
					<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i>Users</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['user/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['user/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-bookmark" aria-hidden="true"></i>Business Day</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['business-day/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['business-day/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-buysellads" aria-hidden="true"></i>City</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['city/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['city/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-usd" aria-hidden="true"></i>State</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['state/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['state/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
						
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-usd" aria-hidden="true"></i>Country</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['country/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['country/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags" aria-hidden="true"></i> Category</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['category/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['category/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
							<li><a href="<?=Url::to(['product/feature'])?>" class="collapsible-header"><i class="fa fa-mobile-phone" aria-hidden="true"></i>Feature Products</a>
							
						</li>
								<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-money" aria-hidden="true"></i>Brand</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['brand/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['brand/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>Shop Posts</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop-post/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['shop-post/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						
						
						
						
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cogs" aria-hidden="true"></i> Vender</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['venders/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['venders/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-list-ul" aria-hidden="true"></i>Shop Featured</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop/featured'])?>">Featured</a> </li>
								
									
								</ul>
							</div>
						</li>
					<?php 
					}
					?> 
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags" aria-hidden="true"></i> Articals</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['articals/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['articals/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
				
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-user" aria-hidden="true"></i> Customer</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['customer/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['customer/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
								<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-cogs" aria-hidden="true"></i> Expense</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['expance/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['expance/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-file" aria-hidden="true"></i>Facility</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['facility/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['facility/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-plus" aria-hidden="true"></i> Import Products</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<?php 
									if(!Yii::$app->user->isGuest){
						$userid = \Yii::$app->util->loggedinUserId();
						$shops= app\models\Shop::find()->where(['created_by'=>$userid])->all();
						if(isset($shops) && $shops!=null){
							foreach ($shops as $shop) {

								?>

									<li><a href="<?=url::to(['shop/brands','shop_id'=>$shop->id])?>"><?=$shop->name?></a> </li>
									 <?php 
							}
							?>
									<li><a href="<?=url::to(['shop/manageproducts'])?>">Manage Imports</a> </li>

							<?php
						}else{
							?>
							<li><a href="#">No Shops</a> </li>
							<?php 
						}
								}
								?>
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-file" aria-hidden="true"></i>Temprary Deals</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
								<li><a href="<?=url::to(['netcash-deals/temp-deals'])?>">Create New Deal</a> </li>
								<li><a href="<?=url::to(['product-deals/index'])?>">Product Deals</a> </li>
									<li><a href="<?=url::to(['netcash-deals/index'])?>">Net Cash Deals</a> </li>
									
								</ul>
							</div>
						</li>
							
						<li><a href="javascript:void(0)" class="collapsible-header" ><i class="fa fa-building" aria-hidden="true"></i>New Product Sales</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<?php
									$shop=\app\models\Shop::find()->where(['created_by'=>$user->id])->all();
									if (!empty($shop)) {
										foreach ($shop as $shoplist) { ?>
									<li><a href="<?=url::to(['new-product-sale/selectproduct?shop=' . $shoplist->id])?>"><?= $shoplist->name; ?></a> </li>
									
									<?php 
										}
									} ?>
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop/messages','chat'=>'byshop'])?>">Shops</a> </li>
									<li><a href="<?=url::to(['shop/messages','chat'=>'byuser'])?>">Users</a> </li>
									
								</ul>
							</div>
						</li>
							<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-star" aria-hidden="true"></i>My Posts</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop-post/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['shop-post/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-mobile-phone" aria-hidden="true"></i> Product</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['product/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['product/index'])?>">Manage</a> </li>
								</ul>
							</div>
						</li>
								<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-tags" aria-hidden="true"></i> Promos</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['promos/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['promos/index'])?>">Manage</a> </li>
									<li><a href="<?=url::to(['promos/promo-videos'])?>">Video List</a> </li>
								</ul>
							</div>
						</li>
								<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-building" aria-hidden="true"></i>Sales Purchase</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
		<?php
		$shop=\app\models\Shop::find()->where(['created_by'=>$user->id])->all();
// 		print_r($shop);
// exit();
		if (!empty($shop)) {
			foreach ($shop as $shoplist) {
				
			
		 ?>
									<li><a href="<?=url::to(['sales-purchase/selectproduct?shop=' . $shoplist->id])?>"><?= $shoplist->name; ?></a> </li>
									
		<?php 
			}
		} ?>
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header" ><i class="fa fa-building" aria-hidden="true"></i>Sales Return</a>
<div class="collapsible-body left-sub-menu">
<ul>
<?php
$shop=\app\models\Shop::find()->where(['created_by'=>$user->id])->all();
// print_r($shop);
// exit();
if (!empty($shop)) {
foreach ($shop as $shoplist) { ?>
<li><a href="<?=url::to(['sale-return/selectproduct?shop=' . $shoplist->id])?>"><?= $shoplist->name; ?></a> </li>

<?php 
}
} ?>
</ul>
</div>
</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-briefcase" aria-hidden="true"></i>Shop Business Day</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['shop-business-day/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['shop-business-day/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-briefcase" aria-hidden="true"></i>Staff</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['staff/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['staff/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						<li><a href="javascript:void(0)" class="collapsible-header"><i class="fa fa-money" aria-hidden="true"></i>Staff Salary</a>
							<div class="collapsible-body left-sub-menu">
								<ul>
									<li><a href="<?=url::to(['staff-salary/create'])?>">Create</a> </li>
									<li><a href="<?=url::to(['staff-sallery/index'])?>">Manage</a> </li>
									
								</ul>
							</div>
						</li>
						
				
							
					
					
					
					
						
					
				
					

				
						
					

						
						
				
				
				
				
						
						
					</ul>
				</div>
			</div>
			<!--== BODY INNER CONTAINER ==-->
			<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<?= \odaialali\yii2toastr\ToastrFlash::widget([
					'options' => [
						'positionClass' => 'toast-top-right'
					]
				]);?>
				<?=$content?>
				
				
			</div>
		</div>
	</div>
	<!--== BOTTOM FLOAT ICON ==-->
	<section>
		<div class="fixed-action-btn vertical">
			<a class="btn-floating btn-large red pulse"> <i class="large material-icons">mode_edit</i> </a>
			<ul>
				<li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a> </li>
				<li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a> </li>
				<li><a class="btn-floating green"><i class="material-icons">publish</i></a> </li>
				<li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a> </li>
			</ul>
		</div>
	</section>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
