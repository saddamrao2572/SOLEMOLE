<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\JSON;
use kartik\rating\StarRating;
?>
 <div class="col-sm-8">
		<?php $form = ActiveForm::begin(['options' => ['id'=>'reviews-form','enctype' => 'multipart/form-data','class'=>"background-white p20 add-review"]]); ?>
            <?= $form->field($review, 'user_id')->hiddenInput()->label(false) ?>
			<?= $form->field($review, 'shop_id')->hiddenInput()->label(false) ?>
			<div class="row">
				<div class="col-sm-4">
				   <?=
						$form->field($review, 'facility_score')->widget( StarRating::classname(), [
							'pluginOptions' => [
								'size' => 'xs',
								'showClear' => false,
								'showCaption' => false,
							]
						]);
					?>
				</div>
                <div class="col-sm-4">
				   <?=
						$form->field($review, 'staff_score')->widget( StarRating::classname(), [
							'pluginOptions' => [
								'size' => 'xs',
								'showClear' => false,
								'showCaption' => false,
							]
						]);
					?>
				</div>
				<div class="col-sm-4">
				   <?=
						$form->field($review, 'atmosphere_score')->widget( StarRating::classname(), [
							'pluginOptions' => [
								'size' => 'xs',
								'showClear' => false,
								'showCaption' => false,
							]
						]);
					?>
				</div>
            </div><!-- /.row -->

            <div class="row">
                <div class="form-group col-sm-6">
                    <?= $form->field($review, 'pros')->textArea(['rows'=>6]) ?>
                </div><!-- /.col-sm-6 -->
                <div class="form-group col-sm-6">
                    <?= $form->field($review, 'cons')->textArea(['rows'=>6]) ?>
                </div><!-- /.col-sm-6 -->

                <div class="col-sm-8">
                    <p>Required fields are marked <span class="required">*</span></p>
                </div><!-- /.col-sm-8 -->
                <div class="col-sm-4">
                    <button class="btn btn-primary btn-block" id='review-submit' type="submit"><i class="fa fa-star"></i> Submit Review</button>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.row -->
        <?php ActiveForm::end(); ?>
    </div>
      <?php
$reviewUrl = Url::to(['shop-reviews/create']);

$js = <<< JS

        $('#review-submit').on('click',function(){
            var form = $('#reviews-form');
            var btn = $(this);
            $('i', btn).removeClass('fa fa-star');
            $('i', btn).addClass('fa fa-refresh fa-spin fa-fw');
            //var data = { 'userid': userid, 'gymid': gymid };
            //console.log(data);
            $.ajax({
                method: "POST",
                url: "$reviewUrl",
                data: form.serialize()
            })
            .done(function( msg ) {
                $('i', btn).removeClass('fa fa-refresh fa-spin fa-fw');
                $('i', btn).addClass('fa star');
                        var data = JSON.parse(msg);
                if(data.status == 'success') {
                    //alert('123');
                    location.reload();
                }
                return false;
            });
        });
        $('#reviews-form').on('submit',function(){
            
            return false;
        });


JS;
$this->registerJS($js);
?>