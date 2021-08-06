<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_specification".
 *
 * @property integer $id
 * @property string $product_id
 * @property string $description
 * @property string $os
 * @property string $dimensions
 * @property string $weight
 * @property string $sim
 * @property string $colors
 * @property string $2g
 * @property string $3g
 * @property string $4g
 * @property string $cpu
 * @property string $chipset
 * @property string $gpu
 * @property string $technology
 * @property string $size
 * @property string $resulation
 * @property string $protection
 * @property string $extrafeatures
 * @property string $builtin
 * @property string $card
 * @property string $back_cam
 * @property string $back_feature
 * @property string $front_cam
 * @property string $wlan
 * @property string $bluetooth
 * @property string $gps
 * @property string $usb
 * @property string $nfc
 * @property string $infrared
 * @property string $data
 * @property string $sensor
 * @property string $audio
 * @property string $browser
 * @property string $messaging
 * @property string $games
 * @property string $torch
 * @property string $extra
 * @property string $cpacity
 * @property string $price
 * @property string $warranty
 * @property string $talk_time
 * @property string $stand_by
 * @property string $generation
 */
class ProductSpecification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_specification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'description', 'os', 'dimensions', 'weight', 'sim', 'colors', '2g', '3g', '4g', 'cpu', 'chipset', 'gpu', 'technology', 'size', 'resulation', 'protection', 'extrafeatures', 'builtin', 'card', 'back_cam', 'back_feature', 'front_cam', 'wlan', 'bluetooth', 'gps', 'usb', 'nfc', 'infrared', 'data', 'sensor', 'audio', 'browser', 'messaging', 'games', 'torch', 'extra', 'cpacity', 'price', 'warranty', 'talk_time', 'stand_by', 'generation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product'),
            'description' => Yii::t('app', 'Description'),
            'os' => Yii::t('app', 'Os'),
            'dimensions' => Yii::t('app', 'Dimensions'),
            'weight' => Yii::t('app', 'Weight'),
            'sim' => Yii::t('app', 'Sim'),
            'colors' => Yii::t('app', 'Colors'),
            '2g' => Yii::t('app', '2g'),
            '3g' => Yii::t('app', '3g'),
            '4g' => Yii::t('app', '4g'),
            'cpu' => Yii::t('app', 'Cpu'),
            'chipset' => Yii::t('app', 'Chipset'),
            'gpu' => Yii::t('app', 'Gpu'),
            'technology' => Yii::t('app', 'Technology'),
            'size' => Yii::t('app', 'Size'),
            'resulation' => Yii::t('app', 'Resulation'),
            'protection' => Yii::t('app', 'Protection'),
            'extrafeatures' => Yii::t('app', 'Extrafeatures'),
            'builtin' => Yii::t('app', 'Builtin'),
            'card' => Yii::t('app', 'Card'),
            'back_cam' => Yii::t('app', 'Back Cam'),
            'back_feature' => Yii::t('app', 'Back Feature'),
            'front_cam' => Yii::t('app', 'Front Cam'),
            'wlan' => Yii::t('app', 'Wlan'),
            'bluetooth' => Yii::t('app', 'Bluetooth'),
            'gps' => Yii::t('app', 'Gps'),
            'usb' => Yii::t('app', 'Usb'),
            'nfc' => Yii::t('app', 'Nfc'),
            'infrared' => Yii::t('app', 'Infrared'),
            'data' => Yii::t('app', 'Data'),
            'sensor' => Yii::t('app', 'Sensor'),
            'audio' => Yii::t('app', 'Audio'),
            'browser' => Yii::t('app', 'Browser'),
            'messaging' => Yii::t('app', 'Messaging'),
            'games' => Yii::t('app', 'Games'),
            'torch' => Yii::t('app', 'Torch'),
            'extra' => Yii::t('app', 'Extra'),
            'cpacity' => Yii::t('app', 'Cpacity'),
            'price' => Yii::t('app', 'Price'),
            'warranty' => Yii::t('app', 'Warranty'),
            'talk_time' => Yii::t('app', 'Talk Time'),
            'stand_by' => Yii::t('app', 'Stand By'),
            'generation' => Yii::t('app', 'Generation'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductSpecificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductSpecificationQuery(get_called_class());
    }
}
