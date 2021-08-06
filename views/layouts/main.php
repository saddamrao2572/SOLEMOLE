<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

use yii\helpers\ArrayHelper;
use keygenqt\autocompleteAjax\AutocompleteAjax;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $loc_session = Url::to(['site/location']);  ?> 
<script>

  // getLocation();
   
   
   
function getLocation(){
    if (navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
    else{
        alert("Unable to get your location because this browser doesn,t support this");
    }
}

function showPosition(position){
    lat=position.coords.latitude;
    lon=position.coords.longitude;
    displayLocation(lat,lon);
}

function showError(error){
    switch(error.code){
        // case error.PERMISSION_DENIED:
            // alert("You have denied request for location.It was used to help you find most near services")
        // break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.")
        break;
       
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred while getting your location.")
        break;
    }
}

function displayLocation(latitude,longitude){
    var geocoder;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(latitude, longitude);

    geocoder.geocode(
        {'latLng': latlng}, 
        function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var add= results[0].formatted_address ;
                    var  value=add.split(",");
					
                    count=value.length;
                    country=value[count-1];
                    state=value[count-2];
                    city=value[count-3];
					<?php
				
				if (!Yii::$app->session->getIsActive()) { Yii::$app->session->open();}
					if( !isset(Yii::$app->session['loc_city']) ||  !isset(Yii::$app->session['loc_longitude'])   ||  !isset(Yii::$app->session['loc_latitude'])) {
						
						?>
						 
					sendLocation(city,state,country,latitude,longitude);
				location.reload();
					<?php
 } ?>
                }
                else  {
                    alert( "your Location is not found");
                }
            }
            else {
               // alert( "Location information failed due to: " + status);
            }
        }
    );
} 

function sendLocation(city,state,country,latitude,longitude){  
	  var ct = city;
	  var stat = state;
	  var cntry = country;
	  var ltd = latitude;
	  var lng = longitude;
	
			var data = {'city':ct,'state':stat,'country':cntry,'latitude':ltd,'longitude':lng, '_csrf': yii.getCsrfToken()};
		
			$.post("<?=$loc_session ?>",data, function(res){
				

			});
			loc_sent=true;
			//location.reload();
}

