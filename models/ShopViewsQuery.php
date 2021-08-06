<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopViews]].
 *
 * @see ShopViews
 */
class ShopViewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopViews[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopViews|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
