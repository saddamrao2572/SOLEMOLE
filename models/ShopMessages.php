<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_messages".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $shop_id
 * @property integer $status
 * @property integer $seen
 * @property string $message
 * @property string $created_at
 *
 * @property Shop $shop
 * @property User $user
 */
class ShopMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'shop_id', 'message'], 'required'],
            [['user_id', 'shop_id', 'status', 'seen'], 'integer'],
            [['created_at'], 'safe'],
            [['message'], 'string', 'max' => 1000],
            [['shop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shop::className(), 'targetAttribute' => ['shop_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'status' => Yii::t('app', 'Status'),
            'seen' => Yii::t('app', 'Seen'),
            'message' => Yii::t('app', 'Message'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShop()
    {
        return $this->hasOne(Shop::className(), ['id' => 'shop_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return ShopMessagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopMessagesQuery(get_called_class());
    }
}
