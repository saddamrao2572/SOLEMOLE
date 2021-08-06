<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shop;

/**
 * ShopSearch represents the model behind the search form about `app\models\Shop`.
 */
class ShopSearch extends Shop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'shop_type', 'logo', 'cover', 'about', 'city_id', 'state_id', 'street', 'land_line', 'mobile', 'fb', 'twiter', 'owner_id', 'created_at', 'lan', 'lat', 'lng', 'slug', 'reg_no', 'premieum', 'verified'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shop::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'shop_type', $this->shop_type])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'cover', $this->cover])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'city_id', $this->city_id])
            ->andFilterWhere(['like', 'state_id', $this->state_id])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'land_line', $this->land_line])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fb', $this->fb])
            ->andFilterWhere(['like', 'twiter', $this->twiter])
            ->andFilterWhere(['like', 'owner_id', $this->owner_id])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'lan', $this->lan])
            ->andFilterWhere(['like', 'la', $this->lat])
            ->andFilterWhere(['like', 'lng', $this->lng])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'reg_no', $this->reg_no])
            ->andFilterWhere(['like', 'premieum', $this->premieum])
            ->andFilterWhere(['like', 'verified', $this->verified]);

        return $dataProvider;
    }
}
