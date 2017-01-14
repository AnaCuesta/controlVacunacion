<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Genero;
use frontend\models\Edad;
use frontend\models\Nacionalidad;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Lugarresidencia;
use frontend\models\Parroquia;
use bookin\aws\checkbox\AwesomeCheckbox;
use kartik\select2\Select2;
use frontend\models\Autoidetnica;
use yii\helpers\Json;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadano */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadano-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'N_HISTCLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>


    <?php
    echo '<label>Ingrese la  fecha de Nacimiento</label>';

    echo DatePicker::widget([
    'attribute' => 'FECHANACIMIENTO',
    'model' => $model,
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'value' => '',
    'pluginOptions' => [
    'autoclose'=>true,
    'format' => 'yyyy-mm-dd'
    ]
    ]);
    ?>

    <div class="row">
      <div class="col-sm-12">

      <?php

      print_r(DATE('m')+substr($model->FECHANACIMIENTO,5,2));
      die();

       ?>

      </div>
    </div>
   <?= $form->field($model, 'CODSEXO')->widget(Select2::classname(), [
                                  'data' => ArrayHelper::map(Genero::find()->all(), 'CODSEXO', 'SEXO'),
                                  'language' => 'de',
                                  'options' => [  'prompt'=>'Seleccione la opción...'],
                                  'pluginOptions' => [
                                      'allowClear' => true
                                  ],
                              ]); ?>



    <?= $form->field($model, 'CODNACIONALIDAD')->widget(Select2::classname(), [
                     'data' => ArrayHelper::map(Nacionalidad::find()->all(), 'CODNACIONALIDAD', 'NACIONALIDAD'),
                     'language' => 'de',
                     'options' => [  'prompt'=>'Seleccione la opción...'],
                     'pluginOptions' => [
                         'allowClear' => true
                     ],
    ]);?>


    <?= $form->field($model, 'CODAUTOIDETNICA')->widget(Select2::classname(), [
           'data' => ArrayHelper::map(Autoidetnica::find()->all(), 'CODAUTOIDETNICA', 'AUTOIDETNICA') ,
           'language' => 'de',
           'options' => [  'prompt'=>'Seleccione la opción...'],
           'pluginOptions' => [
                   'allowClear' => true
           ],
    ]);?>



    <?= $form->field($model, 'CODLUGARRESIDE')->widget(Select2::classname(), [
               'data' => ArrayHelper::map(Lugarresidencia::find()->all(), 'CODLUGARRESIDE', 'LUGARRESIDENCIA'),
               'language' => 'de',
               'options' => [  'prompt'=>'Seleccione la opción...', 'id'=>'idLugarReside'
               ],
               'pluginOptions' => [
                   'allowClear' => true
               ],
    ]);?>


    <?= $form->field($model, 'localidad')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'parroquia')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'canton')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'provincia')->textInput(['disabled' => true]) ?>


    <?= $form->field($model, 'DIRCIUD')->textInput(['maxlength' => true]) ?>


  <p><strong><em> INGRESE LA LATITUD Y LONGITUD: </em></strong></p>

  <div class="row">
    <div class="form-group col-xs-1"></div>
    <div class="form-group col-xs-5">
      <?= $form->field($model, 'LAT')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group col-xs-5">
      <?= $form->field($model, 'LONGITUD')->textInput(['maxlength' => true]) ?>
    </div>
  </div>


    <?= $form->field($model, 'TELFCIUD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREOCIUD')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'SNPERTENECEUO')->widget(AwesomeCheckbox::classname(),[
      'type'=>AwesomeCheckbox::TYPE_RADIO,
      'style'=>[AwesomeCheckbox::STYLE_PRIMARY],
      'list'=>[ // array data
          'SI'=>'Pertenece al Establecimiento de Salud',
          'NO'=>'No Pertenece al Establecimiento de Salud'
      ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<?php
$script = <<< JS
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idLugarReside').change(function(){
  var idLocalidad = $(this).val();
  ciudadano(idLocalidad);
});

$('#idLugarReside').ready(function(){

  var idLocalidad = $('#idLugarReside').val();
  ciudadano(idLocalidad);

});



function ciudadano(idLocalidad){

  $.get('index.php?r=ciudadano/lugar-residencia', {id : idLocalidad }, function(data){
      var data = $.parseJSON(data);
      $('#ciudadano-localidad').attr('value', data);
  });
  $.get('index.php?r=ciudadano/parroquia', {id : idLocalidad }, function(data){
      var data = $.parseJSON(data);
      $('#ciudadano-parroquia').attr('value', data);
  });
  $.get('index.php?r=ciudadano/canton', {id : idLocalidad }, function(data){
      var data = $.parseJSON(data);
      $('#ciudadano-canton').attr('value', data);
  });
  $.get('index.php?r=ciudadano/provincia', {id : idLocalidad }, function(data){
      var data = $.parseJSON(data);
      $('#ciudadano-provincia').attr('value', data);
  });

}




JS;
$this->registerJs($script);
 ?>
