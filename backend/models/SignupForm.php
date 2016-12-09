<?php

namespace backend\models;

use yii\base\Model;
use common\models\User;
use backend\models\UsuarioAcciones;
use yii\helpers\ArrayHelper;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $Apellido;
    public $Nombre;
    public $Profesion;
    public $Sexo;
    public $Acciones;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['Apellido', 'string', 'min' => 2, 'max' => 255],
            ['Nombre', 'string', 'min' => 2, 'max' => 255],
            ['Profesion', 'string'],

            [['Sexo'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de usuario',
            'email' => 'Correo',
            'password' => 'Contraseña',
            
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $user->Apellido = $this->Apellido;
        $user->Nombre = $this->Nombre;
        $user->Profesion = $this->Profesion;
        $user->Sexo = $this->Sexo;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save();

        $eccionesLista = $_POST['SignupForm']['Acciones'];


        $rows = (new \yii\db\Query())->select('id')->from('user')->where('id in (SELECT MAX(id) FROM user)')->limit(10)->all();
        $val= ArrayHelper::map($rows, 'id', 'id');
        $id = implode($val);/*Convierte valor de arreglo a string*/
        
        foreach ($eccionesLista as $value) {
        
        $accion = new UsuarioAcciones();
        $accion->idUsuario =  ($id+1) ;
        $accion->idAcciones =  $value;
        $accion->save();
 
        }
       
  
       return $user;
    }
}
