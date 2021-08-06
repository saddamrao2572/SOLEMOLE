 <?php
 use yii\helpers\Url;
 use yii\helpers\Html;
  use yii\data\ActiveDataProvider;
  use yii\widgets\ListView;
  use yii\helpers\JSON;
use kartik\rating\StarRating;
use bigpaulie\social\share\Share;
$this->title="SoleMole | ".$model->slug;
 ?>
 

<!-- Product Area Start Here -->
        
<?php
$current_day= date('l');
$day= date('d');
$month= date('m');
$year= date('Y');
$hour=date('H');
$minute=date('i');

//FacilitIES
$facilities =\app\models\Facility::find()->where(['branch_id'=>$model->id])->all(); 
//User / Creator
$creator =\app\models\User::find()->where(['id'=>$model->created_by])->one(); 
//shop likes
$likes =\app\models\ShopLikes::find()->where(['shop_id'=>$model->id])->all(); 
//shop views
$views =\app\models\ShopViews::find()->where(['shop_id'=>$model->id])->all(); 
//shop Reviews
$reviews =\app\models\ShopReviews::find()->where(['shop_id'=>$model->id])->all(); 
//OPERATIONS INFORMATION
$sql = "SELECT *
FROM shop_business_day WHERE shop_business_day.business_day_id = (select id from business_day where name='$current_day') and  shop_business_day.shop_id='$model->id' ";
$operational_info = \app\models\ShopBusinessDay::findBySql($sql)->one();
//RANKING
$command= Yii::$app->db->createCommand("SELECT AVG(overall_score)FROM shop_reviews where shop_id='$model->id'");
$overall_rank = $command->queryScalar();



$userID = \Yii::$app->util->loggedinUserId();
$shopid=$model->id;
// print_r($shopid . " ". $userID);
// exit();



 ?>

        <section class="s-space-bottom-full bg-accent-shadow-body">
           
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
					                   <div class="gradient-wrapper item-mb">
                           
    <a class="twPc-bg twPc-block" style="     height: 218px; background-image: url(/uploads/shop_cover/<?=$model->id?>/<?=$model->cover?>)" ></a>

	<div>
		<div class="twPc-button">
            <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
            <a href="<?php echo $model->twiter;?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true"><?php echo $model->twiter;?></a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <!-- Twitter Button -->   
		</div>

		<a title="Follow on Fb" href="<?php echo $model->fb;?>" class="twPc-avatarLink">
			<img alt="Logo" src="/uploads/shop_logo/<?=$model->id?>/<?=$model->logo?>" class="twPc-avatarImg">
		</a>

		<div class="twPc-divUser">
			<div class="title-ctg">
				<?=$model->name?>
			</div>
			<span>
				<p><span><?=$model->address?></span></p>
			</span>
			<ul class="" style="margin-left: 13px !important;">
		
							
							<li><i class="fa fa-id-card" aria-hidden="true"></i>Views:<?= count($views)?> &nbsp <i class="fa fa-thumbs-up" aria-hidden="true"></i>Likes:<?= count($likes)?> &nbsp <i class="fa fa-comments" aria-hidden="true"></i>Reviews:<?= count($reviews)?></li>
							
							
							
						</ul>
			<div class="customrating">

					
					<?php for ($i=0;$i < substr($overall_rank,0,3); $i++){ ?>
					<img src="/img/banner/more3.png" alt="rating" class="img-fluid">
					<?php } ?>
					
