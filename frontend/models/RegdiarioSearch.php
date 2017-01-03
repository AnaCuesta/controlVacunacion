<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Regdiario;

/**
 * RegdiarioSearch represents the model behind the search form about `frontend\models\Regdiario`.
 */
class RegdiarioSearch extends Regdiario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODREGISTRODIARIO', 'CODTIPODOC', 'CODLUGARVACUNACION', 'CODEDAD'], 'integer'],
            [['UNICODIGOES', 'DESCRIPCIONESCENARIOVAC', 'FECHAREGISTROVAC', 'N_HISTCLINIC', 'NOMBREVACUNADOR'], 'safe'],
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
        $query = Regdiario::find();

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
            'CODLUGARVACUNACION' => $this->CODLUGARVACUNACION,
            'FECHAREGISTROVAC' => $this->FECHAREGISTROVAC,
            'CODEDAD' => $this->CODEDAD,
        ]);

        $query->andFilterWhere(['like', 'UNICODIGOES', $this->UNICODIGOES])
            ->andFilterWhere(['like', 'DESCRIPCIONESCENARIOVAC', $this->DESCRIPCIONESCENARIOVAC])
            ->andFilterWhere(['like', 'N_HISTCLINIC', $this->N_HISTCLINIC])
            ->andFilterWhere(['like', 'NOMBREVACUNADOR', $this->NOMBREVACUNADOR]);

        return $dataProvider;
    }
}
