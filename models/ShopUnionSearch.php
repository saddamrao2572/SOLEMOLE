<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShopUnion;

/**
 * ShopUnionSearch represents the model behind the search form about `app\models\ShopUnion`.
 */
class ShopUnionSearch extends ShopUnion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'created_by', 'status'], 'integer'],
            [['association_name', 'president_name', 'president_number', 'gen_sec_name', 'gen_sec_number', 'created_at'], 'safe'],
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
        $query = ShopUnion::find();

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
            'city_id' => $this->city_id,
            'created_by' => $this->created_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'association_name', $this->association_name])
            ->andFilterWhere(['like', 'president_name', $this->president_name])
            ->andFilterWhere(['like', 'president_number', $this->president_number])
            ->andFilterWhere(['like', 'gen_sec_name', $this->gen_sec_name])
            ->andFilterWhere(['like', 'gen_sec_number', $this->gen_sec_number])
            ->andFilterWhere(['like', 'created_at', $this->created_at]);

        return $dataProvider;
    }
}
