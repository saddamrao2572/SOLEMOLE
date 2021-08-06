<?php

use yii\helpers\Url;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\ArticalCategory;
?>

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
                                        <h2>All Articals</h2>
                                    </div>
                                    <div class="col-8">
                                        <div class="layout-switcher">
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                                <div class="row">
                                 
								 
								
 <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12"> 
								 
								 
								 
								     <?=
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_articals',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 6,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Articals Found'
						]); 
					?>
								 
								 
								 
							</div>	 
								 
                                  
                                </div>
                            </div>
                        </div>
                        
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Do you Have Something To Sell?</h2>
                                        <h3>Post your ad on classipost.com</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                    <a href="#" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>All Categories</h3>
                                </div>
                                <ul class="sidebar-category-list">
                                    <li>
                                        <a href="category-grid-layout1.html"><img src="img/product/ctg1.png" alt="category" class="img-fluid">Electronics<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-grid-layout2.html"><img src="img/product/ctg2.png" alt="category" class="img-fluid">Fashin &amp; Life Style<span>(20)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-grid-layout3.html"><img src="img/product/ctg3.png" alt="category" class="img-fluid">Car &amp; Vehicles<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-list-layout1.html"><img src="img/product/ctg4.png" alt="category" class="img-fluid">Hobby, Sport &amp; Kids<span>(20)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-list-layout2.html"><img src="img/product/ctg5.png" alt="category" class="img-fluid">Pets &amp; Animals<span>(100)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-list-layout3.html"><img src="img/product/ctg6.png" alt="category" class="img-fluid">Overseas Jobs<span>(70)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-grid-layout1.html"><img src="img/product/ctg7.png" alt="category" class="img-fluid">Property<span>(90)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-grid-layout2.html"><img src="img/product/ctg8.png" alt="category" class="img-fluid">Education<span>(30)</span></a>
                                    </li>
                                    <li>
                                        <a href="category-list-layout3.html"><img src="img/product/ctg12.png" alt="category" class="img-fluid">Others<span>(150)</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Location</h3>
                                </div>
                                <ul class="sidebar-loacation-list">
                                    <li><a href="#">Atlanta</a></li>
                                    <li><a href="#">Wichita</a></li>
                                    <li><a href="#">Anchorage</a></li>
                                    <li><a href="#">Dallas</a></li>
                                    <li><a href="#">New York</a></li>
                                    <li><a href="#">Santa Ana/Anaheim</a></li>
                                    <li><a href="#">Miami</a></li>
                                    <li><a href="#">Others</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



                               
                              
                  