<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "vacunacionregdiariogr".
 *
 * @property integer $CODVACREGDIARIOGR
 * @property integer $CODREGISTRODIARIO
 * @property integer $CODDOSIS
 * @property integer $CODRANGOEDAD
 * @property integer $CODGRUPORIESGO
 */
class Vacunacionregdiariogr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacunacionregdiariogr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODREGISTRODIARIO', 'CODDOSIS', 'CODRANGOEDAD', 'CODGRUPORIESGO'], 'required'],
            [['CODREGISTRODIARIO', 'CODDOSIS', 'CODRANGOEDAD', 'CODGRUPORIESGO'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODVACREGDIARIOGR' => 'Codvacregdiariogr',
            'CODREGISTRODIARIO' => 'Codregistrodiario',
            'CODDOSIS' => 'Coddosis',
            'CODRANGOEDAD' => 'Codrangoedad',
            'CODGRUPORIESGO' => 'Codgruporiesgo',
        ];
    }
}
