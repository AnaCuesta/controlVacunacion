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
                    'limit' => 20, // the maximum times, an element can be cloned (default 999)
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
                    <div class="item panel panel-success"><!-- widgetBody  -->
                        <div class="panel-heading" id="cblist">
                            <h3 class="panel-title pull-left"><input type="checkbox" id="check0"  class="check" value="0">0</h3>
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


                                <?= $form->field($modelVacunacion, "[{$i}]vacuna")->dropDownList(
                                  ArrayHelper::map($vacuna, 'CODVACUNA', 'VACUNA'),
                                  [
                                    'prompt'=>'Seleccione...',
                                    'onchange'=>'
                                    $.post("index.php?r=tarj-controlvac/listado-rango-edad&id='.'"+$(this).val(), function( data ){

                                    //$("select#calendariovacunacion-0-rangoedad").html( data );

                                     //$("select#"+cadenaId+"coddosis").html( data );

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

                                <?= $form->field($modelVacunacion, "[{$i}]FECHAVACUNA")->textInput(['type' => 'date']) ?>

                              </div>

                            <div class="col-sm-4">

                              <?= $form->field($modelVacunacion, "[{$i}]rangoEdad")->dropDownList(
                                ArrayHelper::map(REdadVac::find()->all(), 'CODRANGOEDAD', 'RANGOEDAD'),
                                [
                                  'prompt'=>'Seleccione...',

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

</div>
<?php
$script = <<< JS

var x = 0;
  $(document).ready(function(){

    $("select#calendariovacunacion-"+0+"-codedad").prop("disabled", true);
    $("select#calendariovacunacion-"+0+"-vacuna").prop("disabled", true);
    $("select#calendariovacunacion-"+0+"-coddosis").prop("disabled", true);
    $("#calendariovacunacion-"+0+"-fechavacuna").prop("disabled", true);
    $("#calendariovacunacion-"+0+"-estado").prop("disabled", true);
    $("#calendariovacunacion-"+0+"-rangoedad").prop("disabled", true);

    $("input").bind("click", function(){
      if ($("#check0").is(":checked"))
      {
        $("select#calendariovacunacion-"+0+"-codedad").prop("disabled", false);
        $("select#calendariovacunacion-"+0+"-vacuna").prop("disabled", false);
        $("select#calendariovacunacion-"+0+"-coddosis").prop("disabled", false);
        $("#calendariovacunacion-"+0+"-fechavacuna").prop("disabled", false);
        $("#calendariovacunacion-"+0+"-estado").prop("disabled", false);
        $("#calendariovacunacion-"+0+"-rangoedad").prop("disabled", false);

        $("#calendariovacunacion-"+0+"-vacuna").change(function(){

          $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
            $("select#calendariovacunacion-"+0+"-coddosis").html( data );
          });
            $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
            $("select#calendariovacunacion-"+0+"-rangoedad").html( data );
          });
        });

      }else{
        $("select#calendariovacunacion-"+0+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+0+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+0+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+0+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+0+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+0+"-rangoedad").prop("disabled", true);
      }



    });
});


$(".dynamicform_wrapper").on("afterDelete", function(e, item) {
 //x=x-1;
 //document.getElementById("valor").innerHTML = x ;

 $(".dynamicform_wrapper .panel-title").each(function(i) {

   $(this).html('<input type="checkbox" id="check'+i+'"  class="check" value='+i+'>'+(i));

});

});


$(".dynamicform_wrapper").on("afterInsert", function(e, item) {


    $(".dynamicform_wrapper .panel-title").each(function(i) {
       $(this).html('<input type="checkbox" id="check'+i+'"  class="check" value='+i+'>'+(i));

      $(document).ready(function(){

        $("select#calendariovacunacion-"+1+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+1+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+1+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+1+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+1+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+1+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+2+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+2+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+2+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+2+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+2+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+2+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+3+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+3+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+3+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+3+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+3+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+3+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+4+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+4+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+4+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+4+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+4+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+4+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+5+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+5+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+5+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+5+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+5+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+5+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+6+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+6+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+6+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+6+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+6+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+6+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+7+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+7+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+7+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+7+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+7+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+7+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+8+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+8+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+8+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+8+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+8+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+8+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+9+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+9+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+9+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+9+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+9+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+9+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+10+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+10+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+10+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+10+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+10+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+10+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+11+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+11+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+11+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+11+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+11+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+11+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+12+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+12+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+12+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+12+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+12+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+12+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+13+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+13+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+13+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+13+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+13+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+13+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+14+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+14+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+14+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+14+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+14+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+14+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+15+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+15+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+15+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+15+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+15+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+15+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+16+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+16+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+16+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+16+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+16+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+16+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+17+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+17+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+17+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+17+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+17+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+17+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+18+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+18+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+18+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+18+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+18+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+18+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+19+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+19+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+19+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+19+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+19+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+19+"-rangoedad").prop("disabled", true);

        $("select#calendariovacunacion-"+20+"-codedad").prop("disabled", true);
        $("select#calendariovacunacion-"+20+"-vacuna").prop("disabled", true);
        $("select#calendariovacunacion-"+20+"-coddosis").prop("disabled", true);
        $("#calendariovacunacion-"+20+"-fechavacuna").prop("disabled", true);
        $("#calendariovacunacion-"+20+"-estado").prop("disabled", true);
        $("#calendariovacunacion-"+20+"-rangoedad").prop("disabled", true);


          $("input").bind("click", function(){

            if ($("#check0").is(":checked"))
            {
              $("select#calendariovacunacion-"+0+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+0+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+0+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+0+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+0+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+0+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+0+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+0+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+0+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+0+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+0+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+0+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+0+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+0+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+0+"-rangoedad").prop("disabled", true);
            }

            if ($("#check1").is(":checked"))
            {
              $("select#calendariovacunacion-"+1+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+1+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+1+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+1+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+1+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+1+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+1+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+1+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+1+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+1+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+1+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+1+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+1+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+1+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+1+"-rangoedad").prop("disabled", true);
            }

            if ($("#check2").is(":checked"))
            {
              $("select#calendariovacunacion-"+2+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+2+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+2+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+2+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+2+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+2+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+2+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+2+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+2+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+2+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+2+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+2+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+2+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+2+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+2+"-rangoedad").prop("disabled", true);
            }

            if ($("#check3").is(":checked"))
            {
              $("select#calendariovacunacion-"+3+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+3+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+3+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+3+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+3+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+3+"-rangoedad").prop("disabled", false);


              $("#calendariovacunacion-"+3+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+3+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+3+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+3+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+3+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+3+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+3+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+3+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+3+"-rangoedad").prop("disabled", true);
            }

            if ($("#check4").is(":checked"))
            {
              $("select#calendariovacunacion-"+4+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+4+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+4+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+4+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+4+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+4+"-rangoedad").prop("disabled", false);


              $("#calendariovacunacion-"+4+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+4+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+4+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+4+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+4+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+4+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+4+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+4+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+4+"-rangoedad").prop("disabled", true);
            }

            if ($("#check5").is(":checked"))
            {
              $("select#calendariovacunacion-"+5+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+5+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+5+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+5+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+5+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+5+"-rangoedad").prop("disabled", false);



              $("#calendariovacunacion-"+5+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+5+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+5+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+5+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+5+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+5+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+5+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+5+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+5+"-rangoedad").prop("disabled", true);
            }

            if ($("#check6").is(":checked"))
            {
              $("select#calendariovacunacion-"+6+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+6+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+6+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+6+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+6+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+6+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+6+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+6+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+6+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+6+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+6+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+6+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+6+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+6+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+6+"-rangoedad").prop("disabled", true);
            }

            if ($("#check7").is(":checked"))
            {
              $("select#calendariovacunacion-"+7+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+7+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+7+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+7+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+7+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+7+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+7+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+7+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+7+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+7+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+7+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+7+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+7+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+7+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+7+"-rangoedad").prop("disabled", true);
            }

            if ($("#check8").is(":checked"))
            {
              $("select#calendariovacunacion-"+8+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+8+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+8+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+8+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+8+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+8+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+8+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+8+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+8+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+8+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+8+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+8+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+8+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+8+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+8+"-rangoedad").prop("disabled", true);
            }

            if ($("#check9").is(":checked"))
            {
              $("select#calendariovacunacion-"+9+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+9+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+9+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+9+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+9+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+9+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+9+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+9+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+9+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+9+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+9+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+9+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+9+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+9+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+9+"-rangoedad").prop("disabled", true);
            }

            if ($("#check10").is(":checked"))
            {
              $("select#calendariovacunacion-"+10+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+10+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+10+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+10+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+10+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+10+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+10+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+10+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+10+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+10+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+10+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+10+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+10+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+10+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+10+"-rangoedad").prop("disabled", true);
            }

            if ($("#check11").is(":checked"))
            {
              $("select#calendariovacunacion-"+11+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+11+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+11+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+11+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+11+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+11+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+11+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+11+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+11+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+11+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+11+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+11+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+11+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+11+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+11+"-rangoedad").prop("disabled", true);
            }

            if ($("#check12").is(":checked"))
            {
              $("select#calendariovacunacion-"+12+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+12+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+12+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+12+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+12+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+12+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+12+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+12+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+12+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+12+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+12+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+12+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+12+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+12+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+12+"-rangoedad").prop("disabled", true);
            }
            if ($("#check13").is(":checked"))
            {
              $("select#calendariovacunacion-"+13+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+13+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+13+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+13+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+13+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+13+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+13+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+13+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+13+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+13+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+13+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+13+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+13+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+13+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+13+"-rangoedad").prop("disabled", true);
            }
            if ($("#check14").is(":checked"))
            {
              $("select#calendariovacunacion-"+14+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+14+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+14+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+14+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+14+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+14+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+14+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+14+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+14+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+14+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+14+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+14+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+14+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+14+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+14+"-rangoedad").prop("disabled", true);
            }
            if ($("#check15").is(":checked"))
            {
              $("select#calendariovacunacion-"+15+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+15+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+15+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+15+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+15+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+15+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+15+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+15+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+15+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+15+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+15+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+15+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+15+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+15+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+15+"-rangoedad").prop("disabled", true);
            }
            if ($("#check16").is(":checked"))
            {
              $("select#calendariovacunacion-"+16+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+16+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+16+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+16+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+16+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+16+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+16+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+16+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+16+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+16+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+16+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+16+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+16+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+16+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+16+"-rangoedad").prop("disabled", true);
            }
            if ($("#check17").is(":checked"))
            {
              $("select#calendariovacunacion-"+17+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+17+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+17+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+17+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+17+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+17+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+17+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+17+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+17+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+17+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+17+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+17+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+17+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+17+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+17+"-rangoedad").prop("disabled", true);
            }
            if ($("#check18").is(":checked"))
            {
              $("select#calendariovacunacion-"+18+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+18+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+18+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+18+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+18+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+18+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+18+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+18+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+18+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+18+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+18+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+18+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+18+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+18+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+18+"-rangoedad").prop("disabled", true);
            }
            if ($("#check19").is(":checked"))
            {
              $("select#calendariovacunacion-"+19+"-codedad").prop("disabled", false);
              $("select#calendariovacunacion-"+19+"-vacuna").prop("disabled", false);
              $("select#calendariovacunacion-"+19+"-coddosis").prop("disabled", false);
              $("#calendariovacunacion-"+19+"-fechavacuna").prop("disabled", false);
              $("#calendariovacunacion-"+19+"-estado").prop("disabled", false);
              $("#calendariovacunacion-"+19+"-rangoedad").prop("disabled", false);

              $("#calendariovacunacion-"+19+"-vacuna").change(function(){

                $.post("index.php?r=tarj-controlvac/listado-dosis&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+19+"-coddosis").html( data );
                });
                  $.post("index.php?r=tarj-controlvac/listado-rango-edad&id="+$(this).val(), function( data ){
                  $("select#calendariovacunacion-"+19+"-rangoedad").html( data );
                });
              });

            }else{
              $("select#calendariovacunacion-"+19+"-codedad").prop("disabled", true);
              $("select#calendariovacunacion-"+19+"-vacuna").prop("disabled", true);
              $("select#calendariovacunacion-"+19+"-coddosis").prop("disabled", true);
              $("#calendariovacunacion-"+19+"-fechavacuna").prop("disabled", true);
              $("#calendariovacunacion-"+19+"-estado").prop("disabled", true);
              $("#calendariovacunacion-"+19+"-rangoedad").prop("disabled", true);
            }


          });
      });



});

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
