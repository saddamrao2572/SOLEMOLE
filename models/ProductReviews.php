<?php

namespace app\models;
use app\models\Product;
use app\models\User;

use Yii;

/**
 * This is the model class for table "product_reviews".
 *
 * @property integer $id
 * @property integer $user_id

 * @property integer $product_id
 * @property string $created_at
 * @property integer $facility_score
 * @property integer $staff_score
 * @property integer $atmosphere_score
 * @property string $overall_score
 * @property string $pros
 * @property string $cons
 * @property integer $status
 */
class ProductReviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_reviews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[  'facility_score', 'staff_score', 'atmosphere_score', 'overall_score', 'pros', 'cons'], 'required'],
            [[  'status'], 'integer'],
            [['created_at'], 'safe'],
            [['overall_score'], 'number'],
            [['pros', 'cons'], 'string', 'max' => 1000],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
           
            'product_id' => Yii::t('app', 'Product ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'facility_score' => Yii::t('app', 'Facility Score'),
            'staff_score' => Yii::t('app', 'Staff Score'),
            'atmosphere_score' => Yii::t('app', 'Atmosphere Score'),
            'overall_score' => Yii::t('app', 'Overall Score'),
            'pros' => Yii::t('app', 'Pros'),
            'cons' => Yii::t('app', 'Cons'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProductReviewsQuery the active query used by this AR class.
     */
     public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public static function find()
    {
        return new ProductReviewsQuery(get_called_class());
    }
}
