<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title="All Brands";
 ?>



     
        <!-- Search Area End Here -->
        <!-- Service Area Start Here -->
        <section class="service-layout1 bg-accent s-space-custom2" style="    margin-top: -7%;">
            <div class="container">
                <div class="section-title-dark">
                    <h1>All brands show</h1>
                    <p>Browse Our Top Categories</p>
                </div>
                <div class="row">

                  <?php $dataProvider->pagination->pageSize= 18; ?>
                        <?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_all',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => 'col-lg-12'],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 4,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No Brands Found'
						]); 
					?> 
                    
                </div>
            </div>
        </section>
       

