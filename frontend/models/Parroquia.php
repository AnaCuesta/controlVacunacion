<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "parroquia".
 *
 * @property string $CODPARROQUIA
 * @property string $PARROQUIA
 * @property string $CODCANTON
 *
 * @property Establecimiento[] $establecimientos
 * @property Localidad[] $localidads
 * @property Canton $cODCANTON
 */
class Parroquia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODPARROQUIA', 'PARROQUIA', 'CODCANTON'], 'required'],
            [['CODPARROQUIA', 'CODCANTON'], 'string', 'max' => 11],
            [['PARROQUIA'], 'string', 'max' => 30],
            [['CODCANTON'], 'exist', 'skipOnError' => true, 'targetClass' => Canton::className(), 'targetAttribute' => ['CODCANTON' => 'CODCANTON']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODPARROQUIA' => 'Codparroquia',
            'PARROQUIA' => 'Parroquia',
            'CODCANTON' => 'Codcanton',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientos()
    {
        return $this->hasMany(Establecimiento::className(), ['CODPARROQUIA' => 'CODPARROQUIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidads()
    {
        return $this->hasMany(Localidad::className(), ['CODPARROQUIA' => 'CODPARROQUIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODCANTON()
    {
        return $this->hasOne(Canton::className(), ['CODCANTON' => 'CODCANTON']);
    }
}
