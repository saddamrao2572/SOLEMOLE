<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopWholeSeller]].
 *
 * @see ShopWholeSeller
 */
class ShopWholeSellerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopWholeSeller[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopWholeSeller|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
