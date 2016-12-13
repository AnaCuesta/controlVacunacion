<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "establecimiento".
 *
 * @property string $UNICODIGOES
 * @property string $NOMBREESTABLECIMIENTO
 * @property string $CODDISTRITO
 * @property integer $CODZONAUBIC
 * @property string $TIPOESTABLECIMIENTO
 * @property string $CODPARROQUIA
 * @property string $LOCALIDADEST
 *
 * @property Parroquia $cODPARROQUIA
 * @property Distrito $cODDISTRITO
 * @property ZonaUbic $cODZONAUBIC
 * @property Profesional[] $profesionals
 * @property Regdiario[] $regdiarios
 */
class Establecimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UNICODIGOES', 'NOMBREESTABLECIMIENTO', 'CODDISTRITO', 'CODZONAUBIC', 'TIPOESTABLECIMIENTO', 'LOCALIDADEST'], 'required'],
            [['CODZONAUBIC'], 'integer'],
            [['UNICODIGOES', 'CODDISTRITO', 'CODPARROQUIA'], 'string', 'max' => 11],
            [['NOMBREESTABLECIMIENTO', 'TIPOESTABLECIMIENTO', 'LOCALIDADEST'], 'string', 'max' => 30],
            [['CODPARROQUIA'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['CODPARROQUIA' => 'CODPARROQUIA']],
            [['CODDISTRITO'], 'exist', 'skipOnError' => true, 'targetClass' => Distrito::className(), 'targetAttribute' => ['CODDISTRITO' => 'CODDISTRITO']],
            [['CODZONAUBIC'], 'exist', 'skipOnError' => true, 'targetClass' => ZonaUbic::className(), 'targetAttribute' => ['CODZONAUBIC' => 'CODZONAUBIC']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UNICODIGOES' => 'Unicodigoes',
            'NOMBREESTABLECIMIENTO' => 'Nombreestablecimiento',
            'CODDISTRITO' => 'Coddistrito',
            'CODZONAUBIC' => 'Codzonaubic',
            'TIPOESTABLECIMIENTO' => 'Tipoestablecimiento',
            'CODPARROQUIA' => 'Codparroquia',
            'LOCALIDADEST' => 'Localidadest',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODPARROQUIA()
    {
        return $this->hasOne(Parroquia::className(), ['CODPARROQUIA' => 'CODPARROQUIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODDISTRITO()
    {
        return $this->hasOne(Distrito::className(), ['CODDISTRITO' => 'CODDISTRITO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODZONAUBIC()
    {
        return $this->hasOne(ZonaUbic::className(), ['CODZONAUBIC' => 'CODZONAUBIC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesionals()
    {
        return $this->hasMany(Profesional::className(), ['UNICODIGOES' => 'UNICODIGOES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegdiarios()
    {
        return $this->hasMany(Regdiario::className(), ['UNICODIGOES' => 'UNICODIGOES']);
    }
}
