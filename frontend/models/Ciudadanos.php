<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ciudadanos".
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
 * @property integer $CODPROVINCIA
 * @property integer $CODCANTON
 * @property integer $CODPARROQUIA
 * @property integer $CODLOCALIDAD
 * @property string $DIRCIUD
 * @property string $LONGITUD
 * @property string $LAT
 * @property string $TELFCIUD
 * @property string $CORREOCIUD
 * @property string $SNPERTENECEUO
 * @property integer $idCiudadano
 */
class Ciudadanos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudadanos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['N_HISTCLINIC','APELLIDOS', 'NOMBRES', 'CODSEXO', 'CODEDAD', 'CODNACIONALIDAD', 'CODAUTOIDETNICA', 'CODLUGARRESIDE', 'CODPROVINCIA', 'CODCANTON', 'CODPARROQUIA', 'CODLOCALIDAD', 'DIRCIUD', 'LONGITUD', 'LAT', 'TELFCIUD', 'CORREOCIUD', 'SNPERTENECEUO'], 'required'],
            [['CODSEXO', 'CODEDAD', 'CODNACIONALIDAD', 'CODAUTOIDETNICA',   'CODPROVINCIA', 'CODCANTON', 'CODPARROQUIA', 'CODLOCALIDAD'], 'integer'],
            [['N_HISTCLINIC'], 'string', 'max' => 15, 'message' => 'El campo no puede quedar vacio'],
            [['CEDULA'], 'required', 'message' => 'El campo Cédula no puede quedar vacio'],
            [['CEDULA'],'string', 'max' => 30],
            [['APELLIDOS', 'NOMBRES'], 'string', 'max' => 30],
            [['DIRCIUD', 'CORREOCIUD'], 'string', 'max' => 120],
            [['LONGITUD', 'LAT'], 'string', 'max' => 20],
            [['TELFCIUD'], 'string', 'max' => 25],
            [['CODLUGARRESIDE'], 'string', 'max' => 50],
            [['SNPERTENECEUO'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'N_HISTCLINIC' => 'N° Historia Clínica',
            'CEDULA' => 'Cédula',
            'APELLIDOS' => 'Apellidos',
            'NOMBRES' => 'Nombres',
            'CODSEXO' => 'Sexo',
            'CODEDAD' => 'Edad',
            'CODNACIONALIDAD' => 'Nacionalidad',
            'CODAUTOIDETNICA' => 'Autoidentificación étnica',
            'CODLUGARRESIDE' => 'Lugar de Residencia',
            'CODPROVINCIA' => 'Provincia',
            'CODCANTON' => 'Cantón',
            'CODPARROQUIA' => 'Parroquia',
            'CODLOCALIDAD' => 'Localidad',
            'DIRCIUD' => 'Dirección',
            'LONGITUD' => 'Longitud',
            'LAT' => 'Latitud',
            'TELFCIUD' => 'Teléfono',
            'CORREOCIUD' => 'Correo Electrónico',
            'SNPERTENECEUO' => 'SELECCIONE:',
            'idCiudadano' => 'Id Ciudadano',
        ];
    }
}
