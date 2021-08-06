<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ProductSearch;
use app\models\ShopSearch;
use app\models\Subcriber;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;
use app\models\Comments;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
	
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                	[
                        'actions' => ['index','login','register','username','contact','about','activate','location','productlist','shoplist','subcribe','search','search-complete','posts','used-mobiles','post-detail','desktop-sync','json-all-products','forgot','reset-pass'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index','dashboard','productlist','location','logout', 'contact','about','adpost','shoplist','createt','subcribe','search','profile','imagechange','messages','search-complete','posts','used-mobiles','post-detail','post-coment','commentajax','desktop-sync'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['dashboard','createt','logout','productlist','location','contact','about','shoplist','subcribe','search','profile','imagechange','messages','search-complete','posts','used-mobiles','post-detail','post-coment','commentajax','desktop-sync'],
                        'allow' => true,
                        'roles' => ['admin'.'admin1','admin2'],
                    ],
                    [
                        'actions' => ['index','logout','createt','productlist','subcribe','booking','location','contact','about','adpost','shoplist','search','profile','imagechange','messages','search-complete','posts','used-mobiles','post-detail','post-coment','commentajax','desktop-sync'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                ],
            ],
				'corsFilter' => [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]

        ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
				
                    'logout' => ['get'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
		if(\Yii::$app->user->can('admin')){
			
			return $this->redirect(['/site/dashboard']);

		}
		 if(\Yii::$app->user->can('user') ){
			
		return $this->render('index');
		}
		
			return $this->render('index');

    }
	
	 public function actionDesktopSync()
    {
		
		
			return $this->render('desktop_sync');

    }
	
	 public function actionPosts(){
		  $dataProvider = new ActiveDataProvider([
    'query' => \app\models\ShopPost::find(),
    'sort' => [
   'defaultOrder' => [
    'created_at' => SORT_DESC,
     ],
      ],
    ]);
	
	
	 return $this->render('posts_listing',[
            
			'dataProvider1' => $dataProvider,
           


        ]);
		 
	 }
	 
      public function actionUsedMobiles(){
		  $dataProvider = new ActiveDataProvider([
    'query' => \app\models\UserProduct::find()->where(['status'=>'1']),
    'sort' => [
   'defaultOrder' => [
    'created_at' => SORT_DESC,
     ],
      ],
    ]);
	
	
	 return $this->render('used_listing',[
            
			'dataProvider1' => $dataProvider,
           


        ]);
		 
	 }
	
	public function actionMessages()
    { $this->layout="main";
        return $this->render('/site/messages');
    }
		public function actionJsonAllProducts()
    { 
			\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
			$products = \app\models\Product::find()->all();
			 
			 
			if(count($products) > 0 )
			 
			{
			 
			return array('status' => true, 'data'=> $products);
			 
			}
			 
			else
			 
			{
			 
			return array('status'=>false,'data'=> 'No Products Found');
			 
			}


	
    }
	public function actionJsonGetProduct()
    { 
					$p_id=$_GET['id'];
				\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
				$product = \app\models\Product::find()->where(['id'=>$p_id])->one();
				 
				 
				if(count($product) > 0 )
				 
				{
				 
				return array('status' => true, 'data'=> $product);
				 
				}
				 
				else
				 
				{
				 
				return array('status'=>false,'data'=> 'No Product Found');
				 
				}


	
    }
	 public function actionSearch()
    {
		if(  isset($_POST['product'] ) )
		{
			//$id=$_GET['id'];
			 
			$query=$_POST['product'];
			
			// $citySearch='vehari';
		// $sql = "SELECT * FROM city WHERE name like '%$citySearch%' ";
			// $city= \app\models\City::findBySql($sql)->one();
				// if(isset($city)){
			// $query= \app\models\Product::find()->where(['status'=>1])->andWhere(['LIKE','name',$key_word]);
			// $model = \app\models\Product::find()->where(['status'=>1])->andWhere(['LIKE','name',$key_word])->all();
			
			// } 
		
		
		$sql = "SELECT * FROM product WHERE name like '%$query%' ";
	$model = \app\models\Product::findBySql($sql)->all();
	$query = \app\models\Product::findBySql($sql);
	$dataProvider = new ActiveDataProvider
		 ([
			
			'query' => $query ,
			'sort' => [
		   'defaultOrder' => [
			'created_at' => SORT_DESC,
			 ],
			  ],
        ]);
				
			
		}else{
        $query = \app\models\Product::find()->where(['status'=>'1']);
		$model = \app\models\Product::find()->where(['status'=>'1'])->all();
		 $searchModel = new ProductSearch();
    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}
		
		$dataProvider->pagination->pageSize= 12;
		$sort = $dataProvider->getSort();

	$sort->defaultOrder = ['created_at' => SORT_DESC,'name' => SORT_DESC,];

	$dataProvider->setSort($sort);
	
      return $this->render('productlist',[
    		"dataProvider" => $dataProvider,
    	]);

       
    }
	
public function actionLocation()
    {
		if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }

	
	Yii::$app->session['loc_city']= $_POST['city'];
	Yii::$app->session['loc_state'] = $_POST['state'];
    Yii::$app->session['loc_country'] = $_POST['country'];
    Yii::$app->session['loc_latitude'] = $_POST['latitude'];
    Yii::$app->session['loc_longitude'] = $_POST['longitude'];
 
	
    }

  public function actionSearchComplete()
    {
		
      $keyword = strval($_POST['query']);

      $search_param = "{$keyword}%";
      // print_r($search_param);
      // exit();
      $sql = "SELECT id,name,imei FROM product WHERE name  LIKE '$search_param' OR  imei  LIKE '$search_param' ";
      
      $query=\app\models\Product::findBySql($sql)->all();
      // print_r($query);
      // exit();
      // $sql->bind_param("s",$search_param); 

     
      if (isset($query) && $query!=null) {
        foreach ($query as $row) {
         
        //$Product[] = $row->id;
        $Product[] = $row->name;
        //$Product[] = $row["imei"];
        }
        echo json_encode($Product);
        }
		
	
    }
	  public function actionProductlist(){
    


     if(isset($_GET["city_id"])){
        $bid=$_GET["city_id"];
        $dataProvider = new ActiveDataProvider
         ([
            'query' => \app\models\Product::find()->where(['brand_id'=>$bid]),
            'sort' => [
           'defaultOrder' => [
            'created_at' => SORT_DESC,
             ],
              ],
        ]);
    }else{
         $searchModel = new ProductSearch();
    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    }
	$dataProvider->pagination->pageSize= 12;
	
	$sort = $dataProvider->getSort();
	$sort->defaultOrder = ['created_at' => SORT_DESC];
	$dataProvider->setSort($sort);
	
        return $this->render('productlist',[
            'dataProvider' => $dataProvider,
        ]);
    }
 public function actionShoplist(){
			
			if(isset($_GET["cid"])){
        $bid=$_GET["cid"];
        $dataProvider = new ActiveDataProvider
         ([
            'query' => \app\models\Shop::find()->where(['city_id'=>$bid]),
            'sort' => [
           'defaultOrder' => [
            'name' => SORT_DESC,
             ],
              ],
        ]);
    }else{
         $searchModel = new ShopSearch();
    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    }
    	return $this->render('shoplist',[
    		"dataProvider" => $dataProvider,
    	]);
    }


    public function actionBooking()
    {
    	$this->layout="main-login";
       $id = \Yii::$app->util->loggedinUserId();
		
	
        $model = new \app\models\Shop;
	
		
        if ($model->load(Yii::$app->request->post()) )
			{
					$brnch = \app\models\Shop::find()->where(['name'=>$model->name])->andWhere(['created_by'=>$id])->one();
			if(isset($brnch))
			{
				echo '<script> alert("You Have Already Submitted a Request for branch.");
				window.location="index";</script>';
			}
			else{	
			
					$imageFile = UploadedFile::getInstance($model, 'logo');
					$imageFile2 = UploadedFile::getInstance($model, 'cover');
				if(isset($imageFile) && isset($imageFile2) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension; 
				$fileName2 =rand(1000,99999999).'.'. $imageFile->extension; 
			
				$model->logo = $fileName; 
				
				$model->cover = $fileName2; 
				 }
				 
			$shop=$_POST['Shop'];
				// get model state its in string
			// check we have stat in db else create it
			$stateName = $shop["state_id"];
			
		
			$state = \app\models\State::find()->byName($stateName);
			if(!isset($state))
			{
				$state = new \app\models\State;
				$state->name = $stateName;
				
				//$state->created_at = date('Y-m-d h:i:s');
				$state->save();
			}
			// get model city_id its in string
			// check we have city 

			$cityName=$shop["city_id"];
			$city = \app\models\City::find()->byStateName($state->id,$cityName);
			if(!isset($city))
			{

				$city = new \app\models\City;
				
				$city->name = $cityName;
			
				$city->state_id = $state->id;

				//$city->country_id="0009";
				//$city->created_by = \Yii::$app->util->loggedinUserId();
				//$city->created_at = date('Y-m-d h:i:s');
				$city->save(false);
			}
			$model->city_id = $city->id;
			$model->state_id = $state->id;
			//$model->street = $_POST['loc'];
			$model->address = $shop["address"];
		
			
			$model->created_at=date('Y-m-d h:i:sa');
			$model->created_by = \Yii::$app->util->loggedinUserId();
				$model->owner_id = $model->created_by .'';
			 if($model->save())
			 { 
		          $directory = Yii::$app->util->getShoplogoDirectory($model->id);
				  $directory2 = Yii::$app->util->getShopcoverDirectory($model->id);
					if (!is_dir($directory) && !is_dir($directory2))
				{ 
				  FileHelper::createDirectory($directory);
				  FileHelper::createDirectory($directory2);
				} 
				if(isset($imageFile)  ) 
				{ 	$filePath = $directory . $fileName; 
				 $imageFile->saveAs($filePath); 
			  
			  
				 }
				 if( isset($imageFile2) ) 
				{ 
				 $filePath2 = $directory2 . $fileName2; 
			   $imageFile2->saveAs($filePath2); 
			  
				 }
				 
				  \Yii::$app->session->setFlash('success', Yii::t('app',"Your Request Sent successfully!, Wait for admin to approve your request"));
					echo '<script> alert("Your Request Sent Successfully");
				window.location="index";</script>';
			 }
			 else{
				 print_r($model->getErrors());
				 exit();
			 }
			 
	
           
       
			}       	  
		  }
		   else {
            return $this->render('booking', [
                'model' => $model,
            ]);
        }
      
    }
	
	public function actionUsername()
    {
        $id = \Yii::$app->util->loggedinUserId();
		$model = \app\models\User::findOne($id);
		if(!empty($model->username))
		{
			return $this->redirect('/');
		}
		if($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::$app->getSession()->setFlash('success', 'Username updated successfully');
			return $this->redirect('/');
		} else {
			return $this->render('username',['model'=>$model]);
		}
		
		
		
    }
	    public function actionAdpost(){
    	$model=  new \app\models\UserProduct;


    	return $this->render('addpost',[
    		'model' =>$model,
    	]);
    }
	
	  public function actionImagechange(){
    	$uid = \Yii::$app->util->loggedinUserId();
    	$documentObject = UploadedFile::getInstanceByName('fileid');
    	$documentObjectt = UploadedFile::getInstanceByName('coverid');

if(isset($documentObject)){
	$model = \app\models\UserDetails::find()->where(['user_id'=>$uid])->one();

$directory = Yii::$app->util->getUserDirectory($uid); 
				
				
				if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				$fileName =  rand() . time() . '.'.  $documentObject->extension;
				$filePath = $directory . $fileName;
							$model->cover = $fileName;
							
							if($model->save(false)){
							$documentObject->saveAs($filePath);
							 \Yii::$app->session->setFlash('success', Yii::t('app',"Cover Changed Successfully"));
							return $this->redirect('profile');
							
}
else{
	print_r($model->getErrors());
	exit;
}
}else if(isset($documentObjectt)){

$model = \app\models\UserDetails::find()->where(['user_id'=>$uid])->one();

$directory = Yii::$app->util->getUserimageDirectory($uid); 
				
				
				if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				$fileName =  rand() . time() . '.'.  $documentObjectt->extension;
				$filePath = $directory . $fileName;
							$model->profile_image = $fileName;
							
							if($model->save(false)){
							$documentObjectt->saveAs($filePath);
							 \Yii::$app->session->setFlash('success', Yii::t('app',"Cover Changed Successfully"));
							return $this->redirect('profile');
							
}
else{
	print_r($model->getErrors());
	exit;
}
}
    		
    	
    }
	public function actionProfile(){

    	if(!\Yii::$app->user->isGuest){
    		$uid = \Yii::$app->util->loggedinUserId();
    		$model = \app\models\User::find()->where(['id'=>$uid])->one();
    		// $model->views = $model->views+1;
    		// $model->save();
    		$modell = \app\models\UserDetails::find()->where(['user_id'=>$uid])->one();
    		$modelll = \app\models\Shop::find()->where(['status'=>1])->all();
    		$dataProvider = new ActiveDataProvider
         ([
            'query' => \app\models\UserProduct::find()->where(['created_by'=>$uid])->andWhere(['status'=>1]),
            'sort' => [
           'defaultOrder' => [
            'created_at' => SORT_DESC,
             ],
              ],
        ]);
    	}
    	

    	return $this->render('user_profile',[
    		'model' => $model,
    		'modell' => $modell,
    		'modelll' => $modelll,
    		'dataProvider' => $dataProvider,
    	]);
    }
	
	public function actionPostDetail($id)
			{
				

		$model = \app\models\UserProduct::find()->where(['id'=>$id])->one();
		$product = \app\models\Product::find()->where(['id'=>$model->product_id])->one();
		$userimg = \app\models\UserImg::find()->where(['product_id'=>$model->id])->all();
         
		 // print_r($userimg);
				// exit;

		return $this->render('post_detail',
		[
		'model' => $model,
		'product' => $product,
		'userimg' => $userimg,
		
		]);
		}
		
		//comment post detail
		public function actionPostComent($id)
			{
				

		$model = \app\models\UserProduct::find()->where(['id'=>$id])->one();
		$product = \app\models\Product::find()->where(['id'=>$model->product_id])->one();
		$userimg = \app\models\UserImg::find()->where(['product_id'=>$model->id])->all();
         
		  
			  $postcoment= Comments::find()->where(['used_mobile_id' => $id])->all();
		 // print_r($userimg);
				// exit;

		return $this->render('postcomment',
		[
		'model' => $model,
		'product' => $product,
		'userimg' => $userimg,
		'postcoment' => $postcoment,
		
		]);
		}
		
		
		
	public function actionCommentajax()
    {
          $success = 0;
       $modelcomments= new Comments();
	   
        if (\Yii::$app->request->isAjax) {
   
            $userID = \Yii::$app->request->post('dld');
            $text = \Yii::$app->request->post('text');
  
  $id = \Yii::$app->util->loggedinUserId();
   
          $modelcomments->created_by=$id;
         $modelcomments->comment=$text;
         $modelcomments->comment_time=date('Y-m-d');
         $modelcomments->used_mobile_id = $userID;
         if($modelcomments->save())
         {
          
         }
         else {
          
              }
   
            // $gymID = Yii::$app->util->decrypt(\Yii::$app->request->post('gymid'));
            // $gymLike = \app\models\GymLikes::find()->byUserGym($userID, $gymID);
   
        }
        return json_encode(array(
            'success' => $success
        ));
  
 } 
	
    public function actionCreatet($pn)
    {
    	
    	$uid = \Yii::$app->util->loggedinUserId();
        $model = new  \app\models\UserProduct();
        $modelwork= new \app\models\UserImg();
        $modell = \app\models\Product::find()->where(['name'=>$pn])->one();
    	$models=\app\models\ProductSpecification::find()->where(['product_id'=>$modell->id])->one();
        if ($model->load(Yii::$app->request->post())) {
			
			
			
        	$model->product_id = (string) $modell->id;
        	$model->created_by = (string)$uid;
        	$model->status = '0';
        	$model->created_at =date('Y:m:d h:i:s',time());
			

            if($model->save()){
           					//for upload multi images
                 $imageFiles = UploadedFile::getInstances($modelwork, 'img');
				 
				
				
				$directory = Yii::$app->util->getProductgalleryDirectory($model->id); 
				
				if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				
				if(isset($imageFiles) )
				{
					
					
					foreach($imageFiles as $imageFile)
					{
						//print_r();
					
						$fileName =  rand() . time() . '.'.  $imageFile->extension;
						
						$StoriesImg = new \app\models\UserImg();
						$StoriesImg->product_id = (string)$model->id;
						
						$StoriesImg->created_at = date('Y:m:d h:i:s',time());
						$StoriesImg->created_by = (string)$uid;

						$StoriesImg->img = $fileName;
						
						
							$filePath = $directory . $fileName;
							
							$imageFile->saveAs($filePath);
							if($StoriesImg->save())
			                {
									
								
							}else{
								
								print_r($StoriesImg->getErrors());
				                exit;
							}
							
						 Yii::$app->session->setFlash('success', "Ad Posted Successfully!");
					}
					      Yii::$app->session->setFlash('success', "Ad Posted Successfully");
					        return $this->redirect('/site/adpost');
				}
					
					
					
					//////////
					
					}else{
						print_r($model->getErrors());
					}
				
        } else {
            return $this->renderPartial('create', [
                'model' => $model,
                'modell' => $modell,
                'models' => $models,
                'modelwork'=>$modelwork,
            ]);
        }
    }
	public function actionAddblacklist(){
    	$model=  new \app\models\BlacklistProduct;


    	return $this->render('addblocklist',[
    		'model' =>$model,
    	]);
    }
    public function actionEnterdata($pn)
    {
    	
    	$uid = \Yii::$app->util->loggedinUserId();
        $model = new  \app\models\BlacklistProduct();
        //$modelwork= new \app\models\UserImg();
        $modell = \app\models\Product::find()->where(['name'=>$pn])->one();
    	$models=\app\models\ProductSpecification::find()->where(['product_id'=>$modell->id])->one();
        if ($model->load(Yii::$app->request->post())) {
			
			
			
        	$model->product_id = $modell->id;
        	$model->created_by = $uid;
        	$model->status = '0';
        	$model->created_at =date('Y:m:d');
        	$imageFile = UploadedFile::getInstance($model,'img');
        	// print_r($imageFile);
        	// exit();
            if(isset($imageFile)) 
            { 
                $fileName =rand(1000,99999999).'.'. $imageFile->extension; 
                $model->img = $fileName; 
            }
            
            if($model->save())
            {
           		$directory = Yii::$app->util->getBlacklistDirectory($model->id);             
                if (!is_dir($directory))
                { 
                  FileHelper::createDirectory($directory);
                } 
                if(isset($imageFile)) 
                {     
                    $filePath = $directory . $fileName; 
                    $imageFile->saveAs($filePath);
                }
					
				Yii::$app->session->setFlash('success', "Ad Posted Successfully");
				return $this->redirect('/site/addblacklist');
					
			}
			else
			{
				print_r($model->getErrors());
			}
				
        } 
        else 
        {
            return $this->renderPartial('enterdata', [
                'model' => $model,
                'modell' => $modell,
                'models' => $models,
                
            ]);
        }
    }

	public function actionSubcribe() 
	{
		$subcrib =new \app\models\Subcriber();
		if (isset($_POST)) {
			$subcrib->subcriber=$_POST['email'];
			$subcrib->created_at=date('Y-m-d');
			$subcrib->status=0;
			// print_r($subcriber);
			// exit();
			$emailvalid=\app\models\Subcriber::find()->where(['subcriber'=>$subcrib->subcriber])->one();
			
			
			if (!isset($emailvalid)) 
			{
				
				if ($subcrib->save()) {
					Yii::$app->mailer->compose('subcribe/sub')
						->setFrom(['team@solemole.com'=>"SoleMole Team"])
						->setTo($subcrib->subcriber)
						->setSubject("SoleMole.com | Subscription added successfully ")
						->send();
				Yii::$app->session->setFlash('success', "Sent you an email about subscription added|Welcome to SoleMole Family!");
						return $this->redirect('/site/index');

				}
				else
				{
					Yii::$app->session->setFlash('danger', "Something went wrong !");
					return $this->redirect('/site/index');
				}
			}
			else
				{
					Yii::$app->session->setFlash('danger', "You Are Already Subscribed To Our Site!");
					return $this->redirect('/site/index');
				}
		}
		
	}
	public function actionActivate($key)
    {
       
		$user = \app\models\User::findByPasswordResetTokenSimple($key);
		$status = "success";
		$msg = "";
		if(isset($user))
		{
			$user->removePasswordResetToken();
			$user->status = \app\models\User::STATUS_ACTIVE;
			if($user->save()) {
				return $this->render('activateresult',['status'=>$status,'msg'=>$msg]);
			} else {
				
			}
		} else {
			$status = "error";
			$msg = "You have cliced an invalid link, contact us <a class='btn btn-primary' href='mailto:contact@solemole.com'>here</a> for further assistance.";
			return $this->render('activateresult',['status'=>$status,'msg'=>$msg]);
		}
		
    }
	
	public function actionTest() {
		$user = \app\models\User::findOne(1);
		
		Yii::$app->mailer->compose('user/confirmation',['user'=>$user])
			->setFrom(['team@liftezy.com'=>"Liftezy Team"])
			->setTo("i060377@gmail.com")
			->setSubject("Verify your email address for Liftezy")
			->send();
	}
	
	public function actionRegister()
    {
		$this->layout="main-login";
		//$postType= \app\models\PostType::find()->all();
        $model = new \app\models\User;
		$model->scenario = "signup";
		$userDetailsModel = new \app\models\UserDetails;
		if($model->load(Yii::$app->request->post())) {
			
			$transaction = Yii::$app->db->beginTransaction();
			$role = "user";
			$dbRole = \Yii::$app->authManager->getRole($role);
			
			$password = $model->password_hash;
			$model->setPassword($password);
			$model->password_repeat = $model->password_hash;
			$model->generateAuthKey();
			$model->generatePasswordResetToken();
			$userDetailsModel->load(Yii::$app->request->post());
		
			if($model->save()) {
					
				$userRole = \Yii::$app->authManager->getRole('user');
				\Yii::$app->authManager->assign($userRole, $model->id);
				$userDetailsModel->load(Yii::$app->request->post());
				$userDetailsModel->user_id = $model->id;
				if($userDetailsModel->save())
				{
					$transaction->commit();
					Yii::$app->mailer->compose('user/confirmation',['user'=>$model])
						->setFrom(['team@solemole.com'=>"SoleMole Team"])
						->setTo($model->email)
						->setSubject("Verify your email address for Membership in SoleMole")
						->send();
					return $this->render('registersuccess');
					
				}
					else {print_r($userDetailsModel->getErrors());
			exit;}
			}else {print_r($model->getErrors());
			exit;}
			$model->password_hash = "";
			$model->password_repeat= "";
		
		} 
		return $this->render('register',[
			'model'=>$model,
			'userDetailsModel' => $userDetailsModel,
		
			
		]);
		
		
    }

    /**
     * Login action.
     *
     * @return string
    */
    public function actionLogin()
    { 
	//print_r(Yii::$app->user->getReturnUrl());
		
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
		
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			if(Yii::$app->user->getReturnUrl()=='/js1/jquery-google-map/jquery-google-map.js')
			{
				return $this->redirect('/site/index');
			}else{
			return $this->redirect(Yii::$app->user->getReturnUrl());}
        }
		$this->layout = 'main-login';
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
			
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	
	 public function actionForgot()
    {
		$this->layout="main-login";
			$model = new \app\models\User;
	
		if($model->load(Yii::$app->request->post())) 
		{
			$model= \app\models\User::find()->where(['email'=>$model->email])->andWhere(['status'=>1])->one();
			if(isset($model) && !empty($model))
		{
			$model->generatePasswordResetToken();
			
			$model->save(false);
			Yii::$app->mailer->compose('user/resetpass',['reset_token'=>$model->password_reset_token,'user'=>$model])
			->setFrom(['team@solemole.com'=>"SoleMole Team"])
			->setTo($model->email)
			->setSubject("Verification link for Password Reset request ")
			->send();
			 Yii::$app->session->setFlash('success', "An email with verification link is sent to your email account.Check your mailbox for details");
			
		}
		else
		{
			Yii::$app->session->setFlash('danger', "Wrong Email address.This email does not exist in our system.");
		}
		}
		
			return $this->render('forgot_pass',[
			'model'=>$model,
		]);
		
		
    }
	
	
	public function actionResetPass($key)
    {
		
		$this->layout="main-login";
		if(isset($key)){
		$model= \app\models\User::find()->where(['password_reset_token'=>$key])->andWhere(['status'=>1])->one();
		}else 
		{
			$model=new  \app\models\User;
		}
		if($model->load(Yii::$app->request->post())) {
			$model= \app\models\User::find()->where(['email'=>$model->email])->andWhere(['status'=>1])->one();
			$transaction = Yii::$app->db->beginTransaction();
			
			$password=$_POST['User']['password_hash'];
						
			$model->setPassword($password);
			$model->password_repeat = $model->password_hash;
			$model->password_reset_token="";
			//$model->password_repeat = $model->password_hash;
			$model->generateAuthKey();
			$model->generatePasswordResetToken();
			//$userDetailsModel->load(Yii::$app->request->post());
			
			//$model->user_type=$role;
			
			if($model->save(false)) {
				$transaction->commit();
							return $this->render('reset_pass_success');
			}else{
				print_r($model->getErrors());
				exit;
			}
			
			$model->password_hash = "";
			$model->password_repeat= "";
		}
		
		if(isset($model))
		{
		$model->password_hash="";
			return $this->render('reset_pass',[
			'model'=>$model,
		]);
		}
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


	    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionDashboard()
    {
				$this->layout = 'main-admin';
           $id = \Yii::$app->util->loggedinUserId();
		   
		   //this code for sum today things like sale purchase
		   
		   //this code for today sale
		   $sale = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='sell'  ");
           $sales = $sale->queryScalar();
		   
           //this code for today purchase
		   
		   $purch = Yii::$app->db->createCommand("SELECT SUM(replace(price, ',', '')),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='purchase'  ");
           $purchase = $purch->queryScalar();
		   
		   //this code for paid purchase
		   $purch_paid = Yii::$app->db->createCommand("SELECT SUM(paid),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='purchase'  ");
           $purchase_paid = $purch_paid->queryScalar();
		   
		   //this code for purchase total product today
		   $purchase_product = Yii::$app->db->createCommand("SELECT count(product_id),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='purchase'  ");
           $purchase_products = $purchase_product->queryScalar();

		   //this code for sale with net cash
		   $sale_paid = Yii::$app->db->createCommand("SELECT SUM(paid),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='sell'  ");
           $sales_paid = $sale_paid->queryScalar();
		   
		   //today sale product
		   $sale_pro = Yii::$app->db->createCommand("SELECT count(product_id),DATE_FORMAT(created_at, '%Y-%m-%d') FROM sales_purchase where DATE(created_at) = CURDATE() AND created_by='$id' AND type='sell'  ");
           $sales_product = $sale_pro->queryScalar();
		   
		   //expance today
		   $expance = Yii::$app->db->createCommand("SELECT SUM(ammount),DATE_FORMAT(created_at, '%Y-%m-%d') FROM expance where DATE(created_at) = CURDATE() AND created_by='$id' ");
           $expances = $expance->queryScalar();

		   //today customer 
		   $customer = Yii::$app->db->createCommand("SELECT count(id),DATE_FORMAT(created_at, '%Y-%m-%d') FROM customer where DATE(created_at) = CURDATE() AND created_by='$id' ");
           $customers = $customer->queryScalar();
		
		//available stock
		   $stocks = Yii::$app->db->createCommand("SELECT SUM(available)  FROM stock where created_by='$id'   ");
           $stock = $stocks->queryScalar();
		   
		  //today remaining cash
		   $remaining_sale=($sales-$sales_paid);
		   //today payable cash
		   $remaining_purchase=($purchase-$purchase_paid);
		
		//this code for this month
		   
		   //this code for current month sale
          $current_month_sale = Yii::$app->db->createCommand(" SELECT SUM(replace(price, ',', '')) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='sell'    ");           
		   $current_month_sal = $current_month_sale->queryScalar();
		   
		   //current month purchase
		   $current_month_purch = Yii::$app->db->createCommand(" SELECT SUM(replace(price, ',', '')) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='purchase'    ");           
		   $current_month_purchase = $current_month_purch->queryScalar();
		   
		   //current month sale on net cash 
		   $current_month_sale_net = Yii::$app->db->createCommand(" SELECT SUM(paid) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='sell'    ");           
		   $current_month_sale_net_cash = $current_month_sale_net->queryScalar();
		   
		   //current month purchas paid cash
		   $current_month_purchhase_paid_cash = Yii::$app->db->createCommand(" SELECT SUM(paid) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='purchase'    ");           
		   $current_month_purchhase_paid = $current_month_purchhase_paid_cash->queryScalar(); 
		   
		   //current month expance
		   $current_month_expn = Yii::$app->db->createCommand(" SELECT SUM(ammount) FROM       expance
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");           
		   $current_month_expance = $current_month_expn->queryScalar();
		   //current month available stock
		   $current_month_stk = Yii::$app->db->createCommand(" SELECT SUM(available) FROM       stock
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");           
		   $current_month_Stock = $current_month_stk->queryScalar();
		   //this month sale stock 
		   $current_month_total_stk = Yii::$app->db->createCommand(" SELECT SUM(total) FROM       stock
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");           
		   $current_month_total_Stock = $current_month_total_stk->queryScalar();
		   
		  
		  //current month sale on net payment
		   $remaining_this_month_sale_cash=($current_month_sal-$current_month_sale_net_cash);
		   //current month payable cash
		   $payable_cash=($current_month_purchase-$current_month_purchhase_paid);
		  //current month sale product
           $current_month_sale_pro = Yii::$app->db->createCommand(" SELECT COUNT(product_id) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='sell'    ");           
		   $current_month_sale_product = $current_month_sale_pro->queryScalar();
		   //current month purchase product
		   $current_month_purchase_pro = Yii::$app->db->createCommand(" SELECT COUNT(product_id) FROM       sales_purchase
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' AND type='purchase'    ");           
		   $current_month_purchase_product = $current_month_purchase_pro->queryScalar();
		   
		   //this month total customer
		   $current_month_customer = Yii::$app->db->createCommand("SELECT COUNT(id) FROM       customer
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");
           $current_month_customers = $current_month_customer->queryScalar();
		   
		   //current month imported products
		   
		   $current_month_imp_product = Yii::$app->db->createCommand("SELECT COUNT(product_id) FROM       shop_product
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");
           $current_month_imported_product = $current_month_imp_product->queryScalar();
		   
		   //current month imported brand
		     $current_month_imp_brand = Yii::$app->db->createCommand("SELECT COUNT(DISTINCT brand_id) FROM       shop_product
           WHERE MONTH(created_at) = MONTH(CURRENT_DATE())
           AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND created_by='$id' ");
           $current_month_imported_brand = $current_month_imp_brand->queryScalar();	   
		   
		   
		return $this->render('dashboard', [
            'current_month_total_Stock' => $current_month_total_Stock,
            'current_month_imported_brand' => $current_month_imported_brand,
            'current_month_imported_product' => $current_month_imported_product,
            'current_month_customers' => $current_month_customers,
            'current_month_purchase_product' => $current_month_purchase_product,
            'current_month_sale_product' => $current_month_sale_product,
            'current_month_Stock' => $current_month_Stock,
            'current_month_expance' => $current_month_expance,
            'payable_cash' => $payable_cash,
            'remaining_this_month_sale_cash' => $remaining_this_month_sale_cash,
            'current_month_purchhase_paid' => $current_month_purchhase_paid,
            'current_month_sale_net_cash' => $current_month_sale_net_cash,
            'current_month_sal' => $current_month_sal,
            'current_month_purchase' => $current_month_purchase,
            'sales' => $sales,
			'purchase'=>$purchase,
			'purchase_paid'=>$purchase_paid,
			'sales_paid'=>$sales_paid,
			'remaining_sale'=>$remaining_sale,
			'remaining_purchase'=>$remaining_purchase,
			'stock'=>$stock,
			'expances'=>$expances,
			'customers'=>$customers,
			'purchase_product'=>$purchase_products,
			'sales_product'=>$sales_product,
        ]);
    }
}
