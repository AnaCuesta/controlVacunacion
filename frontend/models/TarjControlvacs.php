<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tarj_controlvacs".
 *
 * @property integer $CODTARCONTVAC
 * @property string $NUMORDENTAR
 * @property string $FECHNAC
 * @property string $LUGARNAC
 * @property string $LUGARINSCRIPCION
 * @property string $EDADINGRESO
 * @property string $APELLIDOSNOMBRESMADRE
 * @property string $APELLIDOSNOMBRESPADRE
 * @property string $APELLIDOSNOMBRESTUTOR
 * @property string $OBSERV
 * @property integer $id_ciudadano
 * @property integer $idEstablecimiento
 */
class TarjControlvacs extends \yii\db\ActiveRecord
{
    public $apellidoCiudadano;
    public $nombreCiudadano;
    public $nacionalidadCiudadano;
    public $etniaCiudadano;
    public $provinciaCiudadano;
    public $cantonCiudadano;
    public $parroquiaCiudadano;
    public $localidadCiudadano;
    public $residenciaCiudadano;
    public $direccionCiudadano;
    public $telefonoCiudadano;
    public $zona;
    public $distrito;
    public $provincia;
    public $canton;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarj_controlvacs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NUMORDENTAR', 'FECHNAC', 'LUGARNAC', 'LUGARINSCRIPCION', 'EDADINGRESO', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'id_ciudadano', 'idEstablecimiento'], 'required'],
            [['FECHNAC'], 'safe'],
            [['OBSERV'], 'string'],
            [['id_ciudadano', 'idEstablecimiento'], 'integer'],
            [['NUMORDENTAR'], 'string', 'max' => 10],
            [['LUGARNAC', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'APELLIDOSNOMBRESTUTOR'], 'string', 'max' => 50],
            [['LUGARINSCRIPCION'], 'string', 'max' => 30],
            [['EDADINGRESO'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODTARCONTVAC' => 'Codtarcontvac',
            'nombreCiudadano' => 'Nombres del Niño(a)',
            'apellidoCiudadano' => 'Apellidos del Niño(a)',
            'nacionalidadCiudadano' => 'Nacionalidad',
            'etniaCiudadano' => 'Grupo Étnico',
            'cantonCiudadano' => 'Cantón',
            'provinciaCiudadano' => 'Provincia',
            'localidadCiudadano' => 'Localidad',
            'direccionCiudadano' => 'Dirección',
            'telefonoCiudadano' => 'Teléfono',
            'parroquiaCiudadano' => 'Parroquia',
            'NUMORDENTAR' => 'Numero de Orden',
            'FECHNAC' => 'Fecha de nacimiento',
            'LUGARNAC' => 'Lugar de nacimiento',
            'LUGARINSCRIPCION' => 'Lugar de Inscripción',
            'EDADINGRESO' => 'Edad al Ingreso',
            'APELLIDOSNOMBRESMADRE' => 'Apellidos y Nombres de la Madre',
            'APELLIDOSNOMBRESPADRE' => 'Apellidos y Nombres del Padre',
            'APELLIDOSNOMBRESTUTOR' => 'Apellidos y Nombres del Tutor',
            'OBSERV' => 'Observaciones',
            'id_ciudadano' => 'N° Historia Clinica',
            'residenciaCiudadano' => 'Lugar de Residencia',
            'idEstablecimiento' => 'Nombre Establecimeinto',
        ];
    }
}
