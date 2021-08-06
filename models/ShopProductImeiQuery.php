<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopProductImei]].
 *
 * @see ShopProductImei
 */
class ShopProductImeiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopProductImei[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopProductImei|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
