<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CiudadanosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadanos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'N_HISTCLINIC') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'APELLIDOS') ?>

    <?= $form->field($model, 'NOMBRES') ?>

    <?= $form->field($model, 'SEXO') ?>

    <?php // echo $form->field($model, 'EDAD') ?>

    <?php // echo $form->field($model, 'NACIONALIDAD') ?>

    <?php // echo $form->field($model, 'AUTOIDETNICA') ?>

    <?php // echo $form->field($model, 'LUGARRESIDE') ?>

    <?php // echo $form->field($model, 'PROVINCIA') ?>

    <?php // echo $form->field($model, 'CANTON') ?>

    <?php // echo $form->field($model, 'PARROQUIA') ?>

    <?php // echo $form->field($model, 'LOCALIDAD') ?>

    <?php // echo $form->field($model, 'DIRCIUD') ?>

    <?php // echo $form->field($model, 'LONGITUD') ?>

    <?php // echo $form->field($model, 'LAT') ?>

    <?php // echo $form->field($model, 'TELFCIUD') ?>

    <?php // echo $form->field($model, 'CORREOCIUD') ?>

    <?php // echo $form->field($model, 'SNPERTENECEUO') ?>

    <?php // echo $form->field($model, 'idCiudadano') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
