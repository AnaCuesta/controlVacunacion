<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property integer $idPerfil
 * @property string $descripcionPerfil
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcionPerfil'], 'required'],
            [['descripcionPerfil'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPerfil' => 'Id Perfil',
            'descripcionPerfil' => 'Descripcion Perfil',
        ];
    }
}
