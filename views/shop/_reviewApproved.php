<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\JSON;
use kartik\rating\StarRating;
?>

		<?php $form = ActiveForm::begin(['enableClientValidation'=>false,'options' => ['id'=>'reviews-form','enctype' => 'multipart/form-data','class'=>"background-white p20 add-review"]]); ?>
            <div class="row">
				<div class="col-sm-4">
				   <?=
						$form->field($review, 'facility_score')->widget( StarRating::classname(), [
							'pluginOptions' => [
								'size' => 'xs',
								'showClear' => false,
								'showCaption' => false,
								'displayOnly' => true,
									
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
								'displayOnly' => true,
									
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
								'displayOnly' => true,
									
							]
						]);
					?>
				</div>
            </div><!-- /.row -->

            <div class="row">
                <div class="form-group col-sm-6">
                    <?= $form->field($review, 'pros')->textArea(['rows'=>6,'readonly'=>'readonly']) ?>
                </div><!-- /.col-sm-6 -->
                <div class="form-group col-sm-6">
                    <?= $form->field($review, 'cons')->textArea(['rows'=>6,'readonly'=>'readonly']) ?>
                </div><!-- /.col-sm-6 -->

                
            </div><!-- /.row -->
        <?php ActiveForm::end(); ?>
    