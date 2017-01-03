<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "r_edad_vac".
 *
 * @property integer $CODRANGOEDAD
 * @property integer $CODVACUNA
 * @property string $RANGOEDAD
 *
 * @property Vacuna $cODVACUNA
 */
class REdadVac extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'r_edad_vac';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODRANGOEDAD', 'RANGOEDAD'], 'required'],
            [['CODRANGOEDAD', 'CODVACUNA'], 'integer'],
            [['RANGOEDAD'], 'string', 'max' => 40],
            [['CODVACUNA'], 'exist', 'skipOnError' => true, 'targetClass' => Vacuna::className(), 'targetAttribute' => ['CODVACUNA' => 'CODVACUNA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODRANGOEDAD' => 'Codrangoedad',
            'CODVACUNA' => 'Codvacuna',
            'RANGOEDAD' => 'Rangoedad',
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
