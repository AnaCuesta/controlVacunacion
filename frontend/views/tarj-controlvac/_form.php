<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Establecimiento;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\TarjControlvac;
use frontend\models\Ciudadano;
/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarj-controlvac-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CODTARCONTVAC')->textInput() ?>

    <?= $form->field($model, 'UNICODIGOES')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Establecimiento::find()->all(), 'UNICODIGOES', 'NOMBREESTABLECIMIENTO'),
                       'language' => 'de',
                       'options' => ['prompt'=> 'Seleccione la opción...', 'id' => 'idEstablecimiento'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
      ]); ?>

<div class="row">
  <div class="col-sm-3">
    <?= $form->field($model, 'provincia')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'canton')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'distrito')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'zona')->textInput(['disabled' => true]) ?>
  </div>
</div>




    <?= $form->field($model, 'NUMORDENTAR')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'N_HISTCLINIC')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Ciudadano::find()->all(), 'N_HISTCLINIC', 'N_HISTCLINIC'),
                       'language' => 'de',
                       'options' => ['prompt'=> 'Seleccione la opción...', 'id' => 'idCiudadano'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
      ]); ?>

<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model,'nombresCiudadano')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'apellidosCiudadano')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'nacionalidadCiudadano')->textInput(['disabled' => true]) ?>

  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model,'etniaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'lugarResidenciaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'provinciaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model,'cantonCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'parroquiaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model,'localidadCiudadano')->textInput(['disabled' => true]) ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model,'direccionCiudadano')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-6">
    <?= $form->field($model,'telefonoCiudadano')->textInput(['disabled' => true]) ?>

  </div>

</div>

  <?= $form->field($model, 'FECHNAC')->textInput() ?>

    <?= $form->field($model, 'perteneceUO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LUGARNAC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LUGARINSCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EDADINGRESO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESMADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESPADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOSNOMBRESTUTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERV')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS

$('#idEstablecimiento').change(function(){

  var idEstablecimiento = $(this).val();

  $.get('index.php?r=tarj-controlvac/zona', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-zona').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/distrito', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-distrito').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/canton', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-canton').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/provincia', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-provincia').attr('value', data);
  });

});

$('#idCiudadano').change(function(){

  var idCiudadano = $(this).val();

  $.get('index.php?r=tarj-controlvac/nombre-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-nombresciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/apellido-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-apellidosciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/nacionalidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-nacionalidadciudadano').attr('value', data);
  });

  $.get('index.php?r=tarj-controlvac/etnia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-etniaciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/lugar-residencia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-lugarresidenciaciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/provincia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-provinciaciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/canton-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-cantonciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/parroquia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-parroquiaciudadano').attr('value', data);
  });
  $.get('index.php?r=tarj-controlvac/localidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-localidadciudadano').attr('value', data);
  });

  $.get('index.php?r=tarj-controlvac/direccion-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-direccionciudadano').attr('value', data);
  });

  $.get('index.php?r=tarj-controlvac/telefono-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#tarjcontrolvac-telefonociudadano').attr('value', data);
  });


});

JS;
$this->registerJs($script);
 ?>
