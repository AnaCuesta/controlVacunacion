<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tarj-controlvacs-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-sm-2">
          <?= $form->field($model, 'zona')->textInput() ?>
        </div>   
        <div class="col-sm-2">
     
        <?= $form->field($model, 'distrito')->textInput() ?>
            
        </div>  
         <div class="col-sm-2">

       <?= $form->field($model, 'provincia')->textInput() ?>
            
        </div>      
        <div class="col-sm-3">

          <?= $form->field($model, 'canton')->textInput() ?>
            
        </div>      
        <div class="col-sm-3">

         <?= $form->field($model, 'idEstablecimiento')->textInput() ?>   
  
            
        </div>
    </div>

     <?= $form->field($model, 'NUMORDENTAR')->textInput(['maxlength' => true]) ?>

 
     <!--?= $form->field($model, 'id_ciudadano')->textInput(['maxlength' => true]) ?-->
     <?= $form->field($model, 'historiaClinicaCiudadano')->textInput(['maxlength' => true]) ?>
        

    <div class="row">
        <div class="col-sm-6">
    <?= $form->field($model, 'nombreCiudadano')->textInput(['maxlength' => true]) ?>
            
        </div>
        <div class="col-sm-6">
    <?= $form->field($model, 'apellidoCiudadano')->textInput(['maxlength' => true]) ?>
            
        </div>
    </div>


<div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'nacionalidadCiudadano')->textInput(['maxlength' => true]) ?>
        
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'etniaCiudadano')->textInput(['maxlength' => true]) ?>
        
    </div>

</div>

<div class="row">
    <div class="col-sm-4">
    <?= $form->field($model, 'FECHNAC')->textInput() ?>
        
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
    <div class="col-sm-6">
    <?= $form->field($model, 'APELLIDOSNOMBRESMADRE')->textInput(['maxlength' => true]) ?>
        
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'APELLIDOSNOMBRESPADRE')->textInput(['maxlength' => true]) ?>
        
    </div>
</div>

    <!-- ['value'=>date('y-m-d-h-m-s')] fecha php -->



    <?= $form->field($model, 'APELLIDOSNOMBRESTUTOR')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'provinciaCiudadano')->textInput(['maxlength' => true])  ?>
        </div>
        <div class="col-sm-4">
    <?= $form->field($model, 'cantonCiudadano')->textInput(['maxlength' => true])  ?>
            
        </div>
        <div class="col-sm-4">
    <?= $form->field($model, 'parroquiaCiudadano')->textInput(['maxlength' => true])  ?>
            
        </div>
    </div>
  
    
    <?= $form->field($model, 'localidadCiudadano')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'direccionCiudadano')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'telefonoCiudadano')->textInput(['maxlength' => true])  ?>

    <?= $form->field($model, 'OBSERV')->textarea(['rows' => 6]) ?>

  

   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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