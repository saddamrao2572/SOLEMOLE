<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_details".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $brand_id
 * @property string $imei
 * @property string $fault
 * @property string $condition
 * @property integer $discount
 * @property string $warranty
 * @property string $invoice_no
 * @property string $remarks
 */
class OrderDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'imei', 'invoice_no'], 'required'],
            [['product_id', 'brand_id', 'discount'], 'integer'],
            [['imei', 'condition'], 'string', 'max' => 20],
            [['fault', 'remarks'], 'string', 'max' => 255],
            [['warranty'], 'string', 'max' => 100],
            [['invoice_no'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'imei' => Yii::t('app', 'Imei'),
            'fault' => Yii::t('app', 'Fault'),
            'condition' => Yii::t('app', 'Condition'),
            'discount' => Yii::t('app', 'Discount'),
            'warranty' => Yii::t('app', 'Warranty'),
            'invoice_no' => Yii::t('app', 'Invoice No'),
            'remarks' => Yii::t('app', 'Remarks'),
        ];
    }

    /**
     * @inheritdoc
     * @return OrderDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderDetailsQuery(get_called_class());
    }
}
