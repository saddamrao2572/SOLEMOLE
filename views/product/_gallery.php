<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\ProductImage;
use yii\models\Product;

use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['product/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['product/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="ProductImage">

	<?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>

    <?= $form->field($model, 'img[]')->widget(FileInput::classname(), [
												'options' => ['accept' => 'image/*','multiple' => true],
												'pluginOptions' => [
													'initialPreview'=>[
														
													],
													'overwriteInitial'=>false,
													'maxFileSize'=>1024*25,
													'fileActionSettings' => [
														'uploadIcon' =>'',
													],
													
													'uploadUrl' =>'uu',
												],
												'pluginEvents' => [
													"filebatchuploadcomplete" => "function(event, files, extra) { 
														$.pjax.reload({container:'#gallery-pjax'});
														$(event.currentTarget).fileinput('clear');;
													}",
													//"filereset" => "function() { log("filereset"); }",
												],
											]);
										?>
	
	
	 
	
   
	 


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Update', ['class' => $model->isNewRecord ? 'waves-effect waves-light btn-large full-btn' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	<div class="panel panel-default col-md-12">
    <?php
	    
		
	
        $gallery = app\models\ProductImage::find()->where(['product_id'=> $product])->all();  
        if (!empty($gallery)): ?>
        <?php foreach ($gallery as $doc): ?>
            <?php
				if($doc->img!=null)
				{
				
				
			?>
			
			<div class="image-list col-md-4">
				<a href="/<?= Yii::$app->util->getProductgalleryDirectory($doc->product_id).$doc->img  ?>">
					<figure>
						<img class="img-thumbnail" src="/<?= Yii::$app->util->getProductgalleryDirectory($doc->product_id).$doc->img  ?>" alt=""/>
						<span class="image-cap"><i class="fa fa-plus"></i></span>
					</figure>
				</a>
				
				<div class="file-footer-buttons">
							<button type="button" class="kv-file-remove btn-xs btn-danger remove" title="Remove file" data-id="<?= Yii::$app->util->encrypt($doc->id);
							
							?>" >
							<i class="glyphicon glyphicon-trash"></i></button>
					</div>
				
			</div>
		
			
			
			
			
			<?php } ?>
        <?php endforeach; ?>
    <?php endif; ?>    

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
$url = Url::to(['product/photo-delete']);
$js = <<< JS
 
 $(document).ready(function () { 
    $(document).on('click','.remove',function() {
        var r = confirm('Are you sure you want to delete this Picture?');
        if(r == true) {
            var id = $(this).attr('data-id');
            var data = {'id':id};
            $.post('$url',data, function(res){
				var response = $.parseJSON(res);
				if(response.status == 'success'){
                    
					location.reload();
                }
            });
        }  
    });
	
 });

JS;

$this->registerJs($js);
?>
