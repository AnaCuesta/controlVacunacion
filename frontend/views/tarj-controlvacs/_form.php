<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use frontend\models\Establecimiento;
use kartik\select2\Select2;
use frontend\models\Ciudadanos;
use frontend\models\Vacuna;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvacs */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="tarj-controlvacs-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>


    <div class="row">

       <div class="col-sm-3">

         
      <?= $form->field($model, 'idEstablecimiento')->widget(Select2::classname(), [
       'data' => ArrayHelper::map(Establecimiento::find()->all(), 'UNICODIGOES', 'NOMBREESTABLECIMIENTO') ,
       'language' => 'de',
       'options' => [  'prompt'=>'Seleccione la opción...', 'id'=>'idEstablecimiento'],
       'pluginOptions' => [
               'allowClear' => true
       ],

     ]); ?>
     
   
       </div>
        <div class="col-sm-2">
          <?= $form->field($model, 'zona')->textInput(['disabled'=>true]) ?>
        </div>   
        <div class="col-sm-2">
     
        <?= $form->field($model, 'distrito')->textInput(['disabled'=>true]) ?>
            
        </div>  
         <div class="col-sm-2">

       <?= $form->field($model, 'provincia')->textInput(['disabled'=>true]) ?>
            
        </div>      
        <div class="col-sm-3">

          <?= $form->field($model, 'canton')->textInput(['disabled'=>true]) ?>
            
        </div>      

    </div>

     <?= $form->field($model, 'NUMORDENTAR')->textInput(['maxlength' => true]) ?>

 
     <!--?= $form->field($model, 'id_ciudadano')->textInput(['maxlength' => true]) ?-->

     <?= $form->field($model, 'id_ciudadano')->widget(Select2::classname(), [
       'data' => ArrayHelper::map(Ciudadanos::find()->all(), 'idCiudadano', 'N_HISTCLINIC') ,
       'language' => 'de',
       'options' => [  'prompt'=>'Seleccione la opción...', 'id'=>'idCiudadano'],
       'pluginOptions' => [
               'allowClear' => true
       ],

     ]); ?>
     
        

    <div class="row">
        <div class="col-sm-6">
    <?= $form->field($model, 'nombreCiudadano')->textInput(['disabled'=>true])  ?>

            
        </div>
        <div class="col-sm-6">
    <?= $form->field($model, 'apellidoCiudadano')->textInput(['disabled'=>true]) ?>
            
        </div>
    </div>


<div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'nacionalidadCiudadano')->textInput(['disabled'=>true]) ?>
        
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'etniaCiudadano')->textInput(['disabled'=>true]) ?>
        
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
    <div class="col-sm-6">
    <?= $form->field($model, 'APELLIDOSNOMBRESMADRE')->textInput(['maxlength' => true]) ?>
        
    </div>
    <div class="col-sm-6">
    <?= $form->field($model, 'APELLIDOSNOMBRESPADRE')->textInput(['maxlength' => true]) ?>
        
    </div>
