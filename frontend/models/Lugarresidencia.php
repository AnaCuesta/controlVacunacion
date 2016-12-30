<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lugarresidencia".
 *
 * @property integer $CODLUGARRESIDE
 * @property string $CODLOCREC
 * @property string $LUGARRESIDENCIA
 *
 * @property Ciudadano[] $ciudadanos
 * @property Localidad $cODLOCREC
 */
class Lugarresidencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lugarresidencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODLUGARRESIDE', 'LUGARRESIDENCIA'], 'required'],
            [['CODLUGARRESIDE'], 'integer'],
            [['CODLOCREC'], 'string', 'max' => 11],
            [['LUGARRESIDENCIA'], 'string', 'max' => 30],
            [['CODLOCREC'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['CODLOCREC' => 'CODLOCREC']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODLUGARRESIDE' => 'Codlugarreside',
            'CODLOCREC' => 'Codlocrec',
            'LUGARRESIDENCIA' => 'Lugarresidencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanos()
    {
        return $this->hasMany(Ciudadano::className(), ['CODLUGARRESIDE' => 'CODLUGARRESIDE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODLOCREC()
    {
        return $this->hasOne(Localidad::className(), ['CODLOCREC' => 'CODLOCREC']);
    }
}
