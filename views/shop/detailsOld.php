 <?php
 use yii\helpers\Url;
 ?>
 
 <style>
	#banner {
		
		color: #f2a3a5;
		padding: 13em 0 11em 0;
		
		background-image: url("../../images/banner.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		background-position: 15% left;
		text-align: left;
		position: relative;
		z-index: 9999;
	}

		#banner input, #banner select, #banner textarea {
			color: #ffffff;
		}

		#banner a {
			color: #ffffff;
		}

		#banner strong, #banner b {
			color: #ffffff;
		}

		#banner h1, #banner h2, #banner h3, #banner h4, #banner h5, #banner h6 {
			font-family: 'Open Sans', sans-serif;
			color: #fff;
		}

		#banner blockquote {
			border-left-color: #fff;
		}

		#banner code {
			background: none;
			border-color: #fff;
		}

		#banner hr {
			border-bottom-color: #fff;
		}

		#banner input[type="submit"],
		#banner input[type="reset"],
		#banner input[type="button"],
		#banner button,
		#banner .button {
			background-color: #5a5a5a;
			color: #ffffff !important;
		}

			#banner input[type="submit"]:hover,
			#banner input[type="reset"]:hover,
			#banner input[type="button"]:hover,
			#banner button:hover,
			#banner .button:hover {
				background-color: #676767;
			}

			#banner input[type="submit"]:active,
			#banner input[type="reset"]:active,
			#banner input[type="button"]:active,
			#banner button:active,
			#banner .button:active {
				background-color: #4d4d4d;
			}

			#banner input[type="submit"].alt,
			#banner input[type="reset"].alt,
			#banner input[type="button"].alt,
			#banner button.alt,
			#banner .button.alt {
				background-color: transparent;
				box-shadow: inset 0 0 0 2px #fff;
				color: #ffffff !important;
			}

				#banner input[type="submit"].alt:hover,
				#banner input[type="reset"].alt:hover,
				#banner input[type="button"].alt:hover,
				#banner button.alt:hover,
				#banner .button.alt:hover {
					background: rgba(255, 255, 255, 0.25);
				}

				#banner input[type="submit"].alt:active,
				#banner input[type="reset"].alt:active,
				#banner input[type="button"].alt:active,
				#banner button.alt:active,
				#banner .button.alt:active {
					background-color: rgba(255, 255, 255, 0.2);
				}

				#banner input[type="submit"].alt.icon:before,
				#banner input[type="reset"].alt.icon:before,
				#banner input[type="button"].alt.icon:before,
				#banner button.alt.icon:before,
				#banner .button.alt.icon:before {
					color: #f8d1d2;
				}

			#banner input[type="submit"].special,
			#banner input[type="reset"].special,
			#banner input[type="button"].special,
			#banner button.special,
			#banner .button.special {
				background-color: #ffffff;
				color: #e5474b !important;
			}

		#banner:after {
			-moz-transition: opacity 4s ease;
			-webkit-transition: opacity 4s ease;
			-ms-transition: opacity 4s ease;
			transition: opacity 4s ease;
			content: '';
			position: absolute;
			width: 100%;
			height: 100%;
			display: block;
			top: 0;
			left: 0;
			background-color: #0c0c0c;
			opacity: 0.25;
		}

		#banner .inner {
			max-width: 65em;
			width: calc(100% - 6em);
			margin: 0 auto;
			position: relative;
			z-index: 10000;
			line-height: 1.5;
		}

			@media screen and (max-width: 480px) {

				#banner .inner {
					max-width: 90%;
					width: 90%;
				}

			}

		#banner h1 {
			font-size: 2em;
			margin: 0 0 1em 0;
			padding: 0;
			letter-spacing: 3px;
			font-weight: 700;
		}

			#banner h1 span {
				font-weight: 400;
			}

		body.is-loading #banner:after {
			opacity: 1;
		}

		@media screen and (max-width: 1680px) {

			#banner {
				padding: 10em 0 8em 0;
			}

		}

		@media screen and (max-width: 1280px) {

			#banner {
				padding: 8em 0 6em 0;
			}

		}

		@media screen and (max-width: 980px) {

			#banner {
				padding: 12em 0 10em 0;
			}

				#banner br {
					display: none;
				}

		}

		@media screen and (max-width: 736px) {

			#banner {
				padding: 4em 0 2em 0;
			}

				#banner h1 {
					font-size: 1.75em;
				}

		}

		@media screen and (max-width: 480px) {

			#banner {
				padding: 5em 0 3em 0;
			}

				#banner ul {
					margin-top: 1em;
				}

		}

