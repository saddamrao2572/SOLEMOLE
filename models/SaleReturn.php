<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_return".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $brand_id
 * @property string $product_id
 * @property string $quantity
 * @property string $reasone
 * @property string $created_at
 * @property string $created_by
 * @property string $customer_name
 * @property string $contact
 * @property string $cinc
 * @property string $img
 */
class SaleReturn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_return';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'quantity', 'reasone', 'created_at',  'customer_name', 'contact', 'cinc', 'img' ,'invoice_no' ], 'string', 'max' => 255],
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
            'brand_id' => Yii::t('app', 'Brand ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'reasone' => Yii::t('app', 'Reasone'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'customer_name' => Yii::t('app', 'Customer Name'),
            'price' => Yii::t('app', 'Price'),
            'contact' => Yii::t('app', 'Contact'),
            'cinc' => Yii::t('app', 'Cinc'),
            'img' => Yii::t('app', 'Img'),
            'invoice_no' => Yii::t('app', 'Invoice ID'),
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
     * @return SaleReturnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaleReturnQuery(get_called_class());
    }
}
