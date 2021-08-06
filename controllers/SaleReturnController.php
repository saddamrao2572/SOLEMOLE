<?php

namespace app\controllers;

use Yii;
use app\models\SaleReturn;
use app\models\SaleReturnSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\db\Query;
use yii\db\ActiveRecord ;
use yii\db\Command;

/**
 * SaleReturnController implements the CRUD actions for SaleReturn model.
 */
class SaleReturnController extends Controller
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
     * Lists all SaleReturn models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout="main-admin";
        $searchModel = new SaleReturnSearch();
         $model= new SaleReturn();
        $dataProvider = new ActiveDataProvider([
              'query' => SaleReturn::find(),
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
     * Displays a single SaleReturn model.
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
     * Creates a new SaleReturn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout="main-admin";
        $model = new SaleReturn();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SaleReturn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
         $this->layout='main-admin';
        $model = $this->findModel($id);
        if (isset($_POST['btn_update'])) 
        {
            
            $model->deduct=$_POST['discount'];
            $model->customer_name=$_POST['buyername'];
            $model->cinc=$_POST['cnic'];
            $model->paid=$_POST['paid'];
            $model->contact=$_POST['contact'];
            if ($model->save()) 
            {
                return $this->redirect(['invoice', 'id' => $model->id]);
            }
            else
            {
                print_r($model->getErrors());
                exit();
            }
        }
        else 
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SaleReturn model.
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
     * Finds the SaleReturn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaleReturn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaleReturn::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    ////////////new actions


    /////////////////////////////new actions
    public function actionSelectproduct()
    {
        $this->layout="main-admin";

        $shop_id=$_GET['shop'];
        $model=  new \app\models\SalesPurchase;


        return $this->render('selectproduct' ,[
            'model'=>$model,
            'shop' =>$shop_id,
        ]);
    }



    public function actionSearch()
    {

        $keyword = strval($_POST['query']);
        $shop_id=$_POST['shopid'];
        // print_r($shop_id);
        // exit();
        $search_param = "{$keyword}%";
      // print_r($search_param);
      // exit();
        $sql = "SELECT DISTINCT
                new_product_sale.shop_id,
                new_product_sale.product_id,
                sales_purchase.shop_id,
                sales_purchase.product_id,
                sales_purchase.type,
                product.id,
                product.`name`
                FROM new_product_sale ,  sales_purchase, product
                WHERE sales_purchase.type='sell' AND (new_product_sale.product_id = product.id OR sales_purchase.product_id = product.id) AND  (new_product_sale.shop_id = '$shop_id' OR sales_purchase.shop_id = '$shop_id')
                GROUP BY
                product.id
                AND (product.name  LIKE '$search_param') ";
// print_r($sql);
// exit();
      //$sql = "SELECT id,name,imei FROM product WHERE  AND type='old'" OR  new_product_sale.buyername LIKE '$search_param' OR  sales_purchase.name LIKE '$search_param' OR  sales_purchase.imei LIKE '$search_param' OR  shop_product_saled_imei.saled_imei LIKE '$search_param';
      
        $query=\app\models\Product::findBySql($sql)->all();
  
     
        if (isset($query) && $query!=null) {
            foreach ($query as $row) {
         
                $Product[] = $row->name;
            }
            echo json_encode($Product);
        }
    }


    public function actionValueshow($pn, $shopid)
    {
        
        $pn=$_GET['pn'];
        $shopid=$_GET['shopid'];
        
        $product=new \app\models\Product();
        $product=\app\models\Product::find()->where(['name' => $pn])->one();
        $model=  new \app\models\SaleReturn;

        $shoproduct=\app\models\ShopProduct::find()->where(['product_id'=>$product->id , 'shop_id'=>$shopid])->one();
        
        return $this->renderPartial('valueshow', [
            'product'=>$product,
            'shoproduct'=> $shoproduct,
            'model' => $model,
            
        ]);
        
    }


    public function actionPostvalues()
    {
        $user_id=\Yii::$app->util->loggedinUserId();
        $saleret=new \app\models\SaleReturn();
        if (isset($_POST['btn_salereturn'])) 
        {
            $saleret->product_id=$_POST['productid'];
            $saleret->shop_id=$_POST['shopid'];
            $saleret->brand_id=$_POST['brandid'];

            $explode = explode(',', count($_POST['returnimei']));
            $commaDelimited = str_replace(',', '', $_POST['price']);
            $saleret->price=$commaDelimited * $explode[0];
            $saleret->quantity=$explode[0];
            //$buysell->paid=$_POST['paid'];
            // $saleret->discount=$_POST['discount'];
            // $saleret->warranty=$_POST['warranty'];
            $saleret->created_by=$user_id;
            $saleret->invoice_no=$_POST['invoice'];
             // print_r($saleret);
             // exit();
            if($saleret->save()) 
            {
              $stocksearch=\app\models\Stock::find()->where(['product_id'=>$saleret->product_id, 'shop_id' => $saleret->shop_id])->one();
                if (!empty($stocksearch)) 
                {
                  $srupdate=\Yii::$app->db->createCommand("UPDATE stock SET total=total+1, available=available+1 WHERE product_id = '$saleret->product_id' AND shop_id='$saleret->shop_id'");
                  if ($srupdate->execute()) 
                  {
                    $selected=$_POST['returnimei'];
                    $size=count($_POST['returnimei']);
                    for ($i=0; $i < $size ; $i++) 
                    { 
                      $newimei=new \app\models\SaleReturnImei;
                      $newimei->sale_return_id=$saleret->id;
                      $newimei->returned_imei=$selected[$i];
                      $newimei->save();
                    }
                      $id=\Yii::$app->util->encrypt($saleret->id);
                      return $this->redirect('userdetail?id='.$id); 
                  }

                
                  else
                  {
                    \Yii::$app->session->setFlash('danger', Yii::t('app',"Sorry! Your Item is Not Available in the Stock."));
                    Yii::$app->db->createCommand("DELETE From sale_return WHERE id = '$buysell->id' ")->execute();

                    return $this->redirect('index' );

                  } 
                }
            }
            else
            {
                print_r($saleret->getErrors());
                exit();
            }

        }
    }


    public function actionUserdetail()
    {
        $this->layout='main-admin';

        $model= new SaleReturn;
        return $this->render('userdetail' , [
            'model'=>$model,
        ]);
    }

    public function actionUpdateprevious()
    {
      $this->layout='main-admin';
      if (isset($_POST['btn_user'])) 
      {
          $id=$_POST['newid'];
          $buyername=$_POST['buyername'];
          $cnic=$_POST['cnic'];
          $paid=$_POST['paid'];
          $contact=$_POST['contact'];
          $paid=$_POST['paid'];
          $deduct=$_POST['deduct'];
          $reason=$_POST['reason'];

          ///img c0de
         // $model = $this->findModel($id);
          // $imageFile = UploadedFile::getInstanceByName('img');
          // if(isset($imageFile)) 
          // { 
          //     $fileName =rand(1000,99999999).'.'. $imageFile->extension;
          //     if (!empty($filename)) {
          //        $img = $fileName;
          //      } 
               
          // }
          

          $date=date('Y-m-d');
          $update=\Yii::$app->db->createCommand("UPDATE sale_return 
              SET 
                  reasone='$reason',
                  paid='$paid',
                  deduct='$deduct',
                  created_at='$date',
                  customer_name='$buyername',
                  cinc=$cnic,
                  contact='$contact'
                  WHERE id=$id ");
          if ($update->execute()) 
          {
              // $directory = Yii::$app->util->getSalereturnDirectory($id);             
              // if (!is_dir($directory))
              // { 
              //   FileHelper::createDirectory($directory);
              // } 
              // if(isset($imageFile)) 
              // {     
              //     $filePath = $directory . $fileName; 
              //     $imageFile->saveAs($filePath);
              // }
              return $this->redirect(['invoice?id='. $id ]);
              // print_r('Ho gya bhai update');
              // exit();
          }
          else
          {
              echo $update->getErrors();
              exit();
          }
      }
        
    }

    public function actionInvoice()
    {
        $this->layout="main-admin";
        $details=new \app\models\SaleReturn();
        if (isset($_GET['id'])) {
            $detailsid=$_GET['id'];
            // print_r($detailsid);
            // exit();
        }

        $details=\app\models\SaleReturn::find()->where(['id'=>$detailsid])->one();
         return $this->render('invoice', [
            'details' => $details,
         ]);
    }





}