</script>
 <!-- Preloader Start Here 
    <div id="preloader"></div> -->
    
    <!-- Preloader End Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header style="    margin-bottom: 11%;">
            <div id="header-three" class="header-style2 header-fixed bg-body">
            
                <div class="main-menu-area" id="sticker">
                    <div class="container">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href="https://solemole.com/" class="img-fluid"><img src="/img/logo-dark.png" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                                <div class="cp-main-menu">
                                    <nav>
                                        <ul>
										<?php 
							$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
							//print_r( $view);
							$view = trim($view[0]); 
							//print_r($view);
						?>
										
                                            <li class="<?= $view == "site/index" ? "active" : "" ?>"><a  href="<?= Url::to(['site/index']) ?>"> <i class="fa fa-home" style="font-size:18px;color:#26A489"></i>Home</a>
                                              
                                            </li>
                                             <li class="<?= $view == "site/shoplist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/shoplist']) ?>"> <i class="fa fa-shopping-cart" style="font-size:18px;color:#26A489;    margin-right: 3px;"></i>Shops</a>
                                              
                                            </li>
												 <li class="<?= $view == "site/productlist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/productlist']) ?>"><i class="fa fa-mobile-phone" style="font-size:22px;color:#26A489;margin-right: 3px;"> </i>Mobiles <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                               <ul class="cp-dropdown-menu">
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
                                            </li>
                                   
                                            <li class="<?= $view == "site/used-mobiles" ? "active" : "" ?>"><a  href="<?= Url::to(['site/used-mobiles']) ?>"> <i class="fa fa-mobile-phone" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Used Mobiles</a>
                                              
                                            </li>  
											<li class="<?= $view == "site/posts" ? "active" : "" ?>"><a  href="<?= Url::to(['site/posts']) ?>"> <i class="fa fa-bullhorn" style="font-size:18px;color:#26A489;margin-right: 3px;"></i>Posts</a>
                                              
                                            </li>
											
                                            <li ><a  href="#"> <i class="fa fa-user" style="font-size:18px;color:#26A489; margin-right: 3px;"></i>
											<?php if(\Yii::$app->user->isGuest) {
											echo 'Account';}else 
											{
												echo  Yii::$app->user->identity->username;
											}
											?>
											
											
											<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                              
                                           
											 <ul class="cp-dropdown-menu">
                                           <?php if(\Yii::$app->user->isGuest) { ?>
							
							<li class="<?= $view == "/site/register" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/register']) ?>"> <i class="fa fa-user-plus" style="font-size:18px;color:#FFAA00"></i> Register</a>
							</li>
							
							<li class="<?= $view == "/site/login" ? "active" : "" ?>">
							<a  href="<?= Url::to(['/site/login']) ?>"> <i class="fa fa-sign-in" style="font-size:18px;color:#FFAA00"></i>  Login</a>
							</li>
							
							
							
						<?php } else {
							?>
							<?php	if(\Yii::$app->user->can('user')){ ?>
							<li class="<?= $view == "/site/booking" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/booking']) ?>"><i class="fa fa-plus" aria-hidden="true" style="font-size:18px;color:#FFAA00"></i> Add Listing</a> </li>
							<li class="<?= $view == "/site/messages" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/messages']) ?>"><i class="fa fa-plus" aria-hidden="true" style="font-size:18px;color:#FFAA00"></i> Messaging</a> </li>
							<?php } ?>
							<li class="<?= $view == "/site/logout" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-sign-out" style="font-size:18px;color:#FFAA00"> </i> Logout</a> </li>
							
						<?php	if(\Yii::$app->user->can('admin') || \Yii::$app->user->can('superadmin') || \Yii::$app->user->can('manager')) { ?>
						<li class="<?= $view == "/site/dashboard" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/dashboard']) ?>"><i class="fa fa-user" aria-hidden="true" style="font-size:18px;color:#FFAA00"></i> Admin Side</a> </li>
						<?php } ?>
							
							
						<?php } ?>
                                        </ul>
										 </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 text-right">
                                <a href="<?= Url::to(['/site/adpost']) ?>" class="cp-default-btn">Post Your Ad</a>
                            </div>
                        </div>
                    </div>
					 <style type="text/css">
                                            .ui-autocomplete-input
                                            {
                                                font-size: 15px;
                                            }
											.typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #1f3f41;
		outline: 0;
	}
                                        </style>
                    <div class="search-layout3">
                        <div class="search-layout3-holder">
                            <div class="container">
							
                                <form id="cp-search-form2" class="bg-primary search-layout3-inner"  method="POST" action="<?= Url::to(['site/search']) ?>" style="background-image: linear-gradient(#16A033, #0B9B7E), linear-gradient(#16A123, #5B9A04);">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="form-group search-input-area input-icon-location">
                                               <?php 
                                                    $serchcity= new \app\models\City(); 
                                                    $form = ActiveForm::begin(); ?>
                                                    <?= $form->field($serchcity, 'id')->dropDownList(ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'), ['class'=>'select2' , 'prompt' => 'Select Location'])->label(false); ?>
   
                                                     <?php ActiveForm::end(); ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-5">
                                            <div class="form-group search-input-area input-icon-keywords">
                                           <input type="text" class="typeahead" name="product" id="searchbox" placeholder="Search Products">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 text-right">
                                            <button href="#" type="submit" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



      <script>
    $(document).ready(function () {
        $('#searchbox').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/site/search-complete",
          data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item;
                        }));
                    }
                });
            }
        });
    });
</script>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                    <ul>
										<?php 
							$view = \Yii::$app->urlManager->parseRequest(Yii::$app->request);
							//print_r( $view);
							$view = trim($view[0]); 
							//print_r($view);
						?>
										
                                            <li class="<?= $view == "site/index" ? "active" : "" ?>"><a  href="<?= Url::to(['site/index']) ?>"> <i class="fa fa-home" style="font-size:18px;color:#26A489"></i>Home</a>
                                              
                                            </li>
                                             <li class="<?= $view == "site/shoplist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/shoplist']) ?>"> <i class="fa fa-shopping-cart" style="font-size:18px;color:#26A489"></i>Shops</a>
                                              
                                            </li>
											 <li class="<?= $view == "site/productlist" ? "active" : "" ?>"><a  href="<?= Url::to(['/site/productlist']) ?>"><i class="fa fa-mobile-phone" style="font-size:22px;color:#26A489"> </i>Mobiles</a>
                                               <ul class="cp-dropdown-menu">
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
                                            </li>
                                    
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
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End Here -->
        <!-- Search Area Start Here -->
        <div class="search-layout3 d-lg-none bg-accent">
            <div class="search-layout3-holder">
                <div class="container">
                         <form id="cp-search-form2" class="bg-primary search-layout3-inner"  method="POST" action="<?= Url::to(['site/search']) ?>" style="background-image: linear-gradient(#16A033, #0B9B7E), linear-gradient(#16A123, #5B9A04);">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mb15--sm">
							
                                <div class="form-group search-input-area input-icon-location">
                                      <?php 
                                                    $serchcity= new \app\models\City(); 
                                                    $form = ActiveForm::begin(); ?>
                                                    <?= $form->field($serchcity, 'id')->dropDownList(ArrayHelper::map(\app\models\City::find()->all(), 'id', 'name'), ['class'=>'select2' , 'prompt' => 'Select Location'])->label(false); ?>
   
                                                     <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-12 mb15--sm">
                                <div class="form-group search-input-area input-icon-keywords">
                                    <input type="text" class="typeahead" name="product" id="searchbox" placeholder="Search Products">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 text-right text-left-mb mb15--sm">
                                   <button href="#" type="submit" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search Area End Here -->
   <?= \odaialali\yii2toastr\ToastrFlash::widget([
					'options' => [
						'positionClass' => 'toast-top-right'
					]
				]);?>
