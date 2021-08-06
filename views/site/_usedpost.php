<?php 

use yii\helpers\Url;
 $images=\app\models\UserImg::find()->where([ 'product_id'=>$model->product_id])->all();
 $product=\app\models\Product::find()->where([ 'id'=>$model->product_id])->one();

 
?>   
   
   <div class="row">
   <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper" style="    width: 200px;">
                                                <div class="item-mask secondary-bg-box">
												
												
												
												<img src="/uploads/product/<?=$product->id?>/<?=$product->thumbnail?>" alt="categories" class="img-fluid">
												
												<?php if($product->featured==1){?>
                                                    <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
												<?php } ?>
                                                    <div class="title-ctg">Clothing</div>
                                                    <ul class="info-link">
                                                        <li><a href="" class="elv-zoom" data-fancybox-group="gallery" title="<?=$product->name?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                  
                                                </div>
                                            </div>
                                            <div class="item-content" style="width:300px;">
                                                
                                                <h3 class="short-title"><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>">
												<?=$product->name?>
												</a></h3>
                                                <h3 class="long-title"><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>">
												<?=$product->name?>
												</a></h3>
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$model->created_at?></li>
                                               
                                                </ul>
                                                <p>
												<b>Price:</b>
												<?=$model->price?>.
												
												
												<b>Color:</b>
												<?=$model->color?>.
												
											<br>
											<b>	Condition:</b>
												<?=$model->condition?> out of 10
												
												</p>
                                             
                                                <a href="<?=url::to(['site/post-detail/?id='.$model->id])?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
									<hr>