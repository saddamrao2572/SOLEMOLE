<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venders".
 *
 * @property integer $id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $created_by
 */
class Venders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'venders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'created_at', 'created_by'], 'string', 'max' => 255],
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
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     * @return VendersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VendersQuery(get_called_class());
    }
}
