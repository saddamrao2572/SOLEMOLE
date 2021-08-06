<?php



use yii\helpers\Html;

use yii\widgets\ActiveForm;

use kartik\widgets\FileInput;

use yii\helpers\ArrayHelper;

use kartik\depdrop\DepDrop;

use yii\helpers\Url;

use kartik\select2\Select2;

/* @var $this yii\web\View */

/* @var $model app\models\Shop */

/* @var $form yii\widgets\ActiveForm */

?>





<?php $form = ActiveForm::begin(['id'=>'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>





	 <?php $id=$_GET['id'];?>

	 <script>

	 $("#BranchSelection").change(function(){

    alert("The text has been changed.");

});

	 </script>

	 

	 

	 

	 

	<div class="background-white p30 mb30">

		<h3 class="page-title">Operational Information</h2>

		<?= $this->render('_opItems',['opItems'=>$opItems,

		'shop_id'=>$id,

		'form'=>$form]); ?>



	</div>

	<div class="background-white p30 mb30">

		<h3 class="page-title">Facilities</h2>

		

		<?= $form->field($model, 'facilityIds')->widget(Select2::classname(), [

				'data' => ArrayHelper::map(\app\models\Facility::find()->where(['created_by'=>Yii::$app->util->loggedinUserId()])->all(), 'id', 'name'),

				'options' => [

					'placeholder' => 'Select a facility or add new ...',

				],

				'language' => 'en',

				'pluginOptions' => [

					'allowClear' => true,

					'multiple'=>true,

					'tags'=>true,

				],

				'pluginEvents' => [

					"change" => "function() {  }",

				]

			])->label(false);

		?>

	</div>

	

	<div class="form-group  pull-right">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Listing') : Yii::t('app', 'Update Listing'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>



	

	<?php ActiveForm::end(); ?>