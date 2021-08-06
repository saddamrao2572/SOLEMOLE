<?php 
 use yii\helpers\Url;
$brand =\app\models\Brand::find()->where(['id'=>$model->brand_id])->one(); 
?>    
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12" style="min-width: 180px;max-height:275px;">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box"><img style="width: 100%;height: 100px; max-width: 99%; object-fit: scale-down;" src="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" alt="categories" class="img-fluid img-responsive" >
												<?php if ($model->featured==1){?>
                                                    <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
												<?php } ?> 
                                                    <div class="title-ctg">
													<?php if (isset($brand)){echo $brand->name;}else {echo 'Undefined';} 
													?>
													</div>
                                                    <ul class="info-link">
                                                        <li><a href="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?php echo $model->name;?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
													<?php if($model->featured==1){ ?>
                                                    <div class="symbol-featured"><img src="img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
													<?php } ?>
                                                </div>
                                            </div>
                                            <div class="item-content" style="text-align: center;">
                                                <div class="title-ctg">
												<?php if (isset($brand)){echo $brand->name;}else {echo 'Undefined';} 
													?>
												</div>
                                                <h3 class="short-title"><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><?=$model->name?></a></h3>
                                               
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?= substr($model->created_at, 0,10)?></li>
                                                    <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia</li>
                                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                                </ul>
                                                <p>Eimply dummy text of the printing and typesetting industrym has been the industry's standard dummy.</p>
                                                <div class="price" style="    font-size: 19px;">Rs: <?=$model->price?></div>
                                                <a href="#" class="product-details-btn" >Details</a>
                                            </div>
                                        </div>
                                      </div>