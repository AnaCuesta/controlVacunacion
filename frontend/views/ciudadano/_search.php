<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CiudadanoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadano-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'N_HISTCLINIC') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'APELLIDOS') ?>

    <?= $form->field($model, 'NOMBRES') ?>

    <?= $form->field($model, 'CODSEXO') ?>

    <?php // echo $form->field($model, 'CODEDAD') ?>

    <?php // echo $form->field($model, 'CODNACIONALIDAD') ?>

    <?php // echo $form->field($model, 'CODAUTOIDETNICA') ?>

    <?php // echo $form->field($model, 'CODLUGARRESIDE') ?>

    <?php // echo $form->field($model, 'DIRCIUD') ?>

    <?php // echo $form->field($model, 'LONGITUD') ?>

    <?php // echo $form->field($model, 'LAT') ?>

    <?php // echo $form->field($model, 'TELFCIUD') ?>

    <?php // echo $form->field($model, 'CORREOCIUD') ?>

    <?php // echo $form->field($model, 'SNPERTENECEUO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
