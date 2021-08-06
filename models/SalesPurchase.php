<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_purchase".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $brand_id
 * @property integer $product_id
 * @property integer $created_by
 * @property string $sellername
 * @property string $nickname
 * @property string $imei
 * @property string $type
 * @property string $cnic
 * @property string $img
 * @property string $price
 * @property string $paid
 * @property string $fault
 * @property string $condition
 * @property string $discount
 * @property string $warranty
 * @property string $status
 * @property string $created_at
 */
class SalesPurchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['shop_id', 'brand_id', 'product_id', 'created_by'], 'integer'],
            [['created_at' , 'img' ,'month' , 'year'], 'safe'],
            [['name', 'nickname', 'imei', 'type', 'cnic', 'img', 'price', 'paid', 'fault','condition', 'discount', 'warranty', 'status' , 'contact' , 'invoice_no'], 'string','max' => 255],

            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
          
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', 'Shop Name'),
            'invoice_no' => Yii::t('app', 'Invoice#'),
            'brand_id' => Yii::t('app', 'Brand Name'),
            'product_id' => Yii::t('app', 'Product Name'),
            'created_by' => Yii::t('app', 'Created By'),
            'name' => Yii::t('app', 'Seller/Buyer Name'),
            'nickname' => Yii::t('app', 'Nickname'),
            'imei' => Yii::t('app', 'Imei'),
            'type' => Yii::t('app', 'Type'),
            'contact' => Yii::t('app', 'Contact'),
            'cnic' => Yii::t('app', 'Cnic'),
            'img' => Yii::t('app', 'Img'),
            'price' => Yii::t('app', 'Price'),
            'paid' => Yii::t('app', 'Paid'),
            'fault' => Yii::t('app', 'Fault'),
            'condition' => Yii::t('app', 'Condition'),
            'discount' => Yii::t('app', 'Discount'),
            'warranty' => Yii::t('app', 'Warranty'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'month' => Yii::t('app', 'Month'),
            'year' => Yii::t('app', 'Year'),
        ];
    }

    /**
     * @inheritdoc
     * @return SalesPurchaseQuery the active query used by this AR class.
     */


    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }


    public static function find()
    {
        return new SalesPurchaseQuery(get_called_class());
    }
}
