<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SaleReturnImei]].
 *
 * @see SaleReturnImei
 */
class SaleReturnImeiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SaleReturnImei[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SaleReturnImei|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
