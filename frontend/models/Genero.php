<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property integer $CODSEXO
 * @property string $SEXO
 *
 * @property Ciudadano[] $ciudadanos
 * @property Profesional[] $profesionals
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODSEXO', 'SEXO'], 'required'],
            [['CODSEXO'], 'integer'],
            [['SEXO'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODSEXO' => 'Codsexo',
            'SEXO' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanos()
    {
        return $this->hasMany(Ciudadano::className(), ['CODSEXO' => 'CODSEXO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesionals()
    {
        return $this->hasMany(Profesional::className(), ['CODSEXO' => 'CODSEXO']);
    }
}
