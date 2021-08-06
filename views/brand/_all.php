<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

 ?>

<style type="text/css">
    .img-fluid
    {
        height: 115px !important;
        width: 46% !important;
		object-fit: scale-down;
    }
    .header-fixed
    {
        position: unset;
    }
</style>

<?php 
   
  

           $count_p= \app\models\Product::find()->where(['brand_id'=>$model->id])->count(); 
      
    ?>
<div class="col-lg-4 col-md-6 col-sm-6 col-12 item-mb">
    <div class="service-box1 bg-body text-center">
        <img src="/uploads/brand/<?= $model->id ?>/<?= $model->thumbnail; ?>" alt="service" class="img-fluid" >
        <h3 class="title-medium-dark mb-none">
            <a href="<?= url::to(['/brand/listing','bid'=>$model->id]) ?>"><?= $model->name ?></a>
        </h3>

        <!-- <div class="view">0</div> -->
        <p><b>Mobiles:</b>(<?= $count_p; ?>)</p>
    </div>
</div>