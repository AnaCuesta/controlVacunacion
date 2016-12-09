<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RegdiariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CODREGISTRODIARIO') ?>

    <?= $form->field($model, 'UNICODIGOES') ?>

    <?= $form->field($model, 'CODTIPODOC') ?>

    <?= $form->field($model, 'NUMORDENR') ?>

    <?= $form->field($model, 'DIASVACMES') ?>

    <?php // echo $form->field($model, 'TOTALRD') ?>

    <?php // echo $form->field($model, 'NOMBREVACUNADOR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
