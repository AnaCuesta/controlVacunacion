<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "localidad".
 *
 * @property string $CODLOCREC
 * @property string $LOCALREC
 * @property string $CODPARROQUIA
 *
 * @property Parroquia $cODPARROQUIA
 * @property Lugarresidencia[] $lugarresidencias
 */
class Localidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODLOCREC', 'LOCALREC', 'CODPARROQUIA'], 'required'],
            [['CODLOCREC', 'CODPARROQUIA'], 'string', 'max' => 11],
            [['LOCALREC'], 'string', 'max' => 30],
            [['CODPARROQUIA'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['CODPARROQUIA' => 'CODPARROQUIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODLOCREC' => 'Codlocrec',
            'LOCALREC' => 'Localrec',
            'CODPARROQUIA' => 'Codparroquia',
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
    public function getLugarresidencias()
    {
        return $this->hasMany(Lugarresidencia::className(), ['CODLOCREC' => 'CODLOCREC']);
    }
}
