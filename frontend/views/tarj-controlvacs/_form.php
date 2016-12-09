<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarj-controlvacs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODTARCONTVAC')->textInput() ?>

    <?= $form->field($model, 'CODTIPODOC')->textInput() ?>

    <?= $form->field($model, 'NUMORDENTAR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECREGTAR')->textInput() ?>

    <?= $form->field($model, 'FECHNAC')->textInput() ?>

    <?= $form->field($model, 'LUGARNAC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LUGARINSCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EDADINGRESO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESMADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESPADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESTUTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERV')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'CODCALENDARIOVAC')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
