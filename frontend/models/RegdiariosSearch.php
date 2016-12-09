<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Regdiarios;

/**
 * RegdiariosSearch represents the model behind the search form about `frontend\models\Regdiarios`.
 */
class RegdiariosSearch extends Regdiarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODREGISTRODIARIO', 'CODTIPODOC', 'NUMORDENR', 'DIASVACMES', 'TOTALRD'], 'integer'],
            [['UNICODIGOES', 'NOMBREVACUNADOR'], 'safe'],
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
        $query = Regdiarios::find();

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
            'CODREGISTRODIARIO' => $this->CODREGISTRODIARIO,
            'CODTIPODOC' => $this->CODTIPODOC,
            'NUMORDENR' => $this->NUMORDENR,
            'DIASVACMES' => $this->DIASVACMES,
            'TOTALRD' => $this->TOTALRD,
        ]);

        $query->andFilterWhere(['like', 'UNICODIGOES', $this->UNICODIGOES])
            ->andFilterWhere(['like', 'NOMBREVACUNADOR', $this->NOMBREVACUNADOR]);

        return $dataProvider;
    }
}
