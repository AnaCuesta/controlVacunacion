<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarj-controlvacs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CODTARCONTVAC') ?>

    <?= $form->field($model, 'NUMORDENTAR') ?>

    <?= $form->field($model, 'FECHNAC') ?>

    <?= $form->field($model, 'LUGARNAC') ?>

    <?= $form->field($model, 'LUGARINSCRIPCION') ?>

    <?php // echo $form->field($model, 'EDADINGRESO') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESMADRE') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESPADRE') ?>

    <?php // echo $form->field($model, 'APELLIDOSNOMBRESTUTOR') ?>

    <?php // echo $form->field($model, 'OBSERV') ?>

    <?php // echo $form->field($model, 'id_ciudadano') ?>

    <?php // echo $form->field($model, 'idEstablecimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
