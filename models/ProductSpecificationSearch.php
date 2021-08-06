<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductSpecification;

/**
 * ProductSpecificationSearch represents the model behind the search form about `app\models\ProductSpecification`.
 */
class ProductSpecificationSearch extends ProductSpecification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['product_id', 'description', 'os', 'dimensions', 'weight', 'sim', 'colors', '2g', '3g', '4g', 'cpu', 'chipset', 'gpu', 'technology', 'size', 'resulation', 'protection', 'extrafeatures', 'builtin', 'card', 'back_cam', 'back_feature', 'front_cam', 'wlan', 'bluetooth', 'gps', 'usb', 'nfc', 'infrared', 'data', 'sensor', 'audio', 'browser', 'messaging', 'games', 'torch', 'extra', 'cpacity', 'price', 'warranty', 'talk_time', 'stand_by', 'generation'], 'safe'],
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
        $query = ProductSpecification::find();

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

        $query->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'os', $this->os])
            ->andFilterWhere(['like', 'dimensions', $this->dimensions])
            ->andFilterWhere(['like', 'weight', $this->weight])
            ->andFilterWhere(['like', 'sim', $this->sim])
            ->andFilterWhere(['like', 'colors', $this->colors])
           // ->andFilterWhere(['like', '2g', $this->2g])
           // ->andFilterWhere(['like', '3g', $this->3g])
           // ->andFilterWhere(['like', '4g', $this->4g])
            ->andFilterWhere(['like', 'cpu', $this->cpu])
            ->andFilterWhere(['like', 'chipset', $this->chipset])
            ->andFilterWhere(['like', 'gpu', $this->gpu])
            ->andFilterWhere(['like', 'technology', $this->technology])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'resulation', $this->resulation])
            ->andFilterWhere(['like', 'protection', $this->protection])
            ->andFilterWhere(['like', 'extrafeatures', $this->extrafeatures])
            ->andFilterWhere(['like', 'builtin', $this->builtin])
            ->andFilterWhere(['like', 'card', $this->card])
            ->andFilterWhere(['like', 'back_cam', $this->back_cam])
            ->andFilterWhere(['like', 'back_feature', $this->back_feature])
            ->andFilterWhere(['like', 'front_cam', $this->front_cam])
            ->andFilterWhere(['like', 'wlan', $this->wlan])
            ->andFilterWhere(['like', 'bluetooth', $this->bluetooth])
            ->andFilterWhere(['like', 'gps', $this->gps])
            ->andFilterWhere(['like', 'usb', $this->usb])
            ->andFilterWhere(['like', 'nfc', $this->nfc])
            ->andFilterWhere(['like', 'infrared', $this->infrared])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'sensor', $this->sensor])
            ->andFilterWhere(['like', 'audio', $this->audio])
            ->andFilterWhere(['like', 'browser', $this->browser])
            ->andFilterWhere(['like', 'messaging', $this->messaging])
            ->andFilterWhere(['like', 'games', $this->games])
            ->andFilterWhere(['like', 'torch', $this->torch])
            ->andFilterWhere(['like', 'extra', $this->extra])
            ->andFilterWhere(['like', 'cpacity', $this->cpacity])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'warranty', $this->warranty])
            ->andFilterWhere(['like', 'talk_time', $this->talk_time])
            ->andFilterWhere(['like', 'stand_by', $this->stand_by])
            ->andFilterWhere(['like', 'generation', $this->generation]);

        return $dataProvider;
    }
}
