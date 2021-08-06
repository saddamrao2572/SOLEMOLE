<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "new_product_sale".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $created_at
 * @property string $contact
 * @property integer $brand_id
 * @property string $product_id
 * @property string $nickname
 * @property string $buyername
 * @property string $sameimei
 * @property string $price
 * @property integer $paid
 * @property string $created_by
 * @property string $quantity
 * @property integer $discount
 * @property string $status
 * @property string $img
 * @property string $cnic
 * @property string $warranty
 */
class NewProductSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'new_product_sale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['shop_id', 'brand_id', 'paid', 'discount'], 'integer'],
            //[['contact', 'paid', 'discount', 'cnic'], 'required'],
            [['created_at',  'buyername',  'status', 'img', 'cnic', 'warranty' , 'invoice_no'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 20],
            [['nickname'], 'string', 'max' => 30],
           
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
            'shop_id' => Yii::t('app', 'Shop ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'contact' => Yii::t('app', 'Contact'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'nickname' => Yii::t('app', 'Nickname'),
            'buyername' => Yii::t('app', 'Buyername'),
            
            'price' => Yii::t('app', 'Price'),
            'paid' => Yii::t('app', 'Paid'),
            'created_by' => Yii::t('app', 'Created By'),
            'quantity' => Yii::t('app', 'Quantity'),
            'discount' => Yii::t('app', 'Discount'),
            'status' => Yii::t('app', 'Status'),
            'img' => Yii::t('app', 'Img'),
            'cnic' => Yii::t('app', 'Cnic'),
            'warranty' => Yii::t('app', 'Warranty'),
            'invoice_no' => Yii::t('app', 'Invoice'),
        ];
    }



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

    /**
     * @inheritdoc
     * @return NewProductSaleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewProductSaleQuery(get_called_class());
    }
}
