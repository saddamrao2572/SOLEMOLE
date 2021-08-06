<?php 
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\helpers\Url; 
$this->title="Product Listing"
?>

 <section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    <ul>
                        <li><a href="#">Home</a> -</li>
                      
							<?php if (isset($_POST['product'])){?>
										<li class="active"> Search Query :"<?php echo $_POST['product'];?>" </li>
										<?php } else {?>
										  <li class="active">All Products</li>
										<?php }?>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Products Listing 
									
										</h2>
                                    </div>
                               
                                </div>
                            </div>
                            
								
								<?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_product',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 4,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Product Found'
						]); 
					?> 
								
								
                            
                           
                          
                        </div>
                  
                       
                    </div>
               
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Explore by Brands</h3>
                                </div>
                                <ul class="sidebar-category-list">
                                         <?php 
                                $brands=app\models\Brand::find()->select(['id','name','thumbnail'])->limit(10)->all();
                                $count_b= app\models\Brand::find()->count(); 
                                if(isset($brands) && $brands!=null){
                                    foreach ($brands as $brand) {
                                       $count_p= app\models\Product::find()->where(['brand_id'=>$brand->id])->count(); 
                                ?>
                                <li>
                                    <a href="<?=url::to(['/brand/listing','bid'=>$brand->id])?>"><img width="40px" height="40px" src="/uploads/brand<?php echo "/".$brand->id."/".$brand->thumbnail; ?>" alt="" class="img-fluid img-responsive"><?=$brand->name?><span>(<?=$count_p?>)</span></a>
                                </li>
                               <?php     }
                               ?>
                               <li>
                                    <a href="<?=url::to(['/brand/all'])?>"><img width="40px" height="40px" src="" class="img-fluid img-responsive">Others<span>(<?=$count_b-10?>)</span></a>
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