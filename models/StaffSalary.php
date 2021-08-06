<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff_salary".
 *
 * @property integer $id
 * @property integer $staff_id
 * @property integer $month
 * @property integer $year
 * @property string $created_at
 * @property integer $pending
 * @property integer $salary
 * @property integer $total
 * @property integer $paid
 * @property integer $created_by
 * @property integer $status
 */
class StaffSalary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff_salary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'month', 'year', 'created_at', 'pending', 'salary', 'total', 'paid', 'created_by', 'status'], 'required'],
            [['staff_id', 'month', 'year', 'pending', 'salary', 'total', 'paid', 'created_by', 'status'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'month' => Yii::t('app', 'Month'),
            'year' => Yii::t('app', 'Year'),
            'created_at' => Yii::t('app', 'Created At'),
            'pending' => Yii::t('app', 'Pending'),
            'salary' => Yii::t('app', 'Salary'),
            'total' => Yii::t('app', 'Total'),
            'paid' => Yii::t('app', 'Pay able'),
            'created_by' => Yii::t('app', 'Created By'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
	
	//////////////class name
	public function getstaff()    {   
	 return $this->hasOne(Staff::className(),
	['id' => 'staff_id']);  
	}  
	
	public function getstaffname()   
	{     
	return $this->staff->name; 
	}

    /**
     * @inheritdoc
     * @return StaffSalaryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StaffSalaryQuery(get_called_class());
    }
}
