 <?php
 use yii\widgets\ListView;
use yii\helpers\Url;
$this->title="SoleMole | My Profile"
 ?>
 
 <style>
	
#cover_change_button{
	cursor: pointer;
}
.twPc-avatarImg{
    width: 100px !important;
    height: 100px !important;
}
</style>
<!-- Product Area Start Here -->
        
            <div class="container">
                <div class="breadcrumbs-area">
                    
                </div>
            </div>

 
 
 

        <section class="s-space-bottom-full bg-accent-shadow-body">
           
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
					                   <div class="gradient-wrapper item-mb">
                           
    <a class="twPc-bg twPc-block" id="output" style="height: 218px; background-image: url(/uploads/user/<?=$model->id?>/cover/<?=$modell->cover?>)" ></a>

	<div>
		<div class="twPc-button">
            <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
		
            <button id="cover_change_button"  class="btn btn-lg btn-secondary twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Change Cover</button> 
            <form action="/site/imagechange" method="post" enctype="multipart/form-data">
            <input id='fileid' name="fileid" type='file' onchange="loadFile(event)" hidden />
            <input id='coverid' name="coverid" type='file' onchange="loadFile2(event)" hidden />
              <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
       

           
            
            <!-- Twitter Button -->   
		</div>

		<a title="Click to change Image" href="#" class="twPc-avatarLink" id="dp_image">
            <?php
            if($modell->profile_image!=null){
                $dp = "/uploads/user/".$model->id."/profile_image/".$modell->profile_image;
                
            }else{
                 if($model->gender==0){
                $dp = "/uploads/user/dummy_male_image.png"; 
                
            }else{
                $dp = "/uploads/user/dummy_female_image.png";
                
            }
            } ?>
			<img alt="Logo" src="<?=$dp?>" class="twPc-avatarImg" id="output2">
		</a>

		<div class="twPc-divUser" style="margin-top: 20px;" >
			<div class="pull-right" style="margin-right: 5px;">
				
				
				<input type="submit" id="save-button" class="btn btn-lg btn-warning hidden" value="Save">
				 </form>
				 <button id="cancel-button" class="btn btn-lg btn-secondary hidden" >Cancel</button>
</div>
			<div class="twPc-divName text-warning">
				<a ><?=$modell->name?></a>
			</div>
			<span style="margin-top: 20px;">
				<p><span class="text-primary"><?=$modell->adress?></span></p>
			</span>
			

		</div>
		<br><br>
<div class="row">
<div class="col-md-2">
		<div class="twPc-divStats">	
	
		</div></div>
		<div class="col-md-10">
		 <div align="right" class="share" >  
		 <a  href="#" class="fa fa-share-alt-square"> Share </a>   
                          <a  href="#" class="fa fa-bar-chart">  Post</a>
						    <a href="#" class="fa fa-heart">  Contact</a>
						    <a href="#" class="fa fa-th">  Fb</a>
						    <a href="#" class="fa fa-eye">  Email</a>
                            <?php if($modell->user_id!=Yii::$app->util->loggedinUserId()){
                            ?>
						    <a href="/site/messages?id=<?=$modell->user_id?>&chat=byuser" class="fa fa-share">  Chat</a>
                        <?php } ?>
                        </div></div></div>
	</div>

						   
							</div>
					
					
					
					
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row no-gutters">
                                    <div class="col-sm-6 col-12 text-center-mb">
                                        <h2 class="mb10--mb">Your Posts</h2>
                                    </div>
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                                

                                    <?= 
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_userpost',
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
                                    <h3>Other Posts</h3>
                                </div>
                                <ul class="sidebar-seller-information">
                                    <?php 
    $related_posts = \app\models\UserProduct::find()->where(['!=','created_by',\Yii::$app->util->loggedinUserId()])->andWhere(['status'=>1])->all();
    if(isset($related_posts) && $related_posts!=null){
    	foreach ($related_posts as $post) {
    		
    		?>



                              
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user5.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Samsung S7</span>
                                                <h4>Location: 1.4km</h4>
                                                <h5><?=$post->price?></h5>

                                            </div>

                                        </div>
                                         <h5><b>Posted By: </b> Faadi Mobile</h5>
                                    </li>
                                    <?php 
    	}
    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
  <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Nearest Shops</h3>
                                </div>
                                <ul class="sidebar-seller-information">
                                    <?php if(isset($modelll) && $modelll!=null){
                                    	foreach ($modelll as $shop) {
                                    		
                                    	?>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user1.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span><?=$shop->name?></span>
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
					
						
						$distance_shop = \app\models\Shop::findBySql($query)->one();
						if(isset($distance_shop)){
						?>
                                                <h4>Location:<?php echo substr($shops->distance, 0,4).' KM';?></h4>
				<?php }}?>
                                              

                                            </div>

                                        </div>
                                         
                                    </li><?php } ?>
                                    <li>
                                        <div class="media">
                                            <img src="/img/user/user1.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>All Shops</span>
                                                <h4>Location: <small>Vehari</small></h4>
                                                

                                            </div>

                                        </div>
                                         
                                    </li>
                                    <?php 

                                    }  ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
				
                    <div class="col-sm-12" style="background-color: white; margin-top: 5%;">
                    <h2>Submit a review</h2>

                    
                    
                    </div>
            </div>
        </section>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		 <script type="text/javascript">
            	document.getElementById('cover_change_button').addEventListener('click', openDialog);
    document.getElementById('dp_image').addEventListener('click', openDialog2);
function openDialog() {
  document.getElementById('fileid').click();
}
function openDialog2() {
  document.getElementById('coverid').click();
}
var loadFile = function(event) {
    var output = document.getElementById('output');
    
    $('#output').css("background-image","url("+URL.createObjectURL(event.target.files[0])+")");
    $('#save-button').removeClass("hidden");
    $('#cancel-button').removeClass("hidden");

  };
  var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    
    $('#output2').attr("src",URL.createObjectURL(event.target.files[0]));
    $('#save-button').removeClass("hidden");
    $('#cancel-button').removeClass("hidden");

  };
  $('#cancel-button').on('click',function(){
  	 $('#cancel-button').addClass("hidden");
  	 $('#save-button').addClass("hidden");
  	var mid = <?=$model->id?>;
  	var mc = $('#cover_btn').val();
  $('#output').css("background-image","url(/uploads/user/"+mid+"/cover/"+mc+")");
  var dp = "<?=$dp?>";
  $('#output2').attr("src",dp);
  });
  


            </script>
            <button id="cover_btn" class="hidden" value="<?=$modell->cover?>"></button>
		
	