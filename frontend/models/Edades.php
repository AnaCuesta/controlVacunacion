<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "edades".
 *
 * @property integer $CODEDAD
 * @property string $EDADRMA
 */
class Edades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EDADRMA'], 'required'],
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
}
