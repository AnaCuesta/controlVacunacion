<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "vacunacionregistrodiario".
 *
 * @property integer $IDVAUNACIONREGDIARIO
 * @property integer $CODREGISTRODIARIO
 * @property integer $CODDOSIS
 * @property integer $CODRANGOEDAD
 *
 * @property Dosis $cODDOSIS
 * @property Regdiario $cODREGISTRODIARIO
 */
class Vacunacionregistrodiario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacunacionregistrodiario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDVAUNACIONREGDIARIO', 'CODDOSIS', 'CODRANGOEDAD'], 'required'],
            [['IDVAUNACIONREGDIARIO',  'CODDOSIS', 'CODRANGOEDAD'], 'integer'],
            [['CODDOSIS'], 'exist', 'skipOnError' => true, 'targetClass' => Dosis::className(), 'targetAttribute' => ['CODDOSIS' => 'CODDOSIS']],
            [['CODREGISTRODIARIO'], 'exist', 'skipOnError' => true, 'targetClass' => Regdiario::className(), 'targetAttribute' => ['CODREGISTRODIARIO' => 'CODREGISTRODIARIO']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDVAUNACIONREGDIARIO' => 'Idvaunacionregdiario',
            'CODREGISTRODIARIO' => 'Codregistrodiario',
            'CODDOSIS' => 'Coddosis',
            'CODRANGOEDAD' => 'Codrangoedad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODDOSIS()
    {
        return $this->hasOne(Dosis::className(), ['CODDOSIS' => 'CODDOSIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODREGISTRODIARIO()
    {
        return $this->hasOne(Regdiario::className(), ['CODREGISTRODIARIO' => 'CODREGISTRODIARIO']);
    }
}
