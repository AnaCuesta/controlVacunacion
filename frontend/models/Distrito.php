<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "distrito".
 *
 * @property string $CODDISTRITO
 * @property string $DISTRITO
 * @property integer $CODZONA
 *
 * @property Zona $cODZONA
 * @property Establecimiento[] $establecimientos
 */
class Distrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'distrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODDISTRITO', 'DISTRITO', 'CODZONA'], 'required'],
            [['CODZONA'], 'integer'],
            //[['CODDISTRITO'], 'string', 'max' => 11],
            [['DISTRITO'], 'string', 'max' => 10],
            [['CODZONA'], 'exist', 'skipOnError' => true, 'targetClass' => Zona::className(), 'targetAttribute' => ['CODZONA' => 'CODZONA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODDISTRITO' => 'Coddistrito',
            'DISTRITO' => 'Distrito',
            'CODZONA' => 'Codzona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCODZONA()
    {
        return $this->hasOne(Zona::className(), ['CODZONA' => 'CODZONA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientos()
    {
        return $this->hasMany(Establecimiento::className(), ['CODDISTRITO' => 'CODDISTRITO']);
    }
}
