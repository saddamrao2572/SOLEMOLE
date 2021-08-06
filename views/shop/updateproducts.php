<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title="View Product";
 ?>
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="main.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> View Listing</a> </li>
						<li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>View Listing</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
						<ul id="dr-list" class="dropdown-content">
							<li><a href="#!">Add New</a> </li>
							<li><a href="<?=url::to(['/shop/updateproduct','pid'=>$shopproduct->id])?>">Edit</a> </li>
							
							
						</ul>
						<!-- Dropdown Structure -->
						<div class="split-row">
							<div class="col-md-12">
								<div class="box-inn-sp ad-inn-page">
									<div class="tab-inn ad-tab-inn">
										<table class="responsive-table bordered">
											<tbody>
												<?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data','id' => 'active-form']]); ?>												<tr>
													<td>Mobile</td>
													<td>:</td>
													<td><input class="form-control" type="text" name="pname" value="<?=$product->name?>" readonly=""></td>
												</tr>
												<tr>
													<td>Date</td>
													<td>:</td>
													<td><input class="form-control" type="date" name="pname" value="<?=$shopproduct->created_at?>" readonly=""></td>
												</tr>
												
												
												<tr>
													<td>Price</td>
													<td>:</td>
					<td><?= $form->field($shopproduct, 'price')->textInput(['maxlength' => true])->label(false) ?></td>
												</tr>
												
												
												
												
												<tr>
													<td>Same EMEI</td>
													<td>:</td>
													<td><?= $form->field($shopproduct, 'sameimei')->textInput(['maxlength' => true])->label(false) ?></td>
												</tr>
												<tr>
													<td>Paid Amount</td>
													<td>:</td>
													<td><?= $form->field($shopproduct, 'paid')->textInput(['maxlength' => true])->label(false) ?>
													</td>
												</tr>
												
												<tr >
													<td></td>
													<td></td>
													<td class="pull-right"><input class="btn btn-lg btn-primary" type="submit" name="shop_prdct_update" value="Save"></td>
												</tr>
											<?php ActiveForm::end(); ?>
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<?php
		 if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    } 
		if(Yii::$app->session['success']=='done'){
			echo '<div class="alert alert-success"><strong>Success!</strong>Product Updated Successfully</div>';
			Yii::$app->session['success']='';
		}
		Yii::$app->session->close();
		?>

