<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TarjControlvacs;

/**
 * TarjControlvacsSearch represents the model behind the search form about `frontend\models\TarjControlvacs`.
 */
class TarjControlvacsSearch extends TarjControlvacs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODTARCONTVAC', 'id_ciudadano', 'idEstablecimiento'], 'integer'],
            [['NUMORDENTAR', 'FECHNAC', 'LUGARNAC', 'LUGARINSCRIPCION', 'EDADINGRESO', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'APELLIDOSNOMBRESTUTOR', 'OBSERV'], 'safe'],
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
        $query = TarjControlvacs::find();

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
            'id_ciudadano' => $this->id_ciudadano,
            'idEstablecimiento' => $this->idEstablecimiento,
        ]);

        $query->andFilterWhere(['like', 'NUMORDENTAR', $this->NUMORDENTAR])
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
