<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "netcash_deals".
 *
 * @property integer $id
 * @property integer $amount
 * @property string $shop_name
 * @property string $person_name
 * @property integer $contact_no
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 */
class NetcashDeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'netcash_deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'shop_name', 'person_name', 'contact_no', 'status', 'created_at', 'created_by'], 'required'],
            [['amount', 'contact_no', 'status', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['shop_name', 'person_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'amount' => Yii::t('app', 'Amount'),
            'shop_name' => Yii::t('app', 'Shop Name'),
            'person_name' => Yii::t('app', 'Person Name'),
            'contact_no' => Yii::t('app', 'Contact No'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return NetcashDealsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NetcashDealsQuery(get_called_class());
    }
}
