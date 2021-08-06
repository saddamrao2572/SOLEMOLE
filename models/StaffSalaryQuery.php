<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StaffSalary]].
 *
 * @see StaffSalary
 */
class StaffSalaryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StaffSalary[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StaffSalary|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
