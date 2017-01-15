<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "grupoderiesgo".
 *
 * @property integer $CODGRUPORIESGO
 * @property string $GRUPORIESGO
 */
class Grupoderiesgo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupoderiesgo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODGRUPORIESGO', 'GRUPORIESGO'], 'required'],
            [['CODGRUPORIESGO'], 'integer'],
            [['GRUPORIESGO'], 'string', 'max' => 115],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODGRUPORIESGO' => 'Codgruporiesgo',
            'GRUPORIESGO' => 'Gruporiesgo',
        ];
    }
}
