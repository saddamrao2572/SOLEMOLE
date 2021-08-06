<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_deals".
 *
 * @property integer $id
 * @property string $shop_name
 * @property integer $person_name
 * @property string $product_id
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property integer $contact_no
 */
class ProductDeals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_deals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_name', 'person_name', 'product_id', 'status', 'created_at', 'created_by', 'contact_no'], 'required'],
            [[ 'status', 'created_by', 'contact_no','imi'], 'integer'],
            [['created_at'], 'safe'],
            [['shop_name', 'product_id','person_name','price'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_name' => Yii::t('app', 'Shop Name'),
            'person_name' => Yii::t('app', 'Person Name'),
            'product_id' => Yii::t('app', 'Product ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'contact_no' => Yii::t('app', 'Contact No'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductDealsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductDealsQuery(get_called_class());
    }
}
