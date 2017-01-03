<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "regdiario".
 *
 * @property integer $CODREGISTRODIARIO
 * @property string $UNICODIGOES
 * @property integer $CODTIPODOC
 * @property integer $CODLUGARVACUNACION
 * @property string $DESCRIPCIONESCENARIOVAC
 * @property string $FECHAREGISTROVAC
 * @property string $N_HISTCLINIC
 * @property integer $CODEDAD
 * @property string $NOMBREVACUNADOR
 *
 * @property Edad $cODEDAD
 * @property Escenariovac $cODLUGARVACUNACION
 * @property Tipodocumento $cODTIPODOC
 * @property Ciudadano $nHISTCLINIC
 * @property Establecimiento $uNICODIGOES
 * @property Vacunacionregistrodiario[] $vacunacionregistrodiarios
 */
class Regdiario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regdiario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODREGISTRODIARIO', 'UNICODIGOES', 'CODTIPODOC', 'CODLUGARVACUNACION', 'DESCRIPCIONESCENARIOVAC', 'FECHAREGISTROVAC', 'N_HISTCLINIC', 'NOMBREVACUNADOR'], 'required'],
            [['CODREGISTRODIARIO', 'CODTIPODOC', 'CODLUGARVACUNACION', 'CODEDAD'], 'integer'],
            [['FECHAREGISTROVAC'], 'safe'],
            [['UNICODIGOES'], 'string', 'max' => 11],
            [['DESCRIPCIONESCENARIOVAC', 'NOMBREVACUNADOR'], 'string', 'max' => 60],
            [['N_HISTCLINIC'], 'string', 'max' => 10],
            [['CODEDAD'], 'exist', 'skipOnError' => true, 'targetClass' => Edad::className(), 'targetAttribute' => ['CODEDAD' => 'CODEDAD']],
            [['CODLUGARVACUNACION'], 'exist', 'skipOnError' => true, 'targetClass' => Escenariovac::className(), 'targetAttribute' => ['CODLUGARVACUNACION' => 'CODLUGARVACUNACION']],
            [['CODTIPODOC'], 'exist', 'skipOnError' => true, 'targetClass' => Tipodocumento::className(), 'targetAttribute' => ['CODTIPODOC' => 'CODTIPODOC']],
            [['N_HISTCLINIC'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudadano::className(), 'targetAttribute' => ['N_HISTCLINIC' => 'N_HISTCLINIC']],
            [['UNICODIGOES'], 'exist', 'skipOnError' => true, 'targetClass' => Establecimiento::className(), 'targetAttribute' => ['UNICODIGOES' => 'UNICODIGOES']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODREGISTRODIARIO' => 'Codregistrodiario',
            'UNICODIGOES' => 'Unicodigoes',
            'CODTIPODOC' => 'Codtipodoc',
            'CODLUGARVACUNACION' => 'Codlugarvacunacion',
            'DESCRIPCIONESCENARIOVAC' => 'Descripcionescenariovac',
            'FECHAREGISTROVAC' => 'Fecharegistrovac',
            'N_HISTCLINIC' => 'N  Histclinic',
            'CODEDAD' => 'Codedad',
            'NOMBREVACUNADOR' => 'Nombrevacunador',
        ];
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
    public function getCODLUGARVACUNACION()
    {
        return $this->hasOne(Escenariovac::className(), ['CODLUGARVACUNACION' => 'CODLUGARVACUNACION']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODTIPODOC()
    {
        return $this->hasOne(Tipodocumento::className(), ['CODTIPODOC' => 'CODTIPODOC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNHISTCLINIC()
    {
        return $this->hasOne(Ciudadano::className(), ['N_HISTCLINIC' => 'N_HISTCLINIC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUNICODIGOES()
    {
        return $this->hasOne(Establecimiento::className(), ['UNICODIGOES' => 'UNICODIGOES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunacionregistrodiarios()
    {
        return $this->hasMany(Vacunacionregistrodiario::className(), ['CODREGISTRODIARIO' => 'CODREGISTRODIARIO']);
    }
}
