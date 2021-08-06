<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seller".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property integer $city_id
 * @property string $state_id
 * @property string $img
 * @property string $cnic
 * @property integer $shop_id
 */
class Seller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'shop_id'], 'integer'],
            [['name', 'mobile', 'state_id', 'img', 'cnic'], 'string', 'max' => 255],
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
            'mobile' => Yii::t('app', 'Mobile'),
            'city_id' => Yii::t('app', 'City ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'img' => Yii::t('app', 'Img'),
            'cnic' => Yii::t('app', 'Cnic'),
            'shop_id' => Yii::t('app', 'Shop ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return SellerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SellerQuery(get_called_class());
    }
}
