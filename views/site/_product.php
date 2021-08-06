    
<?php
use yii\helpers\Url;
 $model_spec= \app\models\ProductSpecification::find()->where(['product_id'=>$model->id])->one(); 
 
// $city= \app\models\City::find()->where(['id'=>$model->city_id])->one();
if(isset($city)){ 
$state= \app\models\State::find()->where(['id'=>$city->state_id])->one(); }
 $category= \app\models\Category::find()->where(['id'=>$model->category_id])->one(); 
 $brand= \app\models\Brand::find()->where(['id'=>$model->brand_id])->one(); 
?>	
<div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                                <div class="row">
	
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
    <div class="product-box item-mb zoom-gallery">
        <div class="item-mask-wrapper" style="max-width:160px; min-width=150px;">
            <?php if (!empty($model->thumbnail)) { ?>
                 <div class="item-mask secondary-bg-box"><img  src="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" alt="categories" class="img-fluid" >
            <?php } else{?>
                <div class="item-mask secondary-bg-box"><img style="width: 100%;height: 100px; max-width: 99%;" src="/img/service/service1.png" alt="categories" class="img-fluid img-responsive" >
           <?php } ?>
		   <?php if ($model->featured==1){?>
                <div class="trending-sign active" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
		   <?php } ?>
                <div class="title-ctg"><?php if (!empty($brands)) {
                    echo $brands->name;
                } ?></div>
                <ul class="info-link">
                                                        <li><a href="/uploads/product/<?php echo $model->id."/".$model->thumbnail; ?>" class="elv-zoom" data-fancybox-group="gallery" title="<?php echo $model->name;?>"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                                    </ul>
                <div class="symbol-featured"><img src="/img/banner/symbol-featured.png" alt="symbol" class="img-fluid"> </div>
            </div>
        </div>
        <div class="item-content" >
            <div class="title-ctg">Clothing</div>
            <?php
            if (strlen($model->name) <=15 ) {  ?>
               <h3 class="short-title"><a href="#"><?=$model->name?></a></h3>
            <?php } else { ?>
              <h3 class="short-title"><a href="#" style="color: black; font-size:15px;"><?=$model->name?></a></h3>
            <?php }?>
           
            <h3 class="long-title"><a href="<?= Url::to(['/product/'.$model->slug]) ?>"><?=$model->name?></a></h3>
            <ul class="upload-info">
                <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i><?= substr($model->created_at, 0,10)?></li>
                <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>
				<?php if(isset($city)){ echo $city->name;}?>,<?php if(isset($state)){ echo $state->name;}?></li>
                <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i><?php if(isset($brand)){ echo $brand->name;}?></li>
            </ul>
            <p><?php if(isset($model_spec)){
				  if (strlen($model_spec->description) >150 ) {echo substr($model_spec->description, 0,149)."....";}
				else {echo $model_spec->description;}
				}?></p>


            <style type="text/css">
                .price
                {
                    font-size: 16px !important;
                }
            </style>


            <div class="price">PKR: <?=$model->price?></div>
			
            <a href="<?= Url::to(['/product/'.$model->slug]) ?>" class="product-details-btn" style="    top: 100%;">Specifications</a>
        </div>
    </div>
</div>
									      </div>
									
                            </div>
                       <hr>