</style>
<!-- Product Area Start Here -->
        
            <div class="container">
                <div class="breadcrumbs-area">
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li><a href="#">Electronics</a> -</li>
                        <li class="active">Computer</li>
                    </ul>
                </div>
            </div>
<section id="banner" style=" z-index:+1;
  
         background: linear-gradient(to left, rgba(120,0,0,0), rgba(55,0,0,1)), url(/uploads/shop_cover/<?=$model->id?>/<?=$model->cover?>);
    background-size: cover;
    background-position: 25% 25%;">
				<div class="inner">
					<h1 ><?=$model->name?> <span><br /><i class="fa fa-phone" aria-hidden="true"></i><?=$model->mobile?><br /><i class="fa fa-map-marker" aria-hidden="true"></i>
					<?=$model->address?></span></h1>
					
					<ul class="actions">
						<li><div class="isotop-btn float-right">
                            <a href="#" data-filter=".new" style="color:black;"><i class="fa fa-phone" aria-hidden="true"></i>Call</a>
                            <a href="#" data-filter=".featured" style="color:black;"><i class="fa fa-commenting-o" aria-hidden="true"></i>Email</a>
                            <a href="#" data-filter=".random" style="color:black;" ><i class="fa fa-star-o" aria-hidden="true"></i>Write Review</a>
							<a href="post-ad.html" class="cp-default-btn" style="color:black;">Post Your Ad</a>
                        </div></li>
					</ul>
				</div>
			</section>
 
 
 

        <section class="s-space-bottom-full bg-accent-shadow-body">
           
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                              <h2><?=$model->name?></h2>
                            </div>
                            <div class="gradient-padding reduce-padding">
                                <div class="single-product-img-layout1 item-mb">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="tab-content">
                                               <?php if($model->premieum==1) { ?>
                                                <span class="price">Premium</span>
											<?php } ?>
                                                <div role="tabpanel" class="tab-pane fade active show" id="related1">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product1.jpg" class="img-fluid"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related2">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product2.jpg" class="img-fluid"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related3">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product3.jpg" class="img-fluid"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related4">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product4.jpg" class="img-fluid"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related5">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product5.jpg" class="img-fluid"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related6">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/img/product/single-product6.jpg" class="img-fluid"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">                                            
                                            <ul class="nav tab-nav tab-nav-inline cp-carousel nav-control-middle" data-loop="true" data-items="6" data-margin="15" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="4" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="6" data-r-Large-nav="true" data-r-Large-dots="false">
                                                <li class="nav-item">
                                                    <a class="active" href="#related1" data-toggle="tab" aria-expanded="false"><img alt="related1" src="/img/product/single-product1.jpg" class="img-fluid"></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#related2" data-toggle="tab" aria-expanded="false"><img alt="related2" src="/img/product/single-product2.jpg" class="img-fluid"></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#related3" data-toggle="tab" aria-expanded="false"><img alt="related3" src="/img/product/single-product3.jpg" class="img-fluid"></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#related4" data-toggle="tab" aria-expanded="false"><img alt="related4" src="/img/product/single-product4.jpg" class="img-fluid"></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#related5" data-toggle="tab" aria-expanded="false"><img alt="related5" src="/img/product/single-product5.jpg" class="img-fluid"></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#related6" data-toggle="tab" aria-expanded="false"><img alt="related6" src="/img/product/single-product6.jpg" class="img-fluid"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                 
                                     <h3>Shop Details:</h3>
                                    <p><?php echo $model->about?>
                                    </p>
                                </div>
                                <div class="section-title-left-dark child-size-xl">
                                    <h3>Specification:</h3>
                                </div>
                                <ul class="specification-layout1 mb-40">
                                    <li>256GB PCIe flash storage</li>
                                    <li>2.7 GHz dual-core Intel Core i5 processor</li>
                                    <li>Turbo Boost up to 3.1GHz</li>
                                    <li>Intel Iris Graphics 6100</li>
                                    <li>8GB memory (up from 4GB in 2013 model)</li>
                                    <li>10 hour battery life</li>
                                    <li>13.3" Retina Display</li>
                                    <li>Intect Box</li>
                                    <li>1 Year international warranty</li>
                                </ul>
                                <ul class="item-actions border-top">
                                  <!-- like work start -->
                         <li>          
                    <?php if(\Yii::$app->user->isGuest) {?>
                        <div class="detail-banner-btn heart like-btn " id="like" data-toggle="tooltip" title="Login to Like this this product">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>  Like  
                        </div><!-- /.detail-claim -->
                    <?php } else { ?>
                        <?php
                            $like = \app\models\ShopLikes::find()->byUserProduct($userID, $model->id);
                            if(isset($like)){
                        ?>
                            <div class="detail-banner-btn heart like-btn marked" data-shopid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userID) ?>" data-marked='1'>
                                
                                <i class="fa fa-heart"  data-toggle="tooltip" title="You've already liked ths product" aria-hidden="true"></i>  Unlike
                            </div>
                        <?php
                            } else {
                        ?>
                            <div class="detail-banner-btn like-btn" data-shopid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userID) ?>" data-toggle="tooltip" title="Click to Like this Shop">
                               <i class="fa fa-heart-o" aria-hidden="true"></i>  Like 
                            </div>
                        <?php } ?>  
                    <?php } ?>
                        
                    </li>

                    <!-- like work end -->
                                    <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
                                    <li class="item-danger"><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <h2>More Ads From This User </h2>
                            </div>
                            <div class="gradient-padding">
                                <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="3" data-r-Large-nav="true" data-r-Large-dots="false">
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product1.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Clothing</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product1.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout1.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Cotton T-Shirt</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Men's Basic Cotton T-Shirt</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$15</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product2.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Electronics</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product2.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout2.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">Patriot Phone</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">HTC Desire Patriot Mobile Smart Phone</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$250</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product3.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Electronics</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product3.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout3.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product3.html">Smart LED TV</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product3.html">TCL 55-Inch 4K Ultra HD Roku Smart LED TV</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$800</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product4.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Clothing</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product4.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout1.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Headphones</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Basics Lightweight On-Ear Headphones</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$15</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product5.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Clothing</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product5.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout2.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">Handbags</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">MMK collection Women Fashion Matching Satchel handbags</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$15</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img src="/img/product/product6.png" alt="categories" class="img-fluid">
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                <div class="title-ctg">Clothing</div>
                                                <ul class="info-link">
                                                    <li><a href="img/product/product6.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                    <li><a href="single-product-layout3.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product3.html">Classic Watch</a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product3.html">Men's Classic Sport Watch with Black Band</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                            <div class="price">$15</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Do you Have Mobiles To Sell?</h2>
                                        <h3>Post your ad on solemole.com</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                    <a href="#" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
  <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Owner Information</h3>
                                </div>
                                <ul class="sidebar-seller-information">
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user1.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Properieter </span>
                                                <h4><?php if(isset($user)){
												echo $user->username;}?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user2.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Location</span>
                                                <h4><?=$model->address?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user3.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Contact Number</span>
                                                <h4><?=$model->mobile?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user4.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Want To Live Chat</span>
                                                <h4>Chat Now!</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user5.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>User Type</span>
                                                <h4>Verified</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Item Details</h3>
                                </div>
                                <ul class="sidebar-item-details">
                                    <li>Condition:<span>New</span></li>
                                    <li>Brand:<span>Apple</span></li>
                                    <li>Color:<span>White</span></li>
                                    <li>Warranty:<span>1 Year</span></li>
                                    <li>
                                        <ul class="sidebar-social">
                                            <li>Share:</li>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Safety Tips for Buyers</h3>
                                </div>
                                <ul class="sidebar-safety-tips">
                                    <li>Meet seller at a public place</li>
                                    <li>Check The item before you buy</li>
                                    <li>Pay only after collecting The item</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
				
                    <div class="col-sm-12" style="background-color: white; margin-top: 5%;">
                    <h2>Submit a review</h2>

                    <?php  if($review->isNewRecord) { ?>
                    <?=  $this->render('_review',[ 'review'=>$review]) ?>
                <?php } else if($review->status == 0) { ?>
                    <p class='alert alert-info alert-fill'>You have already posted a review which is currently been moderated by on of the moderators. It will be published as soon as it is marked by the moderator.
                <?php  }  else if($review->status == 1) { ?>
                    <?=  $this->render('_reviewApproved',[ 'review'=>$review]) ?>
                <?php  } ?>
                    
                    </div>
            </div>
        </section>
		
		
		
		<?php

$likeUrl = Url::to(['/shop/like']);
$js = <<< JS


 ///////////////////like click
        
       
        $(".like-btn").click(function(){

//alert('ho gya men');
            var shopid = $(this).data("shopid");
            var userid = $(this).data("userid");
            var btn = $(this);
            $('i', btn).removeClass('fa fa-heart-o');
            $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
            var data = { 'userid': userid, 'shopid': shopid };
            console.log(data);

           // alert(userid);
            $.ajax(
{
                method: "POST",
                url: "$likeUrl",
                data: data
            })
            .done(function( msg ) {
                 $('i', btn).removeClass('fa fa-refresh fa-spin fa-fw');
                 $('i', btn).addClass('fa fa-heart-o');
                
               var data = JSON.parse(msg);
               btn.toggleClass("marked");
                location.reload();
                return false;
            });
        });





JS;
$this->registerJs($js);


?>