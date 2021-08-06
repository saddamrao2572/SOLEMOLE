<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Solemole | Home';
?>
<style type="text/css">
 
    .owl-item
    {
        display: inline-table;
    }
</style>
 
        <style type="text/css">
            .carousel-inner > .item > img, .carousel-inner > .item > a > img 
            {
                line-height: 1;
                height: 300px !important;
            }
            .gradient-padding {
                padding: 30px 30px 0px !important;
            }
        </style>
        <!-- Search Area End Here -->
        <!-- Products Area Start Here -->
        <section class="bg-accent s-space-custom fixed-menu-mt">
            <div class="container" style="    margin-top: -6%;">
                <div class="row">

                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
					  <div class="gradient-title">
                     <h2>Top Trending Products</h2>
                    </div>
                       
                              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                              </ol>

                              <!-- Wrapper for slides -->
                              <div class="carousel-inner">
                               
                               <?php $tp=\app\models\TopTrending::find()->all(); 
							   $i=0;
                                            if (!empty($tp)) {?>
											
												<div class="item active">
                                  <img src="/uploads/top_trending/<?= $tp[0]['id'] ?>/<?=$tp[0]['img']?>" alt="Chicago">
                                <div class="carousel-caption" style="background-color: #0c9c7761;">
								   <h1 style="    color: white;"><?=$tp[0]['Title']?></h1>
								  
								</div>
								</div>
                                             <?php   foreach ($tp as $tps) {
                                                    
                                              if($i>0){ 													
                                            ?>
											
                                
												
							 
                                <div class="item">
								
                                  <img src="/uploads/top_trending/<?= $tps->id ?>/<?=$tps->img?>" alt="Mobile Image">
                                <div class="carousel-caption" style="background-color: #0c9c7761;">
								  <h1 style="    color: white;"><?=$tps->Title?></h1>
								  
								</div>
								</div>
								
											  <?php } $i++; }}  ?>
                              </div>

                              <!-- Left and right controls -->
                              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>


                            <div class="container" style="margin-top: 3%;"> 
                               <div class="gradient-wrapper" style="width: 104%;margin-left: -2%;">
                                    <div class="gradient-title">
                                        <h2>Featured Products </h2>
                                    </div>
                                    <div class="gradient-padding">
                                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                                            <?php $profeature=\app\models\Product::find()->where(['featured' =>1])->all(); 
                                            if (!empty($profeature)) {
                                                foreach ($profeature as $featured) {
                                                    $venders=\app\models\Venders::find()->where(['id' => $featured->vender_id])->one();
                                                    // print_r($venders);
                                                    // exit();
                                                   
                                            ?>
                                            
                                            <div class="product-box item-mb zoom-gallery">
                                                <div class="item-mask-wrapper">
                                                    <div class="item-mask secondary-bg-box"><img src="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" alt="categories" class="img-fluid" style="height: 100px;">
                                                        <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                        <div class="title-ctg"><?php if (isset($venders)) {
                                                            echo $venders->name;
                                                        }  ?></div>
                                                        <ul class="info-link">
                                                            <li><a href="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?= $featured->name; ?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                            <li><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                        <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="item-content" style="text-align:center;">
                                                    
                                                    <h4 class="short-title" style="text-align: center;"><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><?= $featured->name; ?></a></h4>
                                                   
                                                    
                                                    <span  style="margin-top: -8%;;text-align: center;"><b>PKR: <?php echo $featured->price; ?></b> </span>
                                                   <!--  <ul class="upload-info">
                                                        <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                        <li class="place"  style="text-align: center;"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                        <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                                    </ul> -->
                                                    <a href="<?= Url::to(['/product/'.$featured->slug]) ?>" class="product-details-btn">Details</a>
                                                </div>
                                                
                                            </div>
                                            
                                           <?php
                                                }
                                            } 
                                           ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>


                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Brands</h3>
                                </div>
                                <ul class="sidebar-category-list">
                                         <?php 
                                $sql='
 SELECT brand.*, COUNT(brand.id) AS post_count
    FROM brand LEFT JOIN product 
    ON brand.id = product.brand_id
    GROUP BY brand.id
    ORDER BY post_count desc 
	limit 15';
                                $brands=\app\models\Brand::findBySql($sql)->all();
                                $count_b= app\models\Brand::find()->where(['status'=>0])->count(); 
                                if(isset($brands) && $brands!=null){
                                    foreach ($brands as $brand) {
                                       $count_p= app\models\Product::find()->where(['brand_id'=>$brand->id])->count(); 
                                ?>
                                <li>
                                    <a href="<?=url::to(['/brand/listing','bid'=>$brand->id])?>"><img width="40px" height="40px" src="/uploads/brand<?php echo "/".$brand->id."/".$brand->thumbnail; ?>" alt="" class="img-fluid img-responsive"><?=$brand->name?><span>(<?=$count_p?>)</span></a>
                                </li>
                               <?php     }
                               ?>
                               <li>
                                    <a href="<?=url::to(['/brand/all'])?>"><img width="40px" height="40px" src="" class="img-fluid img-responsive">Others</a>
                                </li>
                               <?php
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-- Products Area 
        <div class="gradient-wrapper col-lg-10" style="float: none;margin-left: 8%;">End Here -->
            
        

        <br>
        <br>
        <br>
        <div class="container"> 
               <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2>Location Wise shops </h2>
                    </div>
                    <div class="gradient-padding">
                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                            <?php $profeature=\app\models\Product::find()->where(['featured' =>1])->limit(20)->all(); 
                            if (!empty($profeature)) {
                                foreach ($profeature as $featured) {
                                    $venders=\app\models\Venders::find()->where(['id' => $featured->vender_id])->one();
                                    // print_r($venders);
                                    // exit();
                                   
                            ?>
                            <div class="product-box item-mb zoom-gallery">
                                <div class="item-mask-wrapper">
                                    <div class="item-mask secondary-bg-box"><img src="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" alt="categories" class="img-fluid" style="height: 150px;">
                                        <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                        <div class="title-ctg"><?php if (isset($venders)) {
                                            echo $venders->name;
                                        }  ?></div>
                                        <ul class="info-link">
                                            <li><a href="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?= $featured->name; ?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                        <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                    </div>
                                </div>
                                <div class="item-content" style="text-align:center;">
                                    
                                    <h4 class="short-title"><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><?= $featured->name; ?></a></h4>
                                   
                                    
                                    <span  style="margin-top: -8%"><b>PKR: <?php echo $featured->price; ?></b> </span>
                                    <ul class="upload-info">
                                        <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?= substr($featured->created_at, 0,10)?></li>
                                        <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                        <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                    </ul>
                                    <a href="<?= Url::to(['/product/'.$featured->slug]) ?>" class="product-details-btn">Details</a>
                                </div>
                            </div>
                           <?php
                                }
                            } 
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        

        <br>
        <br>
        <br>
        <div class="container"> 
               <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2> Location Wise Used Phone Sale</h2>
                    </div>
                    <div class="gradient-padding">
                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                            <?php $profeature=\app\models\Product::find()->where(['featured' =>1])->limit(20)->all(); 
                            if (!empty($profeature)) {
                                foreach ($profeature as $featured) {
                                    $venders=\app\models\Venders::find()->where(['id' => $featured->vender_id])->one();
                                    // print_r($venders);
                                    // exit();
                                   
                            ?>
                            <div class="product-box item-mb zoom-gallery">
                                <div class="item-mask-wrapper">
                                    <div class="item-mask secondary-bg-box"><img src="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" alt="categories" class="img-fluid" style="height: 150px;">
                                        <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                        <div class="title-ctg"><?php if (isset($venders)) {
                                            echo $venders->name;
                                        }  ?></div>
                                        <ul class="info-link">
                                            <li><a href="/uploads/product/<?= $featured->id ?>/<?= $featured->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?= $featured->name; ?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                        <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                    </div>
                                </div>
                                <div class="item-content" style="text-align:center;">
                                    
                                    <h4 class="short-title"><a href="<?= Url::to(['/product/'.$featured->slug]) ?>"><?= $featured->name; ?></a></h4>
                                   
                                    
                                    <span  style="margin-top: -8%"><b>PKR: <?php echo $featured->price; ?></b> </span>
                                    <ul class="upload-info">
                                        <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                        <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                        <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                    </ul>
                                    <a href="<?= Url::to(['/product/'.$featured->slug]) ?>" class="product-details-btn">Details</a>
                                </div>
                            </div>
                           <?php
                                }
                            } 
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        

        <br>
        <br>
        <br>




        <div class="container"> 
               <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2>
						<?php 
						if(isset(Yii::$app->session['loc_latitude']) && isset(Yii::$app->session['loc_longitude']))
				{
					echo 'Our Partners Nearest to Your Location';
				}else {echo 'Our Partners';}
					?>
						</h2>
                    </div>
                    <div class="gradient-padding">
                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                            <?php 
	if (!Yii::$app->session->getIsActive()) { Yii::$app->session->open();}
			
			if(isset(Yii::$app->session['loc_latitude']) && isset(Yii::$app->session['loc_longitude']))
				{
					$my_lat=	Yii::$app->session['loc_latitude'];
					$my_lng=	Yii::$app->session['loc_longitude'];
					$dist=40;
						$query="SELECT *, ( 3956 * 2 * ASIN(SQRT(POWER(SIN(($my_lat -abs(dest.lat)) * pi()/180 / 2),2) + COS($my_lat * pi()/180 ) * COS(abs(dest.lat) *  pi()/180) * POWER(SIN(($my_lng - abs(dest.lng)) *  pi()/180 / 2), 2))
) *1.6 )as distance
FROM shop as dest
having distance < $dist  and status=1 
ORDER BY distance limit 20
";
					
						
						$shops = \app\models\Shop::findBySql($query)->limit(20)->all();
						
						
						
						if(!count($shops)>0)
						{
				$shops=\app\models\Shop::find()->where(['status' =>1])->limit(20)->all();	
		
						}
						
					}
					else 
					{
				$shops=\app\models\Shop::find()->where(['status' =>1])->limit(20)->all();
					}
				
			
                            if (!empty($shops)) {
                                foreach ($shops as $shop) {
									
                                 $city=\app\models\City::find()->where(['id' => $shop->city_id])->one();
                                 $state=\app\models\State::find()->where(['id' => $shop->state_id])->one();
                            ?>
                            <div class="product-box item-mb zoom-gallery">
                                <div class="item-mask-wrapper">
                                    <div class="item-mask secondary-bg-box"><img src="/uploads/shop_logo/<?= $shop->id ?>/<?= $shop->logo; ?>" alt="categories" class="img-fluid" style="height: 150px;">
                                        <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                       
                                        <ul class="info-link">
                                            <li><a href="/uploads/shop_logo/<?= $shop->id ?>/<?= $shop->logo; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?= $shop->name;?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= Url::to(['/shop/details?sid='.$shop->id]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
										<?php if ($shop->premieum==1){?>
                                        <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
										<?php } ?>
                                    </div>
                                </div>
                                <div class="item-content" style="text-align:center;">
                                    
                                    <h4 class="short-title"><a href="<?= Url::to(['/shop/details?sid='.$shop->id]) ?>">
									<?= $shop->name; ?></a></h4>
                                   
                                    
                                    
                                    <ul class="upload-info">
                                        <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                        <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Distance:
										<?php 
				if(isset(Yii::$app->session['loc_latitude']) && isset(Yii::$app->session['loc_longitude']))
				{
				echo	substr($shop->distance, 0,4).' KM';
				}else {echo 'Location N/A';}
				?>
										
										<?php if (isset($city)){echo $city->name.',';} ?>
										<?php if (isset($state)){echo $state->name;} ?>
										</li>
                                        <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                    </ul>
                                    <a href="<?= Url::to(['/shop/details?sid='.$shop->id]) ?>" class="product-details-btn">Details</a>
                                </div>
                            </div>
                           <?php
                                }
                            } 
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        

        <br>
        <br>
        <br>
        <!-- Counter Area Start Here -->
        <section class="overlay-default s-space-equal overflow-hidden" style="background-image: url('img/banner/counter-back1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="/img/banner/counter1.png" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="100000">1,00,000</div>
                                <h3 class="title-regular-light">Our Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="/img/banner/counter2.png" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="500000">5,00,000</div>
                                <h3 class="title-regular-light">Our Happy Buyers</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="/img/banner/counter3.png" alt="counter" class="img-fluid mb20-auto--md">
                            </div>
                            <div>
                                <div class="counter counter-title" data-num="200000">2,00,000</div>
                                <h3 class="title-regular-light">Verified Users</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Pricing Plan Area End Here -->
        <!-- Selling Process Area Start Here -->
        <section class="bg-accent s-space-regular">
            <div class="container">
                <div class="section-title-dark">
                    <h2>How To Start Selling Your Products</h2>
                    <p>It’s very simple to choose pricing &amp; level of exposure on pricing page</p>
                </div>
				
                <ul class="process-area">
                    <li>
                        <img src="/img/banner/process1.png" alt="process" class="img-fluid">
                        <h3>Upload Your Products</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="/img/banner/process2.png" alt="process" class="img-fluid">
                        <h3>Set Your Price</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="/img/banner/process3.png" alt="process" class="img-fluid">
                        <h3>Start Your Business</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Selling Process Area End Here -->
        <!-- Subscribe Area Start Here -->