</div>
		</div><br><br>
            <div class="row">
                <div class="col-md-8">
                    <ul class="item-actions" style="margin-left: 5%;margin-top:0%;">
                       <!-- like work start -->
                       <!-- <style type="text/css">
                           .like-btn {cursor: pointer;}
                       </style> -->

                         <!-- like work start -->
						 
                         <li>          
                    <?php if(\Yii::$app->user->isGuest) {  ?>

                        <a href="<?= Url::to(['/site/login']) ?>"><div class="detail-banner-btn heart like-btn" data-toggle="tooltip" title="Login to Like this this product">
                            <i class="fa fa-heart-o" aria-hidden="true"></i>  Like  
                        </div></a><!-- /.detail-claim -->
                    <?php } else { ?>
                        <?php
                            $like = \app\models\ShopLikes::find()->byUserShop($userID, $model->id);
                            if(isset($like)){
                        ?>
                            <div class="detail-banner-btn heart like-btn marked" data-productid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userID) ?>" data-marked='1'>
                                
                                <i class="fa fa-heart" style="color: red;" data-toggle="tooltip" title="You've already liked ths product" aria-hidden="true"></i>  Unlike
                            </div>
                        <?php
                            } else {
                        ?>
                            <div class="detail-banner-btn like-btn" data-productid="<?= \Yii::$app->util->encrypt($model->id) ?>" data-userid="<?= \Yii::$app->util->encrypt($userID) ?>" data-toggle="tooltip" title="Click to Like this this product">
                               <i class="fa fa-heart-o" aria-hidden="true"></i>  Like 
                            </div>
                        <?php } ?>  
                    <?php } ?>
                        
                    </li>

                    <!-- like work end -->


                        
                    </ul>
                        <!-- <div class="twPc-divStats">
                            <a href="#"class="glyphicon glyphicon-share"> Like </a>
                            <a href="#"class="glyphicon glyphicon-eye-open"> Reviews </a>
                            <a href="#" class="glyphicon glyphicon-heart"> Share </a>
                        </div> -->
                </div>
            	<div class="col-md-12">
            	 <div align="right" class="share pull-right"  >     
                      <a  href="#submit_review" class="fa fa-bar-chart">  Reviews</a>
                      <a  href="#sharer" class="fa fa-bar-chart">  Share</a>
                      <a  href="#posts" class="fa fa-bar-chart">  Post</a>
            		    <a href="callto:<?php echo $model->mobile?>" class="fa fa-phone">  Contact</a>
            		    <a href="<?php echo $model->fb?>" class="fa fa-th">  Fb</a>
            		    <a href="mailto:<?php if(isset($creator)){ echo $creator->email;}?>" class="fa fa-eye">  Email</a>
            		    <a href="#" class="fa fa-share">  Chat</a>
                    </div>
                </div>
                
            </div>
	</div>

						   
							</div>
	
              
					                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Available Products</h2>
                                    </div>
                                    <div class="col-8">
                                      
                                    </div>
                                </div>
                            </div>
                            <div id="category-view" class="category-grid-layout1 gradient-padding zoom-gallery">
                               
                                 
                              <?php 
							  $sql="select * from product where id in (select product_id from shop_product where shop_id='$model->id' )";
								$dataProvider = new ActiveDataProvider
		 ([
			'query' => \app\models\Product::findBySql($sql),
			'sort' => [
		   'defaultOrder' => [
			'created_at' => SORT_DESC,
			 ],
			  ],
        ]);
			$dataProvider->pagination->pageSize= 6;
								?>	
                
                        <?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_product',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 4,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Products Found'
						]); 
					?> 
                                  
                              
                                    
                            
                            </div>
                        </div>
					
					
					
					
				   <div class="gradient-wrapper item-mb" id="posts">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Post By Shop</h2>
                                    </div>
                             
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                               
                                
									
									 <?= 
						ListView::widget([
							'dataProvider' => $dataProvider1,
							'itemView' => '_shoppost',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 6,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Post Found'
						]); 
					?>

                                  
								  
								  
								  
                               
                            </div>
                        </div>
						
						
						 <div class="gradient-wrapper item-mb">		
                          <div class="gradient-title">
                                 <h2>Reviews</h2>
                                </div> 
								
													<?php 
								$dataProvider = new ActiveDataProvider
		 ([
			'query' => \app\models\ShopReviews::find()->where(['shop_id'=>$model->id]),
			'sort' => [
		   'defaultOrder' => [
			'created_at' => SORT_DESC,
			 ],
			  ],
        ]);
			$dataProvider->pagination->pageSize= 4;
								?>	
									  <?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_reviewsItem',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 6,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Reviews Found'
						]); 
					?> 
									
									
								
					
								
								</div>
						 <div class="gradient-wrapper " id="submit_review">
                   
                          <div class="gradient-title">
                                 <h2>Submit a Review</h2>
                                </div> 
                        <?php if($review->isNewRecord) { ?>
                        <?=  $this->render('_review',[ 'review'=>$review]) ?>
                        <?php } else if($review->status == 0) { ?>
                        <p class='alert alert-info alert-fill'>You have posted a review which is currently been moderated by on of the moderators. It will be published as soon as it is marked by the moderator.
                    <?php  }  else if($review->status == 1) { ?>
                        <?=  $this->render('_reviewApproved',[ 'review'=>$review]) ?>
                    <?php  } ?>
                    
                   
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
                                                <span>Shop Type</span>
                                                <h4><?php if ($model->premieum==1){ echo "Premium";} else {echo "Not Premium Member";}?> </h4>
                                            </div>
                                        </div>
                                    </li>
									<?php 
									if (!Yii::$app->session->getIsActive()) { Yii::$app->session->open();}
									if(isset(Yii::$app->session['loc_latitude']) && isset(Yii::$app->session['loc_longitude']))
				{
					$my_lat=	Yii::$app->session['loc_latitude'];
					$my_lng=	Yii::$app->session['loc_longitude'];
					$shop_id=$model->id;
					$dist=40;
						$query="SELECT *, ( 3956 * 2 * ASIN(SQRT(POWER(SIN(($my_lat -abs(dest.lat)) * pi()/180 / 2),2) + COS($my_lat * pi()/180 ) * COS(abs(dest.lat) *  pi()/180) * POWER(SIN(($my_lng - abs(dest.lng)) *  pi()/180 / 2), 2))
) *1.6 )as distance
FROM shop as dest
having distance < $dist  and status=1 and id='$shop_id'
ORDER BY distance 
";
					
						
						$shops = \app\models\Shop::findBySql($query)->one();
						if(isset($shops)){
						?>
									<li>
                                        <div class="media">
                                            <img src="/img/marker.jpg" alt="user" style="max-width: 40px;" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Distance</span>
                                                <h4><?php echo substr($shops->distance, 0,4).' KM';?> </h4>
                                            </div>
                                        </div>
                                    </li>
				<?php } } ?>
                                </ul>
                            </div>
                        </div>
							  <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Shop Location</h3>
                                </div>
                             <iframe  frameborder="0" style="    height: 300px;
    border: 0;
    width: 254px;" src="https://www.google.com/maps/embed/v1/place?q=<?=$model->lat?>,<?=$model->lng?>&amp;key=AIzaSyACXWJt6uQU4a1eMviVMw2q9YJW4bd5f3c"></iframe>
                            </div>
                        </div>
						  <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Shop Timings</h3>
                                </div>
                                <ul class="sidebar-safety-tips">
                                    <li>Today Shop:
									<?php if(isset($operational_info)){ ?>
										<span style="color:green;">Open</span> 
										<?php }else { ?>
											<span style="color:red;">Close</span> 
										<?php }   ?>
										</li>
									
									</li>
                                    <li>Open Time:<?php if(isset($operational_info)){ ?>
										<span style="color:green;"><?=$operational_info->start_hour?></span> 
										<?php }else { ?>
											<span style="color:red;" >Close today</span> 
										<?php }   ?>
										</li>
                                    <li>Close Time:<?php if(isset($operational_info)){ ?>
										<span style="color:green;"><?=$operational_info->end_hour?></span> 
										<?php }else { ?>
											<span style="color:red;" >Close today</span> 
										<?php }   ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Available Facilities</h3>
                                </div>
                                <ul class="sidebar-item-details">
								<?php if (isset($facilities)){
									foreach($facilities as $facility){
									?>
                                    <li><?=$facility->name?>:<span>Available<i class="fa fa-check" style="color:green" aria-hidden="true"></i></span> </li>
								<?php } 
								} else {
									echo 'Currently Facilities Details are not Updated';
								}?>
                                    <li>
                                        <ul class="sidebar-social" id="sharer">
                                            <li>Share:</li>
                                            <li><?=
										Share::widget([
							'url' => Url::to(['shop/details?sid='.$model->id ] , TRUE),
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
                                    <h3>Available Brands</h3>
                                </div>
                                <ul class="sidebar-item-details">
								              <?php 
        $sql='
 SELECT brand.*, COUNT(brand.id) AS post_count
    FROM brand LEFT JOIN product 
    ON brand.id = product.brand_id
    GROUP BY brand.id
    ORDER BY post_count desc 
	limit 15';
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
		
		
		
		<?php

$likeUrl = Url::to(['/shop/like']);
$reviewUrl = Url::to(['/shop-reviews/create']);
$js = <<< JS


  ///////////////////like click
        
       
        $(".like-btn").click(function(){

//alert('ho gya men');
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

            ////////////review
        $('#review-submit').on('click',function(){
            var form = $('#reviews-form');
            var btn = $(this);
            $('i', btn).removeClass('fa fa-star');
            $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
            //var data = { 'userid': userid, 'gymid': gymid };
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