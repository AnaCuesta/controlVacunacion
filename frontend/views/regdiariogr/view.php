<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Vacuna;
use frontend\models\Dosis;
use frontend\models\Edad;
use frontend\models\REdadVac;
use frontend\models\Ciudadano;
use frontend\models\Lugarresidencia;
use frontend\models\Localidad;
use frontend\models\Parroquia;
use frontend\models\Canton;
use frontend\models\Provincia;
use frontend\models\Genero;
use frontend\models\Autoidetnica;
use frontend\models\Nacionalidad;
use frontend\models\Vacunacionregdiariogr;
use frontend\models\Escenariovac;
use frontend\models\Establecimiento;
use frontend\models\ZonaUbic;
use frontend\models\Grupoderiesgo;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\models\Regdiario */

$this->title = $model->CODREGISTRODIARIO;
$this->params['breadcrumbs'][] = ['label' => 'Regdiarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiario-view">

  <div class="row">
    <div class="col-sm-6">
      <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/MSP.png', false), ['alt' => 'My logo', 'width'=>'250', 'class'=>'pull-lft img-responsive']) ?>
    </div>
    <div class="col-sm-6">
      <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/persona.jpg', false), ['alt' => 'My logo', 'width'=>'110', 'class'=>'pull-right img-responsive']) ?>
    </div>
  </div>


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CODREGISTRODIARIO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CODREGISTRODIARIO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php
/*Ciudadano*/
$ciudadano = Ciudadano::find()->where(['N_HISTCLINIC' => $model->N_HISTCLINIC])->one();
$etnia = Autoidetnica::find()->where(['CODAUTOIDETNICA' => $ciudadano->CODAUTOIDETNICA])->one();
$nacionalidad = Nacionalidad::find()->where(['CODNACIONALIDAD' => $ciudadano->CODNACIONALIDAD])->one();
$sexo = Genero::find()->where(['CODSEXO' => $ciudadano->CODSEXO])->one();
$edad = Edad::find()->where(['CODEDAD' => $model->CODEDAD])->one();
$escenario =  Escenariovac::find()->where(['CODLUGARVACUNACION' => $model->CODLUGARVACUNACION])->one();
$lugar = Lugarresidencia::find()->where(['CODLUGARRESIDE' => $ciudadano->CODLUGARRESIDE])->one();
$localidad = Localidad::find()->where(['CODLOCREC' =>$lugar->CODLOCREC])->one();
$parroquia = Parroquia::find()->where(['CODPARROQUIA' => $localidad->CODPARROQUIA])->one();
$canton = Canton::find()->where(['CODCANTON' => $parroquia->CODCANTON])->one();
$provincia = Provincia::find()->where(['CODPROVINCIA' => $canton->CODPROVINCIA])->one();
/*Ciudadano*/
/*Establecimiento*/
$establecimiento = Establecimiento::find()->where(['UNICODIGOES' => $model->UNICODIGOES])->one();
$parroquiaEstablecimiento = Parroquia::find()->where(['CODPARROQUIA' => $establecimiento->CODPARROQUIA])->one();
$cantonEstablecimiento = Canton::find()->where(['CODCANTON' => $parroquiaEstablecimiento->CODCANTON])->one();
$provinciaEstablecimiento = Provincia::find()->where(['CODPROVINCIA' => $cantonEstablecimiento->CODPROVINCIA])->one();
$zonaUbicacion = ZonaUbic::find()->where(['CODZONAUBIC' => $establecimiento->CODZONAUBIC])->one();
/*Establecimiento*/




 ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'CODREGISTRODIARIO',
            [
              'label' => 'Fecha de la Vacunación ',
              'value' =>  $model->FECHAREGISTROVAC,
            ],
            [
              'label' => 'Nombre del Establecimeinto',
              'value' =>  $establecimiento->NOMBREESTABLECIMIENTO,
              'contentOptions' => ['class'=> 'success']
            ],
            [
              'label' => 'Zona',
              'value' =>  $establecimiento->ZONA,
              'contentOptions' => ['class'=>'success']
            ],
            [
              'label' => 'Provincia',
              'value' =>  $provinciaEstablecimiento->PROVINCIA,
              'contentOptions' => ['class'=>'success']
            ],
            [
              'label' => 'Cantón',
              'value' =>  $cantonEstablecimiento->CANTON,
              'contentOptions' => ['class'=>'success']
            ],
            [
              'label' => 'Parroquia',
              'value' =>  $parroquiaEstablecimiento->PARROQUIA,
              'contentOptions' => ['class'=> 'success']
            ],
            [
              'label' => 'Distrito',
              'value' =>  $establecimiento->DISTRITO,
              'contentOptions' => ['class'=> 'success']
            ],
            [
              'label' => 'Zona Ubicación',
              'value' =>  $zonaUbicacion->ZONAUBICACION	,
              'contentOptions' => ['class'=> 'success']

            ],
            [
              'label' => 'Unicódigo E.S',
              'value' =>  $establecimiento->UNICODIGOES	,
              'contentOptions' => ['class'=> 'success']

            ],
            [
              'label' => 'Tipo de Establecimiento',
              'value' =>  $establecimiento->TIPOESTABLECIMIENTO	,
              'contentOptions' => ['class'=> 'success']

            ],
            [
              'label' => 'Nombre de Localidad o Institución',
              'value' =>  $establecimiento->LOCALIDADEST		,
              'contentOptions' => ['class'=> 'success']
            ],
            [
              'label' => 'Escenario De la Vacunación',
              'value' =>  $escenario->LUGARVACUNACION,
            ],
            'DESCRIPCIONESCENARIOVAC',

            //'CODTIPODOC',
            [
              'label' => 'Apellidos',
              'value' =>  $ciudadano->APELLIDOS,

              'contentOptions' => ['class'=> 'bg-info'],
              'captionOptions' => ['class'=> 'col-sm-4']

            ],


            [
              'label' => 'Nombres',
              'value' =>  $ciudadano->NOMBRES,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Cedula de ciudadanía',
              'value' =>  $ciudadano->CEDULA,
              'contentOptions' => ['class'=> 'bg-info']
            ],
            [
              'label' => 'Género',
              'value' =>  $sexo->SEXO,
              'contentOptions' => ['class'=> 'bg-info']
            ],
            [
              'label' => 'Lugar de Residencia Habitual',
              'value' =>  $lugar->LUGARRESIDENCIA,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Pertenece al E.S',
              'value' =>  $ciudadano->SNPERTENECEUO,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Provincia',
              'value' =>  $provincia->PROVINCIA,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Cantón',
              'value' =>  $canton->CANTON,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Parroquia',
              'value' =>  $parroquia->PARROQUIA,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Localidad',
              'value' =>  $localidad->LOCALREC,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Nacionalidad',
              'value' =>  $nacionalidad->NACIONALIDAD,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Autoidentifiación Étnica',
              'value' =>  $etnia->AUTOIDETNICA,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Edad',
              'value' =>  $edad->EDADRMA,
              'contentOptions' => ['class'=> 'bg-info']

            ],
            [
              'label' => 'Nombre del Vacunador',
              'value' =>  $model->NOMBREVACUNADOR,
            ],
            'ESTADO',

        ],
    ]) ?>

    <table class="table table-striped table-bordered">

      <th class='info'>ID</th>
      <th class='info'>Vacuna</th>
      <th class='info'>Dosis</th>
      <th class='info'>Edad Recomendada de Aplicación</th>
      <th class='info'>Grupo de Riesgo</th>

        <?php
        $data = Vacunacionregdiariogr::find()->where(['CODREGISTRODIARIO'=>$model->CODREGISTRODIARIO])->all();


        $conDosis = 0;
        $con = 0;
        $conRango = 0;

        foreach ($data as $w => $valueDosis) {

          echo '<tr>';
          echo '<td>'.($w+1).'</td>';

          $dosis = Dosis::find()->where(['CODDOSIS'=> $valueDosis->CODDOSIS])->all();

          foreach ($dosis as $x => $value) {

            if ($w == $con)
            {
              $va = Vacuna::find()->where(['CODVACUNA'=>$value->CODVACUNA])->all();

              foreach ($va as $i => $val) {

                if ($w == $con)
                {
                  echo '<td>'.$val->VACUNA.'</td>';
                }

              }
              echo '<td>'.$value->DOSIS.'</td>';

            }


            $e =  REdadVac::find()->where(['CODRANGOEDAD' => $valueDosis->CODRANGOEDAD])->all();

            foreach ($e as  $val) {
              if ($w == $con )
              {
                echo '<td>'.$val->RANGOEDAD.'</td>';
              }

            }

          }

          $grupoRiesgo = Grupoderiesgo::find()->where(['CODGRUPORIESGO'=> $valueDosis->CODGRUPORIESGO])->all();

          foreach ($grupoRiesgo as $key => $value) {
            if ($w == $con )
            {
              echo '<td>'.$value->GRUPORIESGO.'</td>';
            }
          }
          echo '</tr>';
          $con++;

        }




        ?>

    </table>




</div>
