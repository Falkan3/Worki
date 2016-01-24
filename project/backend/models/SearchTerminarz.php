<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Terminarz;

/**
 * SearchTerminarz represents the model behind the search form about `app\models\Terminarz`.
 */
class SearchTerminarz extends Terminarz
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_terminarza', 'home', 'away'], 'integer'],
            [['data', 'godzina', 'wynik'], 'safe'],
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
        $query = Terminarz::find();

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
            'id_terminarza' => $this->id_terminarza,
            'data' => $this->data,
            'godzina' => $this->godzina,
            'home' => $this->home,
            'away' => $this->away,
        ]);

        $query->andFilterWhere(['like', 'wynik', $this->wynik]);

        return $dataProvider;
    }
}
