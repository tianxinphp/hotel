<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubHotel;

/**
 * SubHotelSearch represents the model behind the search form of `backend\models\SubHotel`.
 */
class SubHotelSearch extends SubHotel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_hotel_id', 'credate_at', 'update_at'], 'integer'],
            [['sub_hotel_name', 'sub_hotel_code'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = SubHotel::find();

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
            'sub_hotel_id' => $this->sub_hotel_id,
            'credate_at' => $this->credate_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'sub_hotel_name', $this->sub_hotel_name])
            ->andFilterWhere(['like', 'sub_hotel_code', $this->sub_hotel_code]);

        return $dataProvider;
    }
}
