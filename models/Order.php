<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $order_date
 * @property string $order_type
 * @property integer $status
 * @property integer $customer_id
 * @property integer $paid_amount
 * @property integer $total_amount
 * @property integer $book_no
 * @property integer $page_no
 * @property integer $created_by
 * @property string $invoice_no
 * @property string $month
 * @property string $year
 * @property string $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'order_date', 'order_type', 'customer_id', 'paid_amount', 'total_amount', 'created_by', 'invoice_no'], 'required'],
            [['shop_id', 'status', 'customer_id', 'paid_amount', 'total_amount', 'created_by','book_no','page_no'], 'integer'],
            [[ 'updated_at','book_no','page_no','status'], 'safe'],
            [['order_type', 'month', 'year'], 'string', 'max' => 30],
            [['invoice_no'], 'string', 'max' => 255],
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
            'order_date' => Yii::t('app', 'Order Date'),
            'order_type' => Yii::t('app', 'Order Type'),
            'status' => Yii::t('app', 'Status'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'paid_amount' => Yii::t('app', 'Paid Amount'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'created_by' => Yii::t('app', 'Created By'),
            'invoice_no' => Yii::t('app', 'Invoice No'),
            'month' => Yii::t('app', 'Month'),
            'year' => Yii::t('app', 'Year'),
            'book_no' => Yii::t('app', 'Book No'),
            'page_no' => Yii::t('app', 'Page No'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
