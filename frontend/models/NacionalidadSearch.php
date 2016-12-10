<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Nacionalidad;

/**
 * NacionalidadSearch represents the model behind the search form about `frontend\models\Nacionalidad`.
 */
class NacionalidadSearch extends Nacionalidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODNACIONALIDAD'], 'integer'],
            [['NACIONALIDAD', 'NOMBREPAIS'], 'safe'],
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
        $query = Nacionalidad::find();

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
            'CODNACIONALIDAD' => $this->CODNACIONALIDAD,
        ]);

        $query->andFilterWhere(['like', 'NACIONALIDAD', $this->NACIONALIDAD])
            ->andFilterWhere(['like', 'NOMBREPAIS', $this->NOMBREPAIS]);

        return $dataProvider;
    }
}
