<?php

namespace app\controllers;

use Yii;
use app\models\Facility;
use app\models\FacilitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * FacilityController implements the CRUD actions for Facility model.
 */
class FacilityController extends Controller
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
     * Lists all Facility models.
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'main-admin';
        $searchModel = new FacilitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Facility model.
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
     * Creates a new Facility model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = 'main-admin';
        $model = new Facility();
          $user_id =Yii::$app->util->loggedinUserId();
		  
        if ($model->load(Yii::$app->request->post()) ) {
			
			$model->created_at=date('Y-m-d');
			$model->created_by=$user_id;
			$model->status=1;
			
			if($model->save())
			{
				Yii::$app->session->setFlash('success', Yii::t('app',"Facility created successfully!"));	
				
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
     * Updates an existing Facility model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout = 'main-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			
            Yii::$app->session->setFlash('success', Yii::t('app',"Facility Updated successfully!"));	
				
				return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Facility model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		$this->layout = 'main-admin';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Facility model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Facility the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
		$this->layout = 'main-admin';
        if (($model = Facility::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
