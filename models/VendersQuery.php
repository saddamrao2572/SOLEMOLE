<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Venders]].
 *
 * @see Venders
 */
class VendersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Venders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Venders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
