<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcriber".
 *
 * @property integer $id
 * @property string $subcriber
 * @property string $created_at
 * @property integer $status
 */
class Subcriber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcriber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['status'], 'integer'],
            [['subcriber'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subcriber' => Yii::t('app', 'Subcriber'),
            'created_at' => Yii::t('app', 'Created At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return SubcriberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubcriberQuery(get_called_class());
    }
}
