<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopPost]].
 *
 * @see ShopPost
 */
class ShopPostQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopPost[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopPost|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
