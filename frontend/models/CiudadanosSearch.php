<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Ciudadanos;

/**
 * CiudadanosSearch represents the model behind the search form about `frontend\models\Ciudadanos`.
 */
class CiudadanosSearch extends Ciudadanos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['N_HISTCLINIC', 'CEDULA', 'APELLIDOS', 'NOMBRES', 'SEXO', 'NACIONALIDAD', 'AUTOIDETNICA', 'LUGARRESIDE', 'PROVINCIA', 'CANTON', 'PARROQUIA', 'LOCALIDAD', 'DIRCIUD', 'LONGITUD', 'LAT', 'TELFCIUD', 'CORREOCIUD', 'SNPERTENECEUO'], 'safe'],
            [['EDAD', 'idCiudadano'], 'integer'],
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
        $query = Ciudadanos::find();

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
            'EDAD' => $this->EDAD,
            'idCiudadano' => $this->idCiudadano,
        ]);

        $query->andFilterWhere(['like', 'N_HISTCLINIC', $this->N_HISTCLINIC])
            ->andFilterWhere(['like', 'CEDULA', $this->CEDULA])
            ->andFilterWhere(['like', 'APELLIDOS', $this->APELLIDOS])
            ->andFilterWhere(['like', 'NOMBRES', $this->NOMBRES])
            ->andFilterWhere(['like', 'SEXO', $this->SEXO])
            ->andFilterWhere(['like', 'NACIONALIDAD', $this->NACIONALIDAD])
            ->andFilterWhere(['like', 'AUTOIDETNICA', $this->AUTOIDETNICA])
            ->andFilterWhere(['like', 'LUGARRESIDE', $this->LUGARRESIDE])
            ->andFilterWhere(['like', 'PROVINCIA', $this->PROVINCIA])
            ->andFilterWhere(['like', 'CANTON', $this->CANTON])
            ->andFilterWhere(['like', 'PARROQUIA', $this->PARROQUIA])
            ->andFilterWhere(['like', 'LOCALIDAD', $this->LOCALIDAD])
            ->andFilterWhere(['like', 'DIRCIUD', $this->DIRCIUD])
            ->andFilterWhere(['like', 'LONGITUD', $this->LONGITUD])
            ->andFilterWhere(['like', 'LAT', $this->LAT])
            ->andFilterWhere(['like', 'TELFCIUD', $this->TELFCIUD])
            ->andFilterWhere(['like', 'CORREOCIUD', $this->CORREOCIUD])
            ->andFilterWhere(['like', 'SNPERTENECEUO', $this->SNPERTENECEUO]);

        return $dataProvider;
    }
}
