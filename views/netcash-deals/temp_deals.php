<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4><?=$this->title?></h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="<?=url::to(['facility/create'])?>">Add New</a> </li>
							
							<li class="divider"></li>
						
							<li><a href="<?=url::to(['facility/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
						
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
						<div class="hom-cre-acc-left hom-cre-acc-right">
<div class="facility-index">

<style>
[type="radio"]:not(:checked), [type="radio"]:checked {
    position: absolute;
    left: 5px;
    opacity: 1;
	padding-left: 0px;
}
.radio-inline, .checkbox-inline {
  
    padding-left: 0px;
    
}
</style>
<div class="container">
  <h2>Temporary Deals</h2>
  <br><br>

  <div class="radiobtn">
  <div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-4">
    <label class="radio-inline clickit">
      <input id="radio1" type="radio"  name="optradio" checked>Net Cash
    </label>
	</div>
	
	<div class="col-md-4">
    <label class="radio-inline clickit">
      <input id="radio2" type="radio" name="optradio"> Product
    </label>
	</div>
	</div>
    
  </div>
</div>
<!---net cash deals -->

<div class="netcash" >

   <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<div class="product" >

   <?= $this->render('_form1', [
        'model' => $modelproduct,
    ]) ?>

</div>
    


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
	  $(".product").hide();
	
    $(".clickit").click(function(){
		
		   if ($("#radio1").prop("checked")) {
			   
               $(".netcash").show();
               $(".product").hide();
			   
             }else {
				 
                
               $(".product").show();
			    $(".netcash").hide();
             }
		
		
       
    });
});
</script>