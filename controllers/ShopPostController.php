<?php

namespace app\controllers;

use Yii;
use app\models\ShopPost;
use app\models\ShopPostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile; 
use yii\helpers\FileHelper;
use app\models\ShopImg;

/**
 * ShopPostController implements the CRUD actions for ShopPost model.
 */
class ShopPostController extends Controller
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
     * Lists all ShopPost models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout='main-admin';
        $searchModel = new ShopPostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopPost model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$this->layout='main-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ShopPost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout='main-admin';
        $model = new ShopPost();
        $storiesimage = new ShopImg();
		$id = \Yii::$app->util->loggedinUserId();



        if ($model->load(Yii::$app->request->post())  ) {
			
			$model->created_at= date('Y-m-d');
			$model->status= 0;
			$model->created_by= $id;
			
			
	    $imageFile = UploadedFile::getInstance($model, 'thumnail');
		$directory = Yii::$app->util->getShoppostDirectory();
	
		if (!is_dir($directory))
		{ 
		  FileHelper::createDirectory($directory);
		} 
		if(isset($imageFile) ) 
		{ 
         $fileName ='-'. rand().'.'. $imageFile->extension;
		 $filePath = $directory . $fileName;
		 $model->thumnail = $fileName; 
		 }
		 
       $imageFile->saveAs($filePath);
	   
	   if($model->save())
	   {
		   
		   $storiesimage->shop_id = $model->id;
		   
		   $imageFiles1 = UploadedFile::getInstances($storiesimage, 'img');
				
				$directory = Yii::$app->util->getShoppostDirectory(); 
				
				if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				if(isset($imageFiles1) && count($imageFiles1) > 0)
				{
					
					foreach($imageFiles1 as $imageFile1)
					{
					
						$fileName1 =  rand().time() . '.'.  $imageFile1->extension;
						$storiesImage1 = new \app\models\ShopImg();
						$storiesImage1->img = $fileName1;
						$storiesImage1->shop_id = $model->id;
						
						
							$filePath1 = $directory . $fileName1;
							
							$imageFile1->saveAs($filePath1);
							if($storiesImage1->save())
			                {
								
							}else{
								print_r("stories");
								print_r($storiesImage1->getErrors());
				                exit;
							}
							
						
					}
				}else{
					print_r("not set baba g");
					exit;
				}
		   
		   
		   
		   
		   \Yii::$app->session->setFlash('success', Yii::t('app',"Post created successfully!"));
		    return $this->redirect(['index']);
		   
	   }else{
		   
		   print_r("model");
		   print_r($model->getErrors());
		   exit;
	   }
			
           
        } else {
            return $this->render('create', [
                'model' => $model,
                'storiesimage' => $storiesimage,
            ]);
        }
    }
	
	

    /**
     * Updates an existing ShopPost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout='main-admin';
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
     * Deletes an existing ShopPost model.
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
     * Finds the ShopPost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopPost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ShopPost::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
