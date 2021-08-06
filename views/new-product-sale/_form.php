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

<style type="text/css">
   .row
   {
    padding: 1% !important;

   }
   [class~=tz2-form-com] form {
    background: #ffffff !important;
}
 </style>
<!--CENTER SECTION-->
      <div class="tz-2 tz-2-admin">
        <div class="tz-2-com tz-2-main">
           <h4><img src="/img/post-add1.png" alt="post-add" class="img-fluid">  Update Your Data</h4>
           <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
           <ul id="dr-list" class="dropdown-content">
            
        
              <li class="divider"></li>
              
              <li><a href="<?=url::to(['new-product-sale/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
              
          </ul>
         
          <div class="db-list-com tz-db-table" style="height: auto;">
            <div class="ds-boar-title">
              
              <h2>Edit Following Informations</h2>
             
            </div>

            <div class="tz2-form-pay tz2-form-com">
                <?php $form = ActiveForm::begin(['method'=> 'post' , 'action' => '/new-product-sale/update?id='.$model->id,  'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form' , 'class' => 'col s12' , ]]);?>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <h4>Product Informations</h4>
                <div class="row">
                    <div class="input-field col s3">
                        <span>Nick Name </span>
                    <input type="text" class="validate" placeholder="Nick Name" id="nickname" name="nickname" value="<?= $model->nickname; ?>">
                  </div>
                 
                  
                  <div class="input-field col s12 m3">
                    <span>Total Price </span>
                    <input type="text" class="validate" placeholder="Company Price" id="price" name="price" readonly="" value="<?= $model->price; ?>">
                    
                  </div>
                   
                  <div class="input-field col s12 m3">
                    <span>Discount </span>
                    <input type="text" class="validate" name="discount" id="discount" placeholder="Discount" value="<?= $model->discount ?>">
                  </div>
                  <div class="input-field col s12 m3">
                    <span>Paid Amount</span>
                    <input type="text" class="validate" placeholder="Paid Amount" id="warranty" name="paid" value="<?= $model->paid ?>" >
                    
                  </div>
                 
                </div>
               

                <h4>Buyer Information</h4>
                <div class="row">
                    <div class="input-field col s12 m3">
                        <span>Buyer Name</span>
                        <input type="text" class="validate" placeholder="Paid Amount" id="warranty" name="buyername" value="<?= $model->buyername ?>">
                    </div>
                    <div class="input-field col s12 m3">
                        <span>Contact</span>
                        <input type="text" class="validate" placeholder="Paid Amount" id="warranty" name="contact" value="<?= $model->contact ?>">
                    </div>
                    <div class="input-field col s12 m3">
                        <span>CNIC</span>
                        <input type="text" class="validate" placeholder="Paid Amount" id="warranty" name="cnic" value="<?= $model->cnic ?>">
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="submit" name="btn_update"  class="btn btn-default pull-right col s12 m3" value="Update"> 

                  </div>
                </div>


              <?php ActiveForm::end(); ?>
            </div>
      
          </div>
        </div>
      </div>
    

      <!--RIGHT SECTION-->
     <style>
  .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
  .tt-menu { width:300px; }
  ul.typeahead{margin:0px;padding:10px 0px;}
  ul.typeahead.dropdown-menu li a {padding: 10px !important;  border-bottom:#CCC 1px solid;color:#FFF;}
  ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
  .bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
  .demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #1f3f41;
    outline: 0;
  }
  </style>  