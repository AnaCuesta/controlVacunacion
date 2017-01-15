<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "calendariovacunacion".
 *
 * @property integer $IDCALENDARIO
 * @property integer $CODTARCONTVAC
 * @property integer $CODDOSIS
 * @property integer $CODRANGOEDAD
 * @property string $FECHAVACUNA
 * @property string $ESTADO
 * @property integer $CODEDAD
 *
 * @property Dosis $cODDOSIS
 * @property TarjControlvac $cODTARCONTVAC
 */
class Calendariovacunacion extends \yii\db\ActiveRecord
{
    public $vacuna;
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
            [['CODTARCONTVAC', 'CODDOSIS', 'CODRANGOEDAD', 'FECHAVACUNA', 'ESTADO', 'CODEDAD'], 'required'],
            [['CODTARCONTVAC', 'CODDOSIS', 'CODRANGOEDAD', 'CODEDAD'], 'integer'],
            [['FECHAVACUNA'], 'safe'],
            [['ESTADO'], 'string', 'max' => 20],
            [['CODDOSIS'], 'exist', 'skipOnError' => true, 'targetClass' => Dosis::className(), 'targetAttribute' => ['CODDOSIS' => 'CODDOSIS']],
            [['CODTARCONTVAC'], 'exist', 'skipOnError' => true, 'targetClass' => TarjControlvac::className(), 'targetAttribute' => ['CODTARCONTVAC' => 'CODTARCONTVAC']],
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
            'CODRANGOEDAD' => 'Edad Recomendada de Aplición',
            'FECHAVACUNA' => 'Fecha de Aplicación',
            'ESTADO' => 'Estado',
            'CODEDAD' => 'Edad',
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
    public function getCODTARCONTVAC()
    {
        return $this->hasOne(TarjControlvac::className(), ['CODTARCONTVAC' => 'CODTARCONTVAC']);
    }
}
