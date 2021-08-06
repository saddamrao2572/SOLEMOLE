<?php
use yii\widgets\ListView;
use yii\helpers\Url;
$this->title="Solemole|Shop Listing";
 ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- Search Area End Here -->
        <!-- Category Grid View Start Here -->
        <section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>All Shops</h2>
                                    </div>
                              
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout2 gradient-padding zoom-gallery">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                                    <?php $dataProvider->pagination->pageSize= 16; ?>
                        <?= 
                        ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_bshoplist',
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
                            </div>
                        </div>
                      
                    </div>
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Cities</h3>
                                </div>
                                <ul class="sidebar-category-list">
                                    <?php 
                                    $shops = \app\models\City::find()->all();
                                    if(isset($shops) && $shops!=null){
                                        foreach ($shops as $shop) {
                                            $s_c= app\models\Shop::find()->where(['city_id'=>$shop->id])->count();
                                            ?>
                                           
                                     <li>
                                        <a href="<?=url::to(['/site/shoplist','cid'=>$shop->id])?>"><i class="material-icons">location_city</i><b style="margin-left: 10px"><?=$shop->name?></b><span>(<?php if($s_c==0){ echo "0"; }else{echo $s_c;}?>)</span></a>
                                    </li>
                                            <?php 
                                        } 
                                         $c_count = \app\models\City::find()->count();
                                          ?>
                                         <li>
                                        <a href="#"><i class="material-icons">location_city</i><b style="margin-left: 10px"> All </b><span >(<?=$c_count-10?>)</span></a>
                                    </li>
                                        <?php 
                                    }
                                    ?>
                                    
                                    
                                   
                                </ul>
                            </div>
                        </div>
                         <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>New Mobiles</h3>
                                </div>
                                <ul class="sidebar-category-list">
                                    <?php 
                                    $new_brands = \app\models\Brand::find()->orderBy('created_at')->limit(6)->all();
                                    if(isset($new_brands) && $new_brands!=null){
                                        foreach ($new_brands as $newbrand) {
                                            $pcount = \app\models\Product::find()->where(['brand_id'=>$newbrand->id])->count();
                                            ?>
                                            <li>
    <a href="<?=url::to(['/brand/listing','bid'=>$newbrand->id])?>"><img style="width: 25px; height: 25px;" src="/uploads/brand/<?php echo $newbrand->id."/".$newbrand->thumbnail; ?>" alt="category" class="img-fluid img-responsive"><b style="margin-left: 10px"><?=$newbrand->name?></b><span>(<?=$pcount?>)</span></a>
                                    </li>
                                            <?php

                                        }
                                        $bcount = \app\models\Brand::find()->count();
                                        ?>
                                    <li>
                                        <a href="#"><img  src="/img/product/ctg1.png" alt="category" class="img-fluid"><b style="margin-left: 10px">All </b><span>(<?=$bcount-6?>)</span></a>
                                    </li>
                                         <?php 
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        