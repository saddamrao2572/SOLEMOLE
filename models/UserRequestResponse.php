<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_request_response".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $shop_id
 * @property string $response
 * @property string $price
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 */
class UserRequestResponse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_request_response';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_id', 'response', 'price', 'status', 'created_at', 'created_by'], 'string', 'max' => 255],
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
            'response' => Yii::t('app', 'Response'),
            'price' => Yii::t('app', 'Price'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return UserRequestResponseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRequestResponseQuery(get_called_class());
    }
}
