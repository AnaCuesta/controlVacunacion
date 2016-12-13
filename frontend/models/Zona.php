<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zona".
 *
 * @property integer $CODZONA
 * @property string $ZONA
 *
 * @property Distrito[] $distritos
 */
class Zona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODZONA', 'ZONA'], 'required'],
            [['CODZONA'], 'integer'],
            [['ZONA'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODZONA' => 'Codzona',
            'ZONA' => 'Zona',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistritos()
    {
        return $this->hasMany(Distrito::className(), ['CODZONA' => 'CODZONA']);
    }
}
