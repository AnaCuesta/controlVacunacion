<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstablecimientoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="establecimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UNICODIGOES') ?>

    <?= $form->field($model, 'ZONA') ?>

    <?= $form->field($model, 'DISTRITO') ?>

    <?= $form->field($model, 'NOMBREESTABLECIMIENTO') ?>

    <?= $form->field($model, 'CODZONAUBIC') ?>

    <?php // echo $form->field($model, 'TIPOESTABLECIMIENTO') ?>

    <?php // echo $form->field($model, 'CODPARROQUIA') ?>

    <?php // echo $form->field($model, 'LOCALIDADEST') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
