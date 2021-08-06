<?php

namespace app\controllers;

use Yii;
use app\models\SalesPurchase;
use app\models\SalesPurchaseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;
 use yii\filters\AccessControl;

/**
 * SalesPurchaseController implements the CRUD actions for SalesPurchase model.
 */
class SalesPurchaseController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout' , 'index','view','update', 'delete', 'customer-info' ,'addtocart'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout' , 'index','view','update', 'delete' ],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    
                    [
                        'actions' => ['index' , 'create','view','update', 'customer-info','addtocart'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
            'eauth' => [
                // required to disable csrf validation on OpenID requests
                'class' => \nodge\eauth\openid\ControllerBehavior::className(),
                'only' => ['login'],
            ],
        ];
    }

    /**
     * Lists all SalesPurchase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout="main-admin";
        $searchModel = new SalesPurchaseSearch();
        $model= new SalesPurchase();
        $dataProvider = new ActiveDataProvider([
              'query' => SalesPurchase::find(),
              'pagination' => [
                    'pageSize' => 10,
                ],
              'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                        ],
                      ],
                    ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single SalesPurchase model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout="main-admin";
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SalesPurchase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout="main-admin";
        $model = new SalesPurchase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SalesPurchase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   $model = $this->findModel($id);
        $this->layout="main-admin";
        $user_id=\Yii::$app->util->loggedinUserId();
        //$buysell=new \app\models\SalesPurchase();
        if (isset($_POST['btn_buysell'])) 
        {
            $model->product_id=$_POST['productid'];
            $model->shop_id=$_POST['shopid'];
            $model->brand_id=$_POST['brandid'];
            $model->nickname=$_POST['nickname'];
            $model->imei=$_POST['imei'];
            $model->type=$_POST['type'];
            $model->cnic=$_POST['cnic'];
            $model->price=$_POST['price'];
            $model->paid=$_POST['paid'];
            $model->discount=$_POST['discount'];
            $model->fault=$_POST['fualt'];
            $model->condition=$_POST['condition'];
            $model->contact=$_POST['contact'];
            $model->warranty=$_POST['warranty'];
            $model->created_by=$user_id;
            if ($_POST['type']=='sell') 
            {
                $model->name=$_POST['sellername'];
            }
            elseif ($_POST['type']=='purchase') 
            {
                $model->name=$_POST['customername'];
            }
            $model->status='0';

            $model->created_at=date('Y-m-d');
            $model->month=date('m');
            $model->year=date('Y');

            if($model->save())
            {
                    
                    return $this->redirect(['details', 'id' => $model->id]);  
                    
                 }  
                else
                {
                    print_r($model->getErrors());
                    exit();
                }

            
        }

    return $this->render('update', [
         'model' => $model,
        ]);
        
    }

    /**
     * Deletes an existing SalesPurchase model.
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
     * Finds the SalesPurchase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SalesPurchase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SalesPurchase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSelectproduct()
    {
        $this->layout="main-admin";

        $shop_id=$_GET['shop'];
        $model=  new \app\models\SalesPurchase;
        $modelcustomer=new \app\models\Customer;


        return $this->render('selectproduct' ,[
            'model'=>$model,
            'shop' =>$shop_id,
            'modelcustomer'=> $modelcustomer,
        ]);
    }


    public function actionSearch()
    {

      $keyword = strval($_POST['query']);

      $search_param = "{$keyword}%";
      // print_r($search_param);
      // exit();
       $sql = "SELECT shop_product.*,  product.`name`, product.id,product.imei,shop_product_imei.* FROM shop_product , product , shop_product_imei WHERE shop_product.product_id = product.id AND shop_product_imei.cndition = 'old'
         AND (product.name  LIKE '$search_param' OR  product.imei  LIKE '$search_param') ";
      //$sql = "SELECT id,name,imei FROM product WHERE  AND type='old'";
      
      $query=\app\models\Product::findBySql($sql)->all();
  
     
      if (isset($query) && $query!=null) {
        foreach ($query as $row) {
         
        $Product[] = $row->name;
        }
        echo json_encode($Product);
        }
    }


     public function actionValueget($pn)
    {
        
        $pn=$_GET['pn'];
        // print($pn);
        // exit();
        $product=new \app\models\Product();
        $product=\app\models\Product::find()->where(['name' => $pn])->one();
        $model=  new \app\models\SalesPurchase;

        $shoproduct=\app\models\ShopProduct::find()->where(['product_id'=>$product->id])->one();
        

        return $this->renderPartial('valueget', [
            'product'=>$product,
            'shoproduct'=> $shoproduct,
            'model' => $model,
            
        ]);
        
    }

    public function actionCustomerInfo()
    {

        // print_r('cch');
        // exit();
        $user_id=\Yii::$app->util->loggedinUserId();
        $cusrecord=new \app\models\Customer();
        if (isset($_POST['btn_buysell'])) 
        {
           // $transaction = Yii::$app->db->beginTransaction();
            
            $cusrecord->shop_id=$_POST['shopid'];
            $cusrecord->created_by=$user_id;
            $cusrecord->status='1';
            $cusrecord->created_at= date('Y-m-d');
            $cusrecord->cnic=$_POST['cnic'];
            $cusrecord->mobile=$_POST['contact'];
            $cusrecord->name=$_POST['cusname'];
            // customer Image
            $imageFile = UploadedFile::getInstanceByName('img');
                if(isset($imageFile) ) 
                { 
                $fileName =rand(000,99999999).date('Y-m-d').'.'. $imageFile->extension; 
               
                $cusrecord->img = $fileName; 
                
                }

            // CNIC front Image
            $imageFile2 = UploadedFile::getInstanceByName('cnicimg_front');
                   
                if(isset($imageFile2) ) 
                { 
                $fileName2 =rand(000,99999999).date('Y-m-d').'.'. $imageFile2->extension; 
               
                $cusrecord->cnicimg_front = $fileName2; 
                
                }

            // CNIC back Image
            $imageFile3 = UploadedFile::getInstanceByName('cnicimg_back');
                   
                if(isset($imageFile3) ) 
                { 
                $fileName3 =rand(000,99999999).date('Y-m-d').'.'. $imageFile3->extension; 
               
                $cusrecord->cnicimg_back = $fileName3; 
                
                }
                  
                if($cusrecord->save())
                {
                    //customer Image
                    $directory = Yii::$app->util->getCustomerDirectory($cusrecord->id);
                          
                    if (!is_dir($directory))
                    { 
                      FileHelper::createDirectory($directory);
                    } 
                    if(isset($imageFile) ) 
                    {  
                        $filePath = $directory . $fileName; 
                        $imageFile->saveAs($filePath);
                    }

                    //cnic front image
                    if(isset($imageFile2) ) 
                    {   
                        $filePath2 = $directory . $fileName2; 
                        $imageFile2->saveAs($filePath2);
                    }

                    //cnic back image
                    if(isset($imageFile3)) 
                    { 
                    $filePath3 = $directory . $fileName3; 
                    $imageFile3->saveAs($filePath3);
                    }

                    $id=$cusrecord->id;
                    // print_r($cusrecord);
                    // exit();
                    return $this->redirect(['/sales-purchase/addtocart?cus='  . $id]); 
                }
                else
                {
                    print_r($cusrecord->getErrors());
                    exit();
                } 
                  
        }
    }

    // public function actionAddtocart($cus)
    // {
    //     $this->layout="main-admin";
    //     if (isset($_GET['cus'])) 
    //     {
    //         $id=$_GET['cus'];
    //     }

    //     return $this->render('addtocart');
    // }


    public function actionDetails()
    {
        $this->layout="main-admin";
        $details=new \app\models\SalesPurchase();
        if (isset($_GET['id'])) {
            $detailsid=$_GET['id'];
            // print_r($detailsid);
            // exit();
        }

        $details=\app\models\SalesPurchase::find()->where(['id'=>$detailsid])->one();
         return $this->render('details', [
            'details' => $details,
         ]);
    }



   

    
    

}
