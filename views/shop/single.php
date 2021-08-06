<?php   
use yii\widgets\ActiveForm;

use yii\helpers\Url;
use app\models\Comments;
use app\models\CommentsSearch;
use yii\widgets\Pjax;
$this->title=$model->title;
?>
<style class="cp-pen-styles">
html, body {
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
                                <h2>Post Detail</h2>
                            </div>
                            <div class="gradient-padding reduce-padding">
                                <div class="single-product-img-layout1 item-mb">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="tab-content">
					<?php 
          $shop = app\models\Shop::find()->where(['id'=>$model->shop_id])->one();
		  



                    ?>					
											
											
											
                                                <span class="price"><?php if(isset($shop)){echo $shop->name;}?></span>
                                                <div role="tabpanel" class="tab-pane fade active show" id="related1">
                                                    <a href="#" class="zoom ex1">
													
													<img style="    height: 400px;" alt="single" src="/uploads/shop-post/<?=$model->thumnail?>" class="img-fluid">
													
													</a>
                                                </div>
												
												<?php 					
						if(isset($modelimg))
						{
							$count=0;
							foreach($modelimg as $img)
							{ 
							$count++;

							?>
                                                <div  role="tabpanel" class="tab-pane fade" 
												id="related<?=$count?>">
                                                    <a href="#" class="zoom ex1"><img style="    width: 100%;
    height: 400px;" alt="single" src="/uploads/shop-post/<?=$img->img?>" class="img-fluid"></a>
                                                </div>
                                <?php 

						} } 
                                 ?>						
                                             
                                           
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
    height: 100px;" alt="related<?=$count?>" src="/uploads/shop-post/<?=$img->img?>" class="img-fluid"></a>
				</li>
							  <?php }else{  ?>
								  
								<li class="nav-item">
					<a class="" href="#related<?=$count?>" data-toggle="tab" aria-expanded="false">
					
					<img style="    width: 100%;
    height: 100px;" alt="related<?=$count?>" src="/uploads/shop-post/<?=$img->img?>" class="img-fluid"></a>
				</li>  
								  
								  
								  
						<?php 	  } ?>
												
												
						<?php }} ?>
                                               
                                               
                                                
            
                     
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                    <h3><?=$model->title?></h3>
                                    <p><?=$model->description?>.
                                    </p>
                                </div>
                               
                               
                                <ul class="item-actions border-top">
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Save Ad</a></li>
                                    <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
                                    <li><a href="<?=url::to(['shop/single?id='.$model->id])?>"><i class="fa fa-comments-o" aria-hidden="true"></i>Comments</a></li>
                                    <li class="item-danger"><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                                </ul>
                            </div>
						</div>
						
						
						<?php
						
						$user_id=\Yii::$app->util->loggedinUserId();
						$user = app\models\User::find()->where(['id'=>$user_id])->one();
						
						?>
						
						  
							

		<div class="comment-wrap">
				<div class="photo">
				<img class="avatar" src="/uploads/user/<?=$user->id?>/profile_image/<?=$user->userDetails->profile_image?>"/>
				</div>
				<div class="comment-block">
								<textarea name="comment" id="text" cols="30" rows="3" placeholder="Add comment..."></textarea>
								
								
								
						     	  <input id="comment" data-id="<?=$model->id?>" class = "btn btn-success" name="cmnt" type = "submit"/>

						           

				</div>

		</div>
		
		  <?php Pjax::begin(['id'=>'reviews']); ?>  
		
		
		
<?php 

if(isset($postcoment))
{
	foreach($postcoment as $cmnt1)
	{
		$users=app\models\User::find()->where(['id'=>$cmnt1->created_by])->one();

?>
		
		<div class="comment-wrap" >
				<div class="photo">
						<img class="avatar" src="/uploads/user/<?=$users->id?>/profile_image/<?=$users->userDetails->profile_image?>"/>
				</div>
				<div class="comment-block">
						<p class="comment-text"><?=$cmnt1->comment?></p>
						<div class="bottom-comment">
								<div class="comment-date"><?=$cmnt1->comment_time?></div>
								<ul class="comment-actions">
								<?php 	$id = \Yii::$app->util->loggedinUserId();

								   ?>

								   <?php 
								   if($cmnt1->created_by == $id){?>
								   
										<li class="delete" onclick="return confirm('Are You sure to delete this Item?')"  del-id="<?=$cmnt1->id?>" id="dele" >Delete</li>
										
										<?php } ?>
										
										
										
										<li class="reply">Reply</li>
								</ul>
						</div>
				</div>
				
		</div>
<?php 
}}
?>

	

		<?php Pjax::end(); ?>



</div>

</div>

						
						
						
					 </div>
					 
					 
					 
             
        </section>
		
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

if(!Yii::$app->user->isGuest)
{
	$login = 1;
}else{
	$login = 0;
}
$url = Url::to(['shop/commentajax']);
$urldel= Url::to(['product/commentdelete']);


$js = <<< JS
 $(document).on('ready',function(){
  $('#comment').on('click', function(e) {
   $('#student_info').html('');
  
  var dld = $(this).attr("data-id");
  var text = $("#text").val();

    var log =$login;
	if(log==0)
	{
		swal("Login","to comment please")
		exit;
	}
	if(text.length <=0)
	{
		
		swal("First Fill this field")
		exit;
	}
	
 
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
	
		$("#text").val('');
	$.pjax.reload({container:"#reviews"});	},
    error: function() {
     alert('Error occured');
    }
   })
  });
 
 
  
    $('.delete').on('click', function(e) {
  // $('#student_info').html('');
  
  var dld = $(this).attr("del-id");
  		    
   var data = 'dld='+dld;

   $.ajax({
    method: "POST",
    url: "$urldel",
    data: data,
    success: function(html) {
		
		
	$.pjax.reload({container:"#reviews"});
     //location.reload();	
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
