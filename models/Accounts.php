<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accounts".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property integer $whole-seller_id
 * @property integer $pending
 * @property integer $paid
 * @property integer $total
 * @property integer $shop_id
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $status
 */
class Accounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'whole-seller_id', 'pending', 'paid', 'total', 'shop_id', 'created_at', 'created_by', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'whole-seller_id' => Yii::t('app', 'Whole Seller ID'),
            'pending' => Yii::t('app', 'Pending'),
            'paid' => Yii::t('app', 'Paid'),
            'total' => Yii::t('app', 'Total'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return AccountsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccountsQuery(get_called_class());
    }
}
