<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url; 
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

?>
<STYLE>
b{color:red;}
</STYLE>
  <div class="container">
      <div class="row">
          <div class="col-md-8">
           <input class="form-control" type="text" name="product_name_hega_wa" value="<?=$modell->name?>" readonly="">                              </div>
            <div class="col-md-4">
                <input class="form-control" type="text" name="product_name_hega_wa" value="<?=$modell->name?>" readonly="">  
            </div>
     </div>
<?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'active-form']]); ?>
        <div class="row">
           
            <div class="col-md-4">
                <?= $form->field($model, 'price')->input("number") ?>
                <label class="text-warning">Market Price</label>:<b style="color:black;"><?=$modell->price?>  (Rs)</b>
            </div>
        
        
            <div class="col-md-4">
                <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
            </div>
       
        
            <div class="col-md-4">
                <?= $form->field($model, 'condition')->input("number",['maxlength' => 2]) ?>
                <label class="text-warning">Out Of 10 Only</label>
                <p id="pp" style="display:none" class="text-danger">Accepting Only values 1-10</p>
            </div>
       </div>
                       
                         
                 <div class="row">
                    <div class="form-group" style="margin-left: 20px">
                    <?= $form->field($modelwork, 'img[]')->widget(FileInput::classname(), [
                                                'options' => ['accept' => 'image/*','multiple' => true],
                                                'pluginOptions' => [
                                                    'initialPreview'=>[
                                                        
                                                    ],
                                                    'overwriteInitial'=>false,
                                                    'maxFileSize'=>1024*25,
                                                    'fileActionSettings' => [
                                                        'uploadIcon' =>'',
                                                    ],
                                                    
                                                    'uploadUrl' =>'/site/createt',
                                                ],
                                                'pluginEvents' => [
                                                    "filebatchuploadcomplete" => "function(event, files, extra) { 
                                                        $.pjax.reload({container:'#gallery-pjax'});
                                                        $(event.currentTarget).fileinput('clear');;
                                                    }",
                                                    //"filereset" => "function() { log("filereset"); }",
                                                ],
                                            ])->label("Mobile Image ");
                                        ?>
                                    </div>

                                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel-group" id="accordion">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h5 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Click to see Full Specification of "<?=$modell->name?>"</a>
        </h5>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
            <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                    <h3>Product Details:</h3>
                                    <p class="text-medium-dark">Powerful dual-core and quad-core Intel processors, more advanced graphics, faster PCIe-based flash storage, superfast memory, and Thunderbolt 2, MacBook Pro with Retina display delivers all the performance you want from a notebook.
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Build:</h3>
                                        </div>
                                        <ul class="specification-layout2 mb-40">
                                            <li><b> sim: </b><?=$models->sim?></li>
                                            <li><b> Weight: </b><?=$models->weight?></li>
                                            <li><b> Warranty: </b><?=$models->warranty?></li>
                                            <li><b> Genertaion: </b><?=$models->generation?></li>
                                            <li><b> OS: </b><?=$models->os?></li>
                                            <li><b> Dimensions: </b><?=$models->dimensions?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Processor:</h3>
                                        </div>
                                            <li><b> CPU: </b><?=$models->cpu?></li>
                                            <li><b> Chipset: </b><?=$models->chipset?></li>
                                            <li><b> GPU: </b><?=$models->gpu?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Frequency:</h3>
                                        </div>
                                            <li><b> 2G: </b><?=$models['2g']?></li>
                                            <li><b> 3G: </b><?=$models['3g']?></li>
                                            <li><b> 4G: </b><?=$models['4g']?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Display:</h3>
                                        </div>
                                            <li><b> Technology: </b><?=$models->technology?></li>
                                            <li><b> Size: </b><?=$models->size?></li>
                                            <li><b> Resolution: </b><?=$models->resulation?></li>
                                            <li><b> Protection: </b><?=$models->protection?></li>
                                            <li><b> Extra-fetures </b><?=$models->extrafeatures?></li>
                                           
                                             <div class="section-title-left-primary child-size-xl">
                                            <h3>Battery:</h3>
                                        </div>
                                            <li><b> Capacity: </b><?=$models->cpacity?></li>
                                            <li><b> Talk-Time </b><?=$models->talk_time?></li>
                                            <li><b> Stand-by </b><?=$models->stand_by?></li>

                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Price:</h3>
                                        </div>
                                            <li><b> Price: </b><?=$models->price?></li>

                                            
                                            
                                            

                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-5 col-sm-12 col-12 mb--sm">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Memory:</h3>
                                        </div>
                                        <ul class="specification-layout2">
                                            <li><b> Built-in: </b><?=$models->builtin?></li>
                                            <li><b> Card: </b><?=$models->card?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Camera:</h3>
                                        </div>
                                            <li><b> Back: </b><?=$models->back_cam?></li>
                                            <li><b> Front: </b><?=$models->front_cam?></li>
                                            <li><b> Back_Features</b><?=$models->back_feature?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Connectivity:</h3>
                                        </div>
                                            <li><b> Wifi: </b><?=$models->wlan?></li>
                                            <li><b> Bluetooth: </b><?=$models->bluetooth?></li>
                                            <li><b> GPS: </b><?=$models->gps?></li>
                                            <li><b> USB: </b><?=$models->usb?></li>
                                            <li><b> NFC: </b><?=$models->nfc?></li>
                                            <li><b> Infrared: </b><?=$models->infrared?></li>
                                            <li><b> Data: </b><?=$models->data?></li>
                                            <div class="section-title-left-primary child-size-xl">
                                            <h3>Features:</h3>
                                        </div>
                                            <li><b> Sensor: </b><?=$models->sensor?></li>
                                            <li><b> Audio: </b><?=$models->audio?></li>
                                            <li><b> Browser: </b><?=$models->browser?></li>
                                            <li><b> Messaging: </b><?=$models->messaging?></li>
                                            <li><b> Games: </b><?=$models->games?></li>
                                            <li><b> Torch: </b><?=$models->torch?></li>
                                             <li><b> Extra: </b><?=$models->extra?></li>
                                         </ul>
                                    </div>
                                </div>       
        </div>
      </div>
    </div>
                            
                    
                        </div>
                    </div>
                </div>
                
    <div class="pull-right">
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Ad') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary','id'=>'subbtn']) ?>
        </div>
       
    <?php ActiveForm::end(); ?>
</div>

            <script type="text/javascript">
               $("#subbtn").on('click',function(){
                        if($("#userproduct-price").val()==""){
                            $("#userproduct-price").focus();
                            return;
                        }
                        if($("#userproduct-color").val()==""){
                            $("#userproduct-color").focus();
                            return;
                        }
                        if($("#userproduct-condition").val()==""){
                            $("#userproduct-condition").focus();
                            return;
                        }
                   
                }); 
                var t = false;

$('#userproduct-condition').focus(function () {
    var $this = $(this)
    
    t = setInterval(

    function () {
        if (($this.val() < 1 || $this.val() > 10) && $this.val().length != 0) {
            if ($this.val() < 1) {
                $this.val(1)
            }

            if ($this.val() > 10) {
                $this.val(10)
            }
            $('#pp').fadeIn(1000, function () {
                $(this).fadeOut(500)
            })
        }
    }, 50)
})

$('#userproduct-condition').blur(function () {
    if (t != false) {
        window.clearInterval(t)
        t = false;
    }
})
          </script>