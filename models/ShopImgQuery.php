<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopImg]].
 *
 * @see ShopImg
 */
class ShopImgQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopImg[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopImg|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
