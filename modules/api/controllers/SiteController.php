<?php
namespace app\modules\api\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\modules\api\models\AuthorizationCodes;
use app\modules\api\models\AccessTokens;

use app\modules\api\models\SignupForm;
use app\modules\api\behaviours\Verbcheck;
use app\modules\api\behaviours\Apiauth;

/**
 * Site controller
 */
class SiteController extends RestController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {

        $behaviors = parent::behaviors();

        return $behaviors + [
            'apiauth' => [
                'class' => Apiauth::className(),
                'exclude' => ['authorize', 'register', 'accesstoken','index','forgot','login'],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'me','change-pass'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['authorize', 'register', 'accesstoken','login','forgot'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => Verbcheck::className(),
                'actions' => [
                    'logout' => ['GET'],
                    'authorize' => ['POST','GET'],
                    'register' => ['POST'],
                    'forgot' => ['POST'],
                    'accesstoken' => ['POST'],
                    'me' => ['GET'],
                ],
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->api->sendSuccessResponse(['Welcome To SoleMole API with OAuth2']);
        //  return $this->render('index');
    }
	


    public function actionRegister()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $model = new LoginForm;
        $model = new SignupForm();
        $model->attributes = $this->request;

        if ($user = $model->signup()) {

            $data=$user->attributes;
            unset($data['auth_key']);
            unset($data['password_hash']);
            unset($data['password_reset_token']);

            Yii::$app->api->sendSuccessResponse($data);

        }

    }


    public function actionMe()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $data = Yii::$app->user->identity;
        $data = $data->attributes;
        unset($data['auth_key']);
        unset($data['password_hash']);
        unset($data['password_reset_token']);

        Yii::$app->api->sendSuccessResponse($data);
    } 
	
