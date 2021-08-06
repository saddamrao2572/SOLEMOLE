<?php

namespace app\controllers;

use Yii;
use app\models\Articals;
use app\models\ArticalsImages;
use app\models\ArticalsSearch;
use app\models\ArticalSubcategory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use app\models\Model;
use yii\filters\AccessControl;



/**
 * ArticalsController implements the CRUD actions for Articals model.
 */
class ArticalsController extends Controller
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
                        'actions' => ['all','about','login','single','detail'],
                        'allow' => true,
						'roles' => ['?']
                    ],
					[
                        'actions' => ['create','sub','index','about','logout','all','single','detail','city'],
                        'allow' => true,
						'roles' => ['@']
                    ],
					[
                        'actions' => ['create','city','update','delete','all','single','index','detail','sub'],
                        'allow' => true,
						'roles' => ['admin']
                    ],
                    
                ],
            ],
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articals models.
     * @return mixed
     */
	 ///to select the city
			public function actionCity($id)
		 {
		  
		  $city=ArticalSubcategory::find()->where(['artical_category_id'=>$id])->all();
		  
		  echo"<option >Select City</option>";
		  if(isset($city))
		  {
		   foreach($city as $c)
		   {
			
			echo"<option value='".$c->id."'>".$c->name."</option>";
			
           }
		  }
		 }
    public function actionIndex()
    {
		$this->layout='main-admin';
        $searchModel = new ArticalsSearch();
		
		$user_id = \Yii::$app->util->loggedinUserId();
		if(\Yii::$app->user->can('admin'))
		
		{
			 $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		}else{
			$query= Articals::find()->where(['created_by'=>$user_id]);
			
        $dataProvider = new ActiveDataProvider([
		  'query' => $query,
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
		}
       

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articals model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		 $this->layout='main-admin';
		$searchModel = new ArticalsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
        $model = new Articals();
       
		$id = \Yii::$app->util->loggedinUserId();
 
        if ($model->load(Yii::$app->request->post())  ) {
			
			$imageFile = UploadedFile::getInstance($model, 'thumbnail');

			$directory = Yii::$app->util->getArticalsDirectory();
			
			if (!is_dir($directory))
			{ 
			  FileHelper::createDirectory($directory);
			} 
			if(isset($imageFile) ) 
			{ 
         $fileName = rand().'.'. $imageFile->extension; 
		 $filePath = $directory . $fileName; 
		 $model->thumbnail = $fileName; 
		 }
		 $imageFile->saveAs($filePath);
		 
		 $model->created_at=date('Y-m-d');
		 $model->status=0;
		 $model->created_by=$id;
	   
			if($model->save())
			{
				
			return $this->redirect(['index']);
            
        }else{
			
			print_r($model->getErrors());
			exit;
		}


		}else {
            return $this->render('create', [
                'model' => $model,
				
               
            ]);
        }
    }

    /**
     * Updates an existing Articals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$id = Yii::$app->util->decrypt($id);
		// print_r();
		// exit;
		$user_id = \Yii::$app->util->loggedinUserId();
		if(\Yii::$app->user->can('admin'))
		
		{
			 $this->layout='main-admin';
		}
		else
		{	
       			$this->layout='main-user';

		}
		
		
        $model = $this->findModel($id);
		$perimg = $model->thumbnail;

        if ($model->load(Yii::$app->request->post()) ) {
			
			
			
			////////////////
			
			$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			if(isset($imageFile))
			{

			$directory = Yii::$app->util->getArticalsDirectory();
			
			if (!is_dir($directory))
			{ 
			  FileHelper::createDirectory($directory);
			} 
			if(isset($imageFile) ) 
			{ 
         $fileName = rand().'.'. $imageFile->extension; 
		 $filePath = $directory . $fileName; 
		 $model->thumbnail = $fileName; 
		 }
		 $imageFile->saveAs($filePath);
			}else{
				
				
				$model->thumbnail=$perimg;
			}
		 
		 $model->created_at=date('Y-m-d');
		 $model->status=0;
		 $model->created_by=$user_id;
		 ////////
			if( $model->save())
			{
			
			
            return $this->redirect(['index']);
			}
        } else {
		
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	
	
	public function actions()
{
    return [
        // 'images-get' => [
            // 'class' => 'vova07\imperavi\actions\GetImagesAction',
            // 'url' => '/uploads', // Directory URL address, where files are stored.
            // 'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        // ],
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
            'url' => '/uploads', // Directory URL address, where files are stored.
            'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        ],
        'file-delete' => [
            'class' => 'vova07\imperavi\actions\DeleteFileAction',
            'url' => '/uploads', // Directory URL address, where files are stored.
            'path' => '@webroot/uploads', // Or absolute path to directory where files are stored.
        ],
    ];
}


    /**
     * Deletes an existing Articals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		
		$id = Yii::$app->util->decrypt($id);
        $this->findModel($id)->delete();
		Yii::$app->session->setFlash('success', Yii::t('app',"Item Deleted Successfully!"));	

        return $this->redirect(['index']);
    }
	
	
	public function actionAlready()
	{
		return [
			'images-get' => [
				'class' => 'vova07\imperavi\actions\GetImagesAction',
				'url' => '/uploads', // Directory URL address, where files are stored.
				'path' => '@alias/uploads', // Or absolute path to directory where files are stored.
				'options' => ['only' => ['*.jpg', '*.jpeg', '*.png', '*.gif', '*.ico']], // These options are by default.
			],
		];
	}
	// DefaultController.php
public function actionUpload()
{
    return [
        'image-upload' => [
            'class' => 'vova07\imperavi\actions\UploadFileAction',
			'url' => '/uploads', // Directory URL address, where files are stored.
			'path' => '@alias/uploads', // Or absolute path to directory where files are stored.
        ],
    ];
}
	
	public function actionAll()
    {
		$session = Yii::$app->session;
		$user_id = \Yii::$app->util->loggedinUserId();
		$searchModel = new \app\models\ArticalsSearch;
		$searchModel->status = 0 ;
		
		if(isset($_GET['category']))
		{
			$category =$_GET['category'];
			$lang = $_GET['lang'];
					if(isset($_GET['lang']))
				   {
			$query = Articals::find()->where(['category_id'=>$category ,'language'=>$lang]);
				   }else{
					  
				  $query = Articals::find()->where(['category_id'=>$category,'language'=>$lang]);
				   }
		 
		}else{
					if(isset($_GET['lang']))
				   {
					   $lang = $_GET['lang'];
					   // print_r($lang);
					   // exit;
					   
					    $session->set('lang'.$user_id, $lang);

				
				  $query = Articals::find()->where(['language'=>$lang]);
				   }else{
						$query = Articals::find();
					   
				   }
		  
		}
		
		$dataProvider = new ActiveDataProvider([
		  'query' => $query,
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
		
			
        return $this->render('articals', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
    }
	//single with slug
	public function actionSingle($slug)
    {
		
			$model= Articals::find()->where(['slug'=>$slug])->one();
			
			\Yii::$app->view->registerMetaTag(['property'=>"og:title", 'content'=>$model->title],"og:title");
			\Yii::$app->view->registerMetaTag(['property'=>"og:description", 'content'=>strip_tags($model->content)],"og:description");
			//image remaining
			if(isset($thumbnail)){
				\Yii::$app->view->registerMetaTag(['property'=>"og:image", 'content'=>Url::to(['/articals/uploads/'.$model->thumbnail],true)],"og:image");
				\Yii::$app->view->registerMetaTag(['property'=>"og:image:width","content"=>"650"],"og:image:width");//650
				\Yii::$app->view->registerMetaTag(['property'=>"og:image:height", "content"=>"350"],"og:image:height");//350
			}
			\Yii::$app->view->registerMetaTag(['property'=>"og:url", 'content'=>\Yii::$app->urlManager->createAbsoluteUrl(['/articals/'.$model->slug])],"og:url");
			\Yii::$app->view->registerMetaTag(['property'=>"og:type", 'content'=>'articals'],"og:type");
			//$review = \app\models\GymReviews::find()->byUserbyGym(\Yii::$app->util->loggedinUserId(), $model->id);
		
			
			
			
        return $this->render('articals_details',[
		'model' => $model
		]);
    }
	
	//single with the id
	
	public function actionDetail($id)
    {
		// print_r($id);
			// exit;
			$id= Yii::$app->util->decrypt($id);
		
			$model= Articals::find()->where(['id'=>$id])->one();
			
			
        return $this->render('articals_details',[
		'model' => $model
		]);
    }
////sub categiry loaded post
public function actionSub()
    {
		$searchModel = new \app\models\ArticalsSearch;
		$searchModel->status = 0 ;
		$session = Yii::$app->session;
		$user_id = \Yii::$app->util->loggedinUserId();
		
		
		$language= $session->get('lang'.$user_id);
		
		
		
		
		if(isset($_GET['sbcate'])  && isset($_GET['category']))
		{
		
			$category =$_GET['category'];
			$sbcate = $_GET['sbcate'];
			
			// print_r($sbcate);
			// exit;
			 $dataProvider = new ActiveDataProvider([
		  'query' => Articals::find()->where(['category_id'=>$category,'sub_category_id'=>$_GET['sbcate'] ,'language'=>$language]),
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
		}else{
			$category =$_GET['category'];
        $dataProvider = new ActiveDataProvider([
		  'query' =>Articals::find()->where(['category_id'=>$category ,'language'=>$language]),
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
		}
			
        return $this->render('articals', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
    }


    /**
     * Finds the Articals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articals::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
