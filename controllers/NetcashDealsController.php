<?php

namespace app\controllers;

use Yii;
use app\models\NetcashDeals;
use app\models\NetcashDealsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ProductDeals;
use app\models\Product;

/**
 * NetcashDealsController implements the CRUD actions for NetcashDeals model.
 */
class NetcashDealsController extends Controller
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
     * Lists all NetcashDeals models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout='main-admin';
        $searchModel = new NetcashDealsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
			public function actionSelectname()
		{
					$this->layout = "main-admin";
					
					if(isset($_GET['select'])){
					$selected = $_GET['select'];
					}else{
					$selected = 0; 
					}
				
					$ids = Yii::$app->session['model'];
					print($ids);
					
					$model = \app\models\Product::find()->where(['id'=>$ids])->all();
					return $this->render('chosename',[
					'model' => $model,
					'selected' => $selected,
					]);
					

		}
		
		
		public function actionSearchtwo()
			{

			$keyword = strval($_POST['query']);

			$term = $keyword;
			if (Yii::$app->request->isAjax) {
				
			$products = \app\models\Product::find()
			->where(['LIKE', 'name', $term . '%' ,false])
			->andwhere(['status'=>0])->all();

			if(isset($products)&& count($products) > 0){
				
			foreach($products as $product) {
				
			$results[] = $product->name;
			//$price[] = $product->price;
			}
			
			echo json_encode( $results);
			
			}else{
				
			$results[] = 'No Result Found';
			echo json_encode($results);
			
			}
			}
			}

    /**
     * Displays a single NetcashDeals model.
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
	
	 public function actionProductInfo()
    {
		$this->layout='main-admin';
		
		 //$model = new NetcashDeals();
		 if(isset($_POST['name']))
		 {
			 
			 $proname = $_POST['name'];
			 $product = Product::find()->where(['name'=>$proname])->all();
			
			 
		 echo Yii::$app->controller->renderPartial('product-info',[
			
			'product'=>$product,
			
			]);
            exit;
		 }
		 
		// $modelproduct = new ProductDeals();
		
      
		//return $this->render('temp_deals');
    }
	
	 public function actionTempDeals()
    {
		$this->layout='main-admin';
		
		 $model = new NetcashDeals();
		 
		 $modelproduct = new ProductDeals();
		
      
		return $this->render('temp_deals', [
                'model' => $model,
                'modelproduct' => $modelproduct,
            ]);
    }

    /**
     * Creates a new NetcashDeals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout='main-admin';
        $model = new NetcashDeals();
        	$id = \Yii::$app->util->loggedinUserId();
        if ($model->load(Yii::$app->request->post())  ) {
			
			$model->status=1;
			$model->created_at=date('Y-m-d');
			$model->created_by = $id;
			
			if($model->save())
			{
				 \Yii::$app->session->setFlash('success', Yii::t('app',"Deal  Confirmed  successfully!"));
					
			 return $this->redirect(['/netcash-deals/temp_deals']);		
			 
		     }else{
				 
				 print_r($model->getErrors());
				 exit;
			 }

		}			 else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NetcashDeals model.
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
     * Deletes an existing NetcashDeals model.
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
     * Finds the NetcashDeals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NetcashDeals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NetcashDeals::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
