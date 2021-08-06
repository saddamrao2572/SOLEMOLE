<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_request".
 *
 * @property integer $id
 * @property string $shop_id
 * @property string $product_id
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 */
class UserRequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'product_id', 'status', 'created_at', 'created_by'], 'string', 'max' => 255],
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
            'product_id' => Yii::t('app', 'Product ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserRequestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRequestQuery(get_called_class());
    }
}
