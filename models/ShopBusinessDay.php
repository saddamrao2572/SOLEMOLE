<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_business_day".
 *
 * @property integer $id
 * @property integer $business_day_id
 * @property integer $shop_id
 *
 * @property BusinessDay $businessDay
 * @property Shop $shop
 */
class ShopBusinessDay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_business_day';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['business_day_id', 'shop_id'], 'required'],
            [['business_day_id', 'shop_id'], 'integer'],
            [['business_day_id'], 'exist', 'skipOnError' => true, 'targetClass' => BusinessDay::className(), 'targetAttribute' => ['business_day_id' => 'id']],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'business_day_id' => Yii::t('app', 'Business Day ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessDay()
    {
        return $this->hasOne(BusinessDay::className(), ['id' => 'business_day_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @inheritdoc
     * @return ShopBusinessDayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopBusinessDayQuery(get_called_class());
    }
}
