<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'solemole';
?>
   <div class="search-layout3 d-lg-none bg-accent">
            <div class="search-layout3-holder">
                <div class="container">
                    <form id="cp-search-form" class="bg-primary search-layout3-inner">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mb15--sm">
                                <div class="form-group search-input-area input-icon-location">
                                    <select id="location-header" class="select2">
                                        <option value="0">Select Location</option>
                                        <option value="1">Paypal</option>
                                        <option value="2">Master Card</option>
                                        <option value="3">Visa Card</option>
                                        <option value="4">Scrill</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-12 mb15--sm">
                                <div class="form-group search-input-area input-icon-keywords">
                                    <input placeholder="Enter Keywords here ..." value="" name="key-word" type="text">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 text-right text-left-mb mb15--sm">
                                <a href="#" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Search Area End Here -->
        <!-- Products Area Start Here -->
        <section class="bg-accent s-space-custom fixed-menu-mt">
            <div class="container">
                <div class="row">

                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                        <div class="section-title-left-dark title-bar mb-40">
                            <h2>Featured Product</h2>
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
    <div class="item">
      <img src="uploads/product/15/14212079.jpg" alt="Los Angeles">
    </div>

    <div class="item active">
      <img src="uploads/product/14/7126856.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="uploads/product/14/7126856.jpg" alt="New York">
    </div>
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
                        <div class="row category-grid-layout3 zoom-gallery">
                            <?php 
    $products = app\models\Product::find()->select(['id','name','price','thumbnail','brand_id'])->where(['status'=>1])->limit(8)->all();
    if(isset($products) && $products!=null){
        foreach ($products as $product){
            $bname = app\models\Brand::find()->select(['name'])->where(['id'=>$product->brand_id])->one();
            
   ?>
                            
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="product-box item-mb zoom-gallery">
                                    <div class="item-mask-wrapper">
             <div class="item-mask bg-body"><img style="width: 100%; height: 150px" src="uploads/product/<?=$product->id?>/<?=$product->thumbnail?>" alt="categories" class="img-fluid img-responsive">
                                            <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                            <div class="title-ctg"><?php if(isset($bname) && $bname!=null){
                                                echo $bname->name;
                                            }else{
                                                echo "local";
                                            }?></div>
                                            <ul class="info-link">
                                                <li><a href="img/product/product7.png" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                <li><a href="single-product-layout2.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                            <div class="symbol-featured"><img src="img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                        </div>
                                    </div>
                                    <div class="item-content" style="text-align: center;">
                                        <div class="title-ctg">Clothing</div>
                                        <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html"><?=$product->name?></a></h3>
                                        <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Men's Threadborne Streaker V-Neck T-Shirt</a></h3>
                                        <ul class="upload-info">
                                            <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                            <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                            <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                        </ul>
                                        <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                        <div class="price"><?=$product->price?></div>
                                        <a href="single-product-layout2.html" class="product-details-btn">Details</a>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                 }
    }
                            ?>
                            
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
                                $brands=app\models\Brand::find()->select(['id','name','thumbnail'])->where(['status'=>0])->limit(10)->all();
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
                                    <a href="#"><img width="40px" height="40px" src="" class="img-fluid img-responsive">Others<span>(<?=$count_b-10?>)</span></a>
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
        <!-- Products Area End Here -->
        <!-- Counter Area Start Here -->
        <section class="overlay-default s-space-equal overflow-hidden" style="background-image: url('img/banner/counter-back1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                            <div>
                                <img src="img/banner/counter1.png" alt="counter" class="img-fluid mb20-auto--md">
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
                                <img src="img/banner/counter2.png" alt="counter" class="img-fluid mb20-auto--md">
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
                                <img src="img/banner/counter3.png" alt="counter" class="img-fluid mb20-auto--md">
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
        <!-- Counter Area End Here -->
        <!-- Pricing Plan Area Start Here -->
        <section class="bg-body s-space-default">
            <div class="container">
                <div class="section-title-dark">
                    <h2>Start Earning From Things You Don’t Need Anymore</h2>
                    <p>It’s very Simple to choose pricing &amp; Plan</p>
                </div>
                <div class="row d-md-flex">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="pricing-box bg-box">
                            <div class="plan-title">Free Post</div>
                            <div class="price">
                                <span class="currency">$</span>0
                                <span class="duration">/ Per mo</span>
                            </div>
                            <h3 class="title-bold-dark size-xl">Always FREE Ad Posting</h3>
                            <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                            <a href="#" class="cp-default-btn-lg">Submit Ad</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center col-lg-2 col-md-12 col-sm-12 col-12">
                        <div class="other-option bg-primary">or</div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <div class="pricing-box bg-box">
                            <div class="plan-title">Premium Post</div>
                            <div class="price">
                                <span class="currency">$</span>19
                                <span class="duration">/ Per mo</span>
                            </div>
                            <h3 class="title-bold-dark size-xl">Featured Ad Posting</h3>
                            <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                            <a href="#" class="cp-default-btn-lg">Submit Ad</a>
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
                        <img src="img/banner/process1.png" alt="process" class="img-fluid">
                        <h3>Upload Your Products</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="img/banner/process2.png" alt="process" class="img-fluid">
                        <h3>Set Your Price</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                    <li>
                        <img src="img/banner/process3.png" alt="process" class="img-fluid">
                        <h3>Start Your Business</h3>
                        <p> Bmply dummy text of the printing and typesing industrypsum been the induse.</p>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Selling Process Area End Here -->
        <!-- Subscribe Area Start Here -->
        <section class="bg-body s-space full-width-border-top">
            <div class="container">
                <div class="section-title-dark">
                    <h2 class="size-sm">Receive The Best Offers</h2>
                    <p>Stay in touch with Classified Ads Wordpress Theme and we'll notify you about best ads</p>
                </div>
                <div class="input-group subscribe-area">
                    <input type="text" placeholder="Type your e-mail address" class="form-control">
                    <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Subscribe</button>                        
                    </span>
                </div>
            </div>
        </section>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>