<?php

namespace app\controllers;

use Yii;
use app\models\StaffSalary;
use app\models\StaffSalarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Shop;
use app\models\Staff;

/**
 * StaffSalaryController implements the CRUD actions for StaffSalary model.
 */
class StaffSalaryController extends Controller
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
     * Lists all StaffSalary models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout='main-admin';
        $searchModel = new StaffSalarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StaffSalary model.
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
     * Creates a new StaffSalary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout='main-admin';
        $model = new StaffSalary();
			$user_id= \Yii::$app->util->loggedinUserId();

        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->month = $_POST['month'];
			//$model->year = $_POST['year'];
			
			$model->status=1;
			$model->created_at=date('Y-m-d');
			$model->created_by = $user_id;
			$model->pending = $model->total-$model->paid;
			
			if( $model->save())
			{
            return $this->redirect(['index']);
			}else{
				
				print_r($model->getErrors());
				exit;
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StaffSalary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
	 ///to select the city
	 ///to select the city
			public function actionShop($id)
		 {
		  
		  $city=Staff::find()->where(['shop_id'=>$id])->all();
		  
		  echo"<option >Select Shop</option>";
		  if(isset($city))
		  {
		   foreach($city as $c)
		   {
			
			echo"<option value='".$c->id."'>".$c->name."</option>";
			
           }
		  }
		 }
		 	public function actionSalary($id)
		 {
		  
		  $city=Staff::find()->where(['id'=>$id])->one();
		  $pend = StaffSalary::find()->where(['staff_id'=>$id])->orderBy(['id' => SORT_DESC])->one();
		  // $ret = array();
		  // $ret[0]=$city->salary;
		  // $ret[1]=$pend->pending;
		  
		  if(isset($city))
		  {
		   return json_encode(array(
            'salary' => $city->salary,
            'pend' => $pend->pending
        ));
		  
		  }else{
			    echo 0;
		  }
		 }
			
    public function actionUpdate($id)
    {
		$this->layout='main-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
			
        } else {
			
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing StaffSalary model.
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
     * Finds the StaffSalary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StaffSalary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StaffSalary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
