<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acciones".
 *
 * @property integer $idAcciones
 * @property string $descripcionAccion
 */
class Acciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcionAccion'], 'required'],
            [['descripcionAccion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAcciones' => 'Id Acciones',
            'descripcionAccion' => 'Descripcion Accion',
        ];
    }
}
