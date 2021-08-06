<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_union".
 *
 * @property integer $id
 * @property string $association_name
 * @property string $president_name
 * @property string $president_number
 * @property string $gen_sec_name
 * @property string $gen_sec_number
 * @property integer $city_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $status
 */
class ShopUnion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_union';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['association_name', 'president_name', 'president_number', 'gen_sec_name', 'gen_sec_number', 'city_id', 'created_by', 'created_at', 'status'], 'required'],
            [['city_id', 'created_by', 'status'], 'integer'],
            [['association_name', 'president_number', 'gen_sec_name', 'gen_sec_number'], 'string', 'max' => 255],
            [['president_name'], 'string', 'max' => 200],
            [['created_at'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'association_name' => Yii::t('app', 'Association Name'),
            'president_name' => Yii::t('app', 'President Name'),
            'president_number' => Yii::t('app', 'President Number'),
            'gen_sec_name' => Yii::t('app', 'Gen Sec Name'),
            'gen_sec_number' => Yii::t('app', 'Gen Sec Number'),
            'city_id' => Yii::t('app', 'City ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopUnionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopUnionQuery(get_called_class());
    }
}
