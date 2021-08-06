<?php

namespace app\controllers;

use Yii;
use app\models\ProductDeals;
use app\models\ProductDealsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Product;

/**
 * ProductDealsController implements the CRUD actions for ProductDeals model.
 */
class ProductDealsController extends Controller
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
     * Lists all ProductDeals models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout='main-admin';
        $searchModel = new ProductDealsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductDeals model.
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
     * Creates a new ProductDeals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout='main-admin';
        $model = new ProductDeals();
		$user_id = \Yii::$app->util->loggedinUserId();

        if ($model->load(Yii::$app->request->post())  ) {
			
			
			
			if(isset($_POST['select']))
			{
				$pro_id = $_POST['select'];
				$count=0;
				$model2=$model;
				foreach($pro_id as $pro)
				{
					
			      $model->product_id= $pro;
				  $detail = Product::find()->where(['id'=>$pro])->one();
				  $model->imi= $detail->imei;
				  $model->price= $detail->price;
				  
				  $model->status=1;
				  $model->created_at=date('Y-m-d');
				  $model->created_by=$user_id;
				  
				 $model->shop_name=$model2->shop_name;
				 $model->person_name=$model2->person_name;
				 $model->contact_no=$model2->contact_no;
				  
					if($model->save())
					{
						 \Yii::$app->session->setFlash('success', Yii::t('app',"Deal  Confirmed  successfully!"));
						 return $this->redirect(['/netcash-deals/temp-deals']);
						
					}else{
						print_r($model->getErrors());
						exit;
					}
				}
			}
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductDeals model.
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
     * Deletes an existing ProductDeals model.
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
     * Finds the ProductDeals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductDeals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductDeals::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
