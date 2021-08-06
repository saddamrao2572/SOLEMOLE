<?php
use yii\helpers\Url;
use bigpaulie\social\share\Share;
?>
<section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    <ul>
                       
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <h2><?=$model->title?></h2>
                            </div>
                            <div class="gradient-padding reduce-padding">
                                <div class="single-product-img-layout1 item-mb">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="tab-content">
                                                
                                                <div role="tabpanel" class="tab-pane fade active show" id="related1">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="/uploads/articals/<?=$model->thumbnail?>" class="img-fluid"><img src="/uploads/articals/<?=$model->thumbnail?>" class="zoomImg" style="position: absolute; top: -3.84419px; left: -13.3237px; opacity: 1; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related2">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="//img/product/single-product2.jpg" class="img-fluid"><img src="//img/product/single-product2.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related3">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="//img/product/single-product3.jpg" class="img-fluid"><img src="//img/product/single-product3.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
               <div role="tabpanel" class="tab-pane fade" id="related4">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="//img/product/single-product4.jpg" class="img-fluid"><img src="//img/product/single-product4.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related5">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="//img/product/single-product5.jpg" class="img-fluid"><img src="//img/product/single-product5.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="related6">
                                                    <a href="#" class="zoom ex1" style="position: relative; overflow: hidden;"><img alt="single" src="//img/product/single-product6.jpg" class="img-fluid"><img src="//img/product/single-product6.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 815px; height: 459px; border: none; max-width: none; max-height: none;"></a>
                                                </div>
                                            </div>
                                        </div>
                                  
                                    </div>
                                </div>
                                <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                    <h3>Artical Detail:</h3>
                                    <p><?=$model->content?>
                                    </p>
                                </div>
								<style>
								
								
 .share>ul:last-child {
    margin-bottom: 0;
    display: inline-flex;
}
.share>li {
 margin-left: 6%;
}

</style>
                                
                                
                                <ul class="item-actions border-top">
                                   	<div class="share">
									<?=
										Share::widget([
											'url' => Url::to(['articals/'. $model->slug ] , TRUE),
											'type' => 'small',
											'tag' => 'ul',
											'htmlOptions' => [
												'id' => 'new-id',
												'class' => 'share',
											],	
										]);
									?>
                                       </div>
                                </ul>
                            </div>
                        </div>
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <h2>Related Articals </h2>
                            </div>
                            <div class="gradient-padding">
                                <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="3" data-r-Large-nav="true" data-r-Large-dots="false">
								
				<?php
				$artical = app\models\Articals::find()->all();
				
				
				if(isset($artical))
				{
					$counter=0;
					foreach($artical as $art)
					{
				       $counter++;
					   if($counter==1)
					   {
				?>
								
								
								
                                    <div class="product-box active">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box">
											
											
											<img style="    width: 105%;
    height: 126px;" src="/uploads/articals/<?=$art->thumbnail?>" alt="categories" class="img-fluid">
                                                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                
                                                
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="<?= Url::to(['articals/'.$model->slug]) ?>"><?=$art->title?></a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Men's Basic Cotton T-Shirt</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                              
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                           
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
				<?php }else{ ?>



                     <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box">
											
											<img  style="    width: 105%;
    height: 126px;" src="/uploads/articals/<?=$art->thumbnail?>" alt="categories" class="img-fluid">
                                                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                
                                                
                                                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">Clothing</div>
                                            <h3 class="short-title"><a href="<?= Url::to(['articals/'.$model->slug]) ?>"><?=$art->title?></a></h3>
                                            <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Men's Basic Cotton T-Shirt</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                                
                                                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                            </ul>
                                            <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                          
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>



				<?php } } } ?>           
								 
								 
								 
								 
								 
								 
                                </div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Do you Have Something To Sell?</h2>
                                        <h3>Post your ad on classipost.com</h3>
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
                                    <h3>Seller Information</h3>
                                </div>
                                <ul class="sidebar-seller-information">
                                    <li>
                                        <div class="media">
                                            <img src="//img/user/user1.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Posted By</span>
                                                <h4>Mr. Fahim Rahman</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="//img/user/user2.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Location</span>
                                                <h4>Gulshan, Dhaka</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="//img/user/user3.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Contact Number</span>
                                                <h4>01612854530</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="//img/user/user4.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Want To Live Chat</span>
                                                <h4>Chat Now!</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="media">
                                            <img src="//img/user/user5.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>User Type</span>
                                                <h4>Verified</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>
            </div>
        </section>