<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopBusinessDay]].
 *
 * @see ShopBusinessDay
 */
class ShopBusinessDayQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopBusinessDay[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopBusinessDay|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
