<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;

use wbraganca\dynamicform\DynamicFormWidget;

use kartik\select2\Select2;

use yii\helpers\ArrayHelper;

?>



		 <?php DynamicFormWidget::begin([

			'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]

			'widgetBody' => '.container-items-opitems', // required: css class selector

			'widgetItem' => '.item-opitems', // required: css class

			'min' => 1, // 0 or 1 (default 1)

			'insertButton' => '.add-item-opitems', // css class

			'deleteButton' => '.remove-item-opitems', // css class

			'model' => $opItems[0],

			'formId' => 'dynamic-form',

			'formFields' => [

				'branch_id',

				'business_day_id',

				'start_hour',

				'end_hour',

			],

		]); ?>

		<?php

			$items[] = ['id'=>'24 Hours','name'=>'24 Hours'];

			$items[] = ['id'=>'12:00 AM','name'=>'12:00 AM'];

			for($i=1;$i<=11;$i++) {

				$items[] = ['id'=> str_pad($i,2,0,STR_PAD_LEFT). ':00 AM','name'=> str_pad($i,2,0,STR_PAD_LEFT). ':00 AM'];

			}

			$items[] = ['id'=>'12:00 PM','name'=> '12:00 PM'];

			for($i=1;$i<=11;$i++) {

				$items[] = ['id'=> str_pad($i,2,0,STR_PAD_LEFT). ':00 PM','name' =>str_pad($i,2,0,STR_PAD_LEFT). ':00 PM'];

			}

		?>

		<div class="container-items-opitems"><!-- widgetContainer -->

		<?php 

			$i = 0;

			foreach ($opItems as $opItem): ?>

			<div class="item-opitems panel panel-default red"><!-- widgetBody -->

				<div class="panel-heading">

					<h3 class="panel-title pull-left"><?= $opItem->businessDay->name ?></h3>

					<!--<div class="pull-right">

						<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>

						<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>

					</div>-->

					<div class="clearfix"></div>

				</div>

				<div class="panel-body">

					<?php

						// necessary for update action.

						if (! $opItem->isNewRecord) {

							echo Html::activeHiddenInput($opItem, "[{$i}]id");

						}

					?>

					<div class="row">

						<?=

								$form->field($opItem, "[{$i}]business_day_id")

									->hiddenInput()->label(false);

							?>

							

							<?php

							$opItem->branch_id=$branch_id;

								

								echo $form->field($opItem, "[{$i}]branch_id")

									->hiddenInput()->label(false);

									

							?>

						

						<div class="col-sm-6  ">

							<?= $form->field($opItem, "[{$i}]start_hour")

									->dropDownList(

										ArrayHelper::map($items, 'id', 'name'),          // Flat array ('id'=>'label')

										[

											'prompt'=>'Select Start Hour',

											'class' => 'form-control start-hour',

										]    // options

									);

							 ?>

						</div>

						<div class="col-sm-6 end-hour-col ">

							<?= $form->field($opItem, "[{$i}]end_hour")

									->dropDownList(

										ArrayHelper::map($items, 'id', 'name'),          // Flat array ('id'=>'label')

										[

											'prompt'=>'Select End Hour',

											

										]    // options

									);

							 ?>

						</div>

						

					</div><!-- .row -->

				</div>

			</div>

		<?php 

			$i = $i + 1;

			endforeach; 

		?>

		</div>

		<?php DynamicFormWidget::end(); ?>

	