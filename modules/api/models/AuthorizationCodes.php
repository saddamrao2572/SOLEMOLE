<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "authorization_codes".
 *
 * @property int $id
 * @property string $code
 * @property int $expires_at
 * @property int $user_id
 * @property string $app_id
 * @property string $created_at
 * @property string $updated_at
 */
class AuthorizationCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authorization_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'expires_at', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['expires_at', 'user_id','expired'], 'integer'],
            [['code'], 'string', 'max' => 300],
            [['app_id', 'created_at', 'updated_at'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'expires_at' => 'Expires At',
            'expired' => 'Expired Status',
            'user_id' => 'User ID',
            'app_id' => 'App ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function isValid($code)
    {
        $model=static::findOne(['code' => $code]);

        if(!$model||$model->expires_at<time())
        {
            Yii::$app->api->sendFailedResponse("Authcode Expired");
            return(false);
        }
        else
            return($model);
    }
}
