<?php 

use yii\helpers\Url;
  $product = \app\models\Product::find()->where(['id'=>$model->product_id])->one();
 $images=\app\models\UserImg::find()->where([ 'product_id'=>$model->product_id])->all();

?>   
   
   <div class="row">
   <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box">
												
												
												
												<img src="/uploads/product/<?=$product->id?>/<?=$product->thumbnail?>" alt="categories" class="img-fluid">
												
												
                                                    <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                    <div class="title-ctg">Clothing</div>
                                                    <ul class="info-link">
                                                        <li><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>" class="elv-zoom" data-fancybox-group="gallery" title="<?=$product->name?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="single-product-layout1.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                    <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                
                                                <h3 class="short-title"><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>">Cotton T-Shirt</a></h3>
                                                <h3 class="long-title"><a href="<?=url::to(['site/post-detail/?id='.$model->id])?>">
												<?=$product->name?>
												</a></h3>
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$model->created_at?></li>
                                               
                                                </ul>
                                                <p>
												
												<?=$model->price?>.
												
												</p>
                                             
                                                <a href="<?=url::to(['site/post-detail/?id='.$model->id])?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>