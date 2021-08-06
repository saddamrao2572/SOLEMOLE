<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesPurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sales Purchases');
$this->params['breadcrumbs'][] = $this->title;
?>
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

<?php
$todaysale=count(\app\models\SalesPurchase::find()->where(['created_at'=>date('Y-m-d') , 'type' => 'sell'])->all());
$todaypurchase=count(\app\models\SalesPurchase::find()->where(['created_at'=>date('Y-m-d') , 'type' => 'purchase'])->all());
$totalsp=count(\app\models\SalesPurchase::find()->where(['created_at'=>date('Y-m-d')])->all());
 ?>
<div class="tz-2 tz-2-admin">
    <div class="tz-2-com tz-2-main">
        <h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
        <ul id="dr-list" class="dropdown-content">
            
        
            <li class="divider"></li>
            
            <li><a href="<?=url::to(['sales-purchase/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
            
        </ul>
        <div class="tz-2-main-com">
            <div class="tz-2-main-1">
                <div class="tz-2-main-2"> <!-- <img src="/d1.png" alt="" /> --><span>Todays Sales</span>
                    <!-- <p>All the Lorem Ipsum generators on the</p> -->
                    <h2><?= $todaysale; ?></h2> </div>
            </div>
            <div class="tz-2-main-1">
                <div class="tz-2-main-2"> <!-- <img src="/d1.png" alt="" /> --><span>Todays Purchase</span>
                    <!-- <p>All the Lorem Ipsum generators on the</p> -->
                    <h2><?= $todaypurchase; ?></h2> </div>
            </div>
            <div class="tz-2-main-1">
                <div class="tz-2-main-2"><!--  <img src="/d1.png" alt="" /> --><span>Total today</span>
                    <!-- <p>All the Lorem Ipsum generators on the</p> -->
                    <h2><?= $totalsp; ?></h2> </div>
            </div>
        </div>
        <!-- Dropdown Structure -->
        <div class="split-row">
            <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                    <div class="tab-inn ad-tab-inn">
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="brand-index">
            <?php
                foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
                    echo '<div class="alert alert-' . $key . '">' . $message . '</div>';
                }
            ?>

                            <?php Pjax::begin(); ?>    
                            <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        //'id',
                                        //'type',
                                        [
                                            'attribute'=>'type',
                                            'label' =>'Sale/Puchase',
                                            'format' => 'raw',
                                            'value' => function ($data)
                                            {
                                                if ($data->type=='sell') {
                                                     $lable="<span class='label label-danger'>Sale</span>";
                                                return $lable;
                                                }
                                                if ($data->type=='purchase') {
                                                     $lable="<span class='label label-success'>Purchase</span>";
                                                return $lable;
                                                }
                                               
                                            }
                                        ],
                                        //'shop.name',
                                        //'brand_id',
                                        'product.name',
                                        //'user.username',
                                         'name',
                                         'contact',
                                        // 'nickname',
                                        // 'imei',
                                        
                                        // 'cnic',
                                        // 'img',
                                         'price',
                                         'paid',
                                         'discount',
                                         [
                                            'attribute'=>'price',
                                            'label' =>'Remaining',
                                            'format' => 'raw',
                                            'value' => function ($data)
                                            {
                                                $sale = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')) FROM sales_purchase where id=$data->id;   ");
                                                    $sales = $sale->queryScalar();
                                            $Remaining=$data->paid + $data->discount;
                                            $total=$sales-$Remaining;
                                            $lable="<span class='label label-warning'> $total</span>";
                                                return $lable;
                                                
                                               
                                            }
                                        ],

                                        // 'fault',
                                        // 'condition',
                                        // 
                                        // 'warranty',
                                        // 'status',
                                        // 'created_at',

                    [

                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Actions',
                        'options'=>['width: 11%'],
                        'template'=>'{edit}{view}   {delete}',
                        'buttons'=>[
                            'edit' => function ($url, $model) {
                                return Html::a('<i class="glyphicon glyphicon-pencil" style="padding-right:7px"></i>', $url, [
                                    'title' => Yii::t('app', 'Update'),
                                    'data-pjax'=>'0',
                                ]);
                            },
                            
                            
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            if ($action === 'edit') {
                                $url = Url::to(['/sales-purchase/update?id='. $model->id]); // your own url generation logic
                                return $url;
                            }
                            if ($action === 'delete') {
                                $url = Url::to(['/sales-purchase/delete?id='. $model->id]); // your own url generation logic
                                return $url;
                            }
                             if ($action === 'view') {
                                $url = Url::to(['/sales-purchase/details?id='. $model->id]); // your own url generation logic
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

