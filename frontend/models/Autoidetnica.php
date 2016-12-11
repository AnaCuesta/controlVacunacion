<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "autoidetnica".
 *
 * @property integer $CODAUTOIDETNICA
 * @property string $AUTOIDETNICA
 *
 * @property Ciudadano[] $ciudadanos
 */
class Autoidetnica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autoidetnica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODAUTOIDETNICA', 'AUTOIDETNICA'], 'required'],
            [['CODAUTOIDETNICA'], 'integer'],
            [['AUTOIDETNICA'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODAUTOIDETNICA' => 'Codautoidetnica',
            'AUTOIDETNICA' => 'Autoidetnica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudadanos()
    {
        return $this->hasMany(Ciudadano::className(), ['CODAUTOIDETNICA' => 'CODAUTOIDETNICA']);
    }
}
