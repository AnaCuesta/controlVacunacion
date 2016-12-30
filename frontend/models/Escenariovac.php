<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "escenariovac".
 *
 * @property integer $CODLUGARVACUNACION
 * @property string $LUGARVACUNACION
 */
class Escenariovac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'escenariovac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODLUGARVACUNACION', 'LUGARVACUNACION'], 'required'],
            [['CODLUGARVACUNACION'], 'integer'],
            [['LUGARVACUNACION'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODLUGARVACUNACION' => 'Codlugarvacunacion',
            'LUGARVACUNACION' => 'Lugarvacunacion',
        ];
    }
}
