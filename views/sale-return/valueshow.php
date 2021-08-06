<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
use app\models\Shop;
use app\models\Brand;
use kartik\widgets\FileInput;
use  yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use keygenqt\autocompleteAjax\AutocompleteAjax;
use yii\widgets\ActiveForm;
?>

<?php 


$salepurchase=\app\models\SalesPurchase::find()->where(['shop_id'=>$shoproduct->shop_id , 'product_id'=> $shoproduct->product_id , 'type'=>'sell'])->all();
if (empty($salepurchase)) {
  $newprosale=\app\models\NewProductSale::find()->where(['shop_id'=>$shoproduct->shop_id , 'product_id'=> $shoproduct->product_id])->all();

}
  
if (!empty($shoproduct)) {
  

?>				
        <input type="hidden" name="productid" value="<?= $product->id ?>">

        <input type="hidden" name="brandid" value="<?= $product->brand_id ?>">
        <input type="hidden" name="invoice" value="<?= Yii::$app->util->getTrackid(); ?>">
        
                <div class="row">
                  <div class="input-field col s3">
                    <span>Nick Name </span>
                    <input type="text" class="validate"  id="nickname" name="nickname" 
                    value="<?= $shoproduct->nickname ?>" readonly="">
                  </div>
                 
                  
                  <div class="input-field col s12 m3">
                    <span>Company Price </span>
                    <input type="text" class="validate" placeholder="Company Price" id="price" name="price" readonly="" value="<?= $shoproduct->price; ?>">
                    
                  </div>
                </div>
                <div class="row">
                <div class="input-field col s12 m12">
                    <h4>History Of This Product</h4> 
                  <div class="split-row">
                    <div class="col-md-12" style="width: max-content;">
                      <div class="box-inn-sp ad-inn-page">
                        <div class="tab-inn ad-tab-inn">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th>Saled IMEIS</th>
                                  <th>Buyer Name</th>
                                  <th>Price</th>
                                  <th>Date</th>
                                </tr>
                              </thead>
                              <tbody>
                          <?php 
                               if (!empty($newprosale)) {
                                 
                               foreach ($newprosale as $nps) {
                               
                               $shopimei=\app\models\ShopProductSaledImei::find()->where([ 'nps_id'=>$nps->id])->all();
                                 foreach ($shopimei as $npsi) 
                                 {
                                ?>
                                <tr>
                                  <td>
                                    <input type="checkbox" class="validate" name="returnimei[]" value="<?= $npsi->saled_imei; ?>"> 
                                          <span> 
                                            <?= $npsi->saled_imei; ?> 
                                          </span><br> 
                                        
                                  </td>
                                  <td><?= $nps->buyername; ?></td>
                                  <td><?= $shoproduct->price; ?></td>
                                  <td><?= $nps->created_at; ?></td>
                                </tr>
                                <?php 
                                  }
                                }
                              }
                            ?>
                            <?php 
                               if (!empty($salepurchase)) {
                                 
                                foreach ($salepurchase as $slpr) {
                                ?>
                                <tr>
                                  <td>
                                    <input type="checkbox" class="validate" name="returnimei[]" value="<?= $slpr->imei; ?>"> 
                                          <span> 
                                            <?= $slpr->imei; ?> 
                                          </span><br> 
                                        
                                  </td>
                                  <td><?= $slpr->name; ?></td>
                                  <td><?= $slpr->price; ?></td>
                                  <td><?= $slpr->created_at; ?></td>
                                </tr>
                                
                                <?php 
                                  
                                }
                              }
                            ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
                  

             
                

                  

<?php 
} 
else 
  { 
    echo "<h3 style='color:red;'> Sorry No Record Found .</h3>" ;
  } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
  [type="checkbox"]:not(:checked), [type="checkbox"]:checked {
    position: inherit;
    left: 0%;
    opacity: 1;
}
</style>