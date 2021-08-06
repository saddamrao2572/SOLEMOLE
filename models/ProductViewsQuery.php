<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductViews]].
 *
 * @see ProductViews
 */
class ProductViewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProductViews[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductViews|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
