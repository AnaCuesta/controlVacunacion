<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use frontend\models\Establecimiento;
use frontend\models\Escenariovac;
use frontend\models\Ciudadano;
use frontend\models\Edad;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiario-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'CODREGISTRODIARIO')->textInput() ?>

                <?php
                echo '<label>Ingrese la  fecha de la vacunación</label>';

                echo DatePicker::widget([
                'name' => $form->field($model, "FECHAREGISTROVAC"),
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => '',
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-M-yyyy'
                ]
                ]);
                ?>

                <br>

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
                <?= $form->field($model, 'zona')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'provincia')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'canton')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'parroquia')->textInput(['disabled' => true]) ?>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-2">
                <?= $form->field($model, 'distrito')->textInput(['disabled' => true]) ?>

                </div>
                <div class="col-sm-2">
                <?= $form->field($model, 'zonaUbicacion')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-2">
                <?= $form->field($model, 'uniCodigo')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'tipoEstablecimiento')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'localidad')->textInput(['disabled' => true]) ?>

                </div>
                </div>

                <?= $form->field($model, 'CODTIPODOC')->textInput() ?>



                <div class="row">
                <div class="col-sm-6">

                <?= $form->field($model, 'CODLUGARVACUNACION')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Escenariovac::find()->all(), 'CODLUGARVACUNACION', 'LUGARVACUNACION'),
                       'language' => 'de',
                       'options' => ['prompt'=> 'Seleccione la opción...'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
                ]); ?>

                </div>
                <div class="col-sm-6">
                <?= $form->field($model, 'DESCRIPCIONESCENARIOVAC')->textInput(['maxlength' => true]) ?>
                </div>
                </div>



                <?= $form->field($model, 'N_HISTCLINIC')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Ciudadano::find()->all(), 'N_HISTCLINIC', 'N_HISTCLINIC'),
                       'language' => 'de',
                       'options' => ['prompt'=> 'Seleccione la opción...'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
                ]); ?>


                <div class="row">
                <div class="col-sm-4">
                <?= $form->field($model, 'apellidosCiudadano')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-4">
                <?= $form->field($model, 'nombresCiudadano')->textInput(['disabled' => true]) ?>
                </div>
                <div class="col-sm-4">
                <?= $form->field($model, 'cedulaCiudadano')->textInput(['disabled' => true]) ?>
                </div>
                </div>

                <?= $form->field($model, 'sexoCiudadano')->textInput(['disabled' => true]) ?>
                <?= $form->field($model, 'lugarResidenciaCiudadano')->textInput(['disabled' => true]) ?>

                <div class="row">

                <div class="col-sm-2">
                <?= $form->field($model, 'perteneceEstablecimientoCiudadano')->textInput(['disabled' => true]) ?>

                </div>
                <div class="col-sm-2">
                <?= $form->field($model, 'provinciaCiudadano')->textInput(['disabled' => true]) ?>

                </div>
                <div class="col-sm-2">
                <?= $form->field($model, 'cantonCiudadano')->textInput(['disabled' => true]) ?>

                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'parroquiaCiudadano')->textInput(['disabled' => true]) ?>

                </div>
                <div class="col-sm-3">
                <?= $form->field($model, 'localidadCiudadano')->textInput(['disabled' => true]) ?>
                </div>
                </div>


                <?= $form->field($model, 'nacionalidadCiudadano')->textInput(['disabled' => true]) ?>

                <?= $form->field($model, 'etniaCiudadano')->textInput(['disabled' => true]) ?>

                <?= $form->field($model, 'CODEDAD')->widget(Select2::classname(), [
                         'data' => ArrayHelper::map(Edad::find()->all(), 'CODEDAD', 'EDADRMA'),
                         'language' => 'de',
                         'options' => ['prompt'=> 'Seleccione la opción...'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                ]); ?>



                <?= $form->field($model, 'NOMBREVACUNADOR')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'ESTADO')->textInput(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS



$('#idEstablecimiento').change(function(){

  var idEstablecimiento = $(this).val();

  $.get('index.php?r=regdiario/zona', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-zona').attr('value', data);
  });

  $.get('index.php?r=regdiario/provincia', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-provincia').attr('value', data);
  });
  $.get('index.php?r=regdiario/canton', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-canton').attr('value', data);
  });
  $.get('index.php?r=regdiario/distrito', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-distrito').attr('value', data);
  });
  $.get('index.php?r=regdiario/parroquia', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-parroquia').attr('value', data);
  });
  $.get('index.php?r=regdiario/tipo-establecimiento', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-tipoestablecimiento').attr('value', data);
  });
  $.get('index.php?r=regdiario/zona-ubicacion', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-zonaubicacion').attr('value', data);
  });
  $.get('index.php?r=regdiario/localidad', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-localidad').attr('value', data);
  });
  $.get('index.php?r=regdiario/uni-codigo', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-unicodigo').attr('value', data);
  });


});


JS;
$this->registerJs($script);
 ?>
