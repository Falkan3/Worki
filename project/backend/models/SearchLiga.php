<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Liga;

/**
 * SearchLiga represents the model behind the search form about `app\models\Liga`.
 */
class SearchLiga extends Liga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ligi'], 'integer'],
            [['nazwa_ligi', 'kraj', 'logo'], 'safe'],
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
        $query = Liga::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_ligi' => $this->id_ligi,
        ]);

        $query->andFilterWhere(['like', 'nazwa_ligi', $this->nazwa_ligi])
            ->andFilterWhere(['like', 'kraj', $this->kraj])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
