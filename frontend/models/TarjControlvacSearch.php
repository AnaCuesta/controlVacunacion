<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TarjControlvac;

/**
 * TarjControlvacSearch represents the model behind the search form about `frontend\models\TarjControlvac`.
 */
class TarjControlvacSearch extends TarjControlvac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODTARCONTVAC'], 'integer'],
            [['N_HISTCLINIC', 'UNICODIGOES', 'perteneceUO', 'NUMORDENTAR', 'FECHNAC', 'LUGARNAC', 'LUGARINSCRIPCION', 'EDADINGRESO', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'APELLIDOSNOMBRESTUTOR', 'OBSERV'], 'safe'],
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
        $query = TarjControlvac::find();

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
            'CODTARCONTVAC' => $this->CODTARCONTVAC,
            'FECHNAC' => $this->FECHNAC,
        ]);

        $query->andFilterWhere(['like', 'N_HISTCLINIC', $this->N_HISTCLINIC])
            ->andFilterWhere(['like', 'UNICODIGOES', $this->UNICODIGOES])
            ->andFilterWhere(['like', 'perteneceUO', $this->perteneceUO])
            ->andFilterWhere(['like', 'NUMORDENTAR', $this->NUMORDENTAR])
            ->andFilterWhere(['like', 'LUGARNAC', $this->LUGARNAC])
            ->andFilterWhere(['like', 'LUGARINSCRIPCION', $this->LUGARINSCRIPCION])
            ->andFilterWhere(['like', 'EDADINGRESO', $this->EDADINGRESO])
            ->andFilterWhere(['like', 'APELLIDOSNOMBRESMADRE', $this->APELLIDOSNOMBRESMADRE])
            ->andFilterWhere(['like', 'APELLIDOSNOMBRESPADRE', $this->APELLIDOSNOMBRESPADRE])
            ->andFilterWhere(['like', 'APELLIDOSNOMBRESTUTOR', $this->APELLIDOSNOMBRESTUTOR])
            ->andFilterWhere(['like', 'OBSERV', $this->OBSERV]);

        return $dataProvider;
    }
}
