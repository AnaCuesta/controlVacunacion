<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Establecimiento;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\TarjControlvac;
use frontend\models\Ciudadano;
use kartik\date\DatePicker;
use bookin\aws\checkbox\AwesomeCheckbox;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Vacuna;
use frontend\models\Edad;
use frontend\models\Dosis;



use frontend\models\REdadVac;
/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="tarj-controlvac-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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
    <?= $form->field($model, 'distrito')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'provincia')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model, 'canton')->textInput(['disabled' => true]) ?>
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
  <div class="col-sm-6">
    <?= $form->field($model,'nombresCiudadano')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-6">
    <?= $form->field($model,'apellidosCiudadano')->textInput(['disabled' => true]) ?>

  </div>

</div>

<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model,'nacionalidadCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-6">
    <?= $form->field($model,'etniaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-4">

    <?php
     echo '<label>Fecha de nacimiento</label>';
     echo DatePicker::widget([
     'name' =>  'FECHNAC',
     'model' => $model,
     'attribute' => 'FECHNAC',
     'type' => DatePicker::TYPE_COMPONENT_APPEND,
     'value' => '',
     'pluginOptions' => [
     'autoclose'=>true,
     'format' => 'yyyy-mm-dd'
     ]
     ]);
     ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'LUGARNAC')->textInput(['maxlength' => true]) ?>

  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'LUGARINSCRIPCION')->textInput(['maxlength' => true]) ?>

  </div>
</div>


<?= $form->field($model, 'EDADINGRESO')->textInput(['maxlength' => true]) ?>

<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'APELLIDOSNOMBRESMADRE')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'APELLIDOSNOMBRESPADRE')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-sm-4">
    <?= $form->field($model, 'APELLIDOSNOMBRESTUTOR')->textInput(['maxlength' => true]) ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <?= $form->field($model,'lugarResidenciaCiudadano')->textInput(['disabled' => true]) ?>

  </div>

</div>

<div class="row">
  <div class="col-sm-3">
    <?= $form->field($model,'provinciaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model,'cantonCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model,'parroquiaCiudadano')->textInput(['disabled' => true]) ?>
  </div>
  <div class="col-sm-3">
    <?= $form->field($model,'localidadCiudadano')->textInput(['disabled' => true]) ?>
  </div>
</div>

<?php
echo $form->field($model, 'perteneceUO')->widget(AwesomeCheckbox::classname(),[
'type'=>AwesomeCheckbox::TYPE_RADIO,
'style'=>[AwesomeCheckbox::STYLE_PRIMARY],
'list'=>[ // array data
    'SI'=>'Pertenece al Establecimiento de Salud',
    'NO'=>'No Pertenece al Establecimiento de Salud'
]
]); ?>


<div class="row">
  <div class="col-sm-6">
    <?= $form->field($model,'direccionCiudadano')->textInput(['disabled' => true]) ?>

  </div>
  <div class="col-sm-6">
    <?= $form->field($model,'telefonoCiudadano')->textInput(['disabled' => true]) ?>

  </div>

</div>
<div class="row">
  <div class="col-sm-12">
    <?= $form->field($model, 'OBSERV')->textarea(['rows' => 6]) ?>
  </div>
</div>

<div class="row">
  <div class="panel panel-default">
    <div class="panel-heading hide"><h4><i class="glyphicon glyphicon-envelope"></i></h4></div>
    <div class="panel-body">
         <?php DynamicFormWidget::begin([
            'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // required: css class selector
            'widgetItem' => '.item', // required: css class
            'limit' => 20, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $modelVacunacion[0],
            'formId' => 'dynamic-form',
            'formFields' => [
                'ESTADO',
                'CODDOSIS',
                'vacuna',
            ],
        ]); ?>

        <div class="container-items"><!-- widgetContainer -->
        <?php foreach ($modelVacunacion as $i => $modelVacunacion): ?>
            <div class="item panel panel-success"><!-- widgetBody -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Po Item </h3>
                    <div class="pull-right">
                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php
                        // necessary for update action.
                        if (! $modelVacunacion->isNewRecord) {
                            echo Html::activeHiddenInput($modelVacunacion , "[{$i}]IDCALENDARIO");
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
                          if(!empty($modelVacunacion->CODDOSIS)){
                            $dosis = Dosis::find()->where(['CODDOSIS'=>$modelVacunacion->CODDOSIS])->one();
                            $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$dosis->CODVACUNA])->one();
                          }

                          echo $form->field($modelVacunacion, "[{$i}]vacuna")->dropDownList(
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
                          if(!empty($modelVacunacion->CODDOSIS)){
                          $dosis = Dosis::find()->where(['CODDOSIS'=>$modelVacunacion->CODDOSIS])->one();
                          $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$dosis->CODVACUNA])->one();
                          echo $form->field($modelVacunacion, "[{$i}]CODDOSIS")->dropDownList(
                          ArrayHelper::map(Dosis::find()->where(['CODVACUNA'=> $vacunaActualizacion->CODVACUNA])->all(), 'CODDOSIS', 'DOSIS'),
                            [
                              'value' => $modelVacunacion->CODDOSIS

                            ]
                          );
                        }else{
                          echo $form->field($modelVacunacion, "[{$i}]CODDOSIS")->dropDownList(
                          [


                          ]
                          );

                        }

                           ?>


                        </div>
                        <!-- Dosis -->
                        <!-- Estado -->
                        <div class="col-sm-4">
                            <?= $form->field($modelVacunacion, "[{$i}]ESTADO")->dropDownList(['ADMINISTRADA'=>'ADMINISTRADA', 'NO-ADMINISTRADA'=>'NO ADMINISTRADA']) ?>
                        </div>
                        <!-- Estado -->
                    </div>

                    <div class="row">
                      <!-- Rango de Edad -->
                        <div class="col-sm-4">
                          <?php
                          if(!empty($modelVacunacion->CODRANGOEDAD)){
                          $rango = REdadVac::find()->where(['CODRANGOEDAD'=>$modelVacunacion->CODRANGOEDAD])->one();
                          $vacunaActualizacion = Vacuna::find()->where(['CODVACUNA'=>$rango->CODVACUNA])->one();
                            echo  $form->field($modelVacunacion, "[{$i}]CODRANGOEDAD")->dropDownList(
                            ArrayHelper::map(REdadVac::find()->where(['CODVACUNA'=>$vacunaActualizacion->CODVACUNA])->all(), 'CODRANGOEDAD', 'RANGOEDAD'),
                            [
                              'value' => $modelVacunacion->CODRANGOEDAD
                            ]);
                          }else{

                            echo  $form->field($modelVacunacion, "[{$i}]CODRANGOEDAD")->dropDownList(
                            [
                            ]);

                          }
                           ?>
                        </div>
                     <!-- Rango de Edad -->

                     <!-- Fecha de la vacuna -->
                        <div class="col-sm-4">
                            <?= $form->field($modelVacunacion, "[{$i}]FECHAVACUNA")->textInput(['type' => 'date']) ?>
                        </div>
                    <!-- Fecha de la vacuna -->


                        <!-- Edad -->
                        <div class="col-sm-4">


                                 <?= $form->field($modelVacunacion, "[{$i}]EDAD")->textInput([]) ?>

                        </div>
                        <!-- Edad -->
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php DynamicFormWidget::end(); ?>
    </div>
  </div>

