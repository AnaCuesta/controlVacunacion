<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $Apellido
 * @property string $Nombre
 * @property string $Profesion
 * @property integer $Sexo
 * @property string $fechaRegistro
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'Apellido', 'Nombre', 'Profesion', 'Sexo'], 'required'],
            [['status', 'created_at', 'updated_at', 'Sexo', ], 'integer'],
            [['fechaRegistro'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['Apellido', 'Nombre'], 'string', 'max' => 100],
            [['Profesion'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Nombre de Usuario',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'Apellido' => 'Apellido',
            'Nombre' => 'Nombre',
            'Profesion' => 'Profesion',
            'Sexo' => 'Sexo',
            'fechaRegistro' => 'Fecha Registro',
        ];
    }
}
