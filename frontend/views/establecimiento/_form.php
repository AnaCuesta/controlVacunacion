<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Parroquia;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

use frontend\models\Canton;
use frontend\models\Provincia;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="establecimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>






<div class="row">
  <div class="col-sm-4">
    <?= $form->field($model, 'CODPARROQUIA')->widget(Select2::classname(), [
                     'data' => ArrayHelper::map(Parroquia::find()->all(), 'CODCANTON', 'PARROQUIA'),
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


    <?= $form->field($model, 'ZONA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISTRITO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBREESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODZONAUBIC')->textInput() ?>

    <?= $form->field($model, 'TIPOESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>



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
