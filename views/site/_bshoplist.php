<?php 
use yii\helpers\Url;
?>
<div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box"><img src="/uploads/shop_logo/<?= $model->id ?>/<?= $model->logo; ?>" alt="categories" class="img-fluid" style="height:100px;" >
                                                    <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                    <div class="title-ctg">Clothing</div>
                                                    <ul class="info-link">
                                                        <li><a href="/uploads/shop_logo/<?= $model->id ?>/<?= $model->logo; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?=$model->name?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="single-product-layout1.html"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
														<?php if ($model->premieum==1){?>
                                                    <div class="symbol-featured"><img  src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
														<?php } ?>
                                                </div>
                                            </div>
                                            

                                            <div class="item-content">
											
                                                <div class="title-ctg">Clothing</div>
                                                <h3 class="short-title"><a href="<?=url::to(['/shop/details','sid'=>$model->id])?>">Cotton T-Shirt</a></h3>
                                                <h3 class="long-title"><a href="<?=url::to(['/shop/details','sid'=>$model->id])?>"><?=$model->name?></a>
																								

												
												</h3>
												
												
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?=$model->created_at?></li>
                                                    <?php 
                            $c_name= app\models\City::find()->select(['name','state_id'])->where(['id'=>$model->city_id])->one();
                           
if(isset($c_name)){						  
$s_name= app\models\State::find()->select(['name'])->where(['id'=>$c_name->state_id])->one();}
                                                    ?>
                                                    <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>
													<?php if(isset($c_name)){echo $c_name->name;}?>,<?php if(isset($s_name)){echo $s_name->name;}?></li>
                                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Brands(200)</li>
                                                </ul>
                                                
                                                <div ><?=$model->about?></div>
                                  <div>		<?php $sl = app\models\ShopLikes::find()->where(['shop_id'=>$model->id])->count();
                                  $sv = app\models\ShopViews::find()->where(['shop_id'=>$model->id])->count();
                                  $sr = app\models\ShopReviews::find()->where(['shop_id'=>$model->id])->count(); 
                                  $products = app\models\ShopProduct::find()->where(['shop_id'=>$model->id])->count(); 
								  ?>							
												<ul class="upload-info">
                                                    <li ><?php if( $sl>0 ){ echo $sl;} ?> Likes</li>
                                                    <li><?php echo $model->views ?> Views</li>
                                                    <li > <?php 
													//if($sv!=0){ echo $sr;}else{echo "No";} 
													?>  ratings</li>
                                                </ul>
												</div>
                                                <h4 class = "product-details-btn text-success">Available mobile(<?php echo $products; ?>)
                                    </h4>
                                                <a href="<?=url::to(['/shop/details','sid'=>$model->id])?>" class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>