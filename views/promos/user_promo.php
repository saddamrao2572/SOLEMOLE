<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use app\models\Shop;
use yii\helpers\Url;
use yii\widgets\ListView;


/* @var $this yii\web\View */
/* @var $model app\models\Promos */
/* @var $form yii\widgets\ActiveForm */
?>



<section class="service-layout1 bg-accent s-space-custom2" style="    margin-top: -7%;">
            <div class="container">
                <div class="section-title-dark">
                    <h1>All Promos show</h1>
                    <p> Our leatest Promo Videos</p>
                </div>
                <div class="row">

         
	 <?= 
						ListView::widget([
							'dataProvider' => $dataProvider,
							'itemView' => '_user_promo',
							'layout' => "{items}\n<div class='clearfix'></div><div class='pager'>{pager}</div>",
							'pager' => [
								'options' => ['class' => ''],
								'nextPageLabel' => 'Next',
								'prevPageLabel' => 'Prev',
								'maxButtonCount' => 6,
								'nextPageCssClass' =>'',
								'prevPageCssClass' =>'',
							],
							'emptyText'=>'No videos Found'
						]); 
					?>
				


 
                    
                </div>
            </div>
        </section>