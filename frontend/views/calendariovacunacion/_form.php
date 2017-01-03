<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Calendariovacunacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendariovacunacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IDCALENDARIO')->textInput() ?>

    <?= $form->field($model, 'CODTARCONTVAC')->textInput() ?>

    <?= $form->field($model, 'CODDOSIS')->textInput() ?>

    <?= $form->field($model, 'CODEDAD')->textInput() ?>

    <?= $form->field($model, 'FECHAVACUNA')->textInput() ?>

    <?= $form->field($model, 'ESTADO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
