<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "edad".
 *
 * @property integer $CODEDAD
 * @property string $EDADRMA
 *
 * @property Ciudadano[] $ciudadanos
 */
class Edad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODEDAD', 'EDADRMA'], 'required'],
            [['CODEDAD'], 'integer'],
            [['EDADRMA'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODEDAD' => 'Codedad',
            'EDADRMA' => 'Edadrma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanos()
    {
        return $this->hasMany(Ciudadano::className(), ['CODEDAD' => 'CODEDAD']);
    }
}
