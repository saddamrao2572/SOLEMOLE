<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $mobile
 * @property string $profile_image
 */
class UserDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_details';
    }
	
	public $address;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'name'], 'required'],
            [['user_id'], 'integer'],
            [['address','name', 'mobile', 'profile_image','lat', 'lng', 'state_id', 'city_id','suburb','street','zip'], 'string', 'max' => 255],
        ];
    }
	
	public function getAddress() {
		return $this->street . ' ' . $this->suburb . ', ' . $this->city->name. ', ' . $this->state->name;
	}

	public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
	public function getCitys()
    {
        return $this->hasOne(\app\models\City::className(), ['id' => 'city_id']);
    }
	
	public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'mobile' => Yii::t('app', 'Mobile'),
            'profile_image' => Yii::t('app', 'Profile Image'),
			'state_id' => Yii::t('app', 'State'),
            'city_id' => Yii::t('app', 'City'),
            'street' => Yii::t('app', 'Street'),
            'zip' => Yii::t('app', 'Zip Code'),
			'street' => Yii::t('app', 'Street'),
			'suburb' => Yii::t('app', 'Suburb / Locality'),
        ];
    }
	
	public static function findByUserID($id)
    {
		return static::findOne(['user_id' => $id]);
    }
	
	
	
}
