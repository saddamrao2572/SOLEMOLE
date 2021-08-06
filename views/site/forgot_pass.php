<?php 
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;

	$this->title="Forgot Password"
?>
<div class="row">
    <div class="">
      
        <?php
		$form = ActiveForm::begin([
			'id' => 'parents-login-form',
			'enableClientValidation' => true,
		]);
		?>
		    
			
			
			
	<!--TOP SEARCH SECTION-->
	
	<section class="tz-register" style="margin-top: -20px">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Welcome Back<span>Dear User</span></h1>
					<p>If Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Reset your forgotten account</h4>
					<ul>
						
					</ul>
				</div>
				<div class="log-in-pop-right">
					
					<h4>Reset Your Password</h4>
					<p>Enter Your email address to reset your account.</p>
					<form class="s12    ">
				
						
						
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($model, 'email') ?>
							</div>
						</div>
						
					
		
		 			<button type="submit" class="btn btn-primary pull-right">Send Request</button>
<?php ActiveForm::end(); ?>    
						<!-- <div>
							<div class="input-field s4">
								 <input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
						</div> -->
						
						
						
						<div>
							<div class="input-field s12"><a href="<?=url::to(['/site/login/'])?>">Are you a already member ? Login</a> </div>
						</div>
					</form>
				</div>
			</div>
	</section>
		
		
		
		
			
			
			
			
			
			
			
			
			
		           
        </form>
    </div><!-- /.col-sm-4 -->
</div><!-- /.row -->