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
 * @property integer $CODEDAD
 * @property string $FECHAVACUNA
 * @property string $ESTADO
 *
 * @property Dosis $cODDOSIS
 * @property Edad $cODEDAD
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
            [['CODTARCONTVAC', 'CODDOSIS', 'CODRANGOEDAD', 'CODEDAD', 'FECHAVACUNA', 'ESTADO'], 'required'],
            //[['CODRANGOEDAD'], 'integer'],
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
            'CODDOSIS' => 'Coddosis',
            'CODRANGOEDAD' => 'Codrangoedad',
            'CODEDAD' => 'Codedad',
            'FECHAVACUNA' => 'Fechavacuna',
            'ESTADO' => 'Estado',
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
