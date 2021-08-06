<?php

namespace app\modules\api\controllers;


use yii\filters\AccessControl;
use app\models\Product;
use app\modules\api\behaviours\Verbcheck;
use app\modules\api\behaviours\Apiauth;

use Yii;



class ProductController extends RestController
{

    public function behaviors()
    {

        $behaviors = parent::behaviors();

        return $behaviors + [

           'apiauth' => [
               'class' => Apiauth::className(),
               'exclude' => [],
               'callback'=>[]
           ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [ 'index','view' ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => Verbcheck::className(),
                'actions' => [
                    'index' => ['GET'],
                    'create' => ['POST'],
                    'update' => ['POST'],
                    'view' => ['GET'],
                    'spec' => ['GET'],
                    'delete' => ['DELETE']
                ],
            ],

        ];
    }
	
		protected function getProduct($params) {
		
		$page = Yii::$app->getRequest()->getQueryParam('page');
        $limit = Yii::$app->getRequest()->getQueryParam('limit');
        $order = Yii::$app->getRequest()->getQueryParam('order');
        $search = Yii::$app->getRequest()->getQueryParam('search');

        if(isset($search)){
            $params=$search;
        }

        $limit = isset($limit) ? $limit : 10;
        $page = isset($page) ? $page : 1;
        $offset = ($page - 1) * $limit;

        $query = Product::find()
            ->asArray(true)
            ->limit($limit)
            ->offset($offset);
			
        if(isset($params['id'])) {	 
            $query->andFilterWhere(['id' => $params['id']]);
        }
        if(isset($params['date'])) {
            $query->andFilterWhere(['like', 'created_at', '%' . $params['date'] . '%',false]);
        }
        if(isset($params['price'])) {
            $query->andFilterWhere(['like', 'price', $params['price'] . '%',false]);
        }
		 if(isset($params['imei'])) {
            $query->andFilterWhere(['imei' => $params['imei']]);
        }
        if(isset($params['name'])) {
            $query->andFilterWhere(['like', 'name', '%' . $params['name'] . '%',false]);
        }

        if(isset($order)){
            $query->orderBy($order);
        }

        $additional_info = [
            'page' => $page,
            'size' => $limit,
            'totalCount' => (int)$query->count()
        ];

        return [
            'data' => $query->all(),
            'info' => $additional_info
        ];
		
	}
	
    public function actionIndex()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		  $params = $this->request['search'];
        $response = $this->getProduct($params);
       

        Yii::$app->api->sendSuccessResponse($response['data'], $response['info']);
    }
	
	protected function SlideProduct($id,$direction)
	{
	
		if($direction=='forward')
		{ 
	     $id=$id+1; }
		else if($direction=='backward')
		{ 
	 
		$id=$id-1; }
		$product = Product::find()->select(['`product`.id,`product`.name,`product`.price,`product`.thumbnail,`product_specification`.builtin,`product_specification`.back_cam,`product_specification`.front_cam,`product_specification`.cpacity,`product_specification`.size'])
			->from('product')
			->join('LEFT OUTER JOIN', '`product_specification`', '`product_specification`.product_id=product.id')
			->where(['`product`.id'=>$id])
			->asArray(true)->one();
		if(!isset($product) && empty($product))
		{
			$product= $this->SlideProduct($id,$direction);
		}
		return $product;
	}
	 public function actionSlide()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $id = Yii::$app->getRequest()->getQueryParam('id');
		 
		  $sql= Yii::$app->db->createCommand("select max(id)   from product");
		$max_id=$sql->queryScalar();
		$sql= Yii::$app->db->createCommand("select min(id)   from product");
		$min_id=$sql->queryScalar();

		  //$current_product = Product::find()->where(['id'=>$id])->asArray(true)->one();
		  	$current_product= Product::find()->select(['`product`.id,`product`.name,`product`.price,`product`.thumbnail,`product_specification`.builtin,`product_specification`.back_cam,`product_specification`.front_cam,`product_specification`.cpacity,`product_specification`.size'])
			->from('product')
			->join('LEFT OUTER JOIN', '`product_specification`', '`product_specification`.product_id=product.id')
			->where(['`product`.id'=>$id])
			->asArray(true)->one();
		  
		 
		   $data=[];
		  if(!isset($id) || empty($id))
		  {
			   Yii::$app->api->sendFailedResponse("Product ID not Presend in parameters");
		  }
		  
		
		  
		  if(isset($current_product))
		  {
			   $data['current']=$current_product;
			  if($current_product['id']==$max_id)
			  {
		  $prev_product= $this->SlideProduct($current_product['id'],'backward');
		  $data['prev']=$prev_product;
		   $data['next']=null;
			  }
			  else if($current_product['id']==$min_id)
			  {
		  $next_product= $this->SlideProduct($current_product['id'],'forward');
		  $data['next']=$next_product;
		  $data['prev']=null;
			  }
			 else{
		  $next_product= $this->SlideProduct($current_product['id'],'forward');
		  $prev_product= $this->SlideProduct($current_product['id'],'backward');
		    $data['next']=$next_product;
		  $data['prev']=$prev_product;
			 }
		 
		
		  }else
		  {
			   $data['error']='Invalid Id!!!No Record Found.';
		  }

        Yii::$app->api->sendSuccessResponse($data);
    }
	

    public function actionCreate()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = new Product;
        $model->attributes = Yii::$app->request->post();
	 
        if ($model->save()) {
            Yii::$app->api->sendSuccessResponse($model->attributes);
        } else {
            Yii::$app->api->sendFailedResponse($model->errors);
        }

    }

    public function actionUpdate($id)
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = $this->findModel($id);
        $model->attributes =Yii::$app->request->post();
	
        if ($model->save()) {
            Yii::$app->api->sendSuccessResponse($model->attributes);
        } else {
            Yii::$app->api->sendFailedResponse($model->errors);
        }

    }
	
	 public function actionSpec($id)
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model =\app\models\ProductSpecification::find()->where(['product_id'=>$id])->one();
	
       if(isset($model)){
        Yii::$app->api->sendSuccessResponse($model->attributes);
		}else
		{
			 Yii::$app->api->sendFailedResponse("Product's Specifications are not updated");
		}

    }

    public function actionView($id)
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = \app\models\Product::find()->where(['id'=>$id])->one();
		if(isset($model)){
        Yii::$app->api->sendSuccessResponse($model->attributes);
		}else
		{
			 Yii::$app->api->sendFailedResponse("Product Not Found");
		}
    }

    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $model->delete();
        Yii::$app->api->sendSuccessResponse($model->attributes);
    }

    protected function findModel($id)
    {
        if (($model = \app\models\Product::findOne($id)) !== null) {
            return $model;
        } else {
            Yii::$app->api->sendFailedResponse("Invalid Record requested");
        }
    }
}