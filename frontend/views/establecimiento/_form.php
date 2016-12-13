<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use frontend\models\Distrito;
use frontend\models\ZonaUbic;
use frontend\models\Parroquia;

/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="establecimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBREESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODDISTRITO')->dropDownList(
               ArrayHelper::map(Distrito::find()->all(), 'CODDISTRITO', 'DISTRITO'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODZONAUBIC')->dropDownList(
               ArrayHelper::map(ZonaUbic::find()->all(), 'CODZONAUBIC', 'ZONAUBICACION'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'CODPARROQUIA')->dropDownList(
               ArrayHelper::map(Parroquia::find()->all(), 'CODPARROQUIA', 'PARROQUIA'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'TIPOESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'LOCALIDADEST')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
