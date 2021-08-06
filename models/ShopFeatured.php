<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_featured".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property string $start_date
 * @property string $end_date
 * @property string $created_at
 */
class ShopFeatured extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_featured';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id'], 'required'],
            [['shop_id'], 'integer'],
            [['start_date', 'end_date', 'created_at'], 'safe'],
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
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopFeaturedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopFeaturedQuery(get_called_class());
    }
}
