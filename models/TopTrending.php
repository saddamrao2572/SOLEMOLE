<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_trending".
 *
 * @property integer $id
 * @property string $Title
 * @property string $img
 * @property string $link_ref
 */
class TopTrending extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_trending';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Title', 'img', 'link_ref'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'Title' => Yii::t('app', 'Title'),
            'img' => Yii::t('app', 'TopTrending Slider Image (Size 828*300)'),
            'link_ref' => Yii::t('app', 'Link Ref'),
        ];
    }

    /**
     * @inheritdoc
     * @return TopTrendingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TopTrendingQuery(get_called_class());
    }
}
