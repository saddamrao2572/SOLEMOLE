<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "articals".
 *
 * @property integer $id
 * @property string $title
 * @property string $discription
 * @property integer $created_by
 * @property string $created_at
 * @property integer $status
 * @property string $thumbnail
 */
class Articals extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articals';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created_by','slug', 'created_at', 'status'], 'required'],
            [['created_by', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'thumbnail','slug'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 10000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
			'slug' => Yii::t('app', 'Slug'),
            'status' => 'Status',
            'thumbnail' => 'Thumbnail',
        ];
    }
	 public function behaviors()
	{
		return [
			[
				'class' => SluggableBehavior::className(),
				'attribute' => 'title',
				'immutable' => true,
				'ensureUnique'=>true,
				'slugAttribute' => 'slug',
			],
		];
	}

    /**
     * @inheritdoc
     * @return ArticalsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticalsQuery(get_called_class());
    }
}
