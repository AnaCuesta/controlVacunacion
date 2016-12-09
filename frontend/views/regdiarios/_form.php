<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODREGISTRODIARIO')->textInput() ?>

    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODTIPODOC')->textInput() ?>

    <?= $form->field($model, 'NUMORDENR')->textInput() ?>

    <?= $form->field($model, 'DIASVACMES')->textInput() ?>

    <?= $form->field($model, 'TOTALRD')->textInput() ?>

    <?= $form->field($model, 'NOMBREVACUNADOR')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
