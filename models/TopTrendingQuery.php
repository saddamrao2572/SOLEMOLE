<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TopTrending]].
 *
 * @see TopTrending
 */
class TopTrendingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TopTrending[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TopTrending|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
