<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "vacuna".
 *
 * @property integer $CODVACUNA
 * @property string $VACUNA
 *
 * @property Ciudadanovacuna[] $ciudadanovacunas
 * @property Dosis[] $doses
 * @property REdadVac[] $rEdadVacs
 */
class Vacuna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacuna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODVACUNA', 'VACUNA'], 'required'],
            [['CODVACUNA'], 'integer'],
            [['VACUNA'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODVACUNA' => 'Codvacuna',
            'VACUNA' => 'Vacuna',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanovacunas()
    {
        return $this->hasMany(Ciudadanovacuna::className(), ['CODVACUNA' => 'CODVACUNA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoses()
    {
        return $this->hasMany(Dosis::className(), ['CODVACUNA' => 'CODVACUNA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREdadVacs()
    {
        return $this->hasMany(REdadVac::className(), ['CODVACUNA' => 'CODVACUNA']);
    }
}
