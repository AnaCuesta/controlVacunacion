<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Genero;
use frontend\models\Edades;
use frontend\models\Nacionalidad;
use frontend\models\Provincia;
use frontend\models\Canton;
use frontend\models\Parroquia;
use bookin\aws\checkbox\AwesomeCheckbox;
use kartik\select2\Select2;
use frontend\models\Autoidetnica;
/* @var $this yii\web\View */
/* @var $model frontend\models\Ciudadanos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudadanos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'N_HISTCLINIC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true, 'placeholder'=>'Digitar la cédula del representante en caso que el niño no disponga N° de cédula']) ?>

    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'SEXO')->dropDownList(
                 ArrayHelper::map(Genero::find()->all(), 'CODSEXO', 'SEXO'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'EDAD')->dropDownList(
                 ArrayHelper::map(Edades::find()->all(), 'CODEDAD', 'EDADRMA'),  ['prompt'=>'Seleccione la opción...']) ?>

    <?= $form->field($model, 'NACIONALIDAD')->widget(Select2::classname(), [
                   'data' => ArrayHelper::map(Nacionalidad::find()->all(), 'CODNACIONALIDAD', 'NACIONALIDAD'),
                   'language' => 'de',
                   'options' => [  'prompt'=>'Seleccione la opción...'],
                   'pluginOptions' => [
                       'allowClear' => true
                   ],
               ]); ?>

    <!--?= $form->field($model, 'CODNACIONALIDAD')->dropDownList(
                            ArrayHelper::map(Nacionalidad::find()->all(), 'CODNACIONALIDAD', 'NACIONALIDAD'),  [
                              'prompt'=>'Seleccione la opción...',
                              'onchange'=>'$.post("index.php?r=nacionalidad/list&id='.'"+$(this).val(), function( data ){
                                $("select#ciudadanos-codprovincia").html( data );
                              });',

                              ]) ?-->

    <?= $form->field($model, 'AUTOIDETNICA')->widget(Select2::classname(), [
               'data' => ArrayHelper::map(Autoidetnica::find()->all(), 'CODAUTOIDETNICA', 'AUTOIDETNICA') ,
               'language' => 'de',
               'options' => [  'prompt'=>'Seleccione la opción...'],
               'pluginOptions' => [
                       'allowClear' => true
               ],
     ]); ?>


    <?= $form->field($model, 'LUGARRESIDE')->textInput() ?>

    <?= $form->field($model, 'PROVINCIA')->widget(Select2::classname(), [
                   'data' => ArrayHelper::map(PROVINCIA::find()->all(), 'CODPROVINCIA', 'PROVINCIA'),
                   'language' => 'de',
                   'options' => [  'prompt'=>'Seleccione la opción...',
                     'onchange'=>'$.post("index.php?r=provincia/lista-cantones&id='.'"+$(this).val(), function( data ){
                       $("select#ciudadanos-canton").html( data );
                     });',
                  ],
                   'pluginOptions' => [
                       'allowClear' => true
               ],
    ]); 
    ?>

    <?= $form->field($model, 'CANTON')->widget(Select2::classname(), [
                              //'data' => ArrayHelper::map(CANTON::find()->all(), 'CODCANTON', 'CANTON'),
                              'language' => 'de',
                              'options' => [  'prompt'=>'Seleccione la opción...',
                              'onchange'=>'$.post("index.php?r=provincia/lista-parroquia&id='.'"+$(this).val(), function( data ){
                                   $("select#ciudadanos-parroquia").html( data );
                                 });',
                              ],
                              'pluginOptions' => [
                                  'allowClear' => true
                              ],
     ]); ?>

    <?= $form->field($model, 'PARROQUIA')->widget(Select2::classname(), [
               //'data' => ArrayHelper::map(Parroquia::find()->all(), 'CODPARROQUIA', 'PARROQUIA'),  ['prompt'=>'Seleccione la opción...']) ,
               'language' => 'de',
               'options' => [  'prompt'=>'Seleccione la opción...'],
               'pluginOptions' => [
                       'allowClear' => true
               ],
     ]); ?>



    <?= $form->field($model, 'LOCALIDAD')->textInput() ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Crear Ciudadano' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idNacion').change(function(){
  var idNacion = $(this).val();
//alert(idNacion); devuelve los id de todos los elementos del select
//http://phppot.com/jquery/jquery-dependent-dropdown-list-countries-and-states/
//http://www.codexworld.com/dynamic-dependent-select-box-using-jquery-ajax-php/
//https://www.youtube.com/watch?v=wNNhIdtMyOA
//$.get('index.php?r=nacionalidad/codigo-nacionalidad', {idNacion : idNacion}, function(data){
//alert(data);
//var data = $.parseJSON(data);
//option:selected
//$('#ciudadanos-codprovincia' ).attr('value', data.CODNACIONALIDAD);
//$('#ciudadanos-codprovincia' ).text( data.CODNACIONALIDAD);

});

JS;
$this->registerJs($script);
 ?>
