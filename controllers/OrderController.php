<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\JSON;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // Cart Work

    public function actionCart()
    {
        
        $shid=$_POST['shid'];
        $prid=$_POST['prid'];
        $brid=$_POST['brid'];
        $type=$_POST['type'];
        $brimei=$_POST['brimei'];
        $totprice=$_POST['totprice'];
        $paidprice=$_POST['paidprice'];
        $fualt=$_POST['fualt'];
        $warranty=$_POST['warranty'];
        $condition=$_POST['condition'];
        $assec=$_POST['assec'];
        $quantity=$_POST['quantity'];
        
        if(!empty($prid))
        {
            //session_start();
            
            $cart=\Yii::$app->cart->addToCart($shid,$prid,$brid,$type,$brimei,$totprice,$paidprice,$fualt,$warranty,$condition,$assec);
           // print_r($_SESSION['sampleCart']);
           //  exit();
            
            if($cart)
            {
                //$data=[];
                $data = ['status'=>'success'];
                //$data = ['data'=> $_SESSION['sampleCart']];
                Yii::$app->session->setFlash('success', Yii::t('app',"Item Added to cart successfully"));
                
                echo json_encode($data);
                exit;
            }
        }else
        {
            print_r('not okk');
            exit;
        }
    }


}
