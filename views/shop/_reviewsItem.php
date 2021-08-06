	<?php $reviewer =\app\models\User::find()->where(['id'=>$model->user_id])->one();
										?>	

										
										
	        <div class="row no-gutters" style="    background-image: linear-gradient(#16A20C, #0B9B84), linear-gradient(#16A258, #5B9798);">
                            <div class="col-lg-7 col-md-12 col-sm-12 col-12" style="    background: transparent;">
                                <div class="add-layout2-left d-flex align-items-center" style=" height: 150px;
    color: wheat;">
                                    <div>
                                    
      
       
        
      
            <ul class="upload-info">
                <li class="date">    <img  src="/img/user/user1.png" alt="categories" class="img-fluid img-responsive" >
           Date: <i class="fa fa-clock-o" aria-hidden="true"></i>   &nbsp <?= substr($model->created_at, 0,10)?></li>  
				<li class="date"> Reviewer: <i class="fa fa-user" aria-hidden="true"></i>   &nbsp <?php if(isset($reviewer)){echo $reviewer->username;}?></li>
              
            </ul>
			
				<p><b>Positive Remarks:</b>
												<?=$model->pros?><br>
												<b>Negative Remarks:</b>
												<?=$model->cons?>
												</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-12" style="    background: transparent; ">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm" style="    height: 151px;">
                                    <a href="#" class="cp-default-btn pull-right">  <i class="fa fa-star" aria-hidden="true"></i><?=$model->overall_score?></a>
                                </div>
                            </div>
                        </div>									
										
						<style>
.add-layout2-left:before {
    content: "";
    width: 0;
    height: 130px;
    border-bottom: 150px solid #343434;
    border-right: 123px solid transparent;
    position: absolute;
    right: -122px;
    top: 0;
    z-index: 3;
}						
						</style>				
										
										
										
										
     
                            