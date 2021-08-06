<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_img".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $img
 */
class ShopImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'img'], 'string', 'max' => 255],
			 [['shop_id'], 'integer', 'max' => 255],
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
            'img' => Yii::t('app', 'Img'),
        ];
    }

    /**
     * @inheritdoc
     * @return ShopImgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopImgQuery(get_called_class());
    }
}
