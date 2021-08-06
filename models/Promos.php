<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promos".
 *
 * @property integer $id
 * @property string $title
 * @property string $video
 * @property integer $shop_id
 * @property string $created_at
 * @property integer $status
 * @property integer $created_by
 */
class Promos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'promos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title',  'created_at', 'status', 'created_by'], 'required'],
            [['shop_id', 'status', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['title', 'video'], 'string', 'max' => 255],
        ];
    }
	
	///////////////
	public function getShop()    {   
	 return $this->hasOne(Shop::className(),
	['id' => 'shop_id']);  
	}  
	
	public function getShopName()   
	{     
	return $this->shop->name; 
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'video' => Yii::t('app', 'Video'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return PromosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PromosQuery(get_called_class());
    }
}
