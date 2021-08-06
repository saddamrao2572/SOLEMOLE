<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BlacklistProduct]].
 *
 * @see BlacklistProduct
 */
class BlacklistProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BlacklistProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BlacklistProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
