<?php

namespace app\controllers;

use Yii;
use app\models\NewProductSale;
use app\models\NewProductSaleSearch;
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
 * NewProductSaleController implements the CRUD actions for NewProductSale model.
 */
class NewProductSaleController extends Controller
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
     * Lists all NewProductSale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout='main-admin';
        $searchModel = new NewProductSaleSearch();
        $dataProvider = new ActiveDataProvider([
              'query' => NewProductSale::find(),
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
        ]);
    }

    /**
     * Displays a single NewProductSale model.
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
     * Creates a new NewProductSale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $this->layout='main-admin';
        $model = new NewProductSale();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NewProductSale model.
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
            $model->nickname=$_POST['nickname'];
            $model->discount=$_POST['discount'];
            $model->buyername=$_POST['buyername'];
            $model->cnic=$_POST['cnic'];
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
     * Deletes an existing NewProductSale model.
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
     * Finds the NewProductSale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewProductSale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewProductSale::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




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

      $search_param = "{$keyword}%";
      // print_r($search_param);
      // exit();
       $sql = "SELECT shop_product.*,  product.`name`, product.id,product.imei FROM shop_product , product WHERE shop_product.product_id = product.id AND product.type = 'new'
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


    public function actionValueshow($pn, $shopid)
    {
        
        $pn=$_GET['pn'];
        $shopid=$_GET['shopid'];
        // print_r($shopid);
        // exit();
        // print($pn);
        // exit();
        $product=new \app\models\Product();
        $product=\app\models\Product::find()->where(['name' => $pn])->one();
        $model=  new \app\models\NewProductSale;

        $shoproduct=\app\models\ShopProduct::find()->where(['product_id'=>$product->id , 'shop_id'=>$shopid])->one();
        // print_r($shoproduct);
        // exit();
        

        return $this->renderPartial('valueshow', [
            'product'=>$product,
            'shoproduct'=> $shoproduct,
            'model' => $model,
            
        ]);
        
    }


    public function actionPostvalues()
    {
        $user_id=\Yii::$app->util->loggedinUserId();
        $newsale=new \app\models\NewProductSale();
        if (isset($_POST['btn_newsell'])) 
        {
            $newsale->product_id=$_POST['productid'];
            $newsale->shop_id=$_POST['shopid'];
            $newsale->brand_id=$_POST['brandid'];
            $newsale->nickname=$_POST['nickname'];

             

            $explode = explode(',', count($_POST['available_Imei']));
            $commaDelimited = str_replace(',', '', $_POST['price']);
            $newsale->price=$commaDelimited * $explode[0];
            $newsale->quantity=$explode[0];
            


            $newsale->discount=$_POST['discount'];
            $newsale->warranty=$_POST['warranty'];
            $newsale->created_by=$user_id;
            $newsale->invoice_no=$_POST['invoice'];
            
            


            if($newsale->save()) 
            {
                $stocksearch=\app\models\Stock::find()->where(['product_id'=>$newsale->product_id,'shop_id' => $newsale->shop_id])->one();
                if (!empty($stocksearch)) 
                {
                    if ($stocksearch->available!='0') 
                    {
                        $sellupdate=\Yii::$app->db->createCommand("UPDATE stock SET available=available-$newsale->quantity WHERE product_id = '$newsale->product_id' AND shop_id='$newsale->shop_id' ");
                        if ($sellupdate->execute()) 
                        {
                            $selected=$_POST['available_Imei'];
                            $size=count($_POST['available_Imei']);
                            for ($i=0; $i < $size ; $i++) 
                            { 
                                $newimei=new \app\models\ShopProductSaledImei;
                                $newimei->nps_id=$newsale->id;
                                $newimei->saled_imei=$selected[$i];
                                $newimei->save();
                            }
                            return $this->redirect('userdetail?id='.$newsale->id);
                        }
                        else
                        {
                            print_r($sellupdate->getErrors());
                            exit();
                        }
                        
                    }
                    else
                    {
                        

                    }
                         
                }
                
                else
                {
                   
                    \Yii::$app->session->setFlash('danger', Yii::t('app',"Sorry! Your Item is Not Available in the Stock."));
                    Yii::$app->db->createCommand("DELETE From new_product_sale WHERE id = '$newsale->id' ")->execute();

                    return $this->redirect('index' );
                }
 
            }
            else
            {
                print_r($newsale->getErrors());
                exit();
            }

        }
    }


    public function actionUserdetail()
    {
        $this->layout='main-admin';

        $model= new NewProductSale;
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

            ///img c0de
           // $model = $this->findModel($id);
            $imageFile = UploadedFile::getInstanceByName('img');
            if(isset($imageFile)) 
            { 
                $fileName =rand(1000,99999999).'.'. $imageFile->extension; 
                $img = $fileName; 
            }
            

            $date=date('Y-m-d');
            $update=\Yii::$app->db->createCommand("UPDATE new_product_sale 
                SET created_at='$date',
                    contact='$contact',
                    buyername='$buyername',
                    paid='$paid',
                    status='0',
                    img='$img',
                    cnic=$cnic
                    WHERE id=$id ");
            if ($update->execute()) 
            {
                $directory = Yii::$app->util->getNewsaleDirectory($id);             
                if (!is_dir($directory))
                { 
                  FileHelper::createDirectory($directory);
                } 
                if(isset($imageFile)) 
                {     
                    $filePath = $directory . $fileName; 
                    $imageFile->saveAs($filePath);
                }
                return $this->redirect(['invoice?id='. $id ]);
                // print_r('Ho gya bhai update');
                // exit();
            }
            else
            {
                print_r($update->getErrors());
                exit();
            }
        }
        
    }

    public function actionInvoice()
    {
        $this->layout="main-admin";
        $details=new NewProductSale();
        if (isset($_GET['id'])) {
            $detailsid=$_GET['id'];
            // print_r($detailsid);
            // exit();
        }

        $details=\app\models\NewProductSale::find()->where(['id'=>$detailsid])->one();
         return $this->render('invoice', [
            'details' => $details,
         ]);
    }



}
