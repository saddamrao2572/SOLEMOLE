<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expance".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $created_by
 * @property string $ammount
 * @property string $shop_id
 */
class Expance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'created_at', 'created_by', 'ammount', 'shop_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'ammount' => Yii::t('app', 'Ammount'),
            'shop_id' => Yii::t('app', 'Shop ID'),
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
     * @return ExpanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpanceQuery(get_called_class());
    }
}
