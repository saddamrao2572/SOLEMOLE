<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WholeSeller]].
 *
 * @see WholeSeller
 */
class WholeSellerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return WholeSeller[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return WholeSeller|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
