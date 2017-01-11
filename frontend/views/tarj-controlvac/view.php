<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Calendariovacunacion;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use frontend\models\Vacuna;
use frontend\models\REdadVac;
use frontend\models\Dosis;
use frontend\models\Edad;

/* @var $this yii\web\View */
/* @var $model frontend\models\TarjControlvac */

$this->title = $model->CODTARCONTVAC;
$this->params['breadcrumbs'][] = ['label' => 'Tarj Controlvacs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvac-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CODTARCONTVAC], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CODTARCONTVAC], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CODTARCONTVAC',
            'N_HISTCLINIC',
            'UNICODIGOES',
            'perteneceUO',
            'NUMORDENTAR',
            'FECHNAC',
            'LUGARNAC',
            'LUGARINSCRIPCION',
            'EDADINGRESO',
            'APELLIDOSNOMBRESMADRE',
            'APELLIDOSNOMBRESPADRE',
            'APELLIDOSNOMBRESTUTOR',
            'OBSERV:ntext',
        ],
    ]) ?>


<table class="table table-striped table-bordered">
  <th class='info'>ID</th>
  <th class='info'>Fecha</th>
  <th class='info'>Estado</th>
  <th class='info'>Vacuna</th>
  <th class='info'>Dosis</th>
  <th class='info'>Edad recomendada de aplicación</th>
  <th class='info'>Edad</th>

    <?php
    $data = Calendariovacunacion::find()->where(['CODTARCONTVAC'=>$model->CODTARCONTVAC])->all();


    $conDosis = 0;
    $con = 0;
    $conRango = 0;
    foreach ($data as $w => $valueDosis) {

      echo '<tr>';
      echo '<td>'.($w+1).'</td>';
      echo '<td>'.$valueDosis->FECHAVACUNA.'</td>';
      echo '<td>'.$valueDosis->ESTADO.'</td>';

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

        $vacuna =  Vacuna::find()->where(['CODVACUNA'=>$value->CODVACUNA])->all();
        foreach ($vacuna as $y => $value) {


          $rangoEdad =  REdadVac::find()->where(['CODVACUNA'=>$value->CODVACUNA])->all();

          foreach ($rangoEdad as $z => $edad) {

            if ($w == $con && $conRango < count($valueDosis))
            {
              echo '<td>'.$edad->RANGOEDAD.'</td>';

            }
            $conRango++;
          }
          $conRango=0;

        }

        $e =  Edad::find()->where(['CODEDAD' => $valueDosis->CODEDAD])->all();

        foreach ($e as  $val) {
          if ($w == $con )
          {
            echo '<td>'.$val->EDADRMA.'</td>';
          }

        }

      }

      echo '</tr>';
      $con++;

    }




    ?>

</table>




</div>
