<?php 


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\JSON;
use kartik\rating\StarRating;
use bigpaulie\social\share\Share;




$this->title="SoleMole | ".$model->name;

?>
<STYLE>
b{color:red;}
</STYLE>

<section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    
                </div>
            </div>
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
     
                                                <span class="price">PKR:<?=$model->price?> </span>
										
                                                <div role="tabpanel" class="tab-pane fade active show" id="related1">
                                                    <a href="#" class="zoom ex1"><img alt="single"  style="    max-width: 100px;" src="/uploads/product/<?=$model->id?>/<?=$model->thumbnail?>" class="img-fluid"></a>
                                                </div>
												
												                            	<?php 					
						if(isset($modelimg))
						{
							$countr=0;
							foreach($modelimg as $img)
							{ 
							$countr++;
                              
							?>
												
												
												
                                                <div role="tabpanel" class="tab-pane fade" id="related<?=$countr?>">
                                                    <a href="#" class="zoom ex1"><img alt="single" src="/uploads/product_gallery/<?=$model->id?>/<?=$img->img?>" class="img-fluid"></a>
                                                </div>
												
						<?php } } ?>					
												
												
												
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">                                            
                                            <ul class="nav tab-nav tab-nav-inline cp-carousel nav-control-middle" data-loop="true" data-items="6" data-margin="15" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="4" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="6" data-r-Large-nav="true" data-r-Large-dots="false">
											
											
											
                                                	<?php 					
						if(isset($modelimg))
						{
							$count=0;
							foreach($modelimg as $img)
							{ 
							$count++;
                              if($count == 1)
							  {
							?>
							
				<li class="nav-item">
					<a class="active" href="#related<?=$count?>" data-toggle="tab" aria-expanded="false">
					
					<img style="    width: 100%;
    height: 100px;" alt="related<?=$count?>" src="/uploads/product_gallery/<?=$model->id?>/<?=$img->img?>" class="img-fluid"></a>
				</li>
					<?php }else{  ?>
								  
								<li class="nav-item">
					<a class="" href="#related<?=$count?>" data-toggle="tab" aria-expanded="false">
					
					<img style="    width: 100%;
    height: 100px;" alt="related<?=$count?>" src="/uploads/product_gallery/<?=$model->id?>/<?=$img->img?>" class="img-fluid"></a>
				</li>  
                           <?php 	  } ?>
												
												
						<?php }} ?>
                                                
                                                
                                                
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title-left-dark child-size-xl title-bar item-mb">
								<?php if(!isset($models)){?>
                                    <h3 style="color:red;">Specifications Not Updated</h3>
								<?php } ?>
								<h3>Phone Specifications</h3>
                                    <p class="text-medium-dark">
									<?php  if(isset($models)){ echo $models->description;}?>
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                                        <div class="section-title-left-primary child-size-xl">
                                          <?php if(isset($models)){?> 
										  <h3> Build:</h3>
										  <?php }?> 
                                        </div>
                                        <ul class="specification-layout2 mb-40">
										<?php if(isset($models)){?>
                                            <li><b> Sim: </b><?=$models->sim?></li>
                                            <li><b> Weight: </b><?=$models->weight?></li>
                                            <li><b> Warranty: </b><?=$models->warranty?></li>
                                            <li><b> Genertaion: </b><?=$models->generation?></li>
                                            <li><b> OS: </b><?=$models->os?></li>
                                            <li><b> Dimensions: </b><?=$models->dimensions?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Processor:</h3>
                                        </div>
                                            <li><b> CPU: </b><?=$models->cpu?></li>
                                            <li><b> Chipset: </b><?=$models->chipset?></li>
                                            <li><b> GPU: </b><?=$models->gpu?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Frequency:</h3>
                                        </div>
                                            <li><b> 2G: </b><?=$models['2g']?></li>
                                            <li><b> 3G: </b><?=$models['3g']?></li>
                                            <li><b> 4G: </b><?=$models['4g']?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Display:</h3>
                                        </div>
                                            <li><b> Technology: </b><?=$models->technology?></li>
                                            <li><b> Size: </b><?=$models->size?></li>
                                            <li><b> Resolution: </b><?=$models->resulation?></li>
                                            <li><b> Protection: </b><?=$models->protection?></li>
                                            <li><b> Extra-fetures </b><?=$models->extrafeatures?></li>
                                           
                                             <div class="section-title-left-primary child-size-xl">
                                            <h3>Battery:</h3>
                                        </div>
                                            <li><b> Capacity: </b><?=$models->cpacity?></li>
                                            <li><b> Talk-Time </b><?=$models->talk_time?></li>
                                            <li><b> Stand-by </b><?=$models->stand_by?></li>

                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Price:</h3>
                                        </div>
                                            <li><b> Price: </b><?=$models->price?></li>

                                            
                                            
                                            
<?php }?>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-12 col-12 mb--sm">
                                        <div class="section-title-left-primary child-size-xl">
										
                                        <?php if(isset($models)){?>    
										<h3>Memory:</h3>
										<?php } ?>										
                                        </div>
                                        <ul class="specification-layout2">
										<?php if(isset($models)){?>
                                            <li><b> Built-in: </b><?=$models->builtin?></li>
                                            <li><b> Card: </b><?=$models->card?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Camera:</h3>
                                        </div>
                                            <li><b> Back: </b><?=$models->back_cam?></li>
                                            <li><b> Front: </b><?=$models->front_cam?></li>
                                            <li><b> Back_Features</b><?=$models->back_feature?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Connectivity:</h3>
                                        </div>
                                            <li><b> Wifi: </b><?=$models->wlan?></li>
                                            <li><b> Bluetooth: </b><?=$models->bluetooth?></li>
                                            <li><b> GPS: </b><?=$models->gps?></li>
                                            <li><b> USB: </b><?=$models->usb?></li>
                                            <li><b> NFC: </b><?=$models->nfc?></li>
                                            <li><b> Infrared: </b><?=$models->infrared?></li>
                                            <li><b> Data: </b><?=$models->data?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Features:</h3>
                                        </div>
                                            <li><b> Sensor: </b><?=$models->sensor?></li>
                                            <li><b> Audio: </b><?=$models->audio?></li>
                                            <li><b> Browser: </b><?=$models->browser?></li>
                                            <li><b> Messaging: </b><?=$models->messaging?></li>
                                            <li><b> Games: </b><?=$models->games?></li>
                                            <li><b> Torch: </b><?=$models->torch?></li>
                                             <li><b> Extra: </b><?=$models->extra?></li>
										<?php } ?>
                                         </ul>
                                    </div>
                                </div>
								
                                <ul class="item-actions border-top">
                                    <!-- like work start -->
                         <li>          
                    <?php if(\Yii::$app->user->isGuest) {?>
                        <div class="detail-banner-btn heart like-btn " id="like" data-toggle="tooltip" title="Login to Like this this product">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>  Like  
                        </div><!-- /.detail-claim -->
                    <?php } else {
						?>
                        <?php
						$userId=\Yii::$app->util->loggedinUserId() ;
                            $like = \app\models\ProductLikes::find()->byUserProduct($userId, $model->id);
                            if(isset($like)){
                        ?>
                            <div class="detail-banner-btn heart like-btn marked" data-productid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userId) ?>" data-marked='1'>
                                
                                <i class="fa fa-heart"  data-toggle="tooltip" title="You've already liked ths product" aria-hidden="true"></i>  Unlike
                            </div>
                        <?php
                            } else {
                        ?>
                            <div class="detail-banner-btn like-btn" data-productid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userId) ?>" data-toggle="tooltip" title="Click to Like this this product">
                               <i class="fa fa-heart-o" aria-hidden="true"></i>  Like 
                            </div>
                        <?php } ?>  
                    <?php } ?>
                        
                    </li>

                    <!-- like work end -->
                                    <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
                                    <li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 item-mb">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Also Available at</h3>
                                </div>
                                <ul class="sidebar-seller-information">
                                     <?php 
                $product_shops= \app\models\ShopProduct::find()->where(['product_id'=>$model->id])->all();
                                if(isset($product_shops) && $product_shops!=null ){
                                    foreach ($product_shops as $shop) {
    $shops= app\models\Shop::find()->select(['id','logo','name'])->where(['id'=>$shop->shop_id])->one();

                                  ?>
                                    <li>
                                        <div class="media">
                                            <img style="width: 30%; height: 40px" src="/uploads/shop_logo/<?php echo $shops->id."/".$shops->logo; ?>" alt="user" class="img-fluid pull-left img-circle">
                                            <div class="media-body">
                                                <span><?=$shops->name?></span>
                                                <h4><b> Price: </b> <?=$shop->price?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <?php   }
                                }
                                else{   
                                ?>
                                 <li>
                                        <div class="media">
                                            <img src="/img/user/user1.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>No Shops</span>
                                                <h4>For This Product</h4>
                                            </div>
                                        </div>
                                    </li>
                                <?php }  ?>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Item Details</h3>
                                </div>
                                <ul class="sidebar-item-details">
                                    <li>Condition:<span><?=$model->conditon?></span></li>
                                    <li>Brand:<span><?=$model->conditon?></span></li>
                                    <li>Color:<span><?php if(isset($models)){ echo $models->colors;} ?></span></li>
                                    <li>Warranty:<span><?php if(isset($models)){echo $models->warranty;}?></span></li>
                                    <li>
                                        <ul class="sidebar-social">
                                            <li>Share:</li>
											 <li><?=
										Share::widget([
							'url' => Url::to(['product/detail?pid='.$model->id ] , TRUE),
											'type' => 'small',
											'tag' => 'ul',
											'htmlOptions' => [
												'id' => 'new-id',
												'class' => 'share',
											],	
										]);
									?>
									</li>
                                         
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
                  <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2>More Products from brand </h2>
                    </div>
                    <div class="gradient-padding">
                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
						 <?php $related_shops=\app\models\Product::find()->where(['brand_id' =>$model->brand_id])->limit(20)->all(); 
                            if (!empty($related_shops)) {
                                foreach ($related_shops as $related_shop) {
                                    $brand=\app\models\Brand::find()->where(['id' => $related_shop->brand_id])->one();
                                    // print_r($venders);
                                    // exit();
                                   
                            ?>
							 <div class="product-box item-mb zoom-gallery">
                                <div class="item-mask-wrapper">
                                    <div class="item-mask secondary-bg-box"><img src="/uploads/product/<?= $related_shop->id ?>/<?= $related_shop->thumbnail; ?>" alt="categories" class="img-fluid" style="height: 150px;">
                                        <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                        <div class="title-ctg"><?php if (isset($brand)) {
                                            echo $brand->name;
                                        }  ?></div>
                                        <ul class="info-link">
                                            <li><a href="<?= Url::to(['/product/'.$model->slug]) ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?= $related_shop->name; ?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
										<?php if ($related_shop->featured==1){?>
                                        <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
										<?php } ?>
                                    </div>
									
                                </div>
                                <div class="item-content" style="text-align:center;">
                                    
                                    <h4 class="short-title"><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><?= $related_shop->name; ?></a></h4>
                                   
                                    
                                    <span  style="margin-top: -8%"><b>PKR: <?php echo $related_shop->price; ?></b> </span>
                                    <ul class="upload-info">
                                        <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?= substr($related_shop->created_at, 0,10)?></li>
                                        
                                        <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                    </ul>
                                    <a href="<?= Url::to(['/product/'.$model->slug]) ?>" class="product-details-btn">Details</a>
                                </div>
                            </div>
                           <?php
                                }
                            } 
                           ?>
						   
                     
                      
                    
                        </div>
                    </div>
                </div>

                <div class="gradient-wrapper">
                    <div class="col-sm-12" style="background-color: white; margin-top: 5%;">
                          <div class="gradient-title">
                                 <h2>Submit a Review</h2>
                                </div> 
                        <?php if($review->isNewRecord) { ?>
                        <?=  $this->render('_review',[ 'review'=>$review]) ?>
                        <?php } else if($review->status == 0) { ?>
                        <p class='alert alert-info alert-fill'>You have already posted a review which is currently been moderated by on of the moderators. It will be published as soon as it is marked by the moderator.
                    <?php  }  else if($review->status == 1) { ?>
                        <?=  $this->render('_reviewApproved',[ 'review'=>$review]) ?>
                    <?php  } ?>
                    
                    </div>
                </div>

            </div>
        </section>
        
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>

