<?php 

use yii\helpers\Url;
?>   
   
   <div class="row">
   <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper" style="    width: 200px;">
                                                <div class="item-mask secondary-bg-box">
												
												
												
												<img src="/uploads/shop-post/<?=$model->thumnail?>" alt="categories" class="img-fluid">
												
												
                                                  
                                                    <div class="title-ctg">Clothing</div>
                                                    <ul class="info-link">
                                                        <li><a href="/uploads/shop-post/<?=$model->thumnail?>" class="elv-zoom" data-fancybox-group="gallery" title="<?=$model->title?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=url::to(['shop/post-detail/?id='.$model->id])?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                  
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                
                                                <h3 class="short-title"><a href="<?=url::to(['shop/post-detail/?id='.$model->id])?>">
												<?=$model->title?>
												</a></h3>
                                                <h3 class="long-title"><a href="<?=url::to(['shop/post-detail/?id='.$model->id])?>">
												<?=$model->title?>
												</a></h3>
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$model->created_at?></li>
                                               
                                                </ul>
                                                <p>
												
												<?=$model->description?>.
												
												</p>
                                             
                                                <a href="<?=url::to(['shop/post-detail/?id='.$model->id])?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
									<hr>