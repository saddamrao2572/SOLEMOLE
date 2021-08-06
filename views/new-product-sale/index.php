<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewProductSaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'New Product Sales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tz-2 tz-2-admin">
    <div class="tz-2-com tz-2-main">
        <h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
        <ul id="dr-list" class="dropdown-content">
            <li class="divider"></li>
            <li><a href="<?=url::to(['new-product-sale/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
        </ul>
        <!-- Dropdown Structure -->
        <div class="split-row">
            <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                    <div class="tab-inn ad-tab-inn">
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="new-product-sale-index">
                <?php
                    foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                        echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                    }
                ?>

                            <?php Pjax::begin(); ?>    <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        //'shop_id',
                                        [
                                            'attribute'=>'shop_id',
                                            'label' =>'Shop Name',
                                            'format' => 'raw',
                                            'value' => 'shop.name',
                                        ],
                                        [
                                            'attribute'=>'product_id',
                                            'label' =>'Products',
                                            'format' => 'raw',
                                            'value' => 'product.name',
                                        ],

                                         'quantity',

                                       // 'created_at',
                                        'buyername',
                                        //'contact',
                                        //'brand_id',
                                        'price',
                                        'paid',
                                        //'discount',
                                        [
                                            'attribute'=>'price',
                                            'label' =>'Remaining',
                                            'format' => 'raw',
                                            'value' => function ($data)
                                            {
                                                $sale = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')) FROM new_product_sale where id=$data->id;   ");
                                                    $sales = $sale->queryScalar();
                                            $Remaining=$data->paid + $data->discount;
                                            $total=$sales-$Remaining;
                                            $lable="<span class='label label-warning'> $total</span>";
                                                return $lable;
                                                
                                               
                                            }
                                        ],
                                        // 'product_id',
                                        // 'nickname',
                                         
                                        // 'sameimei',
                                         
                                         // 'created_by',
                                        // 'status',
                                        // 'img',
                                        // 'cnic',
                                        // 'warranty',

                                        [

                                            'class' => 'yii\grid\ActionColumn',
                                            'header'=>'Actions',
                                            'options'=>['width: 11%'],
                                            'template'=>'{view}   {delete}',
                                            'buttons'=>[
                                                // 'edit' => function ($url, $model) {
                                                //     return Html::a('<i class="glyphicon glyphicon-pencil" style="padding-right:7px"></i>', $url, [
                                                //         'title' => Yii::t('app', 'Update'),
                                                //         'data-pjax'=>'0',
                                                //                 ]);
                                                //             },
                                                            
                                                            
                                                         ],
                                            'urlCreator' => function ($action, $model, $key, $index) {
                                                // if ($action === 'edit') {
                                                //     $url = Url::to(['/sales-purchase/update?id='. $model->id]); // your own url generation logic
                                                //     return $url;
                                                // }
                                                if ($action === 'delete') {
                                                    $url = Url::to(['/new-product-sale/delete?id='. $model->id]); // your own url generation logic
                                                    return $url;
                                                }
                                                 if ($action === 'view') {
                                                    $url = Url::to(['/new-product-sale/invoice?id='. $model->id]); // your own url generation logic
                                                    return $url;
                                                }
                                              
                                            }
                                    
                                
                                        ],
                                    ],
                                ]); ?>
                            <?php Pjax::end(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .label{
        font-size: 14px;
    }
    th.action-column {
    width: 12%;
}
.alert-danger
{
    font-size: 15px;
}
</style>
