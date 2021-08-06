<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserProduct]].
 *
 * @see UserProduct
 */
class UserProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
