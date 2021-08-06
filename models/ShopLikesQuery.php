<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopLikes]].
 *
 * @see ShopLikes
 */
class ShopLikesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ShopLikes[]|array
     */
	  public function byUserShop($userID, $shopID)
    {
        return $this->where(['user_id'=>$userID, 'shop_id'=>$shopID])->one();
    }
    
    public function byShopCount($shopID)
    {
        return $this->where(['shop_id'=>$shopID])->count();
    }
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopLikes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
