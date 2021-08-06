<?php

namespace app\controllers;

use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
 use yii\helpers\FileHelper;
 use yii\web\UploadedFile; 

/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
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
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {				$this->layout = 'main-admin';

        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {				$this->layout = 'main-admin';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
				$this->layout = 'main-admin';
				$id= \Yii::$app->util->loggedinUserId();

        $model = new Staff();
       $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         if ($model->load(Yii::$app->request->post()))
			{
				$imageFile = UploadedFile::getInstance($model, 'thumbnail');
	            $directory = Yii::$app->util->getStaffDirectory($model->id);
				if (!is_dir($directory)) { FileHelper::createDirectory($directory); }
				if(isset($imageFile) ) 
		         {
            $fileName = rand().'.'. $imageFile->extension; 
     			 $filePath = $directory . $fileName;
				 $model->thumbnail= $fileName;
         	     }
				 
				 $imageFile->saveAs($filePath); 
				 \Yii::$app->session->setFlash('success', Yii::t('app',"Your Staff created successfully!"));
				  
				  $model->created_at=date("Y-m-d h:i:sa");
               $model->created_by=($id);
               $model->status=1;
			   
			   // print_r($model->contect);
			   // exit;
					if( $model->save())
			       {
                            return $this->redirect(['index']);
			       }
			else{
					
					print_r($model->getErrors());
					exit;
				}
				
			}
		
		
		else {
            return $this->render('create', [
                'model' => $model,
				'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }


    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {				$this->layout = 'main-admin';

        $model = $this->findModel($id);
      $id = \Yii::$app->util->loggedinUserId();
       $perimg= $model->thumbnail;
      
	  if ($model->load(Yii::$app->request->post())) 
		{
			
			$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			if(isset($imageFile))
			{
			
	   $directory = Yii::$app->util->getPostDirectory($model->id);
         if (!is_dir($directory)) { FileHelper::createDirectory($directory); }
		 if(isset($imageFile) ) 
		 { 
            $fileName = rand().'.'. $imageFile->extension; 
			 $filePath = $directory . $fileName;
			 $model->thumbnail = $fileName;
         	 $imageFile->saveAs($filePath);
			 }
			 
			}else{
				 $model->thumbnail=$perimg;
			}
          
		  \Yii::$app->session->setFlash('success', Yii::t('app',"Your Staff Update successfully!"));

			           $model->created_at=date("Y-m-d h:i:sa");

                        $model->created_by=($id);
			            $model->status=1;
			
			
			
			
			if( $model->save())
			{
            return $this->redirect(['staff/index'
			]);
			}
		}
		
		else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
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
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
