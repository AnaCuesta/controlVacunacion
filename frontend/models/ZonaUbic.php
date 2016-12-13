<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "zona_ubic".
 *
 * @property integer $CODZONAUBIC
 * @property string $ZONAUBICACION
 *
 * @property Establecimiento[] $establecimientos
 */
class ZonaUbic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zona_ubic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODZONAUBIC', 'ZONAUBICACION'], 'required'],
            [['CODZONAUBIC'], 'integer'],
            [['ZONAUBICACION'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODZONAUBIC' => 'Codzonaubic',
            'ZONAUBICACION' => 'Zonaubicacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstablecimientos()
    {
        return $this->hasMany(Establecimiento::className(), ['CODZONAUBIC' => 'CODZONAUBIC']);
    }
}
