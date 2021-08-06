<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_views".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $shop_id
 * @property integer $product_id
 * @property string $created_at
 */
class ProductViews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_id', 'product_id'], 'integer'],
            [['shop_id', 'product_id'], 'required'],
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
            'product_id' => Yii::t('app', 'Product ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductViewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductViewsQuery(get_called_class());
    }
}
