   <?php
 use yii\helpers\Url;
 use yii\helpers\Html;
  use yii\data\ActiveDataProvider;
  use yii\widgets\ListView;
  use yii\helpers\JSON;
use kartik\rating\StarRating;
use bigpaulie\social\share\Share;
$this->title="SoleMole | Posts";
 ?> 
   
   
   
   <div class="container"> 
   <div class="gradient-wrapper item-mb" id="posts">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Posts By Shop</h2>
                                    </div>
                             
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                               
                                
									
									 <?= 
						ListView::widget([
							'dataProvider' => $dataProvider1,
							'itemView' => '_shoppost',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 6,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Post Found'
						]); 
					?>

                                  
								  
								  
								  
                               
                            </div>
                        </div>
                        </div>