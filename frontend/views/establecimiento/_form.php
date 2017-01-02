<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Parroquia;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\ZonaUbic;
use frontend\models\Canton;
use frontend\models\Provincia;
use yii\helpers\Json;
use bookin\aws\checkbox\AwesomeCheckbox;
/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="establecimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>









    <?= $form->field($model, 'ZONA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISTRITO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBREESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'TIPOESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>



    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'CODPARROQUIA')->widget(Select2::classname(), [
                         'data' => ArrayHelper::map(Parroquia::find()->all(), 'CODPARROQUIA', 'PARROQUIA'),
                         'language' => 'de',
                         'options' => ['prompt'=> 'Seleccione la opción...', 'id' => 'idParroquia'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
        ]); ?>
      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'canton')->textInput(['disabled' => true]) ?>

      </div>
      <div class="col-sm-4">
        <?= $form->field($model, 'provincia')->textInput(['disabled' => true]) ?>

      </div>

    </div>

    <div class="row">
       <div class="col-sm-5">
         <p><em>Seleccione la zona de ubicación:</em></p>
       </div>
     </div>
          <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-11">

          <?php
              $data=ArrayHelper::map(ZonaUbic::find()->all(), 'CODZONAUBIC', 'ZONAUBICACION');
              echo $form->field($model, 'CODZONAUBIC')->widget(AwesomeCheckbox::classname(),[
                'type'=>AwesomeCheckbox::TYPE_RADIO,
                'style'=>[AwesomeCheckbox::STYLE_PRIMARY, AwesomeCheckbox::STYLE_INLINE ],
                'list'=>$data,
                'options' => ['class'=>'checkbox-inline']
              ]); ?>

            </div>
    </div>



    <?= $form->field($model, 'LOCALIDADEST')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

$('#idParroquia').change(function(){

  var idCanton = $(this).val();

  $.get('index.php?r=establecimiento/canton', {id : idCanton}, function(data){
      var data = $.parseJSON(data);
      $('#establecimiento-canton').attr('value', data);
  });

  $.get('index.php?r=establecimiento/provincia', {id : idCanton}, function(data){
      var data = $.parseJSON(data);
      $('#establecimiento-provincia').attr('value', data);
  });

});

JS;
$this->registerJs($script);
 ?>
