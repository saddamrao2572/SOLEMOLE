<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Comments;
use app\models\ProductImage;
use app\models\ProductSearch;
use yii\web\Controller;
 use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
use yii\base\Model; 

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
                        'actions' => ['detail','search'],
                        'allow' => true,
						'roles' => ['?']
                    ],
					[
                        'actions' => ['index','search','create','update','view','delete','gallery','feature','accept','reject','detail','like','commentdelete'],
                        'allow' => true,
						'roles' => ['@']
                    ],
					[
                        'actions' => ['index','create','commentdelete','search','update','view','delete','feature','accept','reject','detail','like'],
                        'allow' => true,
						'roles' => ['admin']
                    ],
                    
                ],
            ],
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {	$this->layout = 'main-admin';
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {	
	 $id=Yii::$app->util->decrypt($_GET['id']);
	$this->layout = 'main-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
				public function actionCommentdelete()
			{




			if (\Yii::$app->request->isAjax) {

			$userID = \Yii::$app->request->post('dld');
		
			
			$success = 0;
			$query = Comments::find()->where(['id'=>$userID])->one();
			// print_r($query);
			// exit;
			if($query->delete()){
			$success = 1;
			exit;

			return json_encode(array(
			'success' => $success
			));


			}
			else{

			print_r($query->getErrors());
			exit;

			}

			}
			}
	public function actionSingle()
    { 
 
 
   // print_r($pid);
   // exit;
     if(isset($_GET["pid"])){
      $pid=$_GET["pid"];
     }
     
  
  
     $user_id=\Yii::$app->util->loggedinUserId();
     
     $model= Product::find()->where(['id'=>$pid])->one();
     
     $model2= \app\models\ProductSpecification::find()->where(['product_id'=>$pid])->one();
     $modelcomments= new Comments();
         $postcoment= Comments::find()->where(['post_id' => $pid])->all();
   
        return $this->render('productsingle',[
         'model' => $model,
         'models' => $model2,
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
         $modelcomments->post_id = $userID;
         // print_r($userID);
         // exit;
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
 public function actionLike() {
        $success = 0;
      
            
        if (\Yii::$app->request->isAjax) {
        	// echo "cjhvsjhcvcvdjcvsdkc";
        	// exit();
            $userID = Yii::$app->util->decrypt(\Yii::$app->request->post('userid'));
            $productID = Yii::$app->util->decrypt(\Yii::$app->request->post('productid'));


            $productLike = \app\models\ProductLikes::find()->byUserProduct($userID, $productID);
			if (isset($productLike)) {
				$delete = $productLike->delete();
				$success = 2;
			} else {
				$newLike = new \app\models\ProductLikes();
				$newLike->product_id = $productID;
				$newLike->user_id = $userID;
				$newLike->created_at=date('Y-m-d h:i:s');
				
				// print_r($newLike);
				// exit();

				if ($newLike->save()) {
					echo "Ho gya wa";
					
				}
				else{
					print_r("ni hoya bhai" );
					
				}
				
				
				$success = 1;
			}
        }
        return json_encode(array(
            'success' => $success
        ));
    }



    public function actionDetail($slug)
    {	
	 
    	// if(isset($slug)){
    		// $pid=$_GET["pid"];
    	// }
    	
    	$user_id=\Yii::$app->util->loggedinUserId();
    	// print_r($user_id );
    	// exit();
    	$model= Product::find()->where(['slug'=>$slug])->one();
    	$modelimg = ProductImage::find()->where(['product_id'=>$model->id])->all();
		
		// print_r($modelimg);
		// exit;
		$model2= \app\models\ProductSpecification::find()->where(['product_id'=>$model->id])->one();
	if(isset($model2)){ $description=strip_tags($model2->description); }
		else {	$description=strip_tags($model->model);}
    		//meta tags
         \Yii::$app->view->registerMetaTag(['property'=>"og:title", 'content'=>$model->name],"og:title");
			\Yii::$app->view->registerMetaTag(['property'=>"og:description", 'content'=>$description
			],"og:description");
			
				\Yii::$app->view->registerMetaTag(['property'=>"og:image", 'content'=>Url::to(['/uploads/product/<?=$model->id?>/<?=$model->thumbnail?>'],true)],"og:image");
				\Yii::$app->view->registerMetaTag(['property'=>"og:image:width","content"=>"650"],"og:image:width");
				\Yii::$app->view->registerMetaTag(['property'=>"og:image:height", "content"=>"350"],"og:image:height");
			
			\Yii::$app->view->registerMetaTag(['property'=>"og:url", 'content'=>\Yii::$app->urlManager->createAbsoluteUrl(['/product/detail', $model->id])],"og:url");
			\Yii::$app->view->registerMetaTag(['property'=>"og:type", 'content'=>'Mobiles'],"og:type");
    	
    	
    	//$sql = "SELECT * FROM product_reviews where  user_id in (select id from user where id= ) and product_id in (select id from product where id=$model->id ) ";

    	 $review = \app\models\ProductReviews::find()->byUserbyProduct($user_id, $model->id);
    	 // print_r($);
    	 // exit();
			if(!isset($review))
			{
				
				 // print_r($review);
     //    exit();
				$review = new \app\models\ProductReviews;
				$review->user_id= \Yii::$app->util->encrypt($user_id);
				$review->product_id = \Yii::$app->util->encrypt($model->id);
				// print_r($review->product_id);
				//     	exit();
				// $review->user_id=\Yii::$app->util->loggedinUserId();
				// $review->product_id =$pid;
			}
			
			
        return $this->render('productdetail',[
        	'model' => $model,
        	'models' => $model2,
        	'review' => $review,
        	'modelimg' => $modelimg,

        ]);
    }

public function actionSearch($term)
    {

		if (Yii::$app->request->isAjax) {
			$products = Product::find()
			->where(['LIKE', 'name', '%' . $term . '%' ,false])
			->andwhere(['status'=>1])->all();
	   
			if(isset($products)&& count($products) > 0){
				foreach($products as $product) {
					$results[] = ['id'=>$product->name, 'label'=>$product->name];
				}

				echo json_encode( $results);
			}else{
				$results[] = ['id'=>0, 'label'=>'No Result Found'];
			echo json_encode($results);
		}
		}
	}

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {	$this->layout = 'main-admin';
        $model = new Product();

       if ($model->load(Yii::$app->request->post())) {
			        
					$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension;
	$model->thumbnail=$fileName;				
				
				//$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 }
			$model->status='0';
		
			$model->created_at=date('Y-m-d h:i:sa');
			$model->barcode='12345';
			$model->imei='12345';
			$model->created_by= (string)\Yii::$app->util->loggedinUserId();
			$model->conditon='New';
		
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getProductDirectory($model->id);
					if (!is_dir($directory))
				{ 
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 $imageFile->saveAs($filePath);
				 }
				 
			   \Yii::$app->session->setFlash('success', Yii::t('app',"Your Item created successfully!"));
				
           return $this->redirect(['view', 'id' => $model->id]);
			 }
			 else{
				 print_r($model->getErrors());
				 exit();
			 }
			 
        } 
            
         else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    { 	$this->layout = 'main-admin';
	      $id=Yii::$app->util->decrypt($_GET['id']);
        $model = $this->findModel($id);
        
         if ($model->load(Yii::$app->request->post())) {
			        
						$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension;
	$model->thumbnail=$fileName;				
				
				//$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 }
			$model->status='0';
		
			$model->created_at=date('Y-m-d h:i:sa');
			$model->barcode='12345';
			$model->imei='12345';
			$model->created_by= \Yii::$app->util->loggedinUserId();
			$model->conditon='New';
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getProductDirectory($model->id);
					if (!is_dir($directory))
				{ 
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 $imageFile->saveAs($filePath);
				 }
				 
			   \Yii::$app->session->setFlash('success', Yii::t('app',"Your Item created successfully!"));
				
           return $this->redirect(['view', 'id' => $model->id]);
			 }
			 else{
				 print_r($model->getErrors());
				 exit();
			 }
			 
        } 
            
         else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$id=Yii::$app->util->decrypt($_GET['id']);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Feature for products e.g. status to 1

    public function actionFeature(){

    	$this->layout="main-admin";
     $Model = Product::find()->all();
    	
    	return $this->render('feature_products',[
    		'model' => $Model,
    		 

    		]
    		);
    }
    public function actionAccept($pid){
    	$model = $this->findModel($pid);
    	$model->status="1";
    	if($model->save()){
    	\Yii::$app->session->setFlash('success', Yii::t('app',"Featured successfully!"));	
				$data = ['status'=>'success'];
				echo json_encode($data);
				exit;
			}

			
    }
    public function actionReject($pid){
    $model = $this->findModel($pid);
    	$model->status="-1";
    	if($model->save()){
    	\Yii::$app->session->setFlash('success', Yii::t('app',"Un-Featured successfully!"));	
				$data = ['status'=>'success'];
				echo json_encode($data);
				exit;
			}
			
    }


	public function actionPhotoDelete() 
	{
        $id = Yii::$app->util->decrypt($_POST['id']);
		if(!empty($id)){			
			$model = ProductImage::findOne($id);
			$id=$model->product_id;
		
			$directory = Yii::$app->util->getProductgalleryDirectory($id);
			$filepath = $model->img;
			$dir = $directory . $filepath;
			
			
			unlink($dir);
			
			$model->delete();
			$request = Yii::$app->request;
			if ($request->isAjax) {
				
				$data = ['status'=>'success'];
				echo json_encode($data);
				exit;
			}
			
		}
        $data = ['status'=>'error'];
		echo json_encode($data);
		exit;
    }
	
		public function actionGallery($id)
    {
            $this->layout='main-admin';
			//$id="";
       $id=Yii::$app->util->decrypt($id);
        $modelproduct = new ProductImage();
		//$model->id=
             
        if ($modelproduct->load(Yii::$app->request->post()) )
			{
				
					//for upload multi images
                $imageFiles = UploadedFile::getInstances($modelproduct, 'img');
				
				
				$directory = Yii::$app->util->getProductgalleryDirectory($id); 
				
				if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				if(isset($imageFiles) && count($imageFiles) > 0)
				{
					
					
					foreach($imageFiles as $imageFile)
					{
					
						$fileName =  rand() . time() . '.'.  $imageFile->extension;
						
						$productImg = new \app\models\ProductImage();
						$productImg->img = $fileName;
						
						$productImg->product_id = $id;
						
						
						
						
							$filePath = $directory . $fileName;
							
							$imageFile->saveAs($filePath);
							if($productImg->save())
			                {
								
							}else{
								
								print_r($productImg->getErrors());
				                exit;
							}
							
						
					}
					return $this->redirect(['product/']);
				}else{
					print_r("not set");
					exit;
				}
			
       	   }
		   else {
            return $this->render('gallery', [
               
                'modelproduct' => $modelproduct,
				'model'=>$id,
            ]);
    
			}
		}




	// public function actionReviews()
 //    {  
	//     if(\Yii::$app->user->can('')){
	// 		$userId=\Yii::$app->util->loggedinUserId() ;
	// 		$query = GymReviews::find()->where(['status' => 0]);
			
	// 		$provider = new ActiveDataProvider([
	// 			'query' => $query,
	// 			'pagination' => [
	// 				'pageSize' => 10,
	// 			],
	// 		]);
	// 		$this->layout = 'main-admin';
	// 		return $this->render('gymReviews', [
	// 			'dataProvider' => $provider,
	// 		]);
	// 	}	
 //    }


}