<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductDeals]].
 *
 * @see ProductDeals
 */
class ProductDealsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductDeals[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductDeals|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
