<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Establecimiento;

/**
 * EstablecimientoSearch represents the model behind the search form about `frontend\models\Establecimiento`.
 */
class EstablecimientoSearch extends Establecimiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UNICODIGOES', 'ZONA', 'DISTRITO', 'NOMBREESTABLECIMIENTO', 'TIPOESTABLECIMIENTO', 'CODPARROQUIA', 'LOCALIDADEST'], 'safe'],
            [['CODZONAUBIC'], 'integer'],
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
        $query = Establecimiento::find();

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
            'CODZONAUBIC' => $this->CODZONAUBIC,
        ]);

        $query->andFilterWhere(['like', 'UNICODIGOES', $this->UNICODIGOES])
            ->andFilterWhere(['like', 'ZONA', $this->ZONA])
            ->andFilterWhere(['like', 'DISTRITO', $this->DISTRITO])
            ->andFilterWhere(['like', 'NOMBREESTABLECIMIENTO', $this->NOMBREESTABLECIMIENTO])
            ->andFilterWhere(['like', 'TIPOESTABLECIMIENTO', $this->TIPOESTABLECIMIENTO])
            ->andFilterWhere(['like', 'CODPARROQUIA', $this->CODPARROQUIA])
            ->andFilterWhere(['like', 'LOCALIDADEST', $this->LOCALIDADEST]);

        return $dataProvider;
    }
}
