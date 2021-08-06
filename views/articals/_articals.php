<?php
use yii\helpers\Url;
?>     
                                                
												  

                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                               
												
												
						<img style="    height: 100px;
    width: 100%;" src="/uploads/articals/<?=$model->thumbnail?>" alt="categories" class="img-fluid">
                                                   
                                                    
													
													
                                                   
                                             
                                            </div>
                                            <div class="item-content">
                                                <div class="title-ctg">Clothing</div>
                                                <h3 class="short-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html"><?=$model->title?></a></h3>
                                                <h3 class="long-title"><a href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html"><?=$model->title?></a></h3>
                                               
                                                <p> <?php
												  $str=$model->content;
												 if( strlen($str)>150){
												  echo substr(strip_tags($model->content), 0, 150);
												  ?>
												  ...</p>
												  <?php
												 }else{?> 
												 <p>
											<?php strip_tags($model->content); ?>
												 </p>
												 
												 <?php } ?>
												 
                                                
                                                <a href="<?= Url::to(['articals/'.$model->slug]) ?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    			




