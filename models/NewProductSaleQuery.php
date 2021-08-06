<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NewProductSale]].
 *
 * @see NewProductSale
 */
class NewProductSaleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return NewProductSale[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NewProductSale|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