</div>

    <!-- ['value'=>date('y-m-d-h-m-s')] fecha php -->



    <?= $form->field($model, 'APELLIDOSNOMBRESTUTOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'residenciaCiudadano')->textInput(['disabled'=>true]) ?>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'provinciaCiudadano')->textInput(['disabled'=>true])  ?>
        </div>
        <div class="col-sm-4">
    <?= $form->field($model, 'cantonCiudadano')->textInput(['disabled'=>true])  ?>
            
        </div>
        <div class="col-sm-4">
    <?= $form->field($model, 'parroquiaCiudadano')->textInput(['disabled'=>true])  ?>
            
        </div>
    </div>
  
    
    <?= $form->field($model, 'localidadCiudadano')->textInput(['disabled'=>true])  ?>

    <?= $form->field($model, 'direccionCiudadano')->textInput(['disabled'=>true])  ?>

    <?= $form->field($model, 'telefonoCiudadano')->textInput(['disabled'=>true])  ?>

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
                    'CODVACUNA',
                    'idesquemavac',
                    'CODDOSIS',
                    'CODPROXIMAVACUNA',
                    'CODPROXIMADOSIS',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelVacunacion as $i => $modelVacunacion): ?>
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
                                <?= $form->field($modelVacunacion, "[{$i}]CODEDAD")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelVacunacion, "[{$i}]idesquemavac")->textInput(['maxlength' => true]) ?>
                            </div>
                       
                        <div class="col-sm-4">

                        <?= $form->field($modelVacunacion, "[{$i}]CODVACUNA")->widget(Select2::classname(), [
                                'data' => ArrayHelper::map(Vacuna::find()->all(), 'CODVACUNA', 'VACUNA'),
                                'language' => 'de',
                                'options' => [  'prompt'=>'Seleccione la opción...',
                                'onchange'=>'$.post("index.php?r=tarj-controlvacs/listado-dosis&id='.'"+$(this).val(), function( data ){
                                     $("select#calendariovacunacion-0-coddosis").html( data );
                                   });',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                         ]); ?>

                         </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4">
                             

                        <?= $form->field($modelVacunacion, "[{$i}]CODDOSIS")->widget(Select2::classname(), [
                                'language' => 'de',
                                'options' => [  'prompt'=>'Seleccione la opción...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                         ]); 
                         ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelVacunacion, "[{$i}]FECHAVACUNA")->textInput(['disabled'=>true, 'value' => date('d-m-Y')]) ?>
                            </div>
                           <div class="col-sm-4">
                                <?= $form->field($modelVacunacion, "[{$i}]CODPROXIMAVACUNA")->textInput(['maxlength' => true]) ?>
                            </div>
                       
 
                        </div>                   
                          <div class="row">
  
                            <div class="col-sm-4">
                                <?= $form->field($modelVacunacion, "[{$i}]CODPROXIMADOSIS")->textInput(['maxlength' => true]) ?>
                            </div>

                         <div class="col-sm-4">


                            <?php 
                            echo '<label>Fecha de nacimiento</label>';
                            echo DatePicker::widget([
                            'name' => $form->field($modelVacunacion, "[{$i}]FECHAPROXIMA"),
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'value' => '',
                            'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'dd-M-yyyy'
                            ]
                            ]);
                            ?> 
 
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

</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idEstablecimiento').change(function(){
  var idEstablecimiento = $(this).val();

 $.get('index.php?r=tarj-controlvacs/listado-zona', {id : idEstablecimiento}, function(data){
    var data = $.parseJSON(data);
   $('#tarjcontrolvacs-zona').attr('value', data);
}); 
$.get('index.php?r=tarj-controlvacs/listado-distrito', {id : idEstablecimiento}, function(data){
    var data = $.parseJSON(data);
   $('#tarjcontrolvacs-distrito').attr('value', data);
});

$.get('index.php?r=tarj-controlvacs/listado-provincia', {id : idEstablecimiento}, function(data){
    var data = $.parseJSON(data);
   $('#tarjcontrolvacs-provincia').attr('value', data);
});
$.get('index.php?r=tarj-controlvacs/listado-canton', {id : idEstablecimiento}, function(data){
    var data = $.parseJSON(data);
   $('#tarjcontrolvacs-canton').attr('value', data);
});



});
$('#idCiudadano').change(function(){
  var idCiudadano = $(this).val();

 $.get('index.php?r=tarj-controlvacs/listado-ciudadano', {id : idCiudadano}, function(data){
    var data = $.parseJSON(data);

    $('#tarjcontrolvacs-nombreciudadano').attr('value', data.NOMBRES);
    $('#tarjcontrolvacs-apellidociudadano').attr('value', data.APELLIDOS);
    $('#tarjcontrolvacs-nacionalidadciudadano').attr('value', data.NACIONALIDAD);
    $('#tarjcontrolvacs-direccionciudadano').attr('value', data.DIRCIUD);
    $('#tarjcontrolvacs-telefonociudadano').attr('value', data.TELFCIUD);
    $('#tarjcontrolvacs-residenciaciudadano').attr('value', data.LUGARRESIDE);
    $('#tarjcontrolvacs-provinciaciudadano').attr('value', data.PROVINCIA);
    $('#tarjcontrolvacs-cantonciudadano').attr('value', data.CANTON);
    $('#tarjcontrolvacs-parroquiaciudadano').attr('value', data.PARROQUIA);
    $('#tarjcontrolvacs-localidadciudadano').attr('value', data.LOCALIDAD);
    $('#tarjcontrolvacs-etniaciudadano').attr('value', data.AUTOIDETNICA);
}); 


});


JS;
$this->registerJs($script);
 ?>