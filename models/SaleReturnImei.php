<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sale_return_imei".
 *
 * @property integer $id
 * @property integer $sale_return_id
 * @property string $returned_imei
 */
class SaleReturnImei extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sale_return_imei';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale_return_id'], 'integer'],
            [['returned_imei'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sale_return_id' => Yii::t('app', 'Sale Return ID'),
            'returned_imei' => Yii::t('app', 'Returned Imei'),
        ];
    }

    /**
     * @inheritdoc
     * @return SaleReturnImeiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SaleReturnImeiQuery(get_called_class());
    }
}
