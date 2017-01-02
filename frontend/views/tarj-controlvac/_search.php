<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarj-controlvac-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CODTARCONTVAC') ?>

    <?= $form->field($model, 'N_HISTCLINIC') ?>

    <?= $form->field($model, 'UNICODIGOES') ?>

    <?= $form->field($model, 'perteneceUO') ?>

    <?= $form->field($model, 'NUMORDENTAR') ?>

    <?php // echo $form->field($model, 'FECHNAC') ?>

    <?php // echo $form->field($model, 'LUGARNAC') ?>

    <?php // echo $form->field($model, 'LUGARINSCRIPCION') ?>

    <?php // echo $form->field($model, 'EDADINGRESO') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESMADRE') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESPADRE') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESTUTOR') ?>

    <?php // echo $form->field($model, 'OBSERV') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
