<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nacionalidad".
 *
 * @property integer $CODNACIONALIDAD
 * @property string $NACIONALIDAD
 * @property string $NOMBREPAIS
 *
 * @property Ciudadano[] $ciudadanos
 */
class Nacionalidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nacionalidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODNACIONALIDAD', 'NACIONALIDAD', 'NOMBREPAIS'], 'required'],
            [['CODNACIONALIDAD'], 'integer'],
            [['NACIONALIDAD'], 'string', 'max' => 25],
            [['NOMBREPAIS'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODNACIONALIDAD' => 'Codnacionalidad',
            'NACIONALIDAD' => 'Nacionalidad',
            'NOMBREPAIS' => 'Nombrepais',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanos()
    {
        return $this->hasMany(Ciudadano::className(), ['CODNACIONALIDAD' => 'CODNACIONALIDAD']);
    }
}
