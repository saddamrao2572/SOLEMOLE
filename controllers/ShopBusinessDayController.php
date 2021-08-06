<?php

namespace app\controllers;

use Yii;
use app\models\ShopBusinessDay;
use app\models\Shop;
use app\models\ShopSearch;
use app\models\ShopBusinessDaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * ShopBusinessDayController implements the CRUD actions for ShopBusinessDay model.
 */
class ShopBusinessDayController extends Controller
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
                        'actions' => ['index','create','update','view','delete','gallery','shopbusinessdayoperations'],
                        'allow' => true,
						'roles' => ['@']
                    ],
					[
                        'actions' => ['index','create','update','view','delete','shopbusinessdayoperations'],
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
     * Lists all ShopBusinessDay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main-admin';
        $searchModel = new ShopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopBusinessDay model.
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
     * Creates a new ShopBusinessDay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = 'main-admin';
        $model = new ShopBusinessDay();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShopBusinessDay model.
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
     * Deletes an existing ShopBusinessDay model.
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
     * Finds the ShopBusinessDay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ShopBusinessDay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		$this->layout = 'main-admin';
        if (($model = ShopBusinessDay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
		   public function actionShopbusinessdayoperations()
    {
		$this->layout='main-admin';
		 $id = \Yii::$app->util->loggedinUserId();
		 $model = new Shop();
		//$facilityItems = $model->branchFacilities;
		//$opItems = $model->branchOperationalInfos;
		
		if(!isset($opItems) || count($opItems) <= 0)
		{
			$businessDays = \app\models\BusinessDay::find()->all();
			foreach($businessDays as $businessDay) {
				$branchInfo = new \app\models\BranchOperationalInfo;
				
				$branchInfo->business_day_id = $businessDay->id;
				$opItems[] = $branchInfo;
			}
		}

	
        
	    if ($model->load(Yii::$app->request->post())) {
			
		$info=$_POST["BranchOperationalInfo"];
		$new_entry=true;
		$facilities=$_POST["Branch"];
		//Start update check
		$bid=$info[0]["branch_id"];;
		$sql = "SELECT * FROM branch_operational_info where branch_id='$bid' ";
				$operations = \app\models\BranchOperationalInfo::findBySql($sql)->all();
				if(isset($operations)){
					$new_entry=false;
					$i=0;
					foreach( $operations as $operation)
		{	
			$bid=$info[$i]["branch_id"];
			$operation->business_day_id=$info[$i]["business_day_id"];
			$operation->branch_id=$bid;
			$operation->start_hour=$info[$i]["start_hour"];
			$operation->end_hour=$info[$i]["end_hour"];
			$operation->created_by=Yii::$app->util->loggedinUserId();
			if($operation->save(false))
			{
				\Yii::$app->session->setFlash('success', Yii::t('app',"Operational Information Saved successfully!"));	
			
			}else{var_dump($operation->getErrors());}
			$i++;
		}
		//check for facilities
		$sql = "SELECT * FROM branch_facility where branch_id='$bid' ";
				$old_facilities	= \app\models\BranchFacility::findBySql($sql)->all();
				if(isset($old_facilities)){
					
					//delete previous facilities
					foreach( $old_facilities as $old_facility)
		{	
		
			$old_facility->delete();
		
		}
			$i=0;
			//add new facilities
			
			foreach( $facilities["facilityIds"] as $facility)
			{	
			
			$branchFacilities = new \app\models\BranchFacility;
			$branchFacilities->branch_id=$bid;		
			$branchFacilities->facility_id=$facility;
			$branchFacilities->created_by=Yii::$app->util->loggedinUserId();
			if($branchFacilities->save())
			{
	
			
			}else{var_dump($branchFacilities->getErrors());}
				
				$i++;	
				}
				}			
				}				
				//new Entry comes here
				else{
					
	foreach( $facilities as $facility)
			{	
			
			$branchFacilities = new \app\models\BranchFacility;
			$branchFacilities->branch_id=$info[0]["branch_id"];		
			$branchFacilities->facility_id=$facility[0];
			$branchFacilities->created_by=Yii::$app->util->loggedinUserId();
			if($branchFacilities->save())
			{
	
				
			}else{var_dump($branchFacilities->getErrors());}
			
			
				
			}
	
		for($i=0;$i<count($info);$i++)
		{
			$branchInfo = new \app\models\BranchOperationalInfo;
		$bid=$info[$i]["branch_id"];
	
			$branchInfo->business_day_id=$info[$i]["business_day_id"];
			$branchInfo->branch_id=$bid;
			$branchInfo->start_hour=$info[$i]["start_hour"];
			$branchInfo->end_hour=$info[$i]["end_hour"];
			$branchInfo->created_by=Yii::$app->util->loggedinUserId();
			if($branchInfo->save(false))
			{
				\Yii::$app->session->setFlash('success', Yii::t('app',"Operational Information Saved successfully!"));	
			
			}else{var_dump($branchInfo->getErrors());}
			//echo "::<br>";
		}
				}	
	if($new_entry==true){echo '<script>alert("Operations Set Successfully");</script>';}
	else{echo '<script>alert("Operations Setting updated Successfully");</script>';}
			 return $this->render('branchoperations', [
                 'model' => $model,
				'opItems' => $opItems,
            ]);
        }
		   else {
            return $this->render('branchoperations', [
                 'model' => $model,
				'opItems' => $opItems,
            ]);
        }
	}
}