<?= $content ?>
<section class="bg-body s-space full-width-border-top">
            <div class="container">
                <div class="section-title-dark">
                    <h2 class="size-sm">Receive The Best Offers</h2>
                    <p>Stay in touch with Solemole.com and we,ll notify you to most latest available Mobiles Nearest to you</p>
                </div>
                <div class="input-group subscribe-area">
                    <form class="form-group" method="post" action="<?= Url::to(['/site/subcribe']) ?>" style="width: 100%; margin-left: -12%;">
                        <input type="email" name="email" placeholder="Type your e-mail address" class="form-control" style="font-size: 18px;width: 99%;" required="">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                        <span class="input-group-addon">
                            <button type="submit" class="cp-default-btn-xl" >Subscribe</button>                        
                        </span>
        
                    </form> 
                </div>
            </div>
        </section>
   <footer>
            <div class="footer-area-top s-space-equal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">About us</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="about.html">About us</a>
                                    </li>
                                    <li>
                                        <a href="#">Career</a>
                                    </li>
                                    <li>
                                        <a href="#">Terms &amp; Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="#">Sitemap</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">How to sell fast</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="#">How to sell fast</a>
                                    </li>
                                    <li>
                                        <a href="#">Buy Now on SoleMole</a>
                                    </li>
                                    <li>
                                        <a href="#">Membership</a>
                                    </li>
                                    <li>
                                        <a href="#">Banner Advertising</a>
                                    </li>
                                    <li>
                                        <a href="#">Promote your ad</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">Help &amp; Support</h3>
                                <ul class="useful-link">
                                    <li>
                                        <a href="#">Live Chat</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#">Stay safe on classipost</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-box">
                                <h3 class="title-medium-light title-bar-left size-lg">Follow Us On</h3>
                                <ul class="folow-us">
                                    <li>
                                        <a href="#">
                                            <img src="/img/footer/follow1.jpg" alt="follow">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="/img/footer/follow2.jpg" alt="follow">
                                        </a>
                                    </li>
                                </ul>
                                <ul class="social-link">
                                    <li class="fa-classipost">
                                        <a href="#">
                                            <img src="/img/footer/facebook.jpg" alt="social">
                                        </a>
                                    </li>
                                    <li class="tw-classipost">
                                        <a href="#">
                                            <img src="/img/footer/twitter.jpg" alt="social">
                                        </a>
                                    </li>
                                    <li class="yo-classipost">
                                        <a href="#">
                                            <img src="/img/footer/youtube.jpg" alt="social">
                                        </a>
                                    </li>
                                    <li class="pi-classipost">
                                        <a href="#">
                                            <img src="/img/footer/pinterest.jpg" alt="social">
                                        </a>
                                    </li>
                                    <li class="li-classipost">
                                        <a href="#">
                                            <img src="/img/footer/linkedin.jpg" alt="social">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
                            <p>Copyright © Solemole.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-right text-center-mb">
                            <ul>
                                <li>
                                    <img src="/img/footer/card1.jpg" alt="card">
                                </li>
                                <li>
                                    <img src="/img/footer/card2.jpg" alt="card">
                                </li>
                                <li>
                                    <img src="/img/footer/card3.jpg" alt="card">
                                </li>
                                <li>
                                    <img src="/img/footer/card4.jpg" alt="card">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


  </div>

<?php $this->endBody() ?>
</body>
</html>
			

<?php $this->endPage() ?>