	public function actionForgot()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		$email= $_POST['email'];
       $model= \app\models\User::find()->where(['email'=>$email])->andWhere(['status'=>1])->one();
			if(isset($model) && !empty($model))
		{
			$model->generatePasswordResetToken();
			
			$model->save(false);
			Yii::$app->mailer->compose('user/resetpass',['reset_token'=>$model->password_reset_token,'user'=>$model])
			->setFrom(['team@solemole.com'=>"SoleMole Team"])
			->setTo($model->email)
			->setSubject("Verification link for Password Reset request ")
			->send();
			 Yii::$app->api->sendSuccessResponse(["Email Sent to <b>$email</b> Successfully.Kindly Check your mail box to reset your account"]);
		}
		else
		{
			 Yii::$app->api->sendFailedResponse("Wrong Email address.This email does not exist in our system.");
		
		}
		

    }
	
	public function actionChangePass()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		$newpass= $_POST['new_password'];
		//$email= $_POST['password'];
		if(!isset($newpass) && empty($newpass))
			{
				Yii::$app->api->sendFailedResponse("New Password is missing");
			}else if(strlen($newpass)<6)
			{
				Yii::$app->api->sendFailedResponse("Your Password Cannot be less than 6 characters");
			}
		$model = new LoginForm;
		 $model->attributes = \Yii::$app->request->post();

        if ($model->validate() && $model->login()) 
		{
			$user= \app\models\User::find()->where(['username'=>$model->username])->andWhere(['status'=>1])->one();
			$transaction = Yii::$app->db->beginTransaction();
			
			
						
			$user->setPassword($newpass);
			//$user->password_repeat = $newpass;
			$user->password_reset_token="";
			//$model->password_repeat = $model->password_hash;
			//$model->generateAuthKey();
			//$model->generatePasswordResetToken();
			//$userDetailsModel->load(Yii::$app->request->post());
			
			//$model->user_type=$role;
			
			if($user->save(false)) {
				$transaction->commit();
			Yii::$app->api->sendSuccessResponse(["Password Changed Successfully"]);
			}else{
				Yii::$app->api->sendFailedResponse($user->errors);
			}
			
			$user->password_hash = "";
			$user->password_repeat= "";
			
			
		}
		else 
		{
            Yii::$app->api->sendFailedResponse($model->errors);
        }
    
		

    }

    public function actionAccesstoken()
    {
		
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		$model=\Yii::$app->request->post();
        if (!isset($_POST["authorization_code"])) {
            Yii::$app->api->sendFailedResponse("Authorization code missing");
        }

        $authorization_code = $_POST["authorization_code"];

        $auth_code = AuthorizationCodes::isValid($authorization_code);
        if (!$auth_code) {
            Yii::$app->api->sendFailedResponse("Invalid Authorization Code");
        }

        $accesstoken = Yii::$app->api->createAccesstoken($authorization_code);

        $data = [];
        $data['access_token'] = $accesstoken->token;
        $data['expires_at'] = $accesstoken->expires_at;
        Yii::$app->api->sendSuccessResponse($data);

    }
	
	 
	
      public function actionAuthorize()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
	
        $model = new LoginForm;

        $model->attributes = \Yii::$app->request->post();

        if ($model->validate() && $model->login()) {
			$user_id= Yii::$app->user->id;
			
			 $shop = \app\models\Shop::find()->where(['owner_id'=>$user_id])->andWhere(['status'=>1])->one();
			 if(Yii::$app->request->url=='/api/user/login')
			 {
		$auth_code =  \app\modules\api\models\AuthorizationCodes::find()->where(['user_id'=>$user_id])->one();
		if(!isset($auth_code) && empty($auth_code))
		{
			  $auth_code = Yii::$app->api->createAuthorizationCode($user_id);
		}
			 }
			 else{
            $auth_code = Yii::$app->api->createAuthorizationCode(Yii::$app->user->identity['id']);
			 }
            $data = [];
            $data['authorization_code'] = $auth_code->code;

            $data['user_id'] = $user_id;
			if(isset($shop))
		{
				$data['shop_id'] = $shop->id;
				$data['shop_name'] = $shop->name;
				
		  $union_position =  \app\models\ShopUnion::find()->where(['id'=>$shop->union_id])->one();
					if(isset($union_position))
			{ 
				$data['association_name']= $union_position->association_name;
				$data['president_name']= $union_position->president_name;
				$data['president_number']= $union_position->president_number;
				$data['sectory_name']= $union_position->gen_sec_name;
				$data['sectory_number']= $union_position->gen_sec_number;
				$city =  \app\models\City::find()->where(['id'=>$union_position->city_id])->one();
			   if(isset($city))
			    {
				$data['city_name']= $city->name;
				}
				$data['since']= $union_position->created_at;
				
			}else 
			 {
				$data['association_name']= "Not set";
			 }
			
		}
			else{$data['shop_id'] = null;}
			
		
		
			 $data['user_name']= Yii::$app->user->identity->username;
			
            $data['expires_at'] = $auth_code->expires_at;

            Yii::$app->api->sendSuccessResponse($data);
        } else {
			$data=[];
			$data['msg'] = 'Incorrect email or Password';
			$data['errors'] = $model->errors;
          Yii::$app->api->sendSuccessResponse($data);
        }
    }
	
    public function actionLogout()
    {
		
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $headers = Yii::$app->getRequest()->getHeaders();
        $access_token = $headers->get('x-access-token');

		 if(!$access_token){
            $access_token = $headers->get('x-access_token');
        }
        if(!$access_token){
            $access_token = Yii::$app->getRequest()->getQueryParam('access-token');
			if(!isset($access_token))
			{
				 $access_token = Yii::$app->getRequest()->getQueryParam('access_token');
			}
        }
		  
        $model = \app\modules\api\models\AccessTokens::find()->where(['token' => $access_token])->one();
	
        if ($model->delete()) {
			Yii::$app->user->logout();
            Yii::$app->api->sendSuccessResponse(["Logged Out Successfully"]);

        } else {
            Yii::$app->api->sendFailedResponse("Invalid Request");
        }


    }
}
