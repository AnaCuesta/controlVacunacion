<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "provincia".
 *
 * @property string $CODPROVINCIA
 * @property string $PROVINCIA
 *
 * @property Canton[] $cantons
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODPROVINCIA', 'PROVINCIA'], 'required'],
            [['CODPROVINCIA'], 'string', 'max' => 11],
            [['PROVINCIA'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODPROVINCIA' => 'Codprovincia',
            'PROVINCIA' => 'Provincia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantons()
    {
        return $this->hasMany(Canton::className(), ['CODPROVINCIA' => 'CODPROVINCIA']);
    }
}
