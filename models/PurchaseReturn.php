<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase_return".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $customer_id
 * @property string $created_at
 * @property string $quantity
 * @property string $off
 * @property string $reasone
 * @property string $whole_sel_id
 */
class PurchaseReturn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_return';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'customer_id', 'created_at', 'quantity', 'off', 'reasone', 'whole_sel_id'], 'string', 'max' => 255],
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
            'created_at' => Yii::t('app', 'Created At'),
            'quantity' => Yii::t('app', 'Quantity'),
            'off' => Yii::t('app', 'Off'),
            'reasone' => Yii::t('app', 'Reasone'),
            'whole_sel_id' => Yii::t('app', 'Whole Sel ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return PurchaseReturnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PurchaseReturnQuery(get_called_class());
    }
}
