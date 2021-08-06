<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_category".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $category_id
 * @property string $status
 */
class ShopCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'category_id', 'status'], 'string', 'max' => 255],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopCategoryQuery(get_called_class());
    }
}
