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
 * @property string $CODCANTON
 * @property string $CODPROVINCIA
 * @property integer $CODZONA
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
            [['UNICODIGOES', 'NOMBREESTABLECIMIENTO', 'CODZONAUBIC', 'TIPOESTABLECIMIENTO', 'LOCALIDADEST', 'CODCANTON', 'CODPROVINCIA', 'CODZONA'], 'required'],
            [['CODZONAUBIC', 'CODZONA'], 'integer'],
            [['UNICODIGOES',  'CODPARROQUIA', 'CODPROVINCIA'], 'string', 'max' => 11],
            [['NOMBREESTABLECIMIENTO', 'TIPOESTABLECIMIENTO', 'LOCALIDADEST', 'CODCANTON'], 'string', 'max' => 30],
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
            'UNICODIGOES' => 'Unicódigo E.S',
            'NOMBREESTABLECIMIENTO' => 'Nombre del Establecimiento',
            'CODDISTRITO' => 'Coddistrito',
            'CODZONAUBIC' => 'Zona Ubicación:',
            'TIPOESTABLECIMIENTO' => 'Tipo de Establecimiento',
            'CODPARROQUIA' => 'Parroquia',
            'LOCALIDADEST' => 'Nombre de la localidad o Institución',
            'CODCANTON' => 'Cantón',
            'CODPROVINCIA' => 'Provincia',
            'CODZONA' => 'Zona',
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
