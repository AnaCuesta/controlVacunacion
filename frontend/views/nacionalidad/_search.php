<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\NacionalidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nacionalidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CODNACIONALIDAD') ?>

    <?= $form->field($model, 'NACIONALIDAD') ?>

    <?= $form->field($model, 'NOMBREPAIS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
