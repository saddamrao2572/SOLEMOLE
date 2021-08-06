<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="tz-register" style="margin-top: -20px">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hello... <span class="ng-binding"></span></h1>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					<h4>Login with social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="/images/cancel.html" alt="">
					</a>
					<h4>Login</h4>
					<p>Don't have an account? Create your account. It's take less then a minutes</p>
					
						<?php $form = ActiveForm::begin([
							'id' => 'login-form',
							'class' => 's12 ng-pristine ng-valid',
						]); ?>
						<div>
							<div class="input-field s12">
								 <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<?= $form->field($model, 'password')->passwordInput() ?>
							</div>
						</div>
						
	
						<div>
							<div class="input-field s12">
								<i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Login" class="waves-button-input"></i> 
								
							</div>
								
								
								
						</div>
						
						<div>
						<br/>
							<div class="input-field s12"> <a href="forgot-pass.html">Forgot password</a> | <a href="<?= Url::to(['site/register']) ?>">Create a new account</a> </div>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
	</section>
	
	