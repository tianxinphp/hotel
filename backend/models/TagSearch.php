<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Tag;

/**
 * TagSearch represents the model behind the search form of `backend\models\Tag`.
 */
class TagSearch extends Tag
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_id', 'credate_at', 'update_at'], 'integer'],
            [['tag_name'], 'safe'],
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
        $query = Tag::find();

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
            'tag_id' => $this->tag_id,
            'credate_at' => $this->credate_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'tag_name', $this->tag_name]);

        return $dataProvider;
    }
}
