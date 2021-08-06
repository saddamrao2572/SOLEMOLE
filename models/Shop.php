<?php

namespace app\models;
use yii\helpers\ArrayHelper;
use yii\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "shop".
 *
  * @property integer $id
 * @property string $name
 * @property string $shop_type
 * @property string $logo
 * @property string $cover
 * @property string $about
 * @property string $city_id
 * @property string $state_id
 * @property string $suburb
 * @property string $address
 * @property integer $status
 * @property integer $views
 * @property string $street
 * @property string $land_line
 * @property string $mobile
 * @property string $fb
 * @property string $twiter
 * @property string $owner_id
 * @property string $created_at
 * @property integer $created_by
 * @property string $lan
 * @property string $lat
 * @property string $lng
 * @property string $zip
 * @property string $slug
 * @property string $reg_no
 * @property string $premieum
 * @property string $verified
 * @property integer $union_id
 *
 * @property ShopBusinessDay[] $shopBusinessDays
 * @property ShopLikes[] $shopLikes
 * @property ShopMessages[] $shopMessages
 * @property ShopReviews[] $shopReviews
 * @property ShopFacility[] $shopFacility
 * @property ShopOperationalInfo[] $shopOperationalInfo
  * @property City $city
 */
class Shop extends \yii\db\ActiveRecord
{
	public $distance;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
      

	  return [  
	  [[ 'name', 'lng','lat', 'state_id', 'city_id','shop_type'], 'required'],
	  [[ 'owner_id','union_id'], 'safe'],
	  
            [['name', 'shop_type', 'logo', 'cover', 'about',  'street', 'land_line', 'mobile', 'fb', 'twiter', 'owner_id', 'created_at', 'lan', 'lat', 'lng', 'slug', 'reg_no', 'premieum', 'verified'], 'string', 'max' => 255],
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
            'shop_type' => Yii::t('app', 'Shop Type'),
            'logo' => Yii::t('app', 'Logo'),
            'cover' => Yii::t('app', 'Cover'),
            'about' => Yii::t('app', 'About'),
            'city_id' => Yii::t('app', 'City'),
            'state_id' => Yii::t('app', 'State'),
            'street' => Yii::t('app', 'Street Address'),
            'land_line' => Yii::t('app', 'Land Line No#'),
            'mobile' => Yii::t('app', 'Mobile No#'),
            'fb' => Yii::t('app', 'Facebook Link'),
            'twiter' => Yii::t('app', 'Twiter Link'),
            'owner_id' => Yii::t('app', 'Owner ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'lan' => Yii::t('app', 'Lan'),
            'la' => Yii::t('app', 'La'),
            'lng' => Yii::t('app', 'Lng'),
            'slug' => Yii::t('app', 'Slug'),
            'reg_no' => Yii::t('app', 'Reg No'),
            'premieum' => Yii::t('app', 'Premieum'),
            'views' => Yii::t('app', 'Views'),
            'union_id' => Yii::t('app', 'Union Association'),
            'verified' => Yii::t('app', 'Verified'),
        ];
    }
	public function behaviors()
	{
		return [
			[
				'class' => SluggableBehavior::className(),
				'attribute' => 'name',
				'ensureUnique'=>true,
				'slugAttribute' => 'slug',
			],
		];
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBusinessDays()
    {
        return $this->hasMany(ShopBusinessDay::className(), ['shop_id' => 'id']);
    }
     public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
	 public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
	
   

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopFacilities()
    {
        return $this->hasMany(Facility::className(), ['id' => 'facility_id'])->viaTable('{{%shop_facility}}', ['shop_id' => 'id']);}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBussinessDay()
    {
        return $this->hasMany(ShopBusinessDay::className(), ['shop_id' => 'id']);
    }
	
		private $_facilityIds;
    private $_facilityNames;

    public function getFacilityIds()
    {
        if ($this->_facilityIds === null) {
            $this->_facilityIds = ArrayHelper::getColumn($this->shopFacilities, 'id');
        }

        return $this->_facilityIds;
    }

    public function getFacilityNames()
    {
        if ($this->_facilityNames === null) {
            $this->_facilityNames = ArrayHelper::getColumn($this->shopFacilities, 'name');
        }

        return implode(', ',$this->_facilityNames);
    }
	
	public function setFacilityIds($value) {
        $this->_facilityIds = $value;
    }
	
	public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);


        if (!$insert) {       
			static::getDb()
                ->createCommand()
                ->delete('{{%shop_facility}}', ['shop_id' => $this->id])
                ->execute();
        }

		if (!empty($this->facilityIds)) {
            static::getDb()
                ->createCommand()
                ->batchInsert(
                    '{{%shop_facility}}',
                    ['shop_id', 'facility_id'],
                    array_map(function ($facilityId) { return [$this->shop_id, $facilityId]; }, $this->facilityIds)
                )
                ->execute();
        }
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopLikes()
    {
        return $this->hasMany(ShopLikes::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopMessages()
    {
        return $this->hasMany(ShopMessages::className(), ['shop_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopReviews()
    {
        return $this->hasMany(ShopReviews::className(), ['shop_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ShopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopQuery(get_called_class());
    }
}