</div>

<div class="row">
  <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>
</div>


    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

var x = 0;
  $(document).ready(function(){

  var idEstablecimiento = $('#idEstablecimiento').val();
  establecimiento(idEstablecimiento);

  var idCiudadano = $('#idCiudadano').val();
  ciudadano(idCiudadano);


  check();




});
/*
$(".dynamicform_wrapper").on("afterDelete", function(e) {
  $(".dynamicform_wrapper .panel-title").each(function(i) {

    $(this).html('<input type="checkbox" id="check'+i+'"  class="check" value='+i+'>'+(i));

  });

    check();
});
  //$(this).html('<input type="checkbox" id="check'+i+'"  class="check" value='+i+'>'+(i));
*/
x=0;
$(".dynamicform_wrapper").on("afterInsert", function(e, item) {

  $(".dynamicform_wrapper .panel-title").each(function(i) {
  x++;
  check();
  });

alert(x);

});


$('#idEstablecimiento').change(function(){

  var idEstablecimiento = $(this).val();
  establecimiento(idEstablecimiento);


});

$('#idCiudadano').change(function(){

  var idCiudadano = $(this).val();
  ciudadano(idCiudadano);

  $.get('index.php?r=tarj-controlvac/calcular-edad', {id : idCiudadano}, function(data){

      var data = $.parseJSON(data);

      $('#calendariovacunacion-0-edad').attr('value', data);
  });


});

function establecimiento(idEstablecimiento){

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


}
function ciudadano(idCiudadano){
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

}
function check(){


    //  $("select").bind("click", function(){



                $("#calendariovacunacion-"+0+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+0+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+0+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+1+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+1+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+1+"-codrangoedad").html( data );
                  });
                });


                $("#calendariovacunacion-"+2+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+2+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+2+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+3+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+3+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+3+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+4+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+4+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+4+"-codrangoedad").html( data );
                  });
                });





                $("#calendariovacunacion-"+5+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+5+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+5+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+6+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+6+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+6+"-codrangoedad").html( data );
                  });
                });




                $("#calendariovacunacion-"+7+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+7+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+7+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+8+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+8+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+8+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+9+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+9+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+9+"-codrangoedad").html( data );
                  });
                });


                $("#calendariovacunacion-"+10+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+10+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+10+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+11+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+11+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+11+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+12+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+12+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+12+"-codrangoedad").html( data );
                  });
                });


                $("#calendariovacunacion-"+13+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+13+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+13+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+14+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+14+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+14+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+15+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+15+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+15+"-codrangoedad").html( data );
                  });
                });


                $("#calendariovacunacion-"+16+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+16+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+16+"-codrangoedad").html( data );
                  });
                });



                $("#calendariovacunacion-"+17+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+17+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+17+"-codrangoedad").html( data );
                  });
                });


                $("#calendariovacunacion-"+18+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+18+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+18+"-codrangoedad").html( data );
                  });
                });




                $("#calendariovacunacion-"+19+"-vacuna").change(function(){

                  $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+19+"-coddosis").html( data );
                  });
                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                    $("select#calendariovacunacion-"+19+"-codrangoedad").html( data );
                  });
                });


          //  });


}

JS;
$this->registerJs($script);
 ?>
