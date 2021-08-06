<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductLikes]].
 *
 * @see ProductLikes
 */
class ProductLikesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/



    public function byUserProduct($userID, $productID)
    {
        return $this->where(['user_id'=>$userID, 'product_id'=>$productID])->one();
    }
    
    public function byProductCount($productID)
    {
        return $this->where(['product_id'=>$productID])->count();
    }
    /**
     * @inheritdoc
     * @return ProductLikes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductLikes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
