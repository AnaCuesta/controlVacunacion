<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Genero;
use frontend\models\Edades;
use frontend\models\Nacionalidad;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Parroquia;
use bookin\aws\checkbox\AwesomeCheckbox;
/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadanos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadanos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'N_HISTCLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true, 'placeholder'=>'Digitar la cédula del representante en caso que el niño no disponga N° de cédula']) ?>

    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'CODSEXO')->dropDownList(
                 ArrayHelper::map(Genero::find()->all(), 'CODSEXO', 'SEXO'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODEDAD')->dropDownList(
                 ArrayHelper::map(Edades::find()->all(), 'CODEDAD', 'EDADRMA'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODNACIONALIDAD')->dropDownList(
                 ArrayHelper::map(Nacionalidad::find()->all(), 'CODNACIONALIDAD', 'NACIONALIDAD'),  ['prompt'=>'Seleccione la opción...']) ?>


    <?= $form->field($model, 'CODAUTOIDETNICA')->textInput() ?>

    <?= $form->field($model, 'CODLUGARRESIDE')->textInput() ?>

    <?= $form->field($model, 'CODPROVINCIA')->dropDownList(
             ArrayHelper::map(PROVINCIA::find()->all(), 'CODPROVINCIA', 'PROVINCIA'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODCANTON')->dropDownList(
             ArrayHelper::map(CANTON::find()->all(), 'CODCANTON', 'CANTON'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODPARROQUIA')->dropDownList(
             ArrayHelper::map(Parroquia::find()->all(), 'CODPARROQUIA', 'PARROQUIA'),  ['prompt'=>'Seleccione la opción...']) ?>


    <?= $form->field($model, 'CODLOCALIDAD')->textInput() ?>

    <?= $form->field($model, 'DIRCIUD')->textInput(['maxlength' => true]) ?>

    <p><strong><em> INGRESE LA LATITUD Y LONGITUD: </em></strong></p>

    <div class="row">
      <div class="form-group col-xs-1"></div>
      <div class="form-group col-xs-5">
        <?= $form->field($model, 'LAT')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="form-group col-xs-5">
        <?= $form->field($model, 'LONGITUD')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <?= $form->field($model, 'TELFCIUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREOCIUD')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'SNPERTENECEUO')->widget(AwesomeCheckbox::classname(),[
    'type'=>AwesomeCheckbox::TYPE_RADIO,
    'style'=>[AwesomeCheckbox::STYLE_PRIMARY],
    'list'=>[ // array data
        'SI'=>'Pertenece al Establecimiento de Salud',
        'NO'=>'No Pertenece al Establecimiento de Salud'
    ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Ciudadano' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
