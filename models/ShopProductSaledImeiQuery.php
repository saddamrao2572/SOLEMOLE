<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopProductSaledImei]].
 *
 * @see ShopProductSaledImei
 */
class ShopProductSaledImeiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopProductSaledImei[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopProductSaledImei|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
