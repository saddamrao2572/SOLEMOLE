<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_product".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 * @property string $category_id
 * @property string $price
 * @property string $color
 * @property string $size
 * @property string $condition
 */
class UserProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'status', 'created_at', 'created_by', 'category_id', 'price', 'color', 'size', 'condition'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'category_id' => Yii::t('app', 'Category ID'),
            'price' => Yii::t('app', 'Price'),
            'color' => Yii::t('app', 'Color'),
            'size' => Yii::t('app', 'Size'),
            'condition' => Yii::t('app', 'Condition'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProductQuery(get_called_class());
    }
}
