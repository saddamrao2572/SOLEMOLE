<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\JSON;
use kartik\rating\StarRating;
?>
<style type="text/css">
	.rating-animate .filled-stars {
    color: #0f9b7c !important;
    transition: width 0.25s ease;
    -o-transition: width 0.25s ease;
    -moz-transition: width 0.25s ease;
    -webkit-transition: width 0.25s ease;
}
.form-control
{
	font-size: 1.5rem;
}
</style>


		<?php $form = ActiveForm::begin(['options' => ['id'=>'reviews-form','enctype' => 'multipart/form-data','class'=>"background-white p20 add-review"]]); ?>
            <?= $form->field($review, 'user_id')->hiddenInput()->label(false) ?>
			<?= $form->field($review, 'product_id')->hiddenInput()->label(false) ?>

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
                    <?= $form->field($review, 'pros')->textArea(['rows'=>10]) ?>
                </div><!-- /.col-sm-6 -->
                <div class="form-group col-sm-6">
                    <?= $form->field($review, 'cons')->textArea(['rows'=>10]) ?>
                </div><!-- /.col-sm-6 -->

                <div class="col-sm-8">
                    <p>Required fields are marked <span class="required">*</span></p>
                </div><!-- /.col-sm-8 -->
                
                <div class="col-sm-4">
                    <button class="btn btn-primary btn-block" id='review-submit' type="submit"><i class="fa fa-star"></i> Submit Review</button>
                    <style type="text/css">
                    	.btn-block
                    	{
                    		margin-top: 10px;
                    		background-color: #0e9a7a;
                    		padding: 12px 15px;
                    		font-size: 17px;
                    	}
                    	.btn-block:hover
                    	{
                    		background-color: #2e2e2e;
                    		color: white;
                    	}
                    </style>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.row -->
        <?php ActiveForm::end(); ?>
    