<?php
$reviewUrl = Url::to(['product-reviews/create']);
$likeUrl = Url::to(['/product/like']);
$js = <<< JS


 ///////////////////like click
        
       
        $(".like-btn").click(function(){


            var productid = $(this).data("productid");
            var userid = $(this).data("userid");
            var btn = $(this);
            $('i', btn).removeClass('fa fa-heart-o');
            $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
            var data = { 'userid': userid, 'productid': productid };
            console.log(data);

         
            $.ajax({
                method: "POST",
                url: "$likeUrl",
                data: data
            })
            .done(function( msg ) {
                 $('i', btn).removeClass('fa fa-refresh fa-spin fa-fw');
                 $('i', btn).addClass('fa fa-heart-o');
                 location.reload();
               var data = JSON.parse(msg);
               btn.toggleClass("marked");
               
                return false;
            });
        });


/////////////////////// review click


        $('#review-submit').on('click',function(){
            var form = $('#reviews-form');
            var btn = $(this);
            $('i', btn).removeClass('fa fa-star');
            $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
            //var data = { 'userid': userid, 'productid': productid };
            //console.log(data);
            $.ajax({
                method: "POST",
                url: "$reviewUrl",
                data: form.serialize()
            })
            .done(function( msg ) {
                $('i', btn).removeClass('fa fa-refresh fa-spin fa-fw');
                $('i', btn).addClass('fa star');
                
                var data = JSON.parse(msg);
                if(data.status == 'success') {
                    //alert('123');
                   location.reload();
                }
                return false;
            });
        });
        $('#reviews-form').on('submit',function(){
            
            return false;
        });




JS;
$this->registerJs($js);


?>
    


























