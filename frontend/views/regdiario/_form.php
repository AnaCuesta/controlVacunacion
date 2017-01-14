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
                                            echo Html::activeHiddenInput($modelRegistro , "[{$i}]IDVAUNACIONREGDIARIO");
                                        }
                                    ?>
                                    <div class="row">
                                        <!-- Vacuna -->
                                        <?php
                                        $vacuna = Vacuna::find()->where("

                                        VACUNA = 'BCG' or VACUNA = 'HB' OR
                                        VACUNA  = 'Rotavirus' OR
                                        VACUNA  = 'Pentavalente' OR
                                        VACUNA  = 'OPV' OR
                                        VACUNA  = 'Neumococo conjugada' OR
                                        VACUNA  = 'SR' OR
                                        VACUNA  = 'SRP' OR
                                        VACUNA  = 'Varicela' OR
                                        VACUNA  = 'Varicela' OR
                                        VACUNA  = 'FA' OR
                                        VACUNA  = 'DPT' OR
                                        VACUNA  = 'Influenza estacional'

                                        ")->all();

                                        ?>
                                      <div class="col-sm-4">
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
                                        <div class="col-sm-4">
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
                                          <div class="col-sm-4">
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


check();

});


$('#idEstablecimiento').change(function(){

  var idEstablecimiento = $(this).val();
  establecimiento(idEstablecimiento);

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

  $.get('index.php?r=regdiario/nombre-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-nombresciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/apellido-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-apellidosciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/nacionalidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-nacionalidadciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiario/etnia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-etniaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/lugar-residencia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-lugarresidenciaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/provincia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-provinciaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/canton-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-cantonciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/parroquia-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-parroquiaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/localidad-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-localidadciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiario/direccion-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-direccionciudadano').attr('value', data);
  });

  $.get('index.php?r=regdiario/telefono-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-telefonociudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/cedula-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-cedulaciudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/sexo-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-sexociudadano').attr('value', data);
  });
  $.get('index.php?r=regdiario/pertenece-ciudadano', {id : idCiudadano}, function(data){
      var data = $.parseJSON(data);
      $('#regdiario-perteneceestablecimientociudadano').attr('value', data);
  });

}
function establecimiento(idEstablecimiento){



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



}

function check(){


    //  $("select").bind("click", function(){



                $("#vacunacionregistrodiario-"+0+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){

                    $("select#vacunacionregistrodiario-"+0+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+0+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+1+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+1+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+1+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregistrodiario-"+2+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+2+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+2+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+3+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+3+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+3+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+4+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+4+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+4+"-codrangoedad").html( data );
                  });
                });





                $("#vacunacionregistrodiario-"+5+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+5+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+5+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+6+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+6+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+6+"-codrangoedad").html( data );
                  });
                });




                $("#vacunacionregistrodiario-"+7+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+7+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+7+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+8+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+8+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+8+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+9+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+9+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+9+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregistrodiario-"+10+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+10+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+10+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+11+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+11+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+11+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+12+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+12+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+12+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregistrodiario-"+13+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+13+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+13+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+14+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+14+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+14+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+15+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+15+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+15+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregistrodiario-"+16+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+16+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+16+"-codrangoedad").html( data );
                  });
                });



                $("#vacunacionregistrodiario-"+17+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+17+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+17+"-codrangoedad").html( data );
                  });
                });


                $("#vacunacionregistrodiario-"+18+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+18+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+18+"-codrangoedad").html( data );
                  });
                });




                $("#vacunacionregistrodiario-"+19+"-vacuna").change(function(){

                  $.post("index.php?r=regdiario/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+19+"-coddosis").html( data );
                  });
                    $.post("index.php?r=regdiario/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#vacunacionregistrodiario-"+19+"-codrangoedad").html( data );
                  });
                });


          //  });


}



JS;
$this->registerJs($script);
 ?>
