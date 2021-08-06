<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserImg]].
 *
 * @see UserImg
 */
class UserImgQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserImg[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserImg|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
