<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\City;
use yii\models\State;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Shop */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['shop/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['shop/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    
	<div class="select-wrapper">
	<?php
    echo $form->field($model, 'shop_type')->dropDownList(['all' => 'All', 'mobile' => 'Mobile','laptop' => 'Laptop'],['prompt'=>'Select Type','class'=>'select-dropdown']);

	?>
	</div>
  

	<?=$form->field($model, 'logo')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
	<?=$form->field($model, 'cover')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
 

	 <style>
#map-canvas {
    height: 300px;
    margin: 0px 0px 30px 0px;
}
#map-canvas .form-control {
    right: 42px !important;
    top: 20px !important;
    width: 300px !important;
}
</style>
	 
<?= $form->field($model, 'address')->textInput([
				'maxlength' => true, 
				'class' => 'controls form-control mb30'
			]) 
		?>
		<div id="map-canvas"></div>
		
		 <?= $form->field($model, 'state_id')->hiddenInput()->label(false) ?>
			<input type="hidden" name="loc" id="loc" />
			<?= $form->field($model, 'city_id')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'lng')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'zip')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'suburb')->hiddenInput()->label(false) ?>
	
	<?= $form->field($model, 'about')->textarea(['rows' => '4']) ?>
	
	<?= $form->field($model, 'street')->textarea(['rows' => '4']) ?>

    <?= $form->field($model, 'land_line')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'twiter')->textInput(['maxlength' => true]) ?>

  
 
   


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'waves-effect waves-light btn-large full-btn' : 'btn btn-primary']) ?>
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
$flag = $model->isNewRecord ? 10 : 20;
$input = Html::getInputId($model, 'address');
$stateInputID = Html::getInputId($model, 'state_id');
$cityInputID = Html::getInputId($model, 'city_id');
$streetInputID = Html::getInputId($model, 'street');
$suburbInputID = Html::getInputId($model, 'suburb');
$latInputID = Html::getInputId($model, 'lat');
$lngInputID = Html::getInputId($model, 'lng');
$zipInputID = Html::getInputId($model, 'zip');
$citySelect = Html::getInputId($model, 'city_id');
$js = <<< JS
    var inputid = '$input';
	var stateInputID = '$stateInputID';
	var cityInputID = '$cityInputID';
	var streetInputID = '$streetInputID';
	var suburbInputID = '$suburbInputID';
	var latInputID = '$latInputID';
	var lngInputID = '$lngInputID';
	var zipInputID = '$zipInputID';
	var citySelect = '$citySelect';
	$(document).on('ready',function(){
		
		$(document).on('change','.fee-type',function(){
			var parent = $(this).closest(".panel-body");
			var value = $(this).val();
			if(value == 3) {
				$('.fee-col',parent).removeClass('hidden');
			} else {
				$('.fee-col',parent).addClass('hidden');
			}
			
		});
		$(document).on('click','.start-hour',function(){
			
			var parent = $(this).closest(".item-opitems");
			var value = $(this).val();
			if(value && value != '24 Hours') {
				$('.end-hour-col',parent).removeClass('hidden');
			} else {
				$('.end-hour-col',parent).addClass('hidden');
			}
			
		});
	});
	
	function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(-33.8688, 151.2195),
            zoom: 13
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

        var input = /** @type {HTMLInputElement} */(document.getElementById('$input'));

		var types = document.getElementById('type-selector');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);

		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			draggable: true,
			map: map,
			anchorPoint: new google.maps.Point(0, -29)
		});

		google.maps.event.addListener(marker, "mouseup", function(event) {
			$('#input-latitude').val(this.position.lat());
			$('#input-longitude').val(this.position.lng());
		});

		google.maps.event.addListener(autocomplete, 'place_changed', function() {
			$('#' + cityInputID).val('');
			
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);
			}
			marker.setIcon(/** @type {google.maps.Icon} */({
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			}));
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);
			//alert(place.geometry.location.lat());

			$('#' + latInputID).val(place.geometry.location.lat());
			$('#' + lngInputID).val(place.geometry.location.lng());

			var address = '';
			var street = '';
			var suburb = '';
			var city = '';
			var state = '';
			var zip = '';
			var aa = '';
			console.log(place.address_components);
			if (place.address_components) {
				for (var i = 0; i < place.address_components.length; i++) {
					var addressType = place.address_components[i].types[0];
					if(addressType == 'subpremise') {
						street += place.address_components[i].short_name;
					}
					if(addressType == 'street_number') {
						street += ' ' + place.address_components[i].short_name;
					}
					if(addressType == 'route') {
						street += ' ' + place.address_components[i].short_name;
						
						
					}
					if(addressType == 'locality') {
						suburb = place.address_components[i].short_name;
					}
					if(addressType == 'administrative_area_level_2') {
						city = place.address_components[i].short_name;
					}
					if(addressType == 'administrative_area_level_1') {
						state = place.address_components[i].long_name;
						//alert(state);
					}
					if(addressType == 'postal_code') {
						zip = place.address_components[i].short_name;
					}	
				}
				$('#' + streetInputID).val(street);
				$('#' + suburbInputID).val(suburb);
				$('#' + zipInputID).val(zip);
				$('#' + cityInputID).val(city);
				//alert(streetInputID);
				
				
				$('#' + stateInputID).val(state);
				
				address = [
				(place.address_components[0] && place.address_components[0].short_name || ''),
				(place.address_components[1] && place.address_components[1].short_name || ''),
				(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
				
					
			}
			$('#loc').val(street);
			

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
		});
	}

	if ($('#map-canvas').length != 0) {
		google.maps.event.addDomListener(window, 'load', initialize);
	}
	$("form").submit(function(){
	$('#loc').val($('#branch-address').val());
		var vv=$('#loc').val();
    
});
JS;
$this->registerJs($js);
?>
<?php ActiveForm::end(); ?>