<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Klub;

/**
 * SearchKlub represents the model behind the search form about `app\models\Klub`.
 */
class SearchKlub extends Klub
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_klubu', 'id_ligi', 'id_stadionu'], 'integer'],
            [['nazwa_klubu', 'logo', 'trener'], 'safe'],
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
        $query = Klub::find();

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
            'id_klubu' => $this->id_klubu,
            'id_ligi' => $this->id_ligi,
            'id_stadionu' => $this->id_stadionu,
        ]);

        $query->andFilterWhere(['like', 'nazwa_klubu', $this->nazwa_klubu])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'trener', $this->trener]);

        return $dataProvider;
    }
}
