<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $shop_id
 * @property string $created_at
 * @property integer $created_by
 * @property integer $status
 * @property string $thumnail
 */
class ShopPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'shop_id', 'created_at', 'created_by', 'status', 'thumnail'], 'required'],
            [['shop_id', 'created_by', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'thumnail'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 10000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'status' => Yii::t('app', 'Status'),
            'thumnail' => Yii::t('app', 'Thumnail'),
        ];
    }
	
	///////////////
	public function getUser()    {   
	 return $this->hasOne(User::className(),
	['id' => 'created_by']);  
	}  
	
	public function getUserName()   
	{     
	return $this->user->username; 
	}

    /**
     * @inheritdoc
     * @return ShopPostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopPostQuery(get_called_class());
    }
}
