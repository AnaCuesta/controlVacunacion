<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tarj_controlvacs".
 *
 * @property integer $CODTARCONTVAC
 * @property integer * @property string $NUMORDENTAR
 * @property string $FECREGTAR
 * @property string $FECHNAC
 * @property string $LUGARNAC
 * @property string $LUGARINSCRIPCION
 * @property string $EDADINGRESO
 * @property string $APELLIDOSNOMBRESMADRE
 * @property string $APELLIDOSNOMBRESPADRE
 * @property string $APELLIDOSNOMBRESTUTOR
 * @property string $OBSERV
 * @property integer $CODCALENDARIOVAC
 */
class TarjControlvacs extends \yii\db\ActiveRecord
{
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
            [['CODTARCONTVAC', 'NUMORDENTAR', 'FECREGTAR', 'FECHNAC', 'LUGARNAC', 'LUGARINSCRIPCION', 'EDADINGRESO', 'APELLIDOSNOMBRESMADRE', 'APELLIDOSNOMBRESPADRE', 'CODCALENDARIOVAC'], 'required'],
            [['CODTARCONTVAC',  'CODCALENDARIOVAC'], 'integer'],
            [['FECREGTAR', 'FECHNAC'], 'safe'],
            [['OBSERV'], 'string'],
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
            'NUMORDENTAR' => 'Numordentar',
            'FECREGTAR' => 'Fecregtar',
            'FECHNAC' => 'Fechnac',
            'LUGARNAC' => 'Lugarnac',
            'LUGARINSCRIPCION' => 'Lugarinscripcion',
            'EDADINGRESO' => 'Edadingreso',
            'APELLIDOSNOMBRESMADRE' => 'Apellidosnombresmadre',
            'APELLIDOSNOMBRESPADRE' => 'Apellidosnombrespadre',
            'APELLIDOSNOMBRESTUTOR' => 'Apellidosnombrestutor',
            'OBSERV' => 'Observ',
            'CODCALENDARIOVAC' => 'Codcalendariovac',
        ];
    }
}
