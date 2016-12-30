<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ciudadano".
 *
 * @property string $N_HISTCLINIC
 * @property string $CEDULA
 * @property string $APELLIDOS
 * @property string $NOMBRES
 * @property integer $CODSEXO
 * @property integer $CODEDAD
 * @property integer $CODNACIONALIDAD
 * @property integer $CODAUTOIDETNICA
 * @property integer $CODLUGARRESIDE
 * @property string $DIRCIUD
 * @property string $LONGITUD
 * @property string $LAT
 * @property string $TELFCIUD
 * @property string $CORREOCIUD
 * @property string $SNPERTENECEUO
 *
 * @property Autoidetnica $cODAUTOIDETNICA
 * @property Genero $cODSEXO
 * @property Lugarresidencia $cODLUGARRESIDE
 * @property Edad $cODEDAD
 * @property Nacionalidad $cODNACIONALIDAD
 * @property Ciudadanoregd[] $ciudadanoregds
 * @property Ciudadanovacuna[] $ciudadanovacunas
 */
class Ciudadano extends \yii\db\ActiveRecord
{
    public $localidad;
    public $parroquia;
    public $canton;
    public $provincia;

    public static function tableName()
    {
        return 'ciudadano';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['N_HISTCLINIC', 'CEDULA', 'APELLIDOS', 'NOMBRES', 'CODSEXO', 'CODEDAD', 'CODNACIONALIDAD', 'CODAUTOIDETNICA', 'CODLUGARRESIDE', 'DIRCIUD', 'LONGITUD', 'LAT', 'TELFCIUD', 'CORREOCIUD', 'SNPERTENECEUO'], 'required'],
            [['CODSEXO', 'CODEDAD', 'CODNACIONALIDAD', 'CODAUTOIDETNICA', 'CODLUGARRESIDE'], 'integer'],
            [['N_HISTCLINIC', 'CEDULA'], 'string', 'max' => 10],
            [['APELLIDOS', 'NOMBRES'], 'string', 'max' => 30],
            [['DIRCIUD', 'CORREOCIUD'], 'string', 'max' => 120],
            [['LONGITUD', 'LAT'], 'string', 'max' => 20],
            [['TELFCIUD'], 'string', 'max' => 25],
            [['SNPERTENECEUO'], 'string', 'max' => 45],
            [['CODAUTOIDETNICA'], 'exist', 'skipOnError' => true, 'targetClass' => Autoidetnica::className(), 'targetAttribute' => ['CODAUTOIDETNICA' => 'CODAUTOIDETNICA']],
            [['CODSEXO'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['CODSEXO' => 'CODSEXO']],
            [['CODLUGARRESIDE'], 'exist', 'skipOnError' => true, 'targetClass' => Lugarresidencia::className(), 'targetAttribute' => ['CODLUGARRESIDE' => 'CODLUGARRESIDE']],
            [['CODEDAD'], 'exist', 'skipOnError' => true, 'targetClass' => Edad::className(), 'targetAttribute' => ['CODEDAD' => 'CODEDAD']],
            [['CODNACIONALIDAD'], 'exist', 'skipOnError' => true, 'targetClass' => Nacionalidad::className(), 'targetAttribute' => ['CODNACIONALIDAD' => 'CODNACIONALIDAD']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'N_HISTCLINIC' => 'N  Histclinic',
            'CEDULA' => 'Cedula',
            'APELLIDOS' => 'Apellidos',
            'NOMBRES' => 'Nombres',
            'CODSEXO' => 'Codsexo',
            'CODEDAD' => 'Codedad',
            'CODNACIONALIDAD' => 'Codnacionalidad',
            'CODAUTOIDETNICA' => 'Codautoidetnica',
            'CODLUGARRESIDE' => 'Codlugarreside',
            'DIRCIUD' => 'Dirciud',
            'LONGITUD' => 'Longitud',
            'LAT' => 'Lat',
            'TELFCIUD' => 'Telfciud',
            'CORREOCIUD' => 'Correociud',
            'SNPERTENECEUO' => 'Snperteneceuo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODAUTOIDETNICA()
    {
        return $this->hasOne(Autoidetnica::className(), ['CODAUTOIDETNICA' => 'CODAUTOIDETNICA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODSEXO()
    {
        return $this->hasOne(Genero::className(), ['CODSEXO' => 'CODSEXO']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODLUGARRESIDE()
    {
        return $this->hasOne(Lugarresidencia::className(), ['CODLUGARRESIDE' => 'CODLUGARRESIDE']);
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
    public function getCODNACIONALIDAD()
    {
        return $this->hasOne(Nacionalidad::className(), ['CODNACIONALIDAD' => 'CODNACIONALIDAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanoregds()
    {
        return $this->hasMany(Ciudadanoregd::className(), ['N_HISTCLINIC' => 'N_HISTCLINIC']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanovacunas()
    {
        return $this->hasMany(Ciudadanovacuna::className(), ['N_HISTCLINIC' => 'N_HISTCLINIC']);
    }
}
