<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Bids]].
 *
 * @see Bids
 */
class BidsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Bids[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Bids|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
