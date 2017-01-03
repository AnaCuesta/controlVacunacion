<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tarj_controlvac".
 *
 * @property integer $CODTARCONTVAC
 * @property string $N_HISTCLINIC
 * @property string $UNICODIGOES
 * @property string $NUMORDENTAR
 * @property string $FECHNAC
 * @property string $LUGARNAC
 * @property string $LUGARINSCRIPCION
 * @property string $EDADINGRESO
 * @property string $APELLIDOSNOMBRESMADRE
 * @property string $APELLIDOSNOMBRESPADRE
 * @property string $APELLIDOSNOMBRESTUTOR
 * @property string $OBSERV
 *
 * @property Calendariovacunacion[] $calendariovacunacions
 * @property Establecimiento $uNICODIGOES
 * @property Ciudadano $nHISTCLINIC
 */
class TarjControlvac extends \yii\db\ActiveRecord
{
   /*Establecimiento*/
    public $provincia;
    public $canton;
    public $zona;
    public $distrito;
     /*Establecimiento*/

   /*ciudadano*/
    public $nombresCiudadano;
    public $apellidosCiudadano;
    public $nacionalidadCiudadano;
    public $etniaCiudadano;
    public $lugarResidenciaCiudadano;
    public $provinciaCiudadano;
    public $cantonCiudadano;
    public $parroquiaCiudadano;
    public $localidadCiudadano;
    public $direccionCiudadano;
    public $telefonoCiudadano;

     /*ciudadano*/


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tarj_controlvac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODTARCONTVAC', 'NUMORDENTAR', 'FECHNAC', 'LUGARNAC', 'LUGARINSCRIPCION', 'EDADINGRESO', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE'], 'required'],
            [['CODTARCONTVAC'], 'integer'],
            [['FECHNAC'], 'safe'],
            [['OBSERV'], 'string'],
            [['N_HISTCLINIC', 'NUMORDENTAR'], 'string', 'max' => 10],
            [['UNICODIGOES'], 'string', 'max' => 11],
            [['LUGARNAC', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'APELLIDOSNOMBRESTUTOR'], 'string', 'max' => 50],
            [['LUGARINSCRIPCION'], 'string', 'max' => 30],
            [['EDADINGRESO'], 'string', 'max' => 15],
            [['UNICODIGOES'], 'exist', 'skipOnError' => true, 'targetClass' => Establecimiento::className(), 'targetAttribute' => ['UNICODIGOES' => 'UNICODIGOES']],
            [['N_HISTCLINIC'], 'exist', 'skipOnError' => true, 'targetClass' => Ciudadano::className(), 'targetAttribute' => ['N_HISTCLINIC' => 'N_HISTCLINIC']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODTARCONTVAC' => 'Codtarcontvac',
            'N_HISTCLINIC' => 'N° Historia Clínica',
            'UNICODIGOES' => 'Establecimiento',
            'NUMORDENTAR' => 'Numero de Orden',
            'FECHNAC' => 'Fecha de nacimiento',
            'LUGARNAC' => 'Lugar de nacimiento',
            'LUGARINSCRIPCION' => 'Lugar de Inscripción',
            'EDADINGRESO' => 'Edad al Ingreso',
            'APELLIDOSNOMBRESMADRE' => 'Apellidos y Nombres de la Madre',
            'APELLIDOSNOMBRESPADRE' => 'Apellidos y Nombres del Padre',
            'APELLIDOSNOMBRESTUTOR' => 'Apellidos y Nombres del Tutor',
            'OBSERV' => 'Observaciones',
            'nombresCiudadano' => 'Nombres del Niño(a)',
            'apellidosCiudadano' => 'Apellidos del Niño(a)',
            'nacionalidadCiudadano' => 'Nacionalidad',
            'etniaCiudadano' => 'Grupo Étnico',
            'lugarResidenciaCiudadano' => 'Lugar de Residencia',
            'provinciaCiudadano' => 'Provincia',
            'cantonCiudadano' => 'Cantón',
            'parroquiaCiudadano' => 'Parroquia',
            'localidadCiudadano' => 'Localidad o Recinto',
            'direccionCiudadano' => 'Dirección (Punto de referencia)',
            'telefonoCiudadano' => 'Teléfono',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendariovacunacions()
    {
        return $this->hasMany(Calendariovacunacion::className(), ['CODTARCONTVAC' => 'CODTARCONTVAC']);
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
    public function getNHISTCLINIC()
    {
        return $this->hasOne(Ciudadano::className(), ['N_HISTCLINIC' => 'N_HISTCLINIC']);
    }
}
