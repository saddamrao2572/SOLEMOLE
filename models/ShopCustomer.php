<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_customer".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $customer_id
 * @property string $quantity
 * @property string $discount
 * @property string $price
 * @property string $total_price
 * @property string $created_at
 * @property string $created_by
 * @property string $category_id
 */
class ShopCustomer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'customer_id', 'quantity', 'discount', 'price', 'total_price', 'created_at', 'created_by', 'category_id'], 'string', 'max' => 255],
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
            'customer_id' => Yii::t('app', 'Customer ID'),
            'quantity' => Yii::t('app', 'Quantity'),
            'discount' => Yii::t('app', 'Discount'),
            'price' => Yii::t('app', 'Price'),
            'total_price' => Yii::t('app', 'Total Price'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopCustomerQuery(get_called_class());
    }
}
