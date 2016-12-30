<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "calendariovacunacion".
 *
 * @property integer $idCalendario
 * @property integer $CODEDAD
 * @property integer $idesquemavac
 * @property integer $CODVACUNA
 * @property integer $CODDOSIS
 * @property string $FECHAPROXIMA
 * @property integer $CODPROXIMAVACUNA
 * @property integer $CODPROXIMADOSIS
 * @property integer $CODTARCONTVAC
 * @property string $FECHAVACUNA
 */
class Calendariovacunacion extends \yii\db\ActiveRecord
{
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
            [['CODEDAD', 'idesquemavac', 'CODVACUNA', 'CODDOSIS', 'FECHAPROXIMA', 'CODPROXIMAVACUNA', 'CODPROXIMADOSIS', 'CODTARCONTVAC', 'FECHAVACUNA'], 'required'],
            [['CODEDAD', 'idesquemavac', 'CODVACUNA', 'CODDOSIS', 'CODPROXIMAVACUNA', 'CODPROXIMADOSIS', 'CODTARCONTVAC'], 'integer'],
            [['FECHAPROXIMA', 'FECHAVACUNA'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCalendario' => 'Id Calendario',
            'CODEDAD' => 'Edad',
            'idesquemavac' => 'Esquema de Vacunación',
            'CODVACUNA' => 'Vacuna',
            'CODDOSIS' => 'Dosis',
            'FECHAPROXIMA' => 'Fecha de Aplicacion Proxima Vacuna',
            'CODPROXIMAVACUNA' => 'Proxima Vacuna',
            'CODPROXIMADOSIS' => 'Proxima Dosis',
            //'CODTARCONTVAC' => 'Codtarcontvac',
            'FECHAVACUNA' => 'Fecha de Aplicación Vacuna',
        ];
    }
}
