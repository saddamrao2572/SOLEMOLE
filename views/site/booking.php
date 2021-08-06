<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\models\City;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Branch */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Request Shop';

?>

<style type="text/css">
	div.con-page{
		margin-top: -21px;
	}
</style>
	<section>
		<div class="con-page img-responsive">
			<div class="con-page-ri">
				
				<div class="con-com" style="margin-top: -45px">
					<div class="cpn-pag-form">
					 
					  <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'dynamic-form']]); ?>
							<h3> <?= Html::encode($this->title) ?></h3>
							<p>Submit details of your shop.
							Admin will review your request and authorize your access to Management side.After Submission of request your patience will be highly appreciated.<br>Thankful <b>@Team SoleMole</b></p>
							<div>
							<label for="gfc_name">Shop Name</label>
								<div class="input-field col s12">
									   <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
									
								</div>
							</div>
							<div>
								<label for="gfc_mob">Contact Number</label>
								<div class="input-field col s12">
									<?= $form->field($model, 'mobile')->textInput(['maxlength' => true,'type' => 'number']) ?>
								
								</div>
							</div>
							
							<div>
								<label for="gfc_mail">Shop Type</label>
								<div class="input-field col s12">
										<?php
    echo $form->field($model, 'shop_type')->dropDownList(['all' => 'All', 'mobile' => 'Mobile','laptop' => 'Laptop'],['prompt'=>'Select Type','class'=>'select-dropdown']);

	?>
								
								</div>
							</div>
								<?=$form->field($model, 'logo')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
							<div>
							<label for="gfc_mail">Cover Image</label>
								<div class="input-field col s12">
									
   <?=$form->field($model, 'cover')->widget(FileInput::classname(), [ 'options' => ['accept' => 'image/*'], ]);?>
	<label for="gfc_cvr">Cover Image</label>
	</div>
							</div>
						
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
		?>	<div id="map-canvas"></div>
		
		 <?= $form->field($model, 'state_id')->hiddenInput()->label(false) ?>
			<input type="hidden" name="loc" id="loc" />
			<?= $form->field($model, 'city_id')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'lng')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'zip')->hiddenInput()->label(false) ?>
			<?= $form->field($model, 'suburb')->hiddenInput()->label(false) ?>

							<div>
							 <label for="gfc_abt">About</label>
								<div class="input-field col s12">
									<?= $form->field($model, 'about')->textarea(['rows' => '4']) ?>
									
									</div>
							</div>
							<div>
							 <label for="gfc_abt">Street address</label>
								<div class="input-field col s12">
										<?= $form->field($model, 'street')->textarea(['rows' => '4']) ?>
									
									</div>
							</div>
							
						
							
							
					
						<div>
								<div class="input-field col s12">
								
								   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit Booking') : Yii::t('app', 'Submit Booking'), ['class' => $model->isNewRecord ? 'waves-effect waves-light btn-large full-btn' : 'btn btn-primary']) ?>
    </div>
									</div>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>












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

