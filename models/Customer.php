<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $cnic
 * @property string $address
 * @property string $cnicimg_front
 * @property string $cnicimg_back
 * @property string $city_id
 * @property string $state_id
 * @property string $img
 * @property integer $created_by
 * @property string $created_at
 * @property integer $status
 * @property integer $shop_id
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'created_by', 'shop_id'], 'required'],
            [['created_by', 'status', 'shop_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'mobile', 'cnic', 'address', 'cnicimg_front', 'cnicimg_back', 'city_id', 'state_id', 'img'], 'string', 'max' => 255],
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
            'cnic' => Yii::t('app', 'Cnic'),
            'address' => Yii::t('app', 'Address'),
            'cnicimg_front' => Yii::t('app', 'Cnicimg Front'),
            'cnicimg_back' => Yii::t('app', 'Cnicimg Back'),
            'city_id' => Yii::t('app', 'City ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'img' => Yii::t('app', 'Img'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
            'shop_id' => Yii::t('app', 'Shop ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
}
