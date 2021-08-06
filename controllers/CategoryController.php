<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
                        'actions' => [''],
                        'allow' => true,
						'roles' => ['?']
                    ],
					[
                        'actions' => ['index','create','update','view','delete'],
                        'allow' => true,
						'roles' => ['@']
                    ],
					[
                        'actions' => ['index','create','update','view','delete'],
                        'allow' => true,
						'roles' => ['admin','admin1','admin2','admin3']
                    ],
                    
                ],
            ],
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'main-admin';
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = 'main-admin';
        $model = new Category();

         if ($model->load(Yii::$app->request->post())) {
			        
					$imageFile = UploadedFile::getInstance($model, 'img');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension; 
				
				//$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 }
			$model->status='0';
			$model->img=$fileName;
			$model->created_at=date('Y-m-d h:i:sa');
			
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getCategoryDirectory($model->id);
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
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout = 'main-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
