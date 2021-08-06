<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Subcriber]].
 *
 * @see Subcriber
 */
class SubcriberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Subcriber[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Subcriber|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
