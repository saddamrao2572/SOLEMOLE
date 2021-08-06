<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $img
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		[['img'], 'required'],
            [[ 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product'),
            'img' => Yii::t('app', 'Gallery Upload'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductImageQuery(get_called_class());
    }
}
