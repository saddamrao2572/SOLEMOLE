<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facility".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property integer $branch_id
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_by', 'branch_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'branch_id' => 'Branch ID',
        ];
    }
	
	///////////////
	public function getShop()    {   
	 return $this->hasOne(Shop::className(),
	['id' => 'branch_id']);  
	}  
	
	public function getShopName()   
	{     
	return $this->shop->name; 
	}

    /**
     * @inheritdoc
     * @return FacilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacilityQuery(get_called_class());
    }
}
