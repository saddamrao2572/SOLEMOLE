<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetLogin;
use yii\helpers\Url;
use app\controllers\Events;
use app\controllers\Work;
AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
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
	 
</head>
<body>
<?php $this->beginBody() ?>


<style type="text/css">
  .navbar-inverse
  {
    background-color: white; 
    border: none;
    min-height: 124px !important;
  }
  .navbar-header
  {
    margin-top: 1% important;
    margin-left: 6% !important;
  }
  .navbar-nav
  {
        margin-left: 14%;
    margin-top: 1%;
  }
  .navbar-brand
  {
    margin-top: 6px;
  }
  .navbar-nav li a 
  {
    font-size: 15px; 
    color: #646464 !important; 
    margin-top: 6px;
  }
  .footer-area-top
  {
   background-color: black;
   
  }
  .text-center-mb
  {
    margin-top: 4%;
  }
  .footer-area-top ul li 
  {
   
    float: left;
    padding-right: 2%;
    width: 50px;
  }

  .container
  {
    width: 100% !important;
  }
  .cp-default-btn {
    border: 1px solid #FDB001;
    -webkit-border-radius: 4px !important;
    -moz-border-radius: 4px;
    border-radius: 4px;
    font-size: 15px !important;
    font-weight: 500;
    font-family: 'Roboto', sans-serif;
    padding: 9px 30px !important;
    text-decoration: none;
    display: inline-block !important;
    color: #FFFFFF !important;
  
    background-image: linear-gradient(to bottom, #fdb001, #e7940c);
    
    transition: all 1s ease-out;
    width: 150px;
    height: 41px;
}


</style>



<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>
	
	<section>
		<div class="v3-top-menu" style="height: 80px;">
			<div class="container">
				<div class="row">
					<div class="v3-menu">
						<div class="v3-m-1">
							 <a class="navbar-brand " href="<?=Url::to(['index'])?>" ><img src="/img/logo-dark.png" alt="logo"></a>
						</div>
				 <ul class="nav navbar-nav ">
   <?php 
							$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
							//print_r( $view);
							$view = trim($view[0]); 
							//print_r($view);
						?>
										
                                            <li class="<?= $view == "site/index" ? "active" : "" ?>"><a  href="<?= Url::to(['site/index']) ?>"> <i class="fa fa-home" style="font-size:18px;color:#26A489"></i>Home</a>
                                              
                                            </li>
                                             <li class="<?= $view == "site/shoplist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/shoplist']) ?>"> <i class="fa fa-shopping-cart" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Shops</a>
                                              
                                            </li>
											 <li class="<?= $view == "site/productlist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/productlist']) ?>" class='waves-effect dropdown-button top-user-pro' data-activates='mobile-menu' ><i class="fa fa-mobile-phone" style="font-size:22px;color:#26A489;margin-right: 3px;"> </i>Mobiles <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											                                             </li>
											 <ul id='mobile-menu' class='dropdown-content top-menu-sty'>
											   <?php  
                              $sql='
 SELECT brand.*, COUNT(brand.id) AS post_count
    FROM brand LEFT JOIN product 
    ON brand.id = product.brand_id
    GROUP BY brand.id
    ORDER BY post_count desc 
	limit 10';
                                $brands=\app\models\Brand::findBySql($sql)->all();
                                $count_b= app\models\Brand::find()->count(); 
                                if(isset($brands) && $brands!=null){
                                    foreach ($brands as $brand) {
                                       $count_p= app\models\Product::find()->where(['brand_id'=>$brand->id])->count(); 
                                ?>
                                <li>
                                    <a href="<?=url::to(['/brand/listing','bid'=>$brand->id])?>"><?=$brand->name?><span>(<?=$count_p?>)</span></a>
                                </li> 
                               <?php     }
                               ?>
                               <li>
                                    <a href="<?=url::to(['/brand/all'])?>">Others<span>(<?=$count_b-10?>)</span></a>
                                </li>
                               <?php
                                }
                                ?>
											 </ul>
											 
                                                 <li class="<?= $view == "site/posts" ? "active" : "" ?>"><a  href="<?= Url::to(['site/posts']) ?>"> <i class="fa fa-bullhorn" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Posts</a>
                                              
                                            </li>
											 <li class="<?= $view == "site/used-mobiles" ? "active" : "" ?>"><a  href="<?= Url::to(['site/used-mobiles']) ?>"> <i class="fa fa-mobile-phone" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Used Mobiles</a>
                                              
                                            </li>

                                    <li class="<?= $view == "site/productlist" ? "active" : "" ?>">
									<a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><i class="fa fa-user" style="font-size:18px;color:#26A489"></i>
									<?php if(\Yii::$app->user->isGuest) {
											echo 'Account';}else 
											{
												echo  Yii::$app->user->identity->username;
											}
											?> <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
									
                                              
                                            </li>
										
				<!-- Dropdown Structure -->
					 <ul id='top-menu' class='dropdown-content top-menu-sty'>
                                           <?php if(\Yii::$app->user->isGuest) { ?>
							
							<li class="<?= $view == "/site/register" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/register']) ?>"> <i class="fa fa-user-plus" style="font-size:18px;color:#26A489"></i> Register</a>
							</li>
							
							<li class="<?= $view == "/site/login" ? "active" : "" ?>">
							<a  href="<?= Url::to(['/site/login']) ?>"> <i class="fa fa-sign-in" style="font-size:18px;color:#26A489"></i>  Sign In</a>
							</li>
							
							
							
						<?php } else {
							?>
							<?php	if(\Yii::$app->user->can('user')){ ?>
							<li class="<?= $view == "/site/booking" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/booking']) ?>"><i class="fa fa-plus" aria-hidden="true" style="font-size:18px;color:#26A489"></i> Add Listing</a> </li>
							<?php } ?>
						
							<li class="<?= $view == "/site/logout" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-sign-out" style="font-size:18px;color:#26A489"> </i> Logout</a> </li>
							
						<?php	if(\Yii::$app->user->can('admin') || \Yii::$app->user->can('superadmin') || \Yii::$app->user->can('manager')) { ?>
						<li class="<?= $view == "/site/dashboard" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/dashboard']) ?>"><i class="fa fa-user" aria-hidden="true" style="font-size:18px;color:#26A489"></i> Admin Side</a> </li>
						<?php } ?>
							
							
						<?php } ?>
						</ul>
    <li>
          <a href="<?= Url::to(['/site/adpost']) ?>" class="cp-default-btn">Post Your Ad</a>
      
    </li>
    </ul>
						<!--END DROP DOWN MENU-->						
					</div>
				</div>
			</div>
		</div>
	</section>
	
		<!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="ts-menu-5"><span><i class="fa fa-bars" aria-hidden="true"></i></span> </div>
					<!--MOBILE MENU CONTAINER:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->
					<div class="mob-right-nav" data-wow-duration="0.5s">
						<div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
						<h5>@SoleMole</h5>
						<ul class="mob-menu-icon">
						 <?php 
							$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
							//print_r( $view);
							$view = trim($view[0]); 
							//print_r($view);
						?>
										
                                            <li class="<?= $view == "site/index" ? "active" : "" ?>"><a  href="<?= Url::to(['site/index']) ?>"> <i class="fa fa-home" style="font-size:18px;color:#26A489"></i>Home</a>
                                              
                                            </li>
                                             <li class="<?= $view == "site/shoplist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/shoplist']) ?>"> <i class="fa fa-shopping-cart" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Shops</a>
                                              
                                            </li>
											
											
											 
                                                 <li class="<?= $view == "site/posts" ? "active" : "" ?>"><a  href="<?= Url::to(['site/posts']) ?>"> <i class="fa fa-bullhorn" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Posts</a>
                                              
                                            </li>
											 
                                                 <li class="<?= $view == "site/used-mobiles" ? "active" : "" ?>"><a  href="<?= Url::to(['site/used-mobiles']) ?>"> <i class="fa fa-mobile-phone" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Used Mobiles</a>
                                              
                                            </li>


                                    <li>
									<a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><i class="fa fa-user" style="font-size:18px;color:#26A489"></i>My Account <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
									
                                              
                                            </li>
										
				<!-- Dropdown Structure -->
				<ul id='top-menu' class='dropdown-content top-menu-sty'>
                                           <?php if(\Yii::$app->user->isGuest) { ?>
							
							<li class="<?= $view == "/site/register" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/register']) ?>"> <i class="fa fa-user-plus" style="font-size:18px;color:#26A489"></i> Register</a>
							</li>
							
							<li class="<?= $view == "/site/login" ? "active" : "" ?>">
							<a  href="<?= Url::to(['/site/login']) ?>"> <i class="fa fa-sign-in" style="font-size:18px;color:#26A489"></i>  Sign In</a>
							</li>
							
							
							
						<?php } else {
							?>
							<?php	if(\Yii::$app->user->can('user')){ ?>
							<li class="<?= $view == "/site/booking" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/booking']) ?>"><i class="fa fa-plus" aria-hidden="true" style="font-size:18px;color:#26A489"></i> Add Listing</a> </li>
							<?php } ?>
						
							<li class="<?= $view == "/site/logout" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-sign-out" style="font-size:18px;color:#26A489"> </i> Logout</a> </li>
							
						<?php	if(\Yii::$app->user->can('admin') || \Yii::$app->user->can('superadmin') || \Yii::$app->user->can('manager')) { ?>
						<li class="<?= $view == "/site/dashboard" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/dashboard']) ?>"><i class="fa fa-user" aria-hidden="true" style="font-size:18px;color:#26A489"></i> Admin Side</a> </li>
						<?php } ?>
							
							
						<?php } ?>
						</ul>
    <li>
          <a href="<?= Url::to(['/site/adpost']) ?>" class="cp-default-btn">Post Your Ad</a>
      
    </li>
						</ul>
						<h5>Mobiles</h5>
						<ul>
							 <?php  
                                $sql='
 SELECT brand.*, COUNT(brand.id) AS post_count
    FROM brand LEFT JOIN product 
    ON brand.id = product.brand_id
    GROUP BY brand.id
    ORDER BY post_count desc 
	limit 10';
                                $brands=\app\models\Brand::findBySql($sql)->all();
                                $count_b= app\models\Brand::find()->count(); 
                                if(isset($brands) && $brands!=null){
                                    foreach ($brands as $brand) {
                                       $count_p= app\models\Product::find()->where(['brand_id'=>$brand->id])->count(); 
                                ?>
                                <li>
                                    <a href="<?=url::to(['/brand/listing','bid'=>$brand->id])?>"><?=$brand->name?><span>(<?=$count_p?>)</span></a>
                                </li> 
                               <?php     }
                               ?>
                               <li>
                                    <a href="<?=url::to(['/brand/all'])?>">Others<span>(<?=$count_b-10?>)</span></a>
                                </li>
                               <?php
                                }
                                ?>
						</ul>
					</div>
				</div>
				 <?= \odaialali\yii2toastr\ToastrFlash::widget([
					'options' => [
						'positionClass' => 'toast-top-right'
					]
				]);?>
<?=$content?>
<section class="copy">
		<div class="container">
			<p style="color:white !important;">copyrights © 2018 SoleMole.com. &nbsp;&nbsp;All rights reserved. </p>
		</div>
	</section>
        
     
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
