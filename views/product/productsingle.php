<?php 


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\JSON;
use kartik\rating\StarRating;
use yii\widgets\Pjax;




$this->title="SoleMole | ".$model->name;

?>
<STYLE>
b{color:red;}
</STYLE>
<style class="cp-pen-styles">html, body {
  background-color: #f0f2fa;
  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  color: #555f77;
  -webkit-font-smoothing: antialiased;
}

input, textarea {
  outline: none;
  border: none;
  display: block;
  margin: 0;
  padding: 0;
  -webkit-font-smoothing: antialiased;
  font-family: "PT Sans", "Helvetica Neue", "Helvetica", "Roboto", "Arial", sans-serif;
  font-size: 1rem;
  color: #555f77;
}
input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
  color: #ced2db;
}
input::-moz-placeholder, textarea::-moz-placeholder {
  color: #ced2db;
}
input:-moz-placeholder, textarea:-moz-placeholder {
  color: #ced2db;
}
input:-ms-input-placeholder, textarea:-ms-input-placeholder {
  color: #ced2db;
}

p {
  line-height: 1.3125rem;
}

.comments {
  margin: 2.5rem auto 0;
  max-width: 60.75rem;
  padding: 0 1.25rem;
}

.comment-wrap {
  margin-bottom: 1.25rem;
  display: table;
  width: 100%;
  min-height: 5.3125rem;
}

.photo {
  padding-top: 0.625rem;
  display: table-cell;
  width: 3.5rem;
}
.photo .avatar {
  height: 2.25rem;
  width: 2.25rem;
  border-radius: 50%;
  background-size: contain;
}

.comment-block {
  padding: 1rem;
  background-color: #fff;
  display: table-cell;
  vertical-align: top;
  border-radius: 0.1875rem;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.08);
}
.comment-block textarea {
  width: 100%;
  resize: none;
}

.comment-text {
  margin-bottom: 1.25rem;
}

.bottom-comment {
  color: #acb4c2;
  font-size: 0.875rem;
}

.comment-date {
  float: left;
}

.comment-actions {
  float: right;
}
.comment-actions li {
  display: inline;
  margin: -2px;
  cursor: pointer;
}
.comment-actions li.complain {
  padding-right: 0.75rem;
  border-right: 1px solid #e1e5eb;
}
.comment-actions li.reply {
  padding-left: 0.75rem;
  padding-right: 0.125rem;
}
.comment-actions li:hover {
  color: #0095ff;
}
</style>

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
                                    <h3>Product Details:</h3>
                                    <p class="text-medium-dark">Powerful dual-core and quad-core Intel processors, more advanced graphics, faster PCIe-based flash storage, superfast memory, and Thunderbolt 2, MacBook Pro with Retina display delivers all the performance you want from a notebook.
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Build:</h3>
                                        </div>
                                        <ul class="specification-layout2 mb-40">
                                            <li><b> sim: </b><?=$models->sim?></li>
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

                                            
                                            
                                            

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-12 col-12 mb--sm">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Memory:</h3>
                                        </div>
                                        <ul class="specification-layout2">
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
									
									<li><a href="<?=url::to(['product/single?pid='.$model->id])?>"><i class="fa fa-comments-o" aria-hidden="true"></i>Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
					
				
                    </div>
										<?php Pjax::begin(['id'=>'reviews']); ?>    

               <div class="comment-wrap" >
				<div class="photo">
						<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg')"></div>
				</div>
				<div class="comment-block">
								<textarea name="comment" id="text" cols="30" rows="3" placeholder="Add comment..."></textarea>
						     	  <input id="comment" data-id="<?=$model->id?>" class = "btn btn-success" id= "sub" name="cmnt" type = "submit"/>

						           

				</div>

		</div>
		
		<div id="loadit">
		
<?php 

if(isset($postcoment))
{
	foreach($postcoment as $cmnt1)
	{
		// print_r($cmnt1);
		// exit;

?>
		
		<div class="comment-wrap" id ="reload" >
				<div class="photo">
						<div class="avatar" style="background-image: url('https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg')"></div>
				</div>
				<div class="comment-block">
						<h4 class="comment-text" id = "com" ><?=$cmnt1->comment?></h4>
						<div class="bottom-comment">
								<div class="comment-date"><?=$cmnt1->comment_time?></div>
								<ul class="comment-actions">
								<?php 	$id = \Yii::$app->util->loggedinUserId();

								   ?>

								   <?php 
								   if($cmnt1->created_by == $id){?>
								   
										<li class="delete" del-id ="<?=$cmnt1->id?>" id = "dele">Delete</li>
										
										<?php } ?>
										
										
										
										<li class="reply">Reply</li>
								</ul>
						</div>
				</div>
		</div>
<?php 
}}
?>
	
</div>
		<?php Pjax::end(); ?>



            </div>
        </section>
        
		
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#sub").click(function(){
		
       
    });
});
</script>
		
		
<?php
$url = Url::to(['product/commentajax']);
$urldel= Url::to(['product/commentdelete']);

$js = <<< JS
 $(document).on('ready',function(){
  $('#comment').on('click', function(e) {
   $('#student_info').html('');
  
  var dld = $(this).attr("data-id");
  var text = $("#text").val();
 
 // if(text!==""){
 // $('.comment-block').append("<div class="comment-block">
						// <p class="comment-text" id = "com" >"+text+"</p>
						
				// </div>
 // ");
 // }
 // {
			// alert('Sorry! Cannot send Empty comments..');
		// }

   var data = 'dld='+dld+'&text='+text ;
   $.ajax({
    method: "POST",
    url: "$url",
    data: data,
    success: function(html) {
		//alert('success');
		
	$.pjax.reload({container:"#reviews"});	},
    error: function() {
     alert('Error occured');
    }
   })
  });
  
  
  
  
  
  
  
  
  
  
  
  
    $('.delete').on('click', function(e) {
   $('#student_info').html('');
  
  var dld = $(this).attr("del-id");
  		    
   var data = 'dld='+dld;

   $.ajax({
    method: "POST",
    url: "$urldel",
    data: data,
    success: function(html) {
		alert('Are you sure you want to Delete');
		
	$.pjax.reload({container:"#reviews"});	
	},
    error: function() {
     //alert('Error occured');
    }
   })
  });
 });
 
JS;
$this->registerJs($js);
?>
