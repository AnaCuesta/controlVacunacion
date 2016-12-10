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
 * @property string $SEXO
 * @property integer $EDAD
 * @property string $NACIONALIDAD
 * @property string $AUTOIDETNICA
 * @property string $LUGARRESIDE
 * @property string $PROVINCIA
 * @property string $CANTON
 * @property string $PARROQUIA
 * @property string $LOCALIDAD
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
            [['N_HISTCLINIC', 'CEDULA', 'APELLIDOS', 'NOMBRES', 'SEXO', 'EDAD', 'NACIONALIDAD', 'AUTOIDETNICA', 'LUGARRESIDE', 'PROVINCIA', 'CANTON', 'PARROQUIA', 'LOCALIDAD', 'DIRCIUD', 'LONGITUD', 'LAT', 'TELFCIUD', 'CORREOCIUD', 'SNPERTENECEUO'], 'required'],
            [['EDAD'], 'integer'],
            [['N_HISTCLINIC'], 'string', 'max' => 10],
            [['CEDULA'], 'string', 'max' => 15],
            [['APELLIDOS', 'NOMBRES', 'CANTON'], 'string', 'max' => 30],
            [['SEXO', 'AUTOIDETNICA'], 'string', 'max' => 11],
            [['NACIONALIDAD'], 'string', 'max' => 40],
            [['LUGARRESIDE'], 'string', 'max' => 50],
            [['PROVINCIA', 'PARROQUIA', 'LOCALIDAD', 'LONGITUD', 'LAT'], 'string', 'max' => 20],
            [['DIRCIUD', 'CORREOCIUD'], 'string', 'max' => 120],
            [['TELFCIUD'], 'string', 'max' => 25],
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
              'APELLIDOS' =>  'Apellidos',
              'NOMBRES' => 'Nombres',
              'SEXO' => 'Sexo',
              'EDAD' => 'Edad',
              'NACIONALIDAD' => 'Nacionalidad',
              'AUTOIDETNICA' => 'Autoidentificación étnica',
              'LUGARRESIDE' =>'Lugar de Residencia',
              'PROVINCIA' =>'Provincia',
              'CANTON' => 'Cantón',
              'PARROQUIA' => 'Parroquia',
              'LOCALIDAD' =>'Localidad',
              'DIRCIUD' => 'Dirección',
              'LONGITUD' => 'Longitud',
              'LAT' => 'Latitud',
              'TELFCIUD' => 'Teléfono',
              'CORREOCIUD' => 'Correo Electrónico',
              'SNPERTENECEUO' => 'SELECCIONE:',
              'idCiudadano' =>'Id Ciudadano',
      ];
    }
}
