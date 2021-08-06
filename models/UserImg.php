<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_img".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $user_id
 * @property string $created_at
 * @property string $created_by
  * @property string $img
 */
class UserImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id',  'created_at', 'created_by','img'], 'string', 'max' => 255],
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
        
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
             'img' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserImgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserImgQuery(get_called_class());
    }
}
