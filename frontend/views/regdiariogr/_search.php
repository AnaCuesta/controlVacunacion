<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegdiarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CODREGISTRODIARIO') ?>

    <?= $form->field($model, 'UNICODIGOES') ?>

    <?= $form->field($model, 'CODTIPODOC') ?>

    <?= $form->field($model, 'CODLUGARVACUNACION') ?>

    <?= $form->field($model, 'DESCRIPCIONESCENARIOVAC') ?>

    <?php // echo $form->field($model, 'FECHAREGISTROVAC') ?>

    <?php // echo $form->field($model, 'N_HISTCLINIC') ?>

    <?php // echo $form->field($model, 'CODEDAD') ?>

    <?php // echo $form->field($model, 'NOMBREVACUNADOR') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
