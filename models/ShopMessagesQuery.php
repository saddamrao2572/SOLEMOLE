<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopMessages]].
 *
 * @see ShopMessages
 */
class ShopMessagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopMessages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopMessages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
