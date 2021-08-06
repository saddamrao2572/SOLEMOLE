<?php

namespace app\controllers;

use Yii;
use app\models\Brand;
use app\models\BrandSearch;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * BrandController implements the CRUD actions for Brand model.
 */
class BrandController extends Controller
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
                        'actions' => ['listing','all'],
                        'allow' => true,
						'roles' => ['?']
                    ],
					[
                        'actions' => ['index','create','update','view','delete','listing','all'],
                        'allow' => true,
						'roles' => ['@']
                    ],
					[
                        'actions' => ['index','create','update','view','delete','listing','all'],
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                    [
                        'actions' => ['index','create','update','view','delete','listing','all'],
                        'allow' => true,
                        'roles' => ['user']
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
     * Lists all Brand models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'main-admin';
        $searchModel = new BrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
  public function actionAll(){
        $model=new \app\models\BrandSearch();
        $dataProvider = new ActiveDataProvider
         ([
            'query' => \app\models\Brand::find(),
            'sort' => [
           'defaultOrder' => [
            'name' => SORT_ASC,
             ],
              ],
        ]);
    
        return $this->render('all',[
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Brand model.
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

    public function actionListing()
    {
        if(isset($_GET["bid"]))
        {
        $bid=$_GET["bid"];
        $dataProvider = new ActiveDataProvider
         ([
            'query' => \app\models\Product::find()->where(['brand_id'=>$bid]),
            'sort' => [
            'defaultOrder' => [
            //'created_at' => SORT_DESC,
            //'id' =>SORT_DESC,
            'price'=>SORT_DESC,
             ],
              ],
        ]);
        }
        elseif (isset($_GET["price"])) 
        {
            $price=$_GET["price"];
            // print_r($price);
            // exit();
            if ($price=="Greater") 
            {
                $sql="SELECT * FROM product where price > '70,000' ";
                $query=\app\models\Product::findBySql($sql);  
            }
            else
            {
                $price2=str_replace(',', '', $price)+10000;
                

                $sql2="SELECT * FROM product where price >='$price' AND replace(price, ',', '')
                <='$price2' ";
                $query=\app\models\Product::findBySql($sql2);
                // print_r($query);
                // exit();
            }
            $dataProvider = new ActiveDataProvider
            ([
                'query' => $query,
                'sort' => [
               'defaultOrder' => [
                'created_at' => SORT_DESC,
                 ],
                ],
            ]);
            
        }
        elseif (isset($_GET['size'])) 
        {
            $size=$_GET['size'] . ".0 Inches";
            // print_r($size);
            // exit();
            $sql2="SELECT * From product where id in (SELECT product_id FROM product_specification where size >='$size' AND size <= '$size') ";
            $query=\app\models\Product::findBySql($sql2);
            // print_r(count($query));
            // exit();
            $dataProvider = new ActiveDataProvider
            ([
                'query' => $query,
                'sort' => [
               'defaultOrder' => [
                'created_at' => SORT_DESC,
                 ],
                ],
            ]);

        }
        elseif (isset($_GET['ram']))
        {
            $ram=strval($_GET['ram']);
            $searchram="{$ram}%";
            // print_r($searchram);
            // exit();
            $sql2="SELECT * From product where id in (SELECT product_id FROM product_specification where builtin LIKE '$searchram') ";
            // print_r($sql2);
            // exit();
            $query=\app\models\Product::findBySql($sql2);
            // print_r(count($query));
            // exit();
            $dataProvider = new ActiveDataProvider
            ([
                'query' => $query,
                'sort' => [
               'defaultOrder' => [
                'created_at' => SORT_DESC,
                 ],
                ],
            ]);

        }
        else
        {
         $searchModel = new ProductSearch();
    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }

        
        return $this->render('listing',[
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Brand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$this->layout = 'main-admin';
        $model = new Brand();
        
        if ($model->load(Yii::$app->request->post())) {
			        
					$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension; 
				
				//$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 }
			$model->status='0';
			$model->thumbnail=$fileName;
			$model->created_at=date('Y-m-d h:i:sa');
			
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getBrandDirectory($model->id);
					if (!is_dir($directory))
				{ 
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
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
     * Updates an existing Brand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout = 'main-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			        
					$imageFile = UploadedFile::getInstance($model, 'thumbnail');
			       
				if(isset($imageFile) ) 
				{ 
				$fileName =rand(1000,99999999).'.'. $imageFile->extension; 
				
				//$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
				 }
			$model->status='0';
			$model->thumbnail=$fileName;
			$model->created_at=date('Y-m-d h:i:sa');
			
			
			 if($model->save())
			 {
				 
				  $directory = Yii::$app->util->getBrandDirectory($model->id);
					if (!is_dir($directory))
				{ 
				  FileHelper::createDirectory($directory);
				} 
				if(isset($imageFile) ) 
				{ 
				// $fileName =$model->title . '-'. rand().'.'. $imageFile->extension; 
				
				$filePath = $directory . $fileName; $model->thumbnail = $fileName; 
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brand model.
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
     * Finds the Brand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
