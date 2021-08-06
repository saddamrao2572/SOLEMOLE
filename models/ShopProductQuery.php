<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopProduct]].
 *
 * @see ShopProduct
 */
class ShopProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
