<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleReturnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sale Returns');
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
.tz-2-main-1
{
    width: 50%;
}
</style>

<?php
$todaysale=count(\app\models\SaleReturn::find()->where(['created_at'=>date('Y-m-d')])->all());

$totalsp=count(\app\models\SaleReturn::find()->all());
 ?>
<div class="tz-2 tz-2-admin">
    <div class="tz-2-com tz-2-main">
        <h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
        <ul id="dr-list" class="dropdown-content">
            
        
            <li class="divider"></li>
            
            <li><a href="<?=url::to(['sales-return/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
            
        </ul>
        <div class="tz-2-main-com">
            <div class="tz-2-main-1">
                <div class="tz-2-main-2"> <!-- <img src="/d1.png" alt="" /> --><span>Todays Sale Return</span>
                    <!-- <p>All the Lorem Ipsum generators on the</p> -->
                    <h2><?= $todaysale; ?></h2> </div>
            </div>
            
            <div class="tz-2-main-1">
                <div class="tz-2-main-2"><!--  <img src="/d1.png" alt="" /> --><span>Total Sale Return</span>
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
                                <?php Pjax::begin(); ?>    <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'filterModel' => $searchModel,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],

                                            //'id',
                                            'shop.name',
                                            //'brand_id',
                                            'product.name',
                                            'quantity',
                                            'price',
                                            'paid',
                                            'deduct',
                                            [
                                                'attribute'=>'price',
                                                'label' =>'Remaining',
                                                'format' => 'raw',
                                                'value' => function ($data)
                                                {
                                                    $sale = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')) FROM sale_return where id=$data->id;   ");
                                                        $sales = $sale->queryScalar();
                                                $Remaining=$data->paid + $data->deduct;
                                                $total=$sales-$Remaining;
                                                $lable="<span class='label label-warning'> $total</span>";
                                                    return $lable;
                                                    
                                                   
                                                }
                                            ],
                                             //'reasone',
                                            // 'created_at',
                                            // 'created_by',
                                            // 'customer_name',
                                            // 'contact',
                                            // 'cinc',
                                            // 'img',

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
                                                        $url = Url::to(['/sale-return/update?id='. $model->id]); // your own url generation logic
                                                        return $url;
                                                    }
                                                    if ($action === 'delete') {
                                                        $url = Url::to(['/sale-return/delete?id='. $model->id]); // your own url generation logic
                                                        return $url;
                                                    }
                                                     if ($action === 'view') {
                                                        $url = Url::to(['/sale-return/invoice?id='. $model->id]); // your own url generation logic
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
