<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SalesPurchase;

/**
 * SalesPurchaseSearch represents the model behind the search form about `app\models\SalesPurchase`.
 */
class SalesPurchaseSearch extends SalesPurchase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['id', 'shop_id', 'brand_id', 'product_id', 'created_by'], 'integer'],
            [['name', 'nickname', 'imei', 'type', 'cnic', 'img', 'price', 'paid', 'fault', 'condition', 'discount', 'warranty', 'status', 'created_at' , 'month' , 'year' , 'contact' , 'invoice_no'], 'safe'],
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
        $query = SalesPurchase::find();

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
            'product_id' => $this->product_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'sname', $this->name])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'imei', $this->imei])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'cnic', $this->cnic])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'paid', $this->paid])
            ->andFilterWhere(['like', 'fault', $this->fault])
            ->andFilterWhere(['like', 'condition', $this->condition])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'warranty', $this->warranty])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'invoice_no', $this->invoice_no]);

        return $dataProvider;
    }
}
