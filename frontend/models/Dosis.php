<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dosis".
 *
 * @property integer $CODDOSIS
 * @property integer $CODVACUNA
 * @property string $DOSIS
 *
 * @property Vacuna $cODVACUNA
 */
class Dosis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dosis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODDOSIS', 'DOSIS'], 'required'],
            [['CODDOSIS', 'CODVACUNA'], 'integer'],
            [['DOSIS'], 'string', 'max' => 15],
            [['CODVACUNA'], 'exist', 'skipOnError' => true, 'targetClass' => Vacuna::className(), 'targetAttribute' => ['CODVACUNA' => 'CODVACUNA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODDOSIS' => 'Coddosis',
            'CODVACUNA' => 'Codvacuna',
            'DOSIS' => 'Dosis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODVACUNA()
    {
        return $this->hasOne(Vacuna::className(), ['CODVACUNA' => 'CODVACUNA']);
    }
}
