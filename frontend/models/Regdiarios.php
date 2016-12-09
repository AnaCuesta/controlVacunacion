<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "regdiarios".
 *
 * @property integer $CODREGISTRODIARIO
 * @property string $UNICODIGOES
 * @property integer $CODTIPODOC
 * @property integer $NUMORDENR
 * @property integer $DIASVACMES
 * @property integer $TOTALRD
 * @property string $NOMBREVACUNADOR
 */
class Regdiarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regdiarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODREGISTRODIARIO', 'NUMORDENR', 'DIASVACMES', 'TOTALRD', 'NOMBREVACUNADOR'], 'required'],
            [['CODREGISTRODIARIO', 'CODTIPODOC', 'NUMORDENR', 'DIASVACMES', 'TOTALRD'], 'integer'],
            [['UNICODIGOES'], 'string', 'max' => 11],
            [['NOMBREVACUNADOR'], 'string', 'max' => 60],
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
            'NUMORDENR' => 'Numordenr',
            'DIASVACMES' => 'Diasvacmes',
            'TOTALRD' => 'Totalrd',
            'NOMBREVACUNADOR' => 'Nombrevacunador',
        ];
    }
}
