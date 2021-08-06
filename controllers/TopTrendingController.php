<?php

namespace app\controllers;

use Yii;
use app\models\TopTrending;
use app\models\TopTrendingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
/**
 * TopTrendingController implements the CRUD actions for TopTrending model.
 */
class TopTrendingController extends Controller
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
     * Lists all TopTrending models.
     * @return mixed
     */
    public function actionIndex()
    {
				$this->layout = 'main-admin';

        $searchModel = new TopTrendingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TopTrending model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
				$this->layout = 'main-admin';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TopTrending model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = 'main-admin';
        $model = new TopTrending();

       
			

        if ($model->load(Yii::$app->request->post())) {
			        
					$imageFile = UploadedFile::getInstance($model, 'img');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension; 
				
				//$filePath = $directory . $fileName; $model->img = $fileName; 
				 }
			
			$model->img=$fileName;
			
			
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getToptrendingDirectory($model->id);
					if (!is_dir($directory))
				{ 
			
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->img = $fileName; 
				 }
				 
			   $imageFile->saveAs($filePath); \Yii::$app->session->setFlash('success', Yii::t('app',"Your Item created successfully!"));
				
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
     * Updates an existing TopTrending model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
				$this->layout = 'main-admin';
	      
       
              
        $model = $this->findModel($id);
        
         if ($model->load(Yii::$app->request->post())) {
			        
						$imageFile = UploadedFile::getInstance($model, 'img');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension;
	$model->img=$fileName;				
				
				//$filePath = $directory . $fileName; $model->img = $fileName; 
				 }
			
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getToptrendingDirectory($model->id);
					if (!is_dir($directory))
				{ 
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->img = $fileName; 
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
     * Deletes an existing TopTrending model.
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
     * Finds the TopTrending model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TopTrending the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TopTrending::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
