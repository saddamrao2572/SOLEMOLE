<?php 
	use yii\bootstrap\ActiveForm;
	use yii\helpers\Url;
	use yii\helpers\Html;

	$this->title="Register"
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
					<h1>Welcome<span>Dear User</span></h1>
					<p>If Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						
					</ul>
				</div>
				<div class="log-in-pop-right">
					
					<h4>Create an Account</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<form class="s12    ">
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($userDetailsModel, 'name') ?>
							</div>
						</div>
						
						
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($model, 'email') ?>
							</div>
						</div>
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($model, 'username') ?>
							</div>
						</div>
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($model, 'password_hash')->passwordInput() ?>
							</div>
						</div>
						<div>
							<div class="validate ng-pristine ng-valid ng-empty ng-touched">
			<?= $form->field($model, 'password_repeat')->passwordInput() ?>
							</div>
						</div>
						
						
		<?= $form->field($model, 'reCaptcha')->widget(
				\himiklab\yii2\recaptcha\ReCaptcha::className()
			)->label(false); ?>
		  <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Register') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'waves-effect waves-light btn-large full-btn' : 'btn btn-primary']) ?>
		 			
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