
        <?php
use yii\widgets\ListView;
use yii\helpers\Url;
$this->title="Shop Listing";
 ?>
       
        <section class="service-layout1 bg-accent s-space-custom2">
            <div class="container">
                <div class="section-title-dark">
                    <h1>When click all name and city</h1>
                    <p>Browse Our Top Categories</p>
                </div>
                <div class="row">
                   <?php if(isset($model) && $model!=null){
                    foreach ($model as $shop) {
                        $s_c= app\models\Shop::find()->where(['city_id'=>$shop->id])->count();
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <h3 class="title-medium-dark mb-none">
                                <a href="https://www.radiustheme.com/demo/html/classipost/classipost/category-grid-layout2.htm"><?=$shop->name?></a> 
                                
                            </h3>
                            
                            <div class="view"><h3><a href="https://www.radiustheme.com/demo/html/classipost/classipost/category-grid-layout2.htm">Shops(<?php if($s_c==0){ echo "0"; }else{echo $s_c;}?>)</a></h3></div>
                        </div>
                    </div>
                        <?php 
                    }
                   }else{
                    ?> 
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <h3 class="title-medium-dark mb-none">
                                <a href="https://www.radiustheme.com/demo/html/classipost/classipost/category-grid-layout2.htm">No Cities Found</a> 
                                
                            </h3>
                            
                            <div class="view"><h3><a href="https://www.radiustheme.com/demo/html/classipost/classipost/category-grid-layout2.htm">Shops(0)</a></h3></div>
                        </div>
                    </div>

                    <?php 
                   } ?>
                    
					
					
					
					
                    
                </div>
            </div>
        </section>
       