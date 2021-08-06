<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;

use wbraganca\dynamicform\DynamicFormWidget;

use kartik\select2\Select2;

use yii\helpers\ArrayHelper;

use kartik\widgets\FileInput;



?>



<?php DynamicFormWidget::begin([

		'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

		'widgetBody' => '.container-special-room', // required: css class selector

		'widgetItem' => '.item', // required: css class

		'min' => 1, // 0 or 1 (default 1)

		'insertButton' => '.add-item', // css class

		'deleteButton' => '.remove-item', // css class

		'model' => $modelarticalimage[0],

		'formId' => 'dynamic-form',

		'formFields' => [
                        'img',
                     'description',
    ],

	]); 

?>



<div class="container-special-room"><!-- widgetContainer -->

	<?php 

		$i = 0;

		foreach ($modelarticalimage as $i => $SpecialHotelRoom): ?>

		<div class="item panel panel-default"><!-- widgetBody -->

			<div class="panel-heading">

				<h2 class="panel-title pull-left red">Images</h2>

				<div class="pull-right">

					<button type="button" class="add-item  btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>

					<button type="button" class="remove-item btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>

				</div>

				<div class="clearfix"></div>

			</div>

			<div class="panel-body">

				<?php

					// necessary for update action.

					if (! $SpecialHotelRoom->isNewRecord) {

						echo Html::activeHiddenInput($SpecialHotelRoom, "[{$i}]id");

					}

				?>

				
				<?php if($SpecialHotelRoom->isNewRecord) { ?>

				<div class="col-sm-12">

					<?= $form->field($SpecialHotelRoom, "[{$i}]img")->widget(FileInput::classname(), [

							'options' => ['accept' => 'image/*'],

						]);

					?>

				</div>

				<?php } ?>

				

				<div class="col-sm-12">

					<?= $form->field($SpecialHotelRoom, "[{$i}]description")->textarea(['rows' => 3]) ?>

				</div>

			
			</div>

		</div>

	<?php 

		$i = $i + 1;

		endforeach; 

	?>

</div>

<?php DynamicFormWidget::end(); ?>

