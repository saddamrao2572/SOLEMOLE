<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopReviews]].
 *
 * @see ShopReviews
 */
class ShopReviewsQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }
    public function byShop($shopID)
    {
        return $this->where(['shop_id'=>$shopID])->all();
    }
    public function byUser($userID)
    {
        return $this->where(['user_id'=>$userID])->one();
    }
    public function byUserbyShop($userID, $shopID)
    {
        return $this->where(['user_id'=>$userID,'shop_id'=>$shopID])->one();
    }
    public function byShopCount($shopID)
    {
        return $this->where(['shop_id'=>$shopID])->count();
    }
    
    public function byShopSum($shopID)
    {
        return $this->where(['shop_id'=>$shopID])->sum('overall_score');
    }

    /**
     * @inheritdoc
     * @return ShopReviews[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopReviews|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
