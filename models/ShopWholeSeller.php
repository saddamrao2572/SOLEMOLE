<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_whole_seller".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $product_id
 * @property string $quantity
 * @property string $whole_seller_id
 * @property string $price
 * @property string $discount
 * @property string $total_price
 * @property string $created_at
 * @property string $created_by
 * @property string $category_id
 */
class ShopWholeSeller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_whole_seller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['shop_id', 'product_id', 'quantity', 'whole_seller_id', 'price', 'discount', 'total_price', 'created_at', 'created_by', 'category_id'], 'string', 'max' => 255],
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
            'product_id' => Yii::t('app', 'Product ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'whole_seller_id' => Yii::t('app', 'Whole Seller ID'),
            'price' => Yii::t('app', 'Price'),
            'discount' => Yii::t('app', 'Discount'),
            'total_price' => Yii::t('app', 'Total Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopWholeSellerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopWholeSellerQuery(get_called_class());
    }
}
