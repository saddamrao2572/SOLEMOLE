<?php

namespace app\modules\api\controllers;


use yii\filters\AccessControl;
use app\models\Order;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use app\models\Product;
use app\models\Stock;
use app\models\OrderDetails;
use app\modules\api\behaviours\Verbcheck;
use app\modules\api\behaviours\Apiauth;

use Yii;



class OrderController extends RestController
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
                        'actions' => [ 'index' ],
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
	
		
    public function actionIndex()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		  $params = $this->request['search'];
        $response = $this->getOrder($params);
       

        Yii::$app->api->sendSuccessResponse($response['data'], $response['info']);
    }
	
	
	  public function actionGetTotalSales()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		
		   
			
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		   $month= date('m');
			$year= date('Y');
			$day= date('d');
			
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			$data=[];
			//today sales
		$query="select sum(paid_amount) as sales ,count(*) as counter from `order` where shop_id='$shop_id' and  order_type='sale' and day(order_date)='$day' and month(order_date)='$month' and year(order_date)='$year' ";
		$sql= Yii::$app->db->createCommand($query);
		$today_sales=$sql->queryAll();
		$data['today_sales']=$today_sales;
		//month sales
			$query="select sum(paid_amount) as sales ,count(*) as counter from `order` where shop_id='$shop_id' and  order_type='sale' and month(order_date)='$month' and year(order_date)='$year' ";
		$sql= Yii::$app->db->createCommand($query);
		$month_sales=$sql->queryAll();
		$data['month_sales']=$month_sales;
		
		//total sales
		$query="select sum(paid_amount) as sales ,count(*) as counter from `order` where shop_id='$shop_id' and  order_type='sale' ";
		$sql= Yii::$app->db->createCommand($query);
		$gross_sales=$sql->queryAll();
		$data['gross_sales']=$gross_sales;
        Yii::$app->api->sendSuccessResponse($data);
    }
	
	
	 public function actionGetTotalPurchases()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		  
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
				if($shop->status==0)
				{
				Yii::$app->api->sendFailedResponse("Your account is not upgraded to a shop holder.Contact to Admin");
				}
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			  $month= date('m');
			$year= date('Y');
			$day= date('d');
			$data=[];
			//today purchases
		$query="select sum(paid_amount) as purchases ,count(*) as counter from `order` where shop_id='$shop_id' and order_type='purchase'  and day(order_date)='$day' and month(order_date)='$month' and year(order_date)='$year' ";
		$sql= Yii::$app->db->createCommand($query);
		$today_purchases=$sql->queryAll();
		$data['today_purchases']=$today_purchases;
		
		//month purchases
		$query="select sum(paid_amount) as purchases ,count(*) as counter from `order` where shop_id='$shop_id' and order_type='purchase'  and month(order_date)='$month' and year(order_date)='$year' ";
		$sql= Yii::$app->db->createCommand($query);
		$month_purchases=$sql->queryAll();
		$data['month_purchases']=$month_purchases;
		
		//total purchases
		$query="select sum(paid_amount) as purchases ,count(*) as counter from `order` where shop_id='$shop_id' and order_type='purchase' ";
		$sql= Yii::$app->db->createCommand($query);
		$total_purchases=$sql->queryAll();
		$data['total_purchases']=$total_purchases;
		
		
        Yii::$app->api->sendSuccessResponse($data);
    }
	
	
	 public function actionGetProfitLoss()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
				if($shop->status==0)
				{
				Yii::$app->api->sendFailedResponse("Your account is not upgraded to a shop holder.Contact to Admin");
				}
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			
			$month= date('m');
			$year= date('Y');
			$day= date('d');
		//total profit
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='sale'");
		$total_sales=$sql->queryScalar();
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='purchase'");
		$total_purchase=$sql->queryScalar();
		$total_profit=$total_sales-$total_purchase;
		
		//today profit
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='sale'  and year(order_date)='$year' and month(order_date)='$month' and day(order_date)='$day' ");
		$today_sales=$sql->queryScalar();
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='purchase' and year(order_date)='$year' and month(order_date)='$month' and day(order_date)='$day' ");
		$today_purchase=$sql->queryScalar();
		$today_profit=$today_sales-$today_purchase;
		
		//this month profit
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='sale' and year(order_date)='$year' and month(order_date)='$month' ");
		$month_sales=$sql->queryScalar();
		$sql= Yii::$app->db->createCommand("select sum(paid_amount)   from `order` where shop_id='$shop_id' and order_type='purchase' and year(order_date)='$year' and month(order_date)='$month' ");
		$month_purchase=$sql->queryScalar();
		$month_profit=$month_sales-$month_purchase;
	
		$data = [];
		$data["total_profit"] = $total_profit;
		$data["today_profit"] = $today_profit;
		$data["month_profit"] = $month_profit;
		
		
        Yii::$app->api->sendSuccessResponse($data);
    }
	
	public function actionCheckCnic()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		 $imei = Yii::$app->getRequest()->getQueryParam('imei');
		 $type = Yii::$app->getRequest()->getQueryParam('type');
		 $cnic = Yii::$app->getRequest()->getQueryParam('cnic');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
				if($shop->status==0)
				{
				Yii::$app->api->sendFailedResponse("Your account is not upgraded to a shop holder.Contact to Admin");
				}
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			
		
		$sql= Yii::$app->db->createCommand("SELECT
						`order`.id,`order`.invoice_no,`order`.order_type,`order`.order_date 
						FROM `order` 
						left outer join order_details on `order`.id=order_details.order_id
						left outer join customer on `order`.`customer_id`=customer.id 
						where customer.cnic='$cnic' 
						and order_details.imei= '$imei' 
						and `order`.order_type='$type' ");
					 $data=[];
		$data['result']=$sql->queryAll();
		 $data['counter'] =count($data);
		 
		if(!isset($data) && empty($data))
		{
			Yii::$app->api->sendFailedResponse("IMEI Not Found");
		}
		else{
        Yii::$app->api->sendSuccessResponse($data);}
    }
	
	 public function actionCheckImei()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		 $imei = Yii::$app->getRequest()->getQueryParam('imei');
		 $type = Yii::$app->getRequest()->getQueryParam('type');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
				if($shop->status==0)
				{
				Yii::$app->api->sendFailedResponse("Your account is not upgraded to a shop holder.Contact to Admin");
				}
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			
		
		$sql= Yii::$app->db->createCommand("SELECT * FROM `order` 
                     left outer join order_details on `order`.id=order_details.order_id 
                     where order_details.imei='$imei' and `order`.order_type='$type'");
					 $data=[];
		$data['result']=$sql->queryAll();
		 $data['counter'] =count($data);
		 
		if(!isset($data) && empty($data))
		{
			Yii::$app->api->sendFailedResponse("IMEI Not Found");
		}
		else{
        Yii::$app->api->sendSuccessResponse($data);}
    }
	
	 public function actionCheckResale()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		 $imei = Yii::$app->getRequest()->getQueryParam('imei');
		 $type = Yii::$app->getRequest()->getQueryParam('type');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
				if($shop->status==0)
				{
				Yii::$app->api->sendFailedResponse("Your account is not upgraded to a shop holder.Contact to Admin");
				}
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
			
		
		$sql= Yii::$app->db->createCommand("SELECT order_details.*,product.name,product.model,product.series FROM `order_details` left outer join product on order_details.product_id=product.id WHERE order_details.imei='$imei' and order_details.order_id in (select id from `order` where `order`.shop_id='$shop_id' and `order`.created_by='$user_id' and `order`.order_type='$type')");
					 $data=[];
		$data['result']=$sql->queryAll();
		 $data['counter'] =count($data['result']);
		 
		if(!isset($data) && empty($data))
		{
			Yii::$app->api->sendFailedResponse("IMEI Not Found");
		}
		else{
        Yii::$app->api->sendSuccessResponse($data);}
    }
	
		
  public function actionCreate()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		
		$inputs=Yii::$app->request->post();
		
		
		if(!isset($inputs['shop_id']))
		{
			 Yii::$app->api->sendFailedResponse("Shop ID is Missing.");
		}
		if(isset($inputs['user_id']))
		{
		
		$shop = \app\models\Shop::find()->where(['id'=>$inputs['shop_id']])->andWhere(['owner_id'=>$inputs['user_id']])->one();
		    if(!isset($shop) || empty($shop))
			{
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
		}
		if(isset($inputs['action']))
		{
			if($inputs['action']=='update')
			{
				$this->actionUpdate($inputs);
			}
		}
		//Data insertion flow in table 
		// Customer>Order>Product>OrderDetails>Stock
		$order = new Order;
		$orderdetails = new OrderDetails;
		//customer saving
		$customer = new  \app\models\Customer;
		$customer->name=$inputs['Name'];
		$customer->mobile=$inputs['Phone'];
		$customer->cnic=$inputs['CNIC'];
		$customer->address=$inputs['Address'];
		
	
		 $image_pic =  str_replace(' ', '', $customer->name) . '-pic-' . uniqid() . '.png';
		 $image_idf =  str_replace(' ', '', $customer->name)  . '-idf-' . uniqid() . '.png';
		 $image_idb =  str_replace(' ', '', $customer->name)  . '-idb-' . uniqid() . '.png';
		
		
       
		
		$customer->img = $image_pic;
		$customer->cnicimg_front = $image_idf;
		$customer->cnicimg_back = $image_idb;
		$customer->created_by = $inputs['user_id'];
		$customer->created_at = date('Y-m-d h:i:s');
		$customer->shop_id =  $inputs['shop_id'];
		$customer->status = 1;
		
		if($customer->save())
		{
			$directory = Yii::$app->util->getCustomerDirectory($customer->id);
		if (!is_dir($directory)) {
					FileHelper::createDirectory($directory);
				}
				
		
    	$result_pic = Yii::$app->util->CovertBase64ToImage($inputs['Picture'],$directory,$image_pic);
    	$result_id_front = Yii::$app->util->CovertBase64ToImage($inputs['IdFront'],$directory,$image_idf);
    	$result_id_back = Yii::$app->util->CovertBase64ToImage($inputs['IdBack'],$directory,$image_idb);
	
		
		}else
		{
			Yii::$app->api->sendFailedResponse($customer->getErrors());
		}
		//order table saving
      $order->customer_id = $customer->id;
	  $order->shop_id = $inputs['shop_id'];		
	  $order->order_date = date('Y-m-d h:i:s');
	  $order->order_type = $inputs['type'];
	  $order->total_amount = $inputs['Amount'];
	  $order->book_no = $inputs['book_no'];
	  $order->page_no = $inputs['page_no'];
	  $order->paid_amount = $inputs['CalculatedAmount'];
	  $order->invoice_no =  'SM-'. date('Y-m-d'). rand(0,2) ;
	  $order->month =  date('F');
	  $order->year =   date('Y');
	  $order->updated_at =   date('Y-m-d');
	  $order->created_by = $inputs['user_id'];
	  $order->status = 1;
	
	if($order->save())
	  {
		 //product saving
	    if(isset($inputs['product_id']) && !empty($inputs['product_id']))
		{
		   $product = Product::find()->where(['id'=>$inputs['product_id']])->one();
		if(!isset($product))
		{
			$product = new Product;
			$product->name = $inputs['MobileName'];
			$product->model = $inputs['Model'];
		    $product->save();
		}
		}
		else
		{
			$product = new Product;
			$product->name = $inputs['MobileName'];
			$product->model = $inputs['Model'];
		    $product->save();
		}
		//order details saving
			$orderdetails->product_id = $product->id;
			 $brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one();
				if(isset($brand)){
			 $orderdetails->brand_id = $brand->id;}
			 $orderdetails->order_id = $order->id;
			 $orderdetails->imei = $inputs['IMEI'];
			 $orderdetails->condition = $inputs['Condition'];
			 $orderdetails->discount = $inputs['Discount'];
			 $orderdetails->warranty = $inputs['Warranty'];
			 $orderdetails->accessories = $inputs['Accessories'];
			 $orderdetails->remarks = $inputs['Remarks'];
			 $orderdetails->invoice_no = $order->invoice_no;
			 
	        if ($orderdetails->save()) {
				//stock changes
				$shop_id=$inputs['shop_id'];
				$user_id=$inputs['user_id'];
			 $stock = Stock::find()->where(['product_id'=>$product->id])->andWhere(['shop_id'=>$shop_id])->one();
				if(isset($stock) && !empty($stock))
				{
				$stock->total = $stock->total+1;	
				$stock->available = $stock->available+1;
				$stock->save(false);
				}
				else
				{
				$stock = new Stock;
				$stock->total = 1;
				$stock->available = 1;
				$stock->shop_id = $shop_id;
				$stock->product_id = $product->id;
				$stock->created_at = date('Y-m-d h:i:s');
				$stock->created_by = $user_id;
				$stock->status =0;
				$stock->save();
					
				}
				
            Yii::$app->api->sendSuccessResponse($orderdetails->attributes);
        } else {
            Yii::$app->api->sendFailedResponse($orderdetails->getErrors());
        }
			 
			 
		}else
		{
			Yii::$app->api->sendFailedResponse($order->getErrors());
		}
	  
		
		
	 


    }

    public function actionUpdate($inputs)
    {
			\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		
	
		
		
		if(!isset($inputs['shop_id']))
		{
			 Yii::$app->api->sendFailedResponse("Shop ID is Missing.");
		}
		if(isset($inputs['user_id']))
		{
		
		$shop = \app\models\Shop::find()->where(['id'=>$inputs['shop_id']])->andWhere(['owner_id'=>$inputs['user_id']])->one();
		    if(!isset($shop) || empty($shop))
			{
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
		}
		
		//Data insertion flow in table 
		// Customer>Order>Product>OrderDetails>Stock
		$order =   $this->findModel($inputs['order_id']);
		$orderdetails = \app\models\OrderDetails::find()->where(['id'=>$inputs['details_id']])->one();
		
		//customer saving
		$customer = \app\models\Customer::find()->where(['id'=>$inputs['customer_id']])->one();
		
		$customer->name=$inputs['Name'];
		$customer->mobile=$inputs['Phone'];
		$customer->cnic=$inputs['CNIC'];
		$customer->address=$inputs['Address'];
		
	
		
		if($customer->save())
		{
	
		
		}else
		{
			Yii::$app->api->sendFailedResponse($customer->getErrors());
		}
		//order table saving
    
	
	
	  $order->total_amount = $inputs['Amount'];
	  $order->paid_amount = $inputs['CalculatedAmount'];
	  ///$order->invoice_no =  'SM-'. date('Y-m-d'). rand(0,2) ;
	 // $order->month =  date('F');
	  //$order->year =   date('Y');
	  $order->updated_at =   date('Y-m-d');
	 // $order->created_by = $inputs['user_id'];
	//  $order->status = 1;
	
	if($order->save())
	  {
		 //product saving
	    if(isset($inputs['product_id']) && !empty($inputs['product_id']))
		{
		   $product = Product::find()->where(['id'=>$inputs['product_id']])->one();
		if(!isset($product))
		{
			$product = Product::find()->where(['name'=> $inputs['MobileName']])->one();
			if(!isset($product)){
			$product = new Product;
			$product->name = $inputs['MobileName'];
			$product->model = $inputs['Model'];
		    $product->save(false);
			}
		}
		}
		else
		{
			$product = new Product;
			$product->name = $inputs['MobileName'];
			$product->model = $inputs['Model'];
		    $product->save(false);
		}
		//order details saving
			$orderdetails->product_id = $product->id;
			 $brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one();
			 if(isset($brand))
			 {
			 $orderdetails->brand_id = $brand->id;
			 }
			// $orderdetails->order_id = $order->id;
			 $orderdetails->imei = $inputs['IMEI'];
			 $orderdetails->condition = $inputs['Condition'];
			 $orderdetails->discount = $inputs['Discount'];
			 $orderdetails->warranty = $inputs['Warranty'];
			 $orderdetails->accessories = $inputs['Accessories'];
			 $orderdetails->remarks = $inputs['Remarks'];
			// $orderdetails->invoice_no = $order->invoice_no;
			 
	        if ($orderdetails->save()) {
				
            Yii::$app->api->sendSuccessResponse($orderdetails->attributes);
        } else {
            Yii::$app->api->sendFailedResponse($orderdetails->getErrors());
        }
			 
			 
		}else
		{
			Yii::$app->api->sendFailedResponse($order->getErrors());
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

	
    public function actionGetByImei()
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		 $imei = Yii::$app->getRequest()->getQueryParam('imei');
		 $type = Yii::$app->getRequest()->getQueryParam('type');
		
		
		 if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
		$query="SELECT
		`order`.id as order_id,
		`order`.paid_amount,
		`order`.invoice_no,
		order_details.imei,
		order_details.fault,
		order_details.accessories,
		order_details.`condition`,
		order_details.discount,
		order_details.warranty,
		order_details.remarks,
		product.id as product_id,
		product.`name` as product_name,
		product.price as market_price,
		product.model,
		product.series,
		product.thumbnail as product_img
	
		FROM
		`order` 
		LEFT OUTER JOIN order_details ON order_details.order_id = `order`.id 
		LEFT OUTER JOIN product ON order_details.product_id = product.id 
		LEFT OUTER JOIN  brand ON brand.id = product.brand_id 
		LEFT OUTER JOIN  customer ON `order`.customer_id = customer.id
		WHERE `order_details`.imei='$imei' and `order`.shop_id='$shop_id' and `order`.order_type='$type' ";
		$sql=Yii::$app->db->createCommand($query);
        $model = $sql->queryAll();
	
		
		
		if(isset($model)){
        Yii::$app->api->sendSuccessResponse($model);
		}else
		{ 
			  Yii::$app->api->sendSuccessResponse("No Record found for this imei");
		}
    }
	
    public function actionView($id)
    {
		\Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
		
		
		
		$query="SELECT
		`order`.id,
		`order`.shop_id,
		`order`.order_date,
		`order`.order_type,
		`order`.`status`,
		`order`.customer_id,
		`order`.paid_amount,
		`order`.total_amount,
		`order`.created_by,
		`order`.invoice_no,
		`order`.`month`,
		`order`.`year`,
		`order`.updated_at,
		order_details.id as details_id,
		order_details.product_id,
		order_details.brand_id,
		order_details.imei,
		order_details.fault,
		order_details.accessories,
		order_details.`condition`,
		order_details.discount,
		order_details.warranty,
		order_details.remarks,
		product.id as product_id,
		product.`name` as product_name,
		product.price as market_price,
		product.model,
		product.series,
		product.thumbnail as product_img,
		product.brand_id,
		brand.`name` as brand_name,
		customer.id as customer_id,
		customer.`name`as customer_name,
		customer.mobile,
		customer.cnic,
		customer.img as customer_image,
		customer.cnicimg_front,
		customer.cnicimg_back
		FROM
		`order` 
		LEFT OUTER JOIN order_details ON `order`.id = order_details.order_id 
		LEFT OUTER JOIN product ON order_details.product_id = product.id 
		LEFT OUTER JOIN  brand ON brand.id = product.brand_id 
		LEFT OUTER JOIN  customer ON `order`.customer_id = customer.id
		WHERE `order`.id='$id'";
	
		$sql=Yii::$app->db->createCommand($query);
        $model = $sql->queryAll();
	
		
		
		if(isset($model)){
        Yii::$app->api->sendSuccessResponse($model);
		}else
		{ 
			 Yii::$app->api->sendFailedResponse("Order Record Not Found");
		}
    }

    public function actionDelete($id)
    {

        $model = $this->findModel($id);
		$customer = \app\models\Customer::find()->where(['id'=>$model->customer_id])->one();
		$order_details = \app\models\OrderDetails::find()->where(['order_id'=>$model->id])->one();
		$stock = \app\models\Stock::find()->where(['product_id'=>$order_details->product_id])->andWhere(['shop_id'=>$model->shop_id])->one();
		$stock->total=$stock->total-1;
		$stock->available=$stock->available-1;
		$stock->save(false);
		$order_details->delete();
		$customer->delete();
		
        $model->delete();
        Yii::$app->api->sendSuccessResponse($model->attributes);
    }

    protected function findModel($id)
    {
        if (($model = \app\models\Order::findOne($id)) !== null) {
            return $model;
        } else {
            Yii::$app->api->sendFailedResponse("Invalid Record requested");
        }
    }
	
	protected function getOrder($params) {
		
		$page = Yii::$app->getRequest()->getQueryParam('page');
        $limit = Yii::$app->getRequest()->getQueryParam('limit');
        $order = Yii::$app->getRequest()->getQueryParam('order'); 
		$type =  Yii::$app->getRequest()->getQueryParam('type');
        $search = Yii::$app->getRequest()->getQueryParam('search');
		
		 $shop_id = Yii::$app->getRequest()->getQueryParam('shop_id');
		 $user_id = Yii::$app->getRequest()->getQueryParam('user_id');
		 
		  if(!isset($shop_id) || empty($shop_id))
		  {
             Yii::$app->api->sendFailedResponse("ERROR!!!Shop ID is Missing");
		  }
		
		
		  $shop = \app\models\Shop::find()->where(['id'=>$shop_id])->andWhere(['owner_id'=>$user_id])->one();
		    if(!isset($shop) || empty($shop))
			{
			Yii::$app->api->sendFailedResponse("You are not Assigned to get this Shop,s Data. ReConfirm your Identity");	
			}
		  
        if(isset($search)){
            $params=$search;
        }

        $limit = isset($limit) ? $limit : 10;
        $page = isset($page) ? $page : 1;
        $offset = ($page - 1) * $limit;
		
		
			$query= Order::find()->select(['`order`.id,date(`order`.order_date) as order_date,`order`.invoice_no,`order`.paid_amount,`order`.order_type,customer.name as customer_name,customer.id as customer_ID,customer.mobile,customer.address,customer.cnic,product.name as product_name,product.model,order_details.imei,order_details.fault,order_details.condition,order_details.discount,order_details.warranty,order_details.id as details_ID,order_details.accessories,order_details.remarks,order_details.product_id,product.thumbnail as product_thumbnail'])
			->from('`order`')
			->join('LEFT OUTER JOIN', 'customer', '`order`.`customer_id`=customer.id')
			->join('LEFT OUTER JOIN', 'order_details', 'order_details.order_id=`order`.id')
			->join('LEFT OUTER JOIN', 'product', 'order_details.product_id=product.id')
			->where(['`order`.shop_id' => $shop_id])
			->orderBy([ '`order`.order_date' => SORT_DESC])
			->asArray(true)
            ->limit($limit)
            ->offset($offset);
        
		 if(isset($params['invoice_no'])) {	 
		
            $query->andFilterWhere( ['like','`order`.invoice_no', '%' . $params['invoice_no'] . '%' ,false]);
       }
	   	if(isset($type)) {	 
            $query->andFilterWhere(['`order`.order_type' => $type]);
        }
      
		if(isset($params['name'])) {	 
		
            $query->andFilterWhere(['like','customer.name', '%' . $params['name'] . '%' ,false]);
        }
		if(isset($params['id'])) {	 
            $query->andFilterWhere(['`order`.id' => $params['id']]);
        }
		if(isset($params['date'])) {
            $query->andFilterWhere(['like','date(`order`.order_date)', '%' . $params['date'] . "%" ,false ]);
		
        }
		if(isset($params['imei'])) {
            $query->andFilterWhere(['like','order_details.imei', '%' . $params['imei'] . "%" ,false]);
		
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
}