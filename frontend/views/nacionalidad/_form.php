<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Nacionalidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nacionalidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODNACIONALIDAD')->textInput() ?>

    <?= $form->field($model, 'NACIONALIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBREPAIS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
