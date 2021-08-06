<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "whole_seller".
 *
 * @property integer $id
 * @property string $name
 * @property string $state_id
 * @property string $mobile
 * @property string $img
 * @property string $address
 * @property string $lan
 * @property string $lat
 * @property string $brand_id
 * @property string $vender_id
 * @property string $shop_id
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 */
class WholeSeller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'whole_seller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'state_id', 'mobile', 'img', 'address', 'lan', 'lat', 'brand_id', 'vender_id', 'shop_id', 'status', 'created_at', 'created_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'state_id' => Yii::t('app', 'State ID'),
            'mobile' => Yii::t('app', 'Mobile'),
            'img' => Yii::t('app', 'Img'),
            'address' => Yii::t('app', 'Address'),
            'lan' => Yii::t('app', 'Lan'),
            'lat' => Yii::t('app', 'Lat'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'vender_id' => Yii::t('app', 'Vender ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return WholeSellerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WholeSellerQuery(get_called_class());
    }
}
