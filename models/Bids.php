<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bids".
 *
 * @property string $id
 * @property string $comment
 * @property string $commented_by
 * @property string $user_product_id
 * @property string $comment_time
 */
class Bids extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bids';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commented_by', 'user_product_id'], 'integer'],
            [['comment_time'], 'safe'],
            [['comment'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'comment' => Yii::t('app', 'Comment'),
            'commented_by' => Yii::t('app', 'Commented By'),
            'user_product_id' => Yii::t('app', 'User Product ID'),
            'comment_time' => Yii::t('app', 'Comment Time'),
        ];
    }

    /**
     * @inheritdoc
     * @return BidsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BidsQuery(get_called_class());
    }
}
