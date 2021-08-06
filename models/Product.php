<?php

namespace app\models;
use yii\behaviors\SluggableBehavior;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $imei
 * @property string $category_id
 * @property string $vender_id
 * @property integer $brand_id
 * @property string $type
 * @property string $status
 * @property string $created_by
 * @property string $created_at
 * @property string $quantity
 * @property string $price
 * @property string $model
 * @property string $series
 * @property string $slug
 * @property string $thumbnail
 * @property string $barcode
 * @property string $conditon
  * @property integer $featured
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'imei', 'category_id', 'vender_id', 'type', 'status',  'created_at', 'quantity', 'price', 'model', 'series', 'thumbnail', 'barcode', 'conditon','slug'], 'string', 'max' => 255],
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
            'imei' => Yii::t('app', 'IMEI'),
            'category_id' => Yii::t('app', 'Category'),
            'vender_id' => Yii::t('app', 'Vender'),
            'brand_id' => Yii::t('app', 'Brand'),
            'type' => Yii::t('app', 'Type'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'quantity' => Yii::t('app', 'Quantity'),
            'price' => Yii::t('app', 'Price'),
            'model' => Yii::t('app', 'Model'),
            'series' => Yii::t('app', 'Series'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'barcode' => Yii::t('app', 'Barcode'),
            'conditon' => Yii::t('app', 'Conditon'),
            'featured' => Yii::t('app', 'Featured'),
        ];
    }

	 public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    } 
	public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }
	 public function getVenders()
    {
        return $this->hasOne(Venders::className(), ['id' => 'vender_id']);
    }
    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
