<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Calendariovacunacion;

/**
 * CalendariovacunacionSearch represents the model behind the search form about `frontend\models\Calendariovacunacion`.
 */
class CalendariovacunacionSearch extends Calendariovacunacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDCALENDARIO', 'CODTARCONTVAC', 'CODDOSIS', 'EDAD'], 'integer'],
            [['FECHAVACUNA', 'ESTADO'], 'safe'],
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
        $query = Calendariovacunacion::find();

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
            'IDCALENDARIO' => $this->IDCALENDARIO,
            'CODTARCONTVAC' => $this->CODTARCONTVAC,
            'CODDOSIS' => $this->CODDOSIS,
            'CODEDAD' => $this->CODEDAD,
            'FECHAVACUNA' => $this->FECHAVACUNA,
        ]);

        $query->andFilterWhere(['like', 'ESTADO', $this->ESTADO]);

        return $dataProvider;
    }
}
