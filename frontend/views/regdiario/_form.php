<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODREGISTRODIARIO')->textInput() ?>



    <?php
        echo '<label>Ingrese la  fecha de la vacunación</label>';

        echo DatePicker::widget([
        'name' => $form->field($model, "FECHAREGISTROVAC"),
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => '',
        'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
        ]
        ]);
    ?>

    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODTIPODOC')->textInput() ?>

    <?= $form->field($model, 'CODLUGARVACUNACION')->textInput() ?>

    <?= $form->field($model, 'DESCRIPCIONESCENARIOVAC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'N_HISTCLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODEDAD')->textInput() ?>

    <?= $form->field($model, 'NOMBREVACUNADOR')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
