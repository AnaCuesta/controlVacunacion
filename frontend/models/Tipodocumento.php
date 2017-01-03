<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipodocumento".
 *
 * @property integer $CODTIPODOC
 * @property string $NOMTIPODOC
 *
 * @property Regdiario[] $regdiarios
 */
class Tipodocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipodocumento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODTIPODOC', 'NOMTIPODOC'], 'required'],
            [['CODTIPODOC'], 'integer'],
            [['NOMTIPODOC'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODTIPODOC' => 'Codtipodoc',
            'NOMTIPODOC' => 'Nomtipodoc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegdiarios()
    {
        return $this->hasMany(Regdiario::className(), ['CODTIPODOC' => 'CODTIPODOC']);
    }
}
