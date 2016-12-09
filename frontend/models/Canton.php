<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "canton".
 *
 * @property string $CODCANTON
 * @property string $CANTON
 * @property string $CODPROVINCIA
 *
 * @property Provincia $cODPROVINCIA
 * @property Parroquia[] $parroquias
 */
class Canton extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'canton';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODCANTON', 'CANTON', 'CODPROVINCIA'], 'required'],
            [['CODCANTON', 'CODPROVINCIA'], 'string', 'max' => 11],
            [['CANTON'], 'string', 'max' => 30],
            [['CODPROVINCIA'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['CODPROVINCIA' => 'CODPROVINCIA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODCANTON' => 'Codcanton',
            'CANTON' => 'Canton',
            'CODPROVINCIA' => 'Codprovincia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODPROVINCIA()
    {
        return $this->hasOne(Provincia::className(), ['CODPROVINCIA' => 'CODPROVINCIA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquia::className(), ['CODCANTON' => 'CODCANTON']);
    }
}
