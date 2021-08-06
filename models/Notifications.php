<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property string $id
 * @property string $shop_id
 * @property string $product_id
 * @property string $from_user_id
 * @property string $to_user_id
 * @property string $creation_time
 * @property string $html
 * @property integer $seen
 * @property integer $read
 * @property string $description
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'from_user_id', 'to_user_id', 'html', 'description'], 'required'],
            [['shop_id', 'product_id', 'from_user_id', 'to_user_id', 'seen', 'read'], 'integer'],
            [['creation_time'], 'safe'],
            [['html', 'description'], 'string', 'max' => 500],
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
            'from_user_id' => Yii::t('app', 'From User ID'),
            'to_user_id' => Yii::t('app', 'To User ID'),
            'creation_time' => Yii::t('app', 'Creation Time'),
            'html' => Yii::t('app', 'Html'),
            'seen' => Yii::t('app', 'Seen'),
            'read' => Yii::t('app', 'Read'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return NotificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NotificationsQuery(get_called_class());
    }
}
