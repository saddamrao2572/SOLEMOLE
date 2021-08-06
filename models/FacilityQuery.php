<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Facility]].
 *
 * @see Facility
 */
class FacilityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Facility[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Facility|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
