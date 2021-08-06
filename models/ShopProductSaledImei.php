<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_product_saled_imei".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $brand_id
 * @property integer $product_id
 * @property string $saled_imei
 */
class ShopProductSaledImei extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_product_saled_imei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['shop_id', 'brand_id', 'product_id'], 'integer'],
            [['saled_imei'], 'string', 'max' => 255],

           
            [['nps_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewProductSale::className(), 'targetAttribute' => ['nps_id' => 'id']],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'saled_imei' => Yii::t('app', 'Saled Imei'),
        ];
    }



    public function getNps()
    {
        return $this->hasOne(NewProductSale::className(), ['id' => 'nps_id']);
    }
    

    /**
     * @inheritdoc
     * @return ShopProductSaledImeiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopProductSaledImeiQuery(get_called_class());
    }
}
