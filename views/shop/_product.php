<?php 
 use yii\helpers\Url;
$brand =\app\models\Brand::find()->where(['id'=>$model->brand_id])->one(); 
?>                                    
									
									<div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12" style="    min-width: 180px;">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box"><img src="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" alt="categories" class="img-fluid" style="    height: fit-content;     max-height: 180px;">
                                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                    <div class="title-ctg">
													<?php if (isset($brand)){echo $brand->name;}else {echo 'Undefined';} 
													?>
													</div>
                                                    <ul class="info-link">
                                                        <li><a href="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?php echo $model->name;?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
													<?php if($model->featured==1){?>
                                                    <div class="symbol-featured active"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid" style="    height: fit-content; "> </div>
													<?php } ?> 
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="title-ctg">
												<?php if (isset($brand)){echo $brand->name;}else {echo 'Undefined';} ?>
												</div>
                                                <h3 class="short-title"><a href="<?= Url::to(['/product/'.$model->slug]) ?>" style="font-size:15px"> 
												<?php echo $model->name;?>
												</a></h3>
                                                <h3 class="long-title">
												<a href="<?= Url::to(['/product/'.$model->slug]) ?>">	
												<?php echo $model->name;?> </a></h3>
                                                <ul class="upload-info"> 
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?= substr($model->created_at, 0,10)?></li>
													
                                                    <li class="place"><i class="fa fa-clock-o" aria-hidden="true"></i> Average Price :</li>
                                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                                </ul>
                                                <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                                <div class="price" style="font-size:16px; position:inherit;">Price:<?php echo $model->price; ?>Rs </div>
                                                <a href="<?= Url::to(['/product/'.$model->slug]) ?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>