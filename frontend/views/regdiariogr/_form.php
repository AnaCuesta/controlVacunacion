<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use frontend\models\Establecimiento;
use frontend\models\Escenariovac;
use frontend\models\Ciudadano;
use frontend\models\Vacuna;
use frontend\models\Edad;
use frontend\models\Dosis;
use frontend\models\User;
use frontend\models\Grupoderiesgo;
use frontend\models\REdadVac;
use yii\helpers\ArrayHelper;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regdiario-form">

                <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>


                <?php
                echo '<label>Ingrese la  fecha de la vacunación</label>';

                echo DatePicker::widget([
                'attribute' => 'FECHAREGISTROVAC',
                'model' => $model,
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'value' => '',
                'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
                ]
                ]);
                ?>

                <br>

                <?= $form->field($model, 'UNICODIGOES')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Establecimiento::find()->all(), 'UNICODIGOES', 'NOMBREESTABLECIMIENTO'),
                       'language' => 'es',
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




                <div class="row">
                <div class="col-sm-6">

                <?= $form->field($model, 'CODLUGARVACUNACION')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Escenariovac::find()->all(), 'CODLUGARVACUNACION', 'LUGARVACUNACION'),
                       'language' => 'es',
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
                       'language' => 'es',
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
                         'language' => 'es',
                         'options' => ['prompt'=> 'Seleccione la opción...'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                ]); ?>


                <?= $form->field($model, 'NOMBREVACUNADOR')->widget(Select2::classname(), [

                         'language' => 'es',
                         'options' => ['prompt'=> 'Seleccione la opción...'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                ]); ?>

                <?= $form->field($model, 'ESTADO')->widget(Select2::classname(), [
                         'data' => ['ASISTIÓ' =>'Asistió', 'NO-ASISTIÓ' => 'No asistió'],
                         'language' => 'es',
                         'options' => ['prompt'=> 'Seleccione la opción...'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                ]); ?>

                <div class="row">
                  <div class="panel panel-default">
                    <div class="panel-heading hide"><h4><i class="glyphicon glyphicon-envelope"></i></h4></div>
                    <div class="panel-body">
                         <?php DynamicFormWidget::begin([
                            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                            'widgetBody' => '.container-items', // required: css class selector
                            'widgetItem' => '.item', // required: css class
                            'limit' => 10, // the maximum times, an element can be cloned (default 999)
                            'min' => 1, // 0 or 1 (default 1)
                            'insertButton' => '.add-item', // css class
                            'deleteButton' => '.remove-item', // css class
                            'model' => $modelRegistro[0],
                            'formId' => 'dynamic-form',
                            'formFields' => [
                                'ESTADO',
                                'CODDOSIS',
                                'vacuna',
                            ],
                        ]); ?>

                        <div class="container-items"><!-- widgetContainer -->
                        <?php foreach ($modelRegistro as $i => $modelRegistro): ?>
                            <div class="item panel panel-success"><!-- widgetBody -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left"></h3>
                                    <div class="pull-right">
                                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                        // necessary for update action.
                                        if (! $modelRegistro->isNewRecord) {
                                            echo Html::activeHiddenInput($modelRegistro , "[{$i}]CODGRUPORIESGO");
                                        }
                                    ?>
                                    <div class="row">
                                        <!-- Vacuna -->
                                        <?php
                                        $vacuna = Vacuna::find()->where("

                                        VACUNA = 'HB' or
                                        VACUNA = 'Meningocócica B-C' or
                                        VACUNA = 'SRP' or
                                        VACUNA = 'SR' or
                                        VACUNA = 'FA'

                                        ")->all();

                                        ?>
                                      <div class="col-sm-3">
                                          <?php
                                          if(!empty($modelRegistro->CODDOSIS)){
                                            $dosis = Dosis::find()->where(['CODDOSIS'=>$modelRegistro->CODDOSIS])->one();
                                            $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$dosis->CODVACUNA])->one();
                                          }

                                          echo $form->field($modelRegistro, "[{$i}]vacuna")->dropDownList(
                                            ArrayHelper::map($vacuna, 'CODVACUNA', 'VACUNA'),
                                            [
                                              'prompt'=> empty($vacunaActualizacion->VACUNA) ? 'Seleccione la opcion...' :  $vacunaActualizacion->VACUNA,
                                              'value'=> empty($vacunaActualizacion->VACUNA) ? '' :  $vacunaActualizacion->VACUNA,
                                            ]
                                          );
                                          ?>
                                        </div>
                                        <!-- Vacuna -->
                                        <!-- Dosis -->
                                        <div class="col-sm-3">
                                          <?php
                                          if(!empty($modelRegistro->CODDOSIS)){
                                          $dosis = Dosis::find()->where(['CODDOSIS'=>$modelRegistro->CODDOSIS])->one();
                                          $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$dosis->CODVACUNA])->one();
                                          echo $form->field($modelRegistro, "[{$i}]CODDOSIS")->dropDownList(
                                          ArrayHelper::map(Dosis::find()->where(['CODVACUNA'=> $vacunaActualizacion->CODVACUNA])->all(), 'CODDOSIS', 'DOSIS'),
                                            [
                                              'value' => $modelRegistro->CODDOSIS

                                            ]
                                          );
                                        }else{
                                          echo $form->field($modelRegistro, "[{$i}]CODDOSIS")->dropDownList(
                                          [


                                          ]
                                          );

                                         }

                                           ?>

                                        </div>
                                        <!-- Dosis -->
                                        <!-- Rango de Edad -->
                                          <div class="col-sm-3">
                                            <?php
                                            if(!empty($modelRegistro->CODRANGOEDAD)){
                                            $rango = REdadVac::find()->where(['CODRANGOEDAD'=>$modelRegistro->CODRANGOEDAD])->one();
                                            $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$rango->CODVACUNA])->one();
                                              echo  $form->field($modelRegistro, "[{$i}]CODRANGOEDAD")->dropDownList(
                                              ArrayHelper::map(REdadVac::find()->where(['CODVACUNA'=>$vacunaActualizacion->CODVACUNA])->all(), 'CODRANGOEDAD', 'RANGOEDAD'),
                                              [
                                                'value' => $modelRegistro->CODRANGOEDAD
                                              ]);
                                            }else{

                                              echo  $form->field($modelRegistro, "[{$i}]CODRANGOEDAD")->dropDownList(
                                              [
                                              ]);

                                            }
                                             ?>
                                          </div>
                                       <!-- Rango de Edad -->
                                        <!-- Grupo de Riesgo -->
                                          <div class="col-sm-3">
                                            <?php

                                              echo  $form->field($modelRegistro, "[{$i}]CODGRUPORIESGO")->dropDownList(
                                              ArrayHelper::map(Grupoderiesgo::find()->all(), 'CODGRUPORIESGO', 'GRUPORIESGO'),
                                              [
                                                'prompt' => 'Seleccione la opcion...'
                                              ]);

                                             ?>
                                          </div>
                                       <!-- Grupo de Riesgo -->

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <?php DynamicFormWidget::end(); ?>
                    </div>
                  </div>

                </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

$(document).ready(function(){

var idEstablecimiento = $('#idEstablecimiento').val();
establecimiento(idEstablecimiento);
var idCiudadano = $('#regdiario-n_histclinic').val()
ciudadano(idCiudadano);
$.get('index.php?r=regdiario/listado-vacunador', function(data){


    $('select#regdiario-nombrevacunador').html(data);
});

check();



});


$('#idEstablecimiento').change(function(){

  var idEstablecimiento = $(this).val();
  establecimiento(idEstablecimiento);

});
$('#regdiario-codlugarvacunacion').change(function(){
  var idEstablecimiento = $(this).val();
  $.get('index.php?r=regdiariogr/listado-institucion', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-descripcionescenariovac').attr('value', data);
  });

});

$('#regdiario-n_histclinic').change(function(){

  var idCiudadano = $(this).val();
  ciudadano(idCiudadano);

});


$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
$(".dynamicform_wrapper .panel-title").each(function(i) {

check();
});

});

function ciudadano(idCiudadano){

  $.get('index.php?r=regdiariogr/nombre-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-nombresciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/apellido-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-apellidosciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/nacionalidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-nacionalidadciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiariogr/etnia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-etniaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/lugar-residencia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-lugarresidenciaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/provincia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-provinciaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/canton-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-cantonciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/parroquia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-parroquiaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/localidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-localidadciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiariogr/direccion-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-direccionciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiariogr/telefono-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-telefonociudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/cedula-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-cedulaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/sexo-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-sexociudadano').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/pertenece-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-perteneceestablecimientociudadano').attr('value', data);
  });

}
function establecimiento(idEstablecimiento){

  $.get('index.php?r=regdiariogr/zona', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-zona').attr('value', data);
  });

  $.get('index.php?r=regdiariogr/provincia', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-provincia').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/canton', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-canton').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/distrito', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-distrito').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/parroquia', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-parroquia').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/tipo-establecimiento', {id : idEstablecimiento}, function(data){

      var data = $.parseJSON(data);
      $('#regdiario-tipoestablecimiento').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/zona-ubicacion', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-zonaubicacion').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/localidad', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-localidad').attr('value', data);
  });
  $.get('index.php?r=regdiariogr/uni-codigo', {id : idEstablecimiento}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-unicodigo').attr('value', data);
  });



}

function check(){


    //  $("select").bind("click", function(){

                $("#vacunacionregdiariogr-"+0+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){

                    $("select#vacunacionregdiariogr-"+0+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+0+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+1+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+1+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+1+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregdiariogr-"+2+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+2+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+2+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+3+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+3+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+3+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+4+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+4+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+4+"-codrangoedad").html( data );
                  });
                });





                $("#vacunacionregdiariogr-"+5+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+5+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+5+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+6+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+6+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+6+"-codrangoedad").html( data );
                  });
                });




                $("#vacunacionregdiariogr-"+7+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+7+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+7+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+8+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+8+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+8+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+9+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+9+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+9+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregdiariogr-"+10+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+10+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+10+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+11+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+11+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+11+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+12+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+12+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+12+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregdiariogr-"+13+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+13+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+13+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+14+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+14+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+14+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+15+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+15+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+15+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregdiariogr-"+16+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+16+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+16+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregdiariogr-"+17+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+17+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+17+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregdiariogr-"+18+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+18+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+18+"-codrangoedad").html( data );
                  });
                });




                $("#vacunacionregdiariogr-"+19+"-vacuna").change(function(){

                  $.post("index.php?r=regdiariogr/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+19+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiariogr/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregdiariogr-"+19+"-codrangoedad").html( data );
                  });
                });


          //  });


}




JS;
$this->registerJs($script);
 ?>
