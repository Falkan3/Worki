<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zawodnik;

/**
 * SearchZawodnik represents the model behind the search form about `app\models\Zawodnik`.
 */
class SearchZawodnik extends Zawodnik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_zawodnika', 'id_klubu', 'wzrost', 'nr_koszulki'], 'integer'],
            [['imie', 'nazwisko', 'pozycja', 'zdjecie', 'kraj'], 'safe'],
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
        $query = Zawodnik::find();

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
            'id_zawodnika' => $this->id_zawodnika,
            'id_klubu' => $this->id_klubu,
            'wzrost' => $this->wzrost,
            'nr_koszulki' => $this->nr_koszulki,
        ]);

        $query->andFilterWhere(['like', 'imie', $this->imie])
            ->andFilterWhere(['like', 'nazwisko', $this->nazwisko])
            ->andFilterWhere(['like', 'pozycja', $this->pozycja])
            ->andFilterWhere(['like', 'zdjecie', $this->zdjecie])
            ->andFilterWhere(['like', 'kraj', $this->kraj]);

        return $dataProvider;
    }
}
