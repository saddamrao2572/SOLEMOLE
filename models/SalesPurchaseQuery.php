<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SalesPurchase]].
 *
 * @see SalesPurchase
 */
class SalesPurchaseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SalesPurchase[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SalesPurchase|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
