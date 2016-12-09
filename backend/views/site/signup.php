<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Perfil;
use frontend\models\Genero;


$this->title = 'Registro de Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor ingrese la siguiente información:</p>
    
    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                 <?= $form->field($model, 'Apellido')->textInput() ?>

                <?= $form->field($model, 'Nombre')->textInput() ?>

                <?= $form->field($model, 'Profesion')->dropDownList(
                 ArrayHelper::map(Perfil::find()->all(), 'idPerfil', 'descripcionPerfil'),  ['prompt'=>'Seleccione la opción...']) ?>

                <?php
                    $acciones = ArrayHelper::map($acciones, 'idAcciones', 'descripcionAccion');
                
                ?>
                
                 <?= $form->field($model, 'Sexo')->dropDownList(
                 ArrayHelper::map(Genero::find()->all(), 'CODSEXO', 'SEXO'),  ['prompt'=>'Seleccione la opción...']) ?>

                <?= $form->field($model, 'Acciones')->checkboxList($acciones); ?>


                    
                <div class="form-group">
                    <?= Html::submitButton('Registrar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
