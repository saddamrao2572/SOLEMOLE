<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use keygenqt\autocompleteAjax\AutocompleteAjax;

    
use  yii\bootstrap\Modal;


$this->title="Add Product Into Blackklist";
?>
<!-- Font Awesome -->

<!-- Bootstrap core CSS -->

<!-- Material Design Bootstrap -->


<section class="s-space-bottom-full bg-accent-shadow-body" style="margin-top: 140px">
            <div class="container">
                <div class="breadcrumbs-area">
                   
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h2>Add Product Into Blackklist</h2>
                            </div>
                            <div class="input-layout1 gradient-padding post-ad-page">
                                <div class="section-title-left-dark border-bottom d-flex">
                                            <h3><img src="/img/post-add1.png" alt="post-add" class="img-fluid"> Search Mobiles in TextBox Below & Click on the name </h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 col-12">
                                        <label class="control-label">Choose Mobile<span> *</span></label>
                                            </div>
                                            <div class="col-sm-9 col-12">
                                                <div class="form-group">
                                                   <?php $form = ActiveForm::begin(); ?>
                                        
                                        <?= $form->field($model, 'id')->widget(AutocompleteAjax::classname(), [
                                            'multiple' => false,
                                            'url' => ['/product/search'],
                                            'options' => ['placeholder' => 'search product...']
                                        ])->label(false) ?>
                                            
                                        
                                            
                                        <?php ActiveForm::end(); ?>
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                    
                                    
                                    
                               
                            </div>
                             <div id="pd"></div>
                        </div>
                       
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <img src="/img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>How To Sell Quickly?</h3>
                                </div>
                                <ul class="sidebar-sell-quickly">
                                    <li><a href="faq.html">Use a brief title and description of the item.</a></li>
                                    <li><a href="faq.html">Make sure you post in the correct category</a></li>
                                    <li><a href="faq.html">Add nice photos to your ad</a></li>
                                    <li><a href="faq.html">Put a reasonable price</a></li>
                                    <li><a href="faq.html">Check the item before publish</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
<!-- Modal: modalQuickView -->
<?php 
 Modal::begin([
            
            'id'     => 'model',
            'size'   => 'model-lg',
    ]);
    
    echo "<div id='modelContent'></div>";
    Modal::end();
            
?>
 
<!-- Modal: modalQuickView -->

<!-- JQuery -->

<!-- Bootstrap tooltips -->

<!-- Bootstrap core JavaScript -->

<!-- MDB core JavaScript -->


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script>
$(document).ready(function(){
    $(".ui-corner-all").click(function(event){
       var pname = $("#w1").val();
   
        $.get("/site/enterdata?pn="+pname,function(data){
            $("#pd").empty();
            $("#pd").append(data);
        });

        

    });
});

</script>

