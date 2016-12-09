<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usuario_acciones".
 *
 * @property integer $idUsuario
 * @property integer $idAcciones
 * @property integer $idUsurioAcciones
 */
class UsuarioAcciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_acciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idAcciones'], 'required'],
            [['idUsuario', 'idAcciones'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'idAcciones' => 'Id Acciones',
            'idUsurioAcciones' => 'Id Usurio Acciones',
        ];
    }
}
