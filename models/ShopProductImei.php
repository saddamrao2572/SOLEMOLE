<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_product_imei".
 *
 * @property integer $id
 * @property integer $shop_product_id
 * @property string $imei
 * @property string $cndition
 * @property string $shop_id
 * @property string $created_at
 */
class ShopProductImei extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_imei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['shop_product_id'], 'required'],
            // [['shop_product_id'], 'integer'],
            [['imei','shop_id','created_at'], 'string', 'max' => 30],
            [['cndition'], 'string', 'max' => 10],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['shop_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['shop_product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_product_id' => Yii::t('app', 'Shop Product ID'),
            'imei' => Yii::t('app', 'Imei'),
            'cndition' => Yii::t('app', 'Condition'),
            'created_at' => Yii::t('app', 'Created At'),
            'shop_id' => Yii::t('app', 'Shop'),
        ];
    }



    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(User::className(), ['id' => 'shop_product_id']);
    }
}
