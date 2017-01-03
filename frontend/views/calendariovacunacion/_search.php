<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CalendariovacunacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calendariovacunacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IDCALENDARIO') ?>

    <?= $form->field($model, 'CODTARCONTVAC') ?>

    <?= $form->field($model, 'CODDOSIS') ?>

    <?= $form->field($model, 'CODEDAD') ?>

    <?= $form->field($model, 'FECHAVACUNA') ?>

    <?php // echo $form->field($model, 'ESTADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
