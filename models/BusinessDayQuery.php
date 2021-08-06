<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BusinessDay]].
 *
 * @see BusinessDay
 */
class BusinessDayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BusinessDay[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BusinessDay|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
