<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Expance]].
 *
 * @see Expance
 */
class ExpanceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Expance[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Expance|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
