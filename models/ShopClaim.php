<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_claim".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $user_id
 * @property integer $status
 * @property string $claim_at
 */
class ShopClaim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_claim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'user_id'], 'required'],
            [['shop_id', 'user_id', 'status'], 'integer'],
            [['claim_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'claim_at' => Yii::t('app', 'Claim At'),
        ];
    }
}
