<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blacklist_product".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $created_by
 * @property string $created_at
 * @property string $imei
 * @property string $description
 * @property string $color
 * @property string $status
 * @property string $img
 */
class BlacklistProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blacklist_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['imei', 'color', 'status', 'img'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'imei' => Yii::t('app', 'Imei'),
            'description' => Yii::t('app', 'Description'),
            'color' => Yii::t('app', 'Color'),
            'status' => Yii::t('app', 'Status'),
            'img' => Yii::t('app', 'Img'),
        ];
    }

    /**
     * @inheritdoc
     * @return BlacklistProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlacklistProductQuery(get_called_class());
    }
}
