<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserRequestResponse]].
 *
 * @see UserRequestResponse
 */
class UserRequestResponseQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserRequestResponse[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserRequestResponse|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
