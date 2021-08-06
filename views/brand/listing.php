<?php
use yii\widgets\ListView;
use yii\helpers\Url;
$this->title="Brand Listing";
 ?>
<br><br>

        <?php 
        if(isset($_GET['bid'])){
            $bid=$_GET['bid'];
            $b_name= app\models\Brand::find()->select(['name'])->where(['id'=>$bid])->one();
        }
        ?>
        <!-- Search Area End Here -->
        <!-- Products Area Start Here -->
         <section class="s-space-bottom-full bg-accent-shadow-body" >
           
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    	 <div class="gradient-wrapper item-mb">
                    	 	<div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                    	
                                        <h2><?php if(isset($b_name)){ echo $b_name->name;}?></h2>
                                    </div>
                            
                                </div>
                            </div>
                  
                       <div id="category-view" class="category-grid-layout3 gradient-padding zoom-gallery">
                                
                                	<?php $dataProvider->pagination->pageSize= 16; ?>
                        <?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_blist',
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


  	 <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Brands</h3>
                                </div> 
                                <ul class="sidebar-category-list">
                            <?php  
                                $sql='SELECT brand.*, COUNT(brand.id) AS post_count
                                FROM brand LEFT JOIN product 
                                ON brand.id = product.brand_id
                                GROUP BY brand.id
                                ORDER BY post_count desc 
                            	limit 15';
                                $brands=\app\models\Brand::findBySql($sql)->all();
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
                                <div class="gradient-title">
                                    <h3 style="color: #149f44;">Search By Price</h3>
                                </div>
                            <ul class="sidebar-category-list">
                                <center>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'0'])?>">0____10000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'10,000'])?>">10000____20000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'20,000'])?>">20000____30000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'30,000'])?>">30000____40000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'40,000'])?>">40000____50000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'50,000'])?>">50000____60000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'60,000'])?>">60000____70000</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','price'=>'Greater'])?>">Greater Than 70000</a> 
                                    </li>
                                </center>
                            </ul>
                                 
                                <div class="gradient-title">
                                    <h3 style="color: #149f44;">Search By RAM</h3>
                                </div> 
                            <ul class="sidebar-category-list">
                                <center>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'256MB'])?>">256 MB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'512MB'])?>">512 MB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'1GB'])?>">1 GB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'2GB'])?>">2 GB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'3GB'])?>">3 GB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'4GB'])?>">4 GB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'6GB'])?>">6 GB</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','ram'=>'8GB'])?>">8 GB</a>
                                    </li>
                                </center>
                            </ul>
                                <div class="gradient-title">
                                    <h3 style="color: #149f44;">Search By Screen Size</h3>
                                </div>
                            <ul class="sidebar-category-list">
                                <center>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'3'])?>">3 Inches</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'4'])?>">4 Inches</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'5'])?>">5 Inches</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'6'])?>">6 Inches</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'7'])?>">7 Inches</a>
                                    </li>
                                    <li>
                                        <a href="<?=url::to(['/brand/listing','size'=>'8'])?>">8 Inches</a>
                                    </li>
                                </center>
                            </ul> 
                            </div>
                        </div>
                      
                    </div>


             
                </div>
            </div>
        </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../jquery-3.3.1.js"></script>

<!-- <script>
  $("#price_search").on("change", function() {
    //alert('1');
    var price = $(this).find(':selected').attr("value");
    
    if(price != '') { //alert(id);
      $.post("/brand/listing?price="+price);

     // $('#divselectd').show();

    } 
  });
</script> -->
      