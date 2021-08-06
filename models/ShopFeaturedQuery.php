<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopFeatured]].
 *
 * @see ShopFeatured
 */
class ShopFeaturedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopFeatured[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopFeatured|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
