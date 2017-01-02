<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "establecimiento".
 *
 * @property string $UNICODIGOES
 * @property string $ZONA
 * @property string $DISTRITO
 * @property string $NOMBREESTABLECIMIENTO
 * @property integer $CODZONAUBIC
 * @property string $TIPOESTABLECIMIENTO
 * @property string $CODPARROQUIA
 * @property string $LOCALIDADEST
 *
 * @property Parroquia $cODPARROQUIA
 * @property Regdiario[] $regdiarios
 * @property TarjControlvac[] $tarjControlvacs
 */
class Establecimiento extends \yii\db\ActiveRecord
{
    public $canton;
    public $provincia;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'establecimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UNICODIGOES', 'ZONA', 'DISTRITO', 'NOMBREESTABLECIMIENTO', 'CODZONAUBIC', 'TIPOESTABLECIMIENTO', 'CODPARROQUIA', 'LOCALIDADEST'], 'required'],
            [['CODZONAUBIC'], 'integer'],
            [['UNICODIGOES', 'CODPARROQUIA'], 'string', 'max' => 11],
            [['ZONA', 'DISTRITO'], 'string', 'max' => 10],
            [['NOMBREESTABLECIMIENTO', 'TIPOESTABLECIMIENTO', 'LOCALIDADEST'], 'string', 'max' => 30],
            [['CODPARROQUIA'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['CODPARROQUIA' => 'CODPARROQUIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          'UNICODIGOES' => 'Unicódigo E.S',
          'NOMBREESTABLECIMIENTO' => 'Nombre del Establecimiento',
          'CODDISTRITO' => 'Coddistrito',
          'CODZONAUBIC' => 'Zona Ubicación:',
          'TIPOESTABLECIMIENTO' => 'Tipo de Establecimiento',
          'CODPARROQUIA' => 'Parroquia',
          'LOCALIDADEST' => 'Nombre de la localidad o Institución',
          'CODZONA' => 'Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODPARROQUIA()
    {
        return $this->hasOne(Parroquia::className(), ['CODPARROQUIA' => 'CODPARROQUIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegdiarios()
    {
        return $this->hasMany(Regdiario::className(), ['UNICODIGOES' => 'UNICODIGOES']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarjControlvacs()
    {
        return $this->hasMany(TarjControlvac::className(), ['UNICODIGOES' => 'UNICODIGOES']);
    }
}
