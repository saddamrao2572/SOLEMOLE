<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewProductSale;

/**
 * NewProductSaleSearch represents the model behind the search form about `app\models\NewProductSale`.
 */
class NewProductSaleSearch extends NewProductSale
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',  'brand_id', 'paid', 'discount'], 'integer'],
            [['created_at','shop_id', 'contact', 'product_id', 'nickname', 'buyername', 'price', 'created_by', 'quantity', 'status', 'img', 'cnic', 'warranty','invoice_no'], 'safe'],
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
        $query = NewProductSale::find();

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
            'shop_id' => $this->shop_id,
            'brand_id' => $this->brand_id,
            'paid' => $this->paid,
            'discount' => $this->discount,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'buyername', $this->buyername])
            
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'cnic', $this->cnic])
            ->andFilterWhere(['like', 'warranty', $this->warranty])
            ->andFilterWhere(['like', 'invoice_no', $this->invoice_no]);
        return $dataProvider;
    }
}
