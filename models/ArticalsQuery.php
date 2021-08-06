<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Articals]].
 *
 * @see Articals
 */
class ArticalsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Articals[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Articals|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
