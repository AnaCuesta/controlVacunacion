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
            [['N_HISTCLINIC', 'CEDULA', 'APELLIDOS', 'NOMBRES', 'CODLUGARRESIDE', 'DIRCIUD', 'LONGITUD', 'LAT', 'TELFCIUD', 'CORREOCIUD', 'SNPERTENECEUO'], 'safe'],
            [['CODSEXO', 'CODEDAD', 'CODNACIONALIDAD', 'CODAUTOIDETNICA', 'CODPROVINCIA', 'CODCANTON', 'CODPARROQUIA', 'CODLOCALIDAD', 'idCiudadano'], 'integer'],
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
            'CODSEXO' => $this->CODSEXO,
            'CODEDAD' => $this->CODEDAD,
            'CODNACIONALIDAD' => $this->CODNACIONALIDAD,
            'CODAUTOIDETNICA' => $this->CODAUTOIDETNICA,
            'CODPROVINCIA' => $this->CODPROVINCIA,
            'CODCANTON' => $this->CODCANTON,
            'CODPARROQUIA' => $this->CODPARROQUIA,
            'CODLOCALIDAD' => $this->CODLOCALIDAD,
            'idCiudadano' => $this->idCiudadano,
        ]);

        $query->andFilterWhere(['like', 'N_HISTCLINIC', $this->N_HISTCLINIC])
            ->andFilterWhere(['like', 'CEDULA', $this->CEDULA])
            ->andFilterWhere(['like', 'APELLIDOS', $this->APELLIDOS])
            ->andFilterWhere(['like', 'NOMBRES', $this->NOMBRES])
            ->andFilterWhere(['like', 'CODLUGARRESIDE', $this->CODLUGARRESIDE])
            ->andFilterWhere(['like', 'DIRCIUD', $this->DIRCIUD])
            ->andFilterWhere(['like', 'LONGITUD', $this->LONGITUD])
            ->andFilterWhere(['like', 'LAT', $this->LAT])
            ->andFilterWhere(['like', 'TELFCIUD', $this->TELFCIUD])
            ->andFilterWhere(['like', 'CORREOCIUD', $this->CORREOCIUD])
            ->andFilterWhere(['like', 'SNPERTENECEUO', $this->SNPERTENECEUO]);

        return $dataProvider;
    }
}
