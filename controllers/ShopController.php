<?php

namespace app\controllers;

use Yii;
use app\models\ArrayHelper;
use app\models\Shop;
 use yii\helpers\Url;
use app\models\ShopBussinesDay;
use app\models\ShopFeatured;
use app\models\ShopSearch;
use app\models\Comments;
use app\models\Brand;
use app\models\BrandSearch;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use app\models\AuthAssignment;


/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'actions' => ['details'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['update','create','details','like','allshops','single'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                     [
                        'actions' => ['update','create','index','view','delete','like','details','allshops','single'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['branchaprove','acceptshop','rejectshop','update','create','index','like','view','delete','details','allshops','messages','send','loadmessages','single'],
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
     * Lists all Shop models.
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
	
	public function actionAcceptshop()
	{
		$id = Yii::$app->util->decrypt($_POST['id']);
		
		
		
		if(!empty($id))
		{
			$model = $this->findModel($id);
			$model->status=1;
			$user = \app\models\User::find()->where(['id'=>$model->owner_id])->one();
			$auth_assign = \app\models\AuthAssignment::find()->where(['user_id'=>$user->id])->one();
				$auth_assign->item_name='admin';
			$auth_assign->save();
		
				
			
			if($model->save(false))
			{
				\Yii::$app->session->setFlash('success', Yii::t('app',"Approve successfully!"));	
				$data = ['status'=>'success'];
				echo json_encode($data);
				exit;
			}
        }
	}	
	public function actionRejectshop()
	{
		$id = Yii::$app->util->decrypt($_POST['id']);
		
		
		
		if(!empty($id))
		{
			$model = $this->findModel($id);
			$model->status=0;
			$user = \app\models\User::find()->where(['id'=>$model->owner_id])->one();
			 $auth_assign = \app\models\AuthAssignment::find()->where(['user_id'=>$user->id])->one();
			 $auth_assign->item_name='user';
			 $auth_assign->save();
			
					if($model->save(false))
			{
				\Yii::$app->session->setFlash('danger', Yii::t('app',"Disapproved successfully!"));	
				$data = ['status'=>'success'];
				echo json_encode($data);
				exit;
			}
				
			
				
		
		
        }
	}

	
	

	public function actionBranchaprove()
    {	
		$this->layout = 'main-admin';
		$model = Shop::find()->orderBy(['id'=>SORT_DESC])->all();
        
        return $this->render('approve', [
            'model' => $model,
            
        ]);
    }
    
    public function actionSelectname()
                    {
                            $this->layout = "main-admin";
                if(isset($_GET['select'])){
                $selected = $_GET['select'];
                }else{
                 $selected = 0;   
                }
                       $ids = Yii::$app->session['model'];
                       $model = \app\models\Product::find()->where(['id'=>$ids])->all();
                       return $this->render('chosename',[
                            'model' => $model,
                            'selected' => $selected,
                        ]);
                    

                    }
    
     public function actionSearch3()
    {

      $keyword = strval($_POST['query']);

      $term = $keyword;
      if (Yii::$app->request->isAjax) {
            $products = \app\models\SalesPurchase::find()
            ->where(['LIKE', 'name', $term . '%' ,false])
            ->orWhere(['LIKE', 'cnic', $term . '%' ,false])
            //->where(['LIKE','cnic', '%%%'.$term  ])
            ->andWhere(['status'=>0])->all();
       
            if(isset($products)&& count($products) > 0){
                foreach($products as $product) {
                    $results[] = $product->name;
                }
                echo json_encode( $results);
            }
            else{
               $products = \app\models\WholeSeller::find()
            ->where(['LIKE', 'name', $term . '%' ,false])
            ->andwhere(['status'=>0])->all();
            foreach($products as $product) {
                    $results[] = $product->name;
                }
                echo json_encode( $results);
        }
        }
    }

    public function actionMessages()
    { $this->layout="main-admin";
        return $this->render('messages');
    }
 
 /////////send message
 public function actionSend() {
        $success = 0;
        if (\Yii::$app->request->isAjax) {
            // $userID = Yii::$app->util->decrypt(\Yii::$app->request->post('userid'));
            // $gymID = Yii::$app->util->decrypt(\Yii::$app->request->post('gymid'));
            // $gymLike = \app\models\GymLikes::find()->byUserGym($userID, $gymID);
   
   $from=\Yii::$app->request->post('from');
   $to=\Yii::$app->request->post('to');
   $message=\Yii::$app->request->post('message');
   $model=new \app\models\Messages();
   
   $model->message=$message;
   $model->from=$from;
   $model->to=$to;
   $model->sent=date('Y/m/d H:i:s');
   $model->read=0;
   if($model->save())
   {
    $success=1;
    
   }else{
     $success=2;
    
   }
   
    return json_encode(array(
            'success' => $success
        ));
        }
       
    }
  public function actionLoadmessages($uid){
        $this->layout="";
        if(isset($uid) && !empty($uid)){
            return $this->renderPartial('loadingmessages',[
                'uid'=>$uid,

            ]);
           // echo '<script type="text/javascript">alert("agya he iher e koe rola hyyy");</script>';
            //exit;

        }
    }
public function actionSearch(){
        if(isset($_GET['pname']) && isset($_GET['value'])){
            $pn = $_GET['pname'];
            $value = $_GET['value'];
        }
        if (Yii::$app->request->isAjax) {

        $products = \app\models\Product::find()
            ->where(['LIKE', 'name', $pn . '%' ,false])
            ->andwhere(['status'=>1])
            ->andwhere(['brand_id'=>$value])->all();
            if(isset($products)&& count($products) > 0){
                
                foreach($products as $product) {
                    $results[] = ['id'=>$product->id, 'label'=>$product->name];
                }
                echo json_encode( $results);
            }
            else{
                $results[] = ['id'=>0, 'label'=>'No Result Found'];
            echo json_encode($results);
        }
    }

    }
    public function actionSearchh()
    {

      $keyword = strval($_POST['query']);
      $term = "{$keyword}%";
      if (Yii::$app->request->isAjax) {

            $products = \app\models\Seller::find()
            ->where(['LIKE', 'name', $term . '%' ,false])
            ->all();
       
            if(isset($products)&& count($products) > 0){
                foreach($products as $product) {
                    $results[] = $product->name;
                }
                echo json_encode( $results);
            }else{
                $results[] = 'No Result Found';
            echo json_encode($results);
        }
        }else{
            print_r('Not Allowed');
        }
    }
public function actionSearchone()
    {

      $keyword = strval($_POST['query']);

      $term = $keyword;
      if (Yii::$app->request->isAjax) {
            $products = \app\models\ShopProduct::find()
            ->where(['LIKE', 'sameimei', $term . '%' ,false])
            ->andwhere(['status'=>0])->all();
       
            if(isset($products)&& count($products) > 0){
                foreach($products as $product) {
                    $results[] = $product->sameimei;
                }
                echo json_encode( $results);
            }else{
                $results[] = 'No Result Found';
            echo json_encode($results);
        }
        }
    }


     public function actionSearchtwo()
    {

      $keyword = strval($_POST['query']);

      $term = $keyword;
      if (Yii::$app->request->isAjax) {
            $products = \app\models\ShopProduct::find()
            ->where(['LIKE', 'nickname', $term . '%' ,false])
            ->andwhere(['status'=>0])->all();
       
            if(isset($products)&& count($products) > 0){
                foreach($products as $product) {
                    $results[] = $product->nickname;
                }
                echo json_encode( $results);
            }else{
                $results[] = 'No Result Found';
            echo json_encode($results);
        }
        }
    }




    public function actionBrands()
    {
        if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
        if(isset($_GET["shop_id"])){
            Yii::$app->session['shopid'] = $_GET["shop_id"];
    }
    Yii::$app->session->close();
        $this->layout="main-admin";
     $searchModel = new BrandSearch();
   $searchModel->status = 1;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize= 10;

    
        return $this->render('allbrands',[
            'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
              
            ]
            );
    }
  

     public function actionGetbrands()
    {
    // Check if the Session is Open, and Open it if it isn't Open already
    if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
        if(isset($_POST['value'])){
            $arr = $_POST['value'];

        for($i=0; $i<count($arr); $i++) {
          
            $model[$i] = $arr[$i];
        
            
        }
        Yii::$app->session['model'] = $model;
        }
    Yii::$app->session->close();

        return $this->redirect('selectproducts');
    }


    public function actionSelectproducts()
    {
        $this->layout = "main-admin";
 if (isset(Yii::$app->session['model'])) {
       $model = Yii::$app->session['model'];
       return $this->render('choseproducts',[
            'model' => $model,
        ]);
    } else {
       $model = null;
    }   
    }

     public function actionSendtoaction()
     {
     if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
    if(Yii::$app->request->post('pids')!=null){
            $arr = Yii::$app->request->post('pids');
        for($i=0; $i<count($arr); $i++) {
            $model[$i] = $arr[$i];
        }
            
        }
        if(isset($model)){
        Yii::$app->session['products'] = $model;
    }
    Yii::$app->session->close();
        
        return $this->redirect('selectdetails');
    }

    public function actionSelectdetails()
    {
            $this->layout = "main-admin";
if(isset($_GET['select'])){
$selected = $_GET['select'];
}else{
 $selected = 0;   
}
 if (isset(Yii::$app->session['products'])) {
       $ids = Yii::$app->session['products'];
       $model = \app\models\Product::find()->where(['id'=>$ids])->all();
     
       return $this->render('chosedetails',[
            'model' => $model,
            'selected' => $selected,
        ]);
    } else {
       $model = null;
    }

    }

   public function actionCreateshopproduct(){
        $this->layout="main-admin";
        if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
        if(isset($_POST["nickname"]) && isset($_POST["quantity"]) && isset($_POST["discount"]))
        {
            $model = new \app\models\ShopProduct();
            $modelwhole = new \app\models\ShopWholeSeller();
         

            // Shop Product Enteries...
            $model->paid = $_POST["paid"];
            $model->sameimei = $_POST["sameimi"];
            $model->created_at = date('Y-m-d h:i:s',time());
            $model->created_by = (string)Yii::$app->util->loggedinUserId();
            $model->nickname = $_POST["nickname"];
            $model->price = (string)$_POST["price"];
            $model->product_id = $_POST["product_d"];
            $model->shop_id = $_SESSION["shopid"];

            $model->status = '0';
            $seler = \app\models\Seller::find()->where(['name'=>$_POST["sellername"]])->andWhere(['shop_id'=>$_SESSION["shopid"]])->one();
            if(isset($seler) && $seler!=null){

            }else{
                $seler = new \app\models\Seller();
                $seler->name = $_POST["sellername"];
                $seler->cnic = (string)$_POST["cnic"];
                $seler->mobile = (string)$_POST["contact"];
                $seler->shop_id = $_SESSION["shopid"];
                $seler->city_id = (string)$_POST["sellercity"];
                $seler->state_id = (string)$_POST["contact"];
                
                    $documentObject = UploadedFile::getInstanceByName('seler-img');
                    if(isset($documentObject)){
                 $directory = Yii::$app->util->getCustomerDirectory($seler->id);
                 if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                }
                $fileName =  rand() . time() . '.'.  $documentObject->extension;
                $filePath = $directory . $fileName;
                            $seler->img = $fileName;
                        }
                if($seler->Save()){
                    $documentObject->saveAs($filePath);
                }else{ print_r($seler->getErrors()); exit;}
            }
            
            $bid = \app\models\Product::find()->select(['brand_id'])->where(['id'=>$_POST["product_d"]])->one();
            if(isset($bid)){
                $bname = \app\models\Brand::find()->select(['id'])->where(['id'=>$bid->brand_id])->one();
            }
            if(isset($bname)){
                $model->brand_id = $bname->id;
            }
            // Ending Shop Product...
               // Shop Whole Seller enteries... 
            $modelwhole->quantity = $_POST["quantity"];
            $modelwhole->discount = $_POST["discount"];
            $modelwhole->product_id = $_POST["product_d"];
            $modelwhole->created_at = date('Y-m-d h:i:s',time());
            $modelwhole->created_by = (string)Yii::$app->util->loggedinUserId();
            $modelwhole->shop_id = $_SESSION["shopid"];
            $modelwhole->price = (string)$_POST["price"];
            $modelwhole->total_price= $_POST["total"];
            $modelwhole->whole_seller_id= (string)$seler->id;
            
                         // Ending Whole Seller...
            
            if($model->save() && $modelwhole->save()){
                 Yii::$app->session['invoicewhole'] = $modelwhole->id;
              Yii::$app->session['invoiceseller'] = $seler->id;
                $stock = \app\models\Stock::find()->where(['product_id'=>$model->product_id])->andWhere(['shop_id'=>$model->shop_id])->one();


                if(isset($stock) && $stock!=null){
                    $total =$stock->total;
                    $new = $_POST["quantity"];          
                      $total =  (int)$total + (int)$new;
                      
                      $stock->total = (string)$total;
                }else{
                $stock = new \app\models\Stock();
                $stock->product_id = $model->product_id;
                $stock->status = 0 ;
                $stock->created_at = date('Y-m-d h:i:s',time());
                $stock->created_by = Yii::$app->util->loggedinUserId();
                $stock->total = $_POST["quantity"];
                $stock->available = $_POST["quantity"];
                $stock->shop_id = $_SESSION["shopid"];
            }

                if($stock->save()){

                
                $one = \app\models\Product::find()->where(['id'=>$model->product_id])->one();
                return $this->render('choseimi',[
                    'quantity'=>$_POST["quantity"],
                        'one' => $one,
                    'model'   => $model,
                    'modell'   => $modelwhole,
                    'modelll'   => $seler,

                ]);
            }
            else{
                print_r($stock->getErrors());
                exit;
            }
            }else{
                print_r($model->getErrors());
                 print_r($modelwhole->getErrors());
                exit;
            }
     }else{
        echo "ethy rolaa wwaa";
     }
 }
 public function actionSaveproduct(){
     if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }
    if(isset($_POST["sameimei"]) && isset($_POST["imei"]) && isset($_POST["condition"]) && isset($_POST["insertid"])){
        for ($i=0; $i <count($_POST["sameimei"]); $i++) { 
            $model = new \app\models\ShopProductImei();
            $model->shop_product_id = $_POST["insertid"];
            $model->imei = $_POST["sameimei"][$i].$_POST["imei"][$i];
            $shopid = \app\models\ShopProduct::find()->where(['id'=>$_POST["insertid"]])->one();
            if(isset($shopid) && $shopid!=null){
                $model->shop_id = (string)$shopid->shop_id;
            }
            
            $model->created_at = date('Y-m-d h:i:s',time());
            if($_POST["condition"][$i]==1){
            $model->cndition = 'new'; }else{
                $model->cndition = 'old';
            }
            if($model->save(false)){
              Yii::$app->session['invoicecode'] = $_POST["insertid"];
          $productt = \app\models\ShopProduct::find()->where(['id'=>$model->shop_product_id])->one();
                $productid = $productt->product_id;
                $aray = Yii::$app->session['model'];
                 $array = array_diff($aray, [$productid]);
                 Yii::$app->session['model'] = $array;  
            }else{
                print_r($model->getErrors());
                exit;
            }
        }
        return $this->redirect('purchaseinvoice?invoice=view');
    }else{
        echo "posat e naaahee hoowaa";

    }
     Yii::$app->session->close();
 }

     public function actionPurchaseinvoice(){
        $this->layout = "main-admin";
        if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    }

    if (isset(Yii::$app->session['invoicecode'])) {
        $shopproduct_id = Yii::$app->session['invoicecode'];
	
        $seller_id = Yii::$app->session['invoiceseller'];
        $whole_id = Yii::$app->session['invoicewhole'];
        $shopproduct = \app\models\ShopProduct::find()->where(['id'=>$shopproduct_id])->one();
        $wholesell = \app\models\ShopWholeSeller::find()->where(['id'=>$whole_id])->one();
        $seller = \app\models\Seller::find()->where(['id'=>$seller_id])->one();
        $imeis = \app\models\ShopProductImei::find()->where(['shop_product_id'=>$shopproduct_id])->all();
            }
            if(isset($_GET['invoice']) & $_GET['invoice']=='view'){
                 return $this->render('purchase-invoice',[
            'shopproduct' => $shopproduct,
            'wholesell' => $wholesell,
            'seller' => $seller,
            'imeis' => $imeis,
        ]);
             }else if(isset($_GET['invoice']) && $_GET['invoice']=='print'){
                 return $this->render('theinvoice',[
            'shopproduct' => $shopproduct,
            'wholesell' => $wholesell,
            'seller' => $seller,
            'imeis' => $imeis,
        ]);
            }
       
        Yii::$app->session->close();
     }
//managing products....
     public function actionManageproducts(){
        $this->layout = "main-admin";
        $logid = Yii::$app->util->loggedinUserId();
     
        $searchModel = new \app\models\ShopProductSearch();
        $searchModel->created_by = $logid;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

$dataProvider->pagination->pageSize= 8;
        return $this->render('manageproducts',[
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionViewproduct(){
        $this->layout = "main-admin";
        if(isset($_GET["pid"])){
            $product_id = $_GET["pid"];
            $shopproduct = \app\models\ShopProduct::find()->where(['id'=>$product_id])->one();
            $product = \app\models\Product::find()->where(['id'=>$shopproduct->product_id])->one();
             $brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one();
            $shop = \app\models\Shop::find()->where(['id'=>$shopproduct->shop_id])->one();
            $shopwhole = \app\models\ShopWholeSeller::find()->where(['id'=>$shopproduct->shop_id])->one();
            $seller = \app\models\Seller::find()->where(['id'=>$shopproduct->shop_id])->one();
        }
         
        if(isset($product) && $product!=null){

        
        return $this->render('viewproducts',[
            'shopproduct' => $shopproduct,
            'product' => $product,
            'shop' => $shop,
            'brand' => $brand,
        ]);
    }
    }
    public function actionUpdateproduct(){
      $this->layout = "main-admin";
       
        if(isset($_GET["pid"])){
            $product_id = $_GET["pid"];
            $shopproduct = \app\models\ShopProduct::find()->where(['id'=>$product_id])->one();
            $product = \app\models\Product::find()->where(['id'=>$shopproduct->product_id])->one();
             $brand = \app\models\Brand::find()->where(['id'=>$product->brand_id])->one();
            $shop = \app\models\Shop::find()->where(['id'=>$shopproduct->shop_id])->one();
        
         if($shopproduct->load(Yii::$app->request->post())){
            if($shopproduct->save()){
 if (!Yii::$app->session->getIsActive()) {
        Yii::$app->session->open();
    } 
            
          Yii::$app->session['success']='done';
          Yii::$app->session->close();
           return $this->render('updateproducts',[
            'shopproduct' => $shopproduct,
            'product' => $product,
            'shop' => $shop,
            'brand' => $brand,
        ]);
        }
       }else{
        

        
        return $this->render('updateproducts',[
            'shopproduct' => $shopproduct,
            'product' => $product,
            'shop' => $shop,
            'brand' => $brand,
        ]);
    
   }
}
    }

    //managing end



    public function actionProducts($bid)
    {
        $this->layout="main-admin";
     $searchModel = new ProductSearch();
     $searchModel->brand_id=$bid;
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination->pageSize= 10;

        return $this->render('products',[
            'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,

            ]
            );
    }

			public function actionCommentdelete()
			{




			if (\Yii::$app->request->isAjax) {

			$userID = \Yii::$app->request->post('dld');
			$success = 0;
			$query = Comments::find()->where(['id'=>$userID])->one();
			// print_r($query);
			// exit;
			if($query->delete()){
			$success = 1;
			exit;

			return json_encode(array(
			'success' => $success
			));


			}
			else{

			print_r($query->getErrors());
			exit;

			}

			}
			}
    /**
     * Displays a single Shop model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {$this->layout = 'main-admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
	
		public function actionPostDetail($id)
			{

		$model = \app\models\ShopPost::find()->where(['id'=>$id])->one();
		$modelimg = \app\models\ShopImg::find()->where(['shop_id'=>$model->id])->all();


		return $this->render('post_detail',
		[
		'model' => $model,
		'modelimg' => $modelimg,
		]);
		}
     public function actionDetails($sid)
    {   //$this->layout = "main-details";
        if(isset($_GET["sid"])){
            $sid=$_GET["sid"];
        }
         $dataProvider1 = new ActiveDataProvider([
    'query' => \app\models\ShopPost::find()->where(['shop_id'=>$sid]),
    'sort' => [
   'defaultOrder' => [
    'created_at' => SORT_DESC,
     ],
      ],
    ]);
        $user_id=\Yii::$app->util->loggedinUserId();
    
        $model= \app\models\Shop::find()->where(['id'=>$sid])->one();
        //meta tags
         \Yii::$app->view->registerMetaTag(['property'=>"og:title", 'content'=>$model->name],"og:title");
            \Yii::$app->view->registerMetaTag(['property'=>"og:description", 'content'=>strip_tags($model->about)],"og:description");
            
                \Yii::$app->view->registerMetaTag(['property'=>"og:image", 'content'=>Url::to(['/uploads/shop_cover/<?=$model->id?>/<?=$model->cover?>'],true)],"og:image");
                \Yii::$app->view->registerMetaTag(['property'=>"og:image:width","content"=>"650"],"og:image:width");
                \Yii::$app->view->registerMetaTag(['property'=>"og:image:height", "content"=>"350"],"og:image:height");
            
            \Yii::$app->view->registerMetaTag(['property'=>"og:url", 'content'=>\Yii::$app->urlManager->createAbsoluteUrl(['/shop/details', $model->id])],"og:url");
            \Yii::$app->view->registerMetaTag(['property'=>"og:type", 'content'=>'Shop'],"og:type");
                    // open a session
            $session = Yii::$app->session;
            if(!isset($_SESSION['shopviews']))
            {
                $_SESSION['shopviews'] = [];
            }

            if(!in_array($model->id , $_SESSION['shopviews']))
            {   
                array_push($_SESSION['shopviews'],$model->id);
                $count = $model->views;
                if($count == null)
                {
                    $count=0;
                }
                $model->views = $count+1;
                $model->save(false);
            }
    $user= \app\models\User::find()->where(['id'=>$model->created_by])->one();
            
            $user_id=\Yii::$app->util->loggedinUserId();
        
         $review = \app\models\ShopReviews::find()->byUserbyShop($user_id, $model->id);
        
            if(!isset($review))
            {
                 // print_r($review);
                //    exit();

                $review = new \app\models\ShopReviews;
                $review->user_id= \Yii::$app->util->encrypt($user_id);
                $review->shop_id = \Yii::$app->util->encrypt($model->id);
                // print_r($review->shop_id);
                //      exit();
                
            }

            
        return $this->render('details',[
            'model' => $model,
			'dataProvider1' => $dataProvider1,
            'user' => $user,
            'review' => $review,


        ]);
    }
	public function actionCommentajax()
    {
          $success = 0;
   $modelcomments= new Comments();
        if (\Yii::$app->request->isAjax) {
   
            $userID = \Yii::$app->request->post('dld');
            $text = \Yii::$app->request->post('text');
  
  $id = \Yii::$app->util->loggedinUserId();
   
                          $modelcomments->created_by=$id;
         $modelcomments->comment=$text;
         $modelcomments->comment_time=date('Y-m-d');
         $modelcomments->user_product_id = $userID;
         if($modelcomments->save())
         {
          
         }
         else {
          
              }
   
            // $gymID = Yii::$app->util->decrypt(\Yii::$app->request->post('gymid'));
            // $gymLike = \app\models\GymLikes::find()->byUserGym($userID, $gymID);
   
        }
        return json_encode(array(
            'success' => $success
        ));
  
 } 
  
 public function actionSingle($id)
    {
 
  
  $model = \app\models\ShopPost::find()->where(['id'=>$id])->one();
  $modelimg = \app\models\ShopImg::find()->where(['shop_id'=>$model->id])->all();
  
  
  $user_id = \Yii::$app->util->loggedinUserId();
  if($user_id)
  {

              
			  $model1= \app\models\Product::find()->where(['status' => 1,'id'=>$id])->one();
			  $modelcomments= new Comments();
			  $postcoment= Comments::find()->where(['user_product_id' => $id])->all();
       
  
				  if(isset($_POST['id']))
					{
					 
					   print_r($_POST['id']);
						exit;
					   
			  
			 
					 
					 $modelcomments->created_by=$user_id;
					 $modelcomments->user_product_id=$id;
					 // print_r($user_id);
					 // exit;
					 $modelcomments->comment=$_POST['comment'];
					 $modelcomments->comment_time=date('Y-m-d');
					 if($modelcomments->save())
					 {
					  return $this->redirect(['single', 'id' =>$id]);
					 }else{
					  print_r($modelcomments->getErrors());
					  exit;
					 }
					}
					
					return $this->render('single',
			        [
						'model' => $model,
						'model1' => $model1,
						'modelimg' => $modelimg,
						'modelcomments' => $modelcomments,
						'postcoment' => $postcoment,
						'id' => $id,
					]);
		
   }else{
	   echo '<a href="/site/login"><h1 style='.'color:red;'.'>First Login Please</h1></a>';
	   
   }
      }
    /**
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'main-admin';
        $model = new Shop();

         if ($model->load(Yii::$app->request->post())) {
                    
                    $imageFile = UploadedFile::getInstance($model, 'logo');
                    $imageFile2 = UploadedFile::getInstance($model, 'cover');
                if(isset($imageFile) && isset($imageFile2) ) 
                { 
                $fileName =rand(1000,99999999).'.'. $imageFile->extension; 
                $fileName2 =rand(1000,99999999).'.'. $imageFile->extension; 
            
                $model->logo = $fileName; 
                
                $model->cover = $fileName2; 
                 }
                 
            $shop=$_POST['Shop'];
                // get model state its in string
            // check we have stat in db else create it
            $stateName = $shop["state_id"];
            
        
            $state = \app\models\State::find()->byName($stateName);
            if(!isset($state))
            {
                $state = new \app\models\State;
                $state->name = $stateName;
                
                //$state->created_at = date('Y-m-d h:i:s');
                $state->save();
            }
            // get model city_id its in string
            // check we have city 

            $cityName=$shop["city_id"];
            $city = \app\models\City::find()->byStateName($state->id,$cityName);
            if(!isset($city))
            {

                $city = new \app\models\City;
                
                $city->name = $cityName;
            
                $city->state_id = $state->id;

                //$city->country_id="0009";
                //$city->created_by = \Yii::$app->util->loggedinUserId();
                //$city->created_at = date('Y-m-d h:i:s');
                $city->save(false);
            }
            $model->city_id = $city->id;
            $model->state_id = $state->id;
            //$model->street = $_POST['loc'];
            $model->address = $shop["address"];
            
            $model->created_at=date('Y-m-d h:i:sa');
            $model->created_by = \Yii::$app->util->loggedinUserId();
             if($model->save())
             { 
                  $directory = Yii::$app->util->getShoplogoDirectory($model->id);
                  $directory2 = Yii::$app->util->getShopcoverDirectory($model->id);
                    if (!is_dir($directory) && !is_dir($directory2))
                { 
                  FileHelper::createDirectory($directory);
                  FileHelper::createDirectory($directory2);
                } 
                if(isset($imageFile)  ) 
                {   $filePath = $directory . $fileName; 
                 $imageFile->saveAs($filePath); 
              
              
                 }
                 if( isset($imageFile2) ) 
                { 
                 $filePath2 = $directory2 . $fileName2; 
               $imageFile2->saveAs($filePath2); 
              
                 }
                 
                  \Yii::$app->session->setFlash('success', Yii::t('app',"Your Item created successfully!"));
              
                
           return $this->redirect(['view', 'id' => $model->id]);
             }
             else{
                 print_r($model->getErrors());
                 exit();
             }
             
        } 
            
         else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    
    }
      public function actionImicheck(){
	if(!empty($_POST["imi"])&&!empty($_POST["sameimei"])) {
	$imi= $_POST["imi"];
	$sameimei= $_POST["sameimei"];
	$complete_imi=$sameimei.$imi;
	
	$model = \app\models\ShopProductImei::find()->where(['imei'=>$complete_imi])->all();
if(isset($model) && !empty($model))
{

echo "<span style='color:red'> IMEI already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> IMEI available</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
	  }

    public function actionAllshops(){
        $this->layout="main";
        $shops = \app\models\City::find()->all();
        return $this->render('shopbycity',[
            'model' => $shops,
        ]);
    }
        public function actionLike() {
        $success = 0;
      
            
        if (\Yii::$app->request->isAjax) {
            // echo "cjhvsjhcvcvdjcvsdkc";
            // exit();
            $userID = Yii::$app->util->decrypt(\Yii::$app->request->post('userid'));
            $shopID = Yii::$app->util->decrypt(\Yii::$app->request->post('shopid'));


            $shopLike = \app\models\ShopLikes::find()->byUserShop($userID, $shopID);
            if (isset($shopLike)) {
                $delete = $productLike->delete();
                $success = 2;
            } else {
                $newLike = new \app\models\ShopLikes();
                $newLike->shop_id = $shopID;
                $newLike->user_id = $userID;
                $newLike->created_at=date('Y-m-d h:i:sa');
                
                // print_r($newLike);
                // exit();

                if ($newLike->save()) {
                    echo "Ho gya wa";
                    exit();
                }
                else{
                    print_r("ni hoya bhai" );
                     print_r($newLike->getErrors());
                    exit();
                }
                
                
                $success = 1;
            }
        }
        return json_encode(array(
            'success' => $success
        ));
    }
    /**
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'main-admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            
                $imageFile = UploadedFile::getInstance($model, 'logo');
                    $imageFile2 = UploadedFile::getInstance($model, 'cover');
                if(isset($imageFile) && isset($imageFile2) ) 
                { 
                $fileName =rand(1000,99999999).'.'. $imageFile->extension; 
                $fileName2 =rand(1000,99999999).'.'. $imageFile->extension; 
                 $directory = Yii::$app->util->getShoplogoDirectory($model->id);
                  $directory2 = Yii::$app->util->getShopcoverDirectory($model->id);
                    if (!is_dir($directory) && !is_dir($directory2))
                { 
                  FileHelper::createDirectory($directory);
                  FileHelper::createDirectory($directory2);
                } 
                $filePath = $directory . $fileName; $model->logo = $fileName; 
                $filePath2 = $directory2 . $fileName2; $model->cover = $fileName2; 
                 }
    
                // get model state its in string
            // check we have stat in db else create it
            $stateName = $model->state_id;
            $state = \app\models\State::find()->byName($stateName);
            if(!isset($state))
            {
                $state = new \app\models\State;
                $state->name = $stateName;
                
                //$state->created_at = date('Y-m-d h:i:s');
                $state->save();
            }
            // get model city_id its in string
            // check we have city 

            $cityName=$model->city_id;
            $city = \app\models\City::find()->byStateName($state->id,$cityName);
            if(!isset($city))
            {

                $city = new \app\models\City;
                
                $city->name = $cityName;
            
                $city->state_id = $state->id;

                //$city->country_id="0009";
                //$city->created_by = \Yii::$app->util->loggedinUserId();
                //$city->created_at = date('Y-m-d h:i:s');
                $city->save(false);
            }
             if($model->save())
             { 
                if(isset($imageFile) && isset($imageFile2) ) 
                { 
                 $imageFile->saveAs($filePath); 
               $imageFile2->saveAs($filePath2); 
                 }
                  \Yii::$app->session->setFlash('success', Yii::t('app',"Your Item Updated successfully!"));
              
                
           return $this->redirect(['view', 'id' => $model->id]);
             }
             else{
                 print_r($model->getErrors());
                 exit();
             }
             
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Shop model.
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
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionFeatured()
    {   
        $this->layout = 'main-admin';
        $searchModel = \app\models\Shop::find()->all();
        
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('featured', [
            'model' => $searchModel,
            //'dataProvider' => $dataProvider,
            
            
        ]);
     
    }
     public function actionOperations($id)
    {
        $this->layout='main-admin';
         $id = Yii::$app->util->decrypt($_GET['id']);
        
         $model = new Shop();
        $facilityItems = $model->shopFacilities;
        $opItems = $model->shopBussinessDay;
        
        if(!isset($opItems) || count($opItems) <= 0)
        {
            $businessDays = \app\models\BusinessDay::find()->all();
            foreach($businessDays as $businessDay) {
                $branchInfo = new \app\models\ShopBusinessDay;
                
                $branchInfo->business_day_id = $businessDay->id;
                $opItems[] = $branchInfo;
            }
        }

    
        
        if ($model->load(Yii::$app->request->post())) {
            
        $info=$_POST["ShopOperationalInfo"];
        $new_entry=true;
        $facilities=$_POST["Shop"];
        //Start update check
        $bid=$info[0]["Shop_id"];;
        $sql = "SELECT * FROM shop_business_day where shop_id='$bid' ";
                $operations = \app\models\ShopBussinessDay::findBySql($sql)->all();
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
        $sql = "SELECT * FROM Shop_facility where shop_id='$bid' ";
                $old_facilities = \app\models\ShopFacility::findBySql($sql)->all();
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
            
            $branchFacilities = new \app\models\ShopFacility;
            $branchFacilities->Shop_id=$bid;        
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
            
            $branchFacilities = new \app\models\ShopFacility;
            $branchFacilities->Shop_id=$info[0]["Shop_id"];     
            $branchFacilities->facility_id=$facility[0];
            $branchFacilities->created_by=Yii::$app->util->loggedinUserId();
            if($branchFacilities->save())
            {
    
                
            }else{var_dump($branchFacilities->getErrors());}
            
            
                
            }
    
        for($i=0;$i<count($info);$i++)
        {
            $branchInfo = new \app\models\ShopOperationalInfo;
        $bid=$info[$i]["Shop_id"];
    
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
            return $this->render('shopoperations', [
                 'model' => $model,
                'opItems' => $opItems,
            ]);
        }
    }
        public function actionAccept()
    {
        $featured=new ShopFeatured();
        $id = Yii::$app->util->decrypt($_POST['id']);
         $featured=\app\models\ShopFeatured::find()->where(['shop_id'=>$id])->one();
         
         if (!isset($featured))
          {
            $featured= new \app\models\ShopFeatured();

            }
        
        if(isset($_POST['start']) && isset($_POST['close']) && !empty($_POST['start']) && !empty($_POST['close']) ){
            $start =$_POST['start'];
            $close =$_POST['close'];
            
        }else
        {
            $start =date('y-m-d');
            $close =date('y-m-d');
        }
        
        
        if(!empty($id))
        {
             $shop=\app\models\Shop::find()->where(['id'=> $featured->shop_id])->one();
			 $shop->status=1;
			 $shop->save(false);
             $featured->shop_id=$id;
            $featured->start_date=$start;
            $featured->end_date=$close;
            if($featured->save(false))
            {
                \Yii::$app->session->setFlash('success', Yii::t('app',"Featured successfully!"));   
                $data = ['status'=>'success'];
                echo json_encode($data);
                exit;
            }
        }
    }   
    public function actionReject()
    {
                $featured=new ShopFeatured();

        $id = Yii::$app->util->decrypt($_POST['id']);
         $featured=\app\models\ShopFeatured::find()->where(['shop_id'=>$id])->one();
        
        if(!empty($id))
        {
                    
       

      
            if($featured->delete())
            {
                \Yii::$app->session->setFlash('danger', Yii::t('app',"Un Featured successfully!")); 
                $data = ['status'=>'success'];
                echo json_encode($data);
                exit;
            }
        }
    }
}
