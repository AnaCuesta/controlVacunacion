<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "calendariovacunacion".
 *
 * @property integer $IDCALENDARIO
 * @property integer $CODTARCONTVAC
 * @property integer $CODDOSIS
 * @property integer $CODEDAD
 * @property string $FECHAVACUNA
 * @property string $ESTADO
 *
 * @property Dosis $cODDOSIS
 * @property Edad $cODEDAD
 * @property TarjControlvac $cODTARCONTVAC
 */
class calendariovacunacion extends \yii\db\ActiveRecord
{
    public $vacuna;
    public $rangoEdad;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendariovacunacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'FECHAVACUNA', 'CODDOSIS','ESTADO','vacuna','rangoEdad'], 'required'],
            //[[ 'CODDOSIS'], 'integer'],
            [[ 'CODEDAD'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDCALENDARIO' => 'Idcalendario',
            'CODTARCONTVAC' => 'Codtarcontvac',
            'CODDOSIS' => 'Dosis',
            'CODEDAD' => 'Edad',
            'FECHAVACUNA' => 'Fecha de aplicación',
            'ESTADO' => 'Estado',
            'rangoEdad' => 'Edad Recomendada de Aplicación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODDOSIS()
    {
        return $this->hasOne(Dosis::className(), ['CODDOSIS' => 'CODDOSIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODEDAD()
    {
        return $this->hasOne(Edad::className(), ['CODEDAD' => 'CODEDAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODTARCONTVAC()
    {
        return $this->hasOne(TarjControlvac::className(), ['CODTARCONTVAC' => 'CODTARCONTVAC']);
    }
}
