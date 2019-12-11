<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\HotelTag;

/**
 * HotelTagSearch represents the model behind the search form of `backend\models\HotelTag`.
 */
class HotelTagSearch extends HotelTag
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_hotel_id', 'tag_id'], 'integer'],
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
        $query = HotelTag::find();

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
            'tag_id' => $this->tag_id,
        ]);

        return $dataProvider;
    }
}
