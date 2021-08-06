<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetDetails;
use yii\helpers\Url;
AppAssetDetails::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $loc_session = Url::to(['site/location']);  ?> 
<script>

   getLocation();
   
   
   
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
					if (session_status() == PHP_SESSION_NONE) { session_start(); }
					if( !isset($_SESSION['loc_city']) ||  !isset($_SESSION['loc_latitude'])   || 
					!isset($_SESSION['loc_longitude'])) {
						
						?>
					sendLocation(city,state,country,latitude,longitude);
					<?php } ?>
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
	
			var data = {'city':ct,'state':stat,'country':cntry,'latitude':ltd,'longitude':lng};
		
			$.post("<?=$loc_session ?>",data, function(res){
				

			});
			loc_sent=true;
			location.reload();
}

</script>

      <header>
            <div id="header-three" class="header-style1 header-fixed">
             
                <div class="main-menu-area bg-primary" id="sticker">
                    <div class="container">
                        <div class="row no-gutters d-flex align-items-center">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href="index.html" class="img-fluid">
                                        <img src="/img/logo-dark.png" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                                <div class="cp-main-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="#">Home</a>
                                                <ul class="cp-dropdown-menu">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index2.html">Home 2</a></li>
                                                    <li><a href="index3.html">Home 3</a></li>
                                                    <li><a href="index4.html">Home 4</a></li>
                                                </ul>
                                            </li>
                                          
                                            <li class="menu-justify current active"><a href="#">Pages</a>
                                                <div class="rt-dropdown-mega container">
                                                    <div class="rt-dropdown-inner">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <ul class="rt-mega-items">
                                                                    <li><a href="index.html">Home 1</a></li>
                                                                    <li><a href="index2.html">Home 2</a></li>
                                                                    <li><a href="index3.html">Home 3</a></li>
                                                                    <li><a href="index4.html">Home 4</a></li>
                                                                    <li><a href="pricing.html">Pricing Plan</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <ul class="rt-mega-items">
                                                                    <li><a href="category-grid-layout1.html">Grid View 1</a></li>
                                                                    <li><a href="category-grid-layout2.html">Grid View 2</a></li>
                                                                    <li><a href="category-grid-layout3.html">Grid View 3</a></li>
                                                                    <li><a href="category-list-layout1.html">List View 1</a></li>
                                                                    <li><a href="category-list-layout2.html">List View 2</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <ul class="rt-mega-items">
                                                                    <li><a href="category-list-layout3.html">List View 3</a></li>
                                                                    <li class="active"><a href="single-product-layout1.html">Product Details 1</a></li>
                                                                    <li><a href="single-product-layout2.html">Product Details 2</a></li>
                                                                    <li><a href="single-product-layout3.html">Product Details 3</a></li>
                                                                    <li><a href="favourite-ad-list.html">Favourite Ad</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <ul class="rt-mega-items">
                                                                    <li><a href="my-account.html">My Account</a></li>
                                                                    <li><a href="login.html">Login</a></li>
                                                                    <li><a href="post-ad.html">Post Ad</a></li>
                                                                    <li><a href="https://www.radiustheme.com/demo/html/classipost/classipost/report-abuse.html" data-toggle="modal" data-target="#report_abuse">Report Abuse</a></li>
                                                                    <li><a href="faq.html">Faq</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                         
                                            <li><a href="contact.html">Contact</a></li>
											<?php if(\Yii::$app->user->isGuest) { ?>
							
							<li><a  href="<?= Url::to(['/site/register']) ?>"> <i class="fa fa-user-plus"></i> Register</a>
							</li>
							
							<li>
							<a  href="<?= Url::to(['/site/login']) ?>"> <i class="fa fa-sign-in"></i>  Sign In</a>
							</li>
							
							
							
						<?php } else {
							?>
							<?php	if(\Yii::$app->user->can('user')){ ?>
							<li><a style="color:black !important" href="<?= Url::to(['/site/booking']) ?>"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
							<?php } ?>
							<li><a style="color:black !important" href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-sign-out" ></i> Logout</a> </li>
							
						<?php	if(\Yii::$app->user->can('admin') || \Yii::$app->user->can('superadmin') || \Yii::$app->user->can('manager')) { ?>
						<li><a style="color:white !important" href="<?= Url::to(['/site/dashboard']) ?>"><i class="fa fa-user" aria-hidden="true"></i> Admin Side</a> </li>
						<?php } ?>
							
							
						<?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 text-right">
                                <a href="post-ad.html" class="cp-default-btn">Post Your Ad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="#">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home 1</a></li>
                                                <li><a href="index2.html">Home 2</a></li>
                                                <li><a href="index3.html">Home 3</a></li>
                                                <li><a href="index4.html">Home 4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">Who We Are</a></li>
                                        <li><a href="how-it-works.html">How It Works?</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="pricing.html">Pricing Plan</a></li>
                                                <li><a href="category-grid-layout1.html">Grid View 1</a></li>
                                                <li><a href="category-grid-layout2.html">Grid View 2</a></li>
                                                <li><a href="category-grid-layout3.html">Grid View 3</a></li>
                                                <li><a href="category-list-layout1.html">List View 1</a></li>
                                                <li><a href="category-list-layout2.html">List View 2</a></li>
                                                <li><a href="category-list-layout3.html">List View 3</a></li>
                                                <li><a href="single-product-layout1.html">Product Details 1</a></li>
                                                <li><a href="single-product-layout2.html">Product Details 2</a></li>
                                                <li><a href="single-product-layout3.html">Product Details 3</a></li>
                                                <li><a href="favourite-ad-list.html">Favourite Ad</a></li>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="post-ad.html">Post Ad</a></li>
                                                <li><a href="https://www.radiustheme.com/demo/html/classipost/classipost/report-abuse.html" data-toggle="modal" data-target="#report_abuse">Report Abuse</a></li>
                                                <li><a href="faq.html">Faq</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="category-grid-layout1.html">Features</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
		
		  <!-- Search Area Start Here -->
        <section class="search-layout1 bg-body full-width-border-bottom fixed-menu-mt">
            <div class="container">
                <form id="cp-search-form">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-location">
                                <select id="location" class="select2">
                                    <option class="first" value="0">Select Location</option>
                                    <option value="1">Paypal</option>
                                    <option value="2">Master Card</option>
                                    <option value="3">Visa Card</option>
                                    <option value="4">Scrill</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-category">
                                <select id="categories" class="select2">
                                    <option class="first" value="0">Select Categories</option>
                                    <option value="1">Paypal</option>
                                    <option value="2">Master Card</option>
                                    <option value="3">Visa Card</option>
                                    <option value="4">Scrill</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-keywords">
                                <input placeholder="Enter Keywords here ..." value="" name="key-word" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                            <a href="#" class="cp-search-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>Search
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Search Area End Here -->
		  


<?= $content ?>
<section class="bg-body s-space full-width-border-top">
            <div class="container">
                <div class="section-title-dark">
                    <h2 class="size-sm">Receive The Best Offers</h2>
                    <p>Stay in touch with Solemole and we'll notify you about best choice for sales and purchases</p>
                </div>
                <div class="input-group subscribe-area">
                    <input type="text" placeholder="Type your e-mail address" class="form-control">
                    <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Subscribe</button>                        
                    </span>
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
                                        <a href="#">Buy Now on Classipost</a>
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




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
