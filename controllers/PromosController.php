<?php

namespace app\controllers;

use Yii;
use app\models\Promos;
use app\models\PromosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile; 
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;

/**
 * PromosController implements the CRUD actions for Promos model.
 */
class PromosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Promos models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout="main-admin";
        $searchModel = new PromosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Promos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
     	$this->layout="main-admin";
          
	return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Promos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
			$this->layout="main-admin";

        $model = new Promos();
		$user_id = \Yii::$app->util->loggedinUserId();

        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->status=1;
			$model->created_by=$user_id;
			$model->created_at=date('Y-m-d');
			
			
	    $imageFile = UploadedFile::getInstance($model, 'video');
		$directory = Yii::$app->util->getPromoDirectory($model->id);
	
		if (!is_dir($directory))
		{ 
		  FileHelper::createDirectory($directory);
		} 
		if(isset($imageFile) ) 
		{ 
         $fileName ='-'. rand().'.'. $imageFile->extension; 
		 $filePath = $directory . $fileName;
		 $model->video = $fileName; 
		 }
		 
       $imageFile->saveAs($filePath);
	   \Yii::$app->session->setFlash('success', Yii::t('app',"video uploaded  successfully!"));
	   if( $model->save())
	   {
		   
		  return $this->redirect(['index']);  
	   }else{
		   
		   
	   }
			
			
           
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Promos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	 
	 public function actionPromoVideos()
    {
		$this->layout="main-admin";
		$searchModel = new \app\models\PromosSearch;
		
		
        $dataProvider = new ActiveDataProvider([
		  'query' => Promos::find(),
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
			
        return $this->render('admin_videos', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
    }
	//for the user promo video
	 public function actionPromoVideo()
    {
		
		$searchModel = new \app\models\PromosSearch;
		
		
        $dataProvider = new ActiveDataProvider([
		  'query' => Promos::find(),
		  'sort' => [
			'defaultOrder' => [
				'id' => SORT_DESC,
					],
				  ],
				]);
			
        return $this->render('user_promo', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel
		]);
    }
    public function actionUpdate($id)
    {
			$this->layout="main-admin";

        $model = $this->findModel($id);
		$per_video = $model->video;
		

        if ($model->load(Yii::$app->request->post())) {
			
			
			
			
			
	    $imageFile = UploadedFile::getInstance($model, 'video');
		
		if(isset($imageFile))
		{
		$directory = Yii::$app->util->getPromoDirectory($model->id);
	

		if (!is_dir($directory))
		{ 
		  FileHelper::createDirectory($directory);
		} 
		if(isset($imageFile) ) 
		{ 
         $fileName ='-'. rand().'.'. $imageFile->extension; 
		 $filePath = $directory . $fileName;
		 $model->video = $fileName; 
		 }
		 
       $imageFile->saveAs($filePath);
	   \Yii::$app->session->setFlash('success', Yii::t('app',"video uploaded  successfully!"));
	   
	         $model->status=1;
			$model->created_by=$user_id;
			$model->created_at=date('Y-m-d');
			
		}else{
			
			$model->video=$per_video;
		}
			
			if( $model->save())
			{
				return $this->redirect(['index']);
				
			
			}else{
				
				
			}
			
			
			
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Promos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Promos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Promos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Promos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
