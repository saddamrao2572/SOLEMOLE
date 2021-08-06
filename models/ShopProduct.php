<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_product".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $status
 * @property integer $shop_id
 * @property integer $brand_id
 * @property string $created_at
 * @property string $created_by
 * @property string $price
 * @property string  $nickname
 * @property string  $sameimei
 * @property integer $paid

 */
class ShopProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id','brand_id','paid'],'integer'],
            [['product_id', 'status', 'created_at', 'created_by', 'price','nickname','sameimei'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
          
            
            'price' => Yii::t('app', 'Price'),
             'shop_id' => Yii::t('app', 'Shop'),
             'brand_id' => Yii::t('app', 'Brand'),
            
             'nickname' => Yii::t('app', 'Nickname'),
             'sameimei' => Yii::t('app', 'Same Imei'),
             'paid' => Yii::t('app', 'Paid'),
            
        ];
    }

	  public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    /**
     * @inheritdoc
     * @return ShopProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopProductQuery(get_called_class());
    }
}
