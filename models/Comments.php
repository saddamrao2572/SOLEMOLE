<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property string $id
 * @property string $comment
 * @property string $commented_by
 * @property string $user_product_id
 * @property string $comment_time
 * @property integer $created_by
 * @property integer $post_id
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['commented_by', 'user_product_id', 'created_by','used_mobile_id'], 'integer'],
            [['comment_time','post_id'], 'safe'],
            [['created_by'], 'required'],
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
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return CommentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommentsQuery(get_called_class());
    }
}
