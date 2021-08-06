<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url; 
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;

?>
<STYLE>
b{color:red;}
.form-control
{
    font-size: 13px !important;
}
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
                <?= $form->field($model, 'imei')->textInput(['maxlength' => true]) ?>
                
            </div>
        
        
            <div class="col-md-4">
                <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'description')->textarea(['rows' => 4 , 'placeholder' => 'Enter Description'  ]) ?>
                
            </div>

       
       </div>
                       
                         
                 <div class="row">
                    <div class="form-group" style="margin-left: 20px">
                    <?=$form->field($model, 'img', ['labelOptions'=>['style'=>'color:#4267b2']])->widget(FileInput::classname(), [ 'options' => ['accept' => 'profile_image/*' , 'class' =>'validate'], ] )->label('Product Image') ?>
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
                                                <li><b> sim: </b><?php if (!empty($models)) {
                                                    echo $models->sim;
                                                } ?></li>
                                                <li><b> Weight: </b><?php if (!empty($models)) {
                                                    echo $models->weight;
                                                } ?></li>
                                                <li><b> Warranty: </b><?php if (!empty($models)) {
                                                    echo $models->warranty;
                                                } ?></li>
                                                <li><b> Genertaion: </b><?php if (!empty($models)) {
                                                    echo $models->generation;
                                                } ?></li>
                                                <li><b> OS: </b><?php if (!empty($models)) {
                                                    echo $models->os;
                                                } ?></li>
                                                <li><b> Dimensions: </b><?php if (!empty($models)) {
                                                    echo $models->dimensions;
                                                } ?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Processor:</h3>
                                            </div>
                                                <li><b> CPU: </b><?php if (!empty($models)) {
                                                    echo $models->cpu;
                                                } ?></li>
                                                <li><b> Chipset: </b><?php if (!empty($models)) {
                                                    echo $models->chipset;
                                                } ?></li>
                                                <li><b> GPU: </b><?php if (!empty($models)) {
                                                    echo $models->gpu;
                                                } ?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Frequency:</h3>
                                            </div>
                                                <li><b> 2G: </b><?=$models['2g']?></li>
                                                <li><b> 3G: </b><?=$models['3g']?></li>
                                                <li><b> 4G: </b><?=$models['4g']?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Display:</h3>
                                            </div>
                                                <li><b> Technology: </b><?php if (!empty($models)) {
                                                    echo $models->technology;
                                                } ?></li>
                                                <li><b> Size: </b><?php if (!empty($models)) {
                                                    echo $models->size;
                                                } ?></li>
                                                <li><b> Resolution: </b><?php if (!empty($models)) {
                                                    echo $models->resulation;
                                                } ?></li>
                                                <li><b> Protection: </b><?php if (!empty($models)) {
                                                    echo $models->protection;
                                                } ?></li>
                                                <li><b> Extra-fetures </b><?php if (!empty($models)) {
                                                    echo $models->extrafeatures;
                                                } ?></li>
                                               
                                                 <div class="section-title-left-primary child-size-xl">
                                                <h3>Battery:</h3>
                                            </div>
                                                <li><b> Capacity: </b><?php if (!empty($models)) {
                                                    echo $models->cpacity;
                                                } ?></li>
                                                <li><b> Talk-Time </b><?php if (!empty($models)) {
                                                    echo $models->talk_time;
                                                } ?></li>
                                                <li><b> Stand-by </b><?php if (!empty($models)) {
                                                    echo $models->stand_by;
                                                } ?></li>

                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Price:</h3>
                                            </div>
                                                <li><b> Price: </b><?php if (!empty($models)) {
                                                    echo $models->price;
                                                } ?></li>

                                                
                                                
                                                

                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-sm-12 col-12 mb--sm">
                                            <div class="section-title-left-primary child-size-xl">
                                                <h3>Memory:</h3>
                                            </div>
                                            <ul class="specification-layout2">
                                                <li><b> Built-in: </b><?php if (!empty($models)) {
                                                    echo $models->builtin;
                                                } ?></li>
                                                <li><b> Card: </b><?php if (!empty($models)) {
                                                    echo $models->card;
                                                } ?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Camera:</h3>
                                            </div>
                                                <li><b> Back: </b><?php if (!empty($models)) {
                                                    echo $models->back_cam;
                                                } ?></li>
                                                <li><b> Front: </b><?php if (!empty($models)) {
                                                    echo $models->front_cam;
                                                } ?></li>
                                                <li><b> Back_Features</b><?php if (!empty($models)) {
                                                    echo $models->back_feature;
                                                } ?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Connectivity:</h3>
                                            </div>
                                                <li><b> Wifi: </b><?php if (!empty($models)) {
                                                    echo $models->wlan;
                                                } ?></li>
                                                <li><b> Bluetooth: </b><?php if (!empty($models)) {
                                                    echo $models->bluetooth;
                                                } ?></li>
                                                <li><b> GPS: </b><?php if (!empty($models)) {
                                                    echo $models->gps;
                                                } ?></li>
                                                <li><b> USB: </b><?php if (!empty($models)) {
                                                    echo $models->usb;
                                                } ?></li>
                                                <li><b> NFC: </b><?php if (!empty($models)) {
                                                    echo $models->nfc;
                                                } ?></li>
                                                <li><b> Infrared: </b><?php if (!empty($models)) {
                                                    echo $models->infrared;
                                                } ?></li>
                                                <li><b> Data: </b><?php if (!empty($models)) {
                                                    echo $models->data;
                                                } ?></li>
                                                <div class="section-title-left-primary child-size-xl">
                                                <h3>Features:</h3>
                                            </div>
                                                <li><b> Sensor: </b><?php if (!empty($models)) {
                                                    echo $models->sensor;
                                                } ?></li>
                                                <li><b> Audio: </b><?php if (!empty($models)) {
                                                    echo $models->audio;
                                                } ?></li>
                                                <li><b> Browser: </b><?php if (!empty($models)) {
                                                    echo $models->browser;
                                                } ?></li>
                                                <li><b> Messaging: </b><?php if (!empty($models)) {
                                                    echo $models->messaging;
                                                } ?></li>
                                                <li><b> Games: </b><?php if (!empty($models)) {
                                                    echo $models->games;
                                                } ?></li>
                                                <li><b> Torch: </b><?php if (!empty($models)) {
                                                    echo $models->torch;
                                                } ?></li>
                                                 <li><b> Extra: </b><?php if (!empty($models)) {
                                                    echo $models->extra;
                                                } ?></li>
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
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg btn-success' : 'btn btn-lg btn-primary','id'=>'subbtn']) ?>
        </div>
       
    <?php ActiveForm::end(); ?>
</div>

            <script type="text/javascript">
               $("#subbtn").on('click',function(){
                        if($("#blacklistproduct-imei").val()==""){
                            $("#blacklistproduct-imei").focus();
                            return;
                        }
                        if($("#blacklistproduct-color").val()==""){
                            $("#blacklistproduct-color").focus();
                            return;
                        }
                        if($("#blacklistproduct-description").val()==""){
                            $("#blacklistproduct-description").focus();
                            return;
                        }
                   
                }); 
          </script>