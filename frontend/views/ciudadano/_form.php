<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'N_HISTCLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODSEXO')->textInput() ?>

    <?= $form->field($model, 'CODEDAD')->textInput() ?>

    <?= $form->field($model, 'CODNACIONALIDAD')->textInput() ?>

    <?= $form->field($model, 'CODAUTOIDETNICA')->textInput() ?>

    <?= $form->field($model, 'CODLUGARRESIDE')->textInput() ?>

    <?= $form->field($model, 'DIRCIUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LONGITUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELFCIUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREOCIUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SNPERTENECEUO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
