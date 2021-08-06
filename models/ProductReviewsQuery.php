<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductReviews]].
 *
 * @see ProductReviews
 */
class ProductReviewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    
    public function byProduct($procuctID)
    {
        return $this->where(['product_id'=>$productID])->all();
    }
    public function byUser($userID)
    {
        return $this->where(['user_id'=>$userID])->one();
    }
    public function byUserbyProduct($userID, $procuctID)
    {
        return $this->where(['user_id'=>$userID,'product_id'=>$procuctID])->one();
    }
    public function byProductCount($procuctID)
    {
        return $this->where(['product_id'=>$procuctID])->count();
    }
    
    public function byProductSum($procuctID)
    {
        return $this->where(['product_id'=>$procuctID])->sum('overall_score');
    }

    /**
     * @inheritdoc
     * @return ProductReviews[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductReviews|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
