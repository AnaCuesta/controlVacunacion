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
use frontend\models\REdadVac;
/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarj-controlvac-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

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
     'name' => $form->field($model, 'FECHNAC'),
     'type' => DatePicker::TYPE_COMPONENT_APPEND,
     'value' => '',
     'pluginOptions' => [
     'autoclose'=>true,
     'format' => 'dd-M-yyyy'
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

    <?= $form->field($model, 'OBSERV')->textarea(['rows' => 6]) ?>


<div class="row">
          <div class="panel panel-default">
            <div class="panel-heading hide"><h4><i class="glyphicon glyphicon-envelope"></i>Calendario de Vacunas</h4></div>
            <div class="panel-body">
                 <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 5, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelVacunacion[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'CODEDAD',
                        'CODDOSIS',
                        'FECHAVACUNA',
                        'FECHAVACUNA',
                        'ESTADO',
                    ],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->

                <?php  foreach ($modelVacunacion as $i => $modelVacunacion):  ?>
                    <div class="item panel panel-success"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Calendario de Vacunación</h3>
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
                                    echo Html::activeHiddenInput($modelVacunacion , "[{$i}]id");
                                }
                            ?>
                           <div class="row">
                                <div class="col-sm-4">

                              <?php

                              $data = Edad::find()->where("

                              EDADRMA = '2do.mes' or EDADRMA = 'RN' OR
                              EDADRMA  = '2do.mes' OR
                              EDADRMA  = '3er.mes' OR
                              EDADRMA  = '4to.mes' OR
                              EDADRMA  = '5to.mes' OR
                              EDADRMA  = '6to.mes' OR
                              EDADRMA  = '7mo.mes' OR
                              EDADRMA  = '8vo.mes'  OR
                              EDADRMA  = '9no.mes'  OR
                              EDADRMA  = '10mo.mes' OR
                              EDADRMA  = '11vo.mes' OR
                              EDADRMA  = '12 meses' OR
                              EDADRMA  = '13 meses' OR
                              EDADRMA  = '14 meses' OR
                              EDADRMA  = '15 meses' OR
                              EDADRMA  = '16 meses' OR
                              EDADRMA  = '17 meses' OR
                              EDADRMA  = '18 meses' OR
                              EDADRMA  = '19 meses' OR
                              EDADRMA  = '20 meses' OR
                              EDADRMA  = '21 meses' OR
                              EDADRMA  = '22 meses' OR
                              EDADRMA  = '23 meses'

                              ")->all();

                              echo $form->field($modelVacunacion, "[{$i}]CODEDAD")->dropDownList(
                              ArrayHelper::map($data, 'CODEDAD', 'EDADRMA'));
                              ?>
                                </div>

                                <div class="col-sm-4">

                                <?= $form->field($modelVacunacion, "[{$i}]vacuna")->dropDownList(
                                  ArrayHelper::map(Vacuna::find()->all(), 'CODVACUNA', 'VACUNA'),
                                  [
                                    'prompt'=>'Seleccione...',
                                    'onchange'=>'$.post("index.php?r=tarj-controlvac/listado-dosis&id='.'"+$(this).val(), function( data ){
                                      var x = document.getElementById("valor").innerHTML;

                                      $("select#calendariovacunacion-"+x+"-coddosis").html( data );
                                    });',
                                  ]
                               ); ?>
                                </div>

                                <div class="col-sm-4">
                                  <?= $form->field($modelVacunacion, "[{$i}]CODDOSIS")->dropDownList(
                                    [
                                      'prompt'=>'Seleccione la opcion...',
                                    ]
                                 ); ?>
                                </div>

                          </div>

                          <div class="row">

                              <div class="col-sm-4">

                                  <?php
                                      echo '<label>Fecha de Aplicación</label>';
                                      echo DatePicker::widget([
                                      'name' => $form->field($modelVacunacion, "[{$i}]FECHAVACUNA"),
                                      'type' => DatePicker::TYPE_COMPONENT_APPEND,
                                      'value' => '',
                                      'pluginOptions' => [
                                      'autoclose'=>true,
                                      'format' => 'dd-M-yyyy'
                                      ]
                                      ]);
                                  ?>
                              </div>

                            <div class="col-sm-4">

                              <?= $form->field($modelVacunacion, "[{$i}]rangoEdad")->dropDownList(
                                ArrayHelper::map(REdadVac::find()->all(), 'CODRANGOEDAD', 'RANGOEDAD'),
                                [
                                  'prompt'=>'Seleccione...',
                                  'onchange'=>'$.post("index.php?r=tarj-controlvac/listado-dosis&id='.'"+$(this).val(), function( data ){
                                  $("select#calendariovacunacion-0-coddosis").html( data );
                                  });',
                                ]
                             ); ?>


                            </div>
                            <div class="col-sm-4">
                              <?= $form->field($modelVacunacion, "[{$i}]ESTADO")->dropDownList(
                                ['ADMINISTRADA'=> 'Administrada','NO ADMINISTRADA'=> 'No Administrada'],
                                [
                                  'prompt'=>'Seleccione...',

                                ]
                             ); ?>
                            </div>
                          </div>

                      </div>

                        </div>

                    </div>
                <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<p id="valor" class="hide">0</p>
</div>
<?php
$script = <<< JS

var x = 0;
$(".dynamicform_wrapper").on("afterDelete", function(e, item) {
 x=x-1;
 document.getElementById("valor").innerHTML = x ;
});


$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
x=x+1;
document.getElementById("valor").innerHTML = x ;
});

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
