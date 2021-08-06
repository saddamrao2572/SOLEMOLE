<?php if($status == 'success') { ?>
	<div class="row">
		<div class="col-sm-12 ">
			<div class="alert alert-icon alert-dismissible alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
				<strong>Congratulation!</strong> You email address is confirmed.
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="alert alert-icon alert-dismissible alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</button>
		<strong>Oh snap!</strong> <?= $msg ?>
	</div>

<?php } ?>