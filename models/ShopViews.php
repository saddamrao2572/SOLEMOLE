<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_views".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $shop_id
 * @property string $created_at
 */
class ShopViews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_id'], 'integer'],
            [['shop_id'], 'required'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopViewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopViewsQuery(get_called_class());
    }
}
