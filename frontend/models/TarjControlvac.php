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
            'N_HISTCLINIC' => 'N  Histclinic',
            'UNICODIGOES' => 'Unicodigoes',
            'NUMORDENTAR' => 'Numordentar',
            'FECHNAC' => 'Fechnac',
            'LUGARNAC' => 'Lugarnac',
            'LUGARINSCRIPCION' => 'Lugarinscripcion',
            'EDADINGRESO' => 'Edadingreso',
            'APELLIDOSNOMBRESMADRE' => 'Apellidosnombresmadre',
            'APELLIDOSNOMBRESPADRE' => 'Apellidosnombrespadre',
            'APELLIDOSNOMBRESTUTOR' => 'Apellidosnombrestutor',
            'OBSERV' => 'Observ',
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
