<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property integer $id
 * @property string $name
 * @property string $cnic
 * @property string $address
 * @property string $designation
 * @property string $contect
 * @property string $salary
 * @property string $thumbnail
 * @property integer $status
 * @property string $created_at
 * @property integer $created_by
 * @property integer $shop_id
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'salary', 'status', 'created_at', 'created_by', 'shop_id'], 'required'],
            [['status', 'created_by', 'shop_id'], 'integer'],
            [['created_at', 'cnic', 'contect', 'thumbnail'], 'safe'],
            [['name', 'designation', 'salary', 'thumbnail'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 1000],
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
            'cnic' => Yii::t('app', 'Cnic'),
            'address' => Yii::t('app', 'Address'),
            'designation' => Yii::t('app', 'Designation'),
            'contect' => Yii::t('app', 'Contect'),
            'salary' => Yii::t('app', 'Salary'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'shop_id' => Yii::t('app', 'Shop ID'),
        ];
    }

    /**
     * @inheritdoc
     * @return StaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaffQuery(get_called_class());
    }
}
