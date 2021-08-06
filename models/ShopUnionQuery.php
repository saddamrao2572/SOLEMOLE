<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopUnion]].
 *
 * @see ShopUnion
 */
class ShopUnionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopUnion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopUnion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
