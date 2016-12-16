<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Distrito;
use frontend\models\ZonaUbic;
use frontend\models\Zona;
use frontend\models\Parroquia;
use kartik\select2\Select2;
use frontend\models\Provincia;
use bookin\aws\checkbox\AwesomeCheckbox;
/* @var $this yii\web\View */
/* @var $model frontend\models\Establecimiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="establecimiento-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'CODZONA')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(ZONA::find()->all(), 'CODZONA', 'ZONA'),
          'language' => 'de',
          'options' => [  'prompt'=>'Seleccione la opción...',
          'onchange'=>'$.post("index.php?r=establecimiento/lista-distritos&id='.'"+$(this).val(), function( data ){
            $("select#establecimiento-coddistrito").html( data );
          });',
        ],
        'pluginOptions' => [
          'allowClear' => true
        ],
        ]); ?>


        <?= $form->field($model, 'CODPROVINCIA')->widget(Select2::classname(), [
          'data' => ArrayHelper::map(PROVINCIA::find()->all(), 'CODPROVINCIA', 'PROVINCIA'),
          'language' => 'de',
          'options' => [  'prompt'=>'Seleccione la opción...',
          'onchange'=>'$.post("index.php?r=provincia/lista-cantones&id='.'"+$(this).val(), function( data ){
            $("select#establecimiento-codcanton").html( data );
          });',
        ],
        'pluginOptions' => [
          'allowClear' => true
        ],
      ]); ?>


      <?= $form->field($model, 'CODCANTON')->widget(Select2::classname(), [
        //'data' => ArrayHelper::map(CANTON::find()->all(), 'CODCANTON', 'CANTON'),
        'language' => 'de',
        'options' => [  'prompt'=>'Seleccione la opción...',
        'onchange'=>'$.post("index.php?r=provincia/lista-parroquia&id='.'"+$(this).val(), function( data ){
          $("select#establecimiento-codparroquia").html( data );
        });',
      ],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'CODPARROQUIA')->widget(Select2::classname(), [
      //'data' => ArrayHelper::map(Parroquia::find()->all(), 'CODPARROQUIA', 'PARROQUIA'),  ['prompt'=>'Seleccione la opción...']) ,
      'language' => 'de',
      'options' => [  'prompt'=>'Seleccione la opción...'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]); ?>

    <?= $form->field($model, 'CODDISTRITO')->widget(Select2::classname(), [
      //'data' => ArrayHelper::map(CANTON::find()->all(), 'CODCANTON', 'CANTON'),
      'language' => 'de',
      'options' => [  'prompt'=>'Seleccione la opción...',
      'onchange'=>'$.post("index.php?r=establecimiento/lista-nombre-establecimiento&id='.'"+$(this).val(), function( data ){
        $("select#establecimiento-nombreestablecimiento").html( data );
      });',
    ],
    'pluginOptions' => [
      'allowClear' => true
    ],
  ]); ?>



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


    <?= $form->field($model, 'UNICODIGOES')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'NOMBREESTABLECIMIENTO')->widget(Select2::classname(), [
      //'data' => ArrayHelper::map(CANTON::find()->all(), 'CODCANTON', 'CANTON'),
      'language' => 'de',
      'options' => [  'prompt'=>'Seleccione la opción...',

    ],
    'pluginOptions' => [
      'allowClear' => true
    ],
  ]); ?>


    <?= $form->field($model, 'TIPOESTABLECIMIENTO')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'LOCALIDADEST')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
