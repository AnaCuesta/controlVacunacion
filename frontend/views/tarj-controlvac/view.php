<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\Calendariovacunacion;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use frontend\models\Vacuna;
use frontend\models\REdadVac;
use frontend\models\Dosis;

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


    <?php
;
$dataProvider = new ActiveDataProvider([
      'query' => Calendariovacunacion::find()->where(['CODTARCONTVAC'=>$model->CODTARCONTVAC]),
      'pagination' => [
          'pageSize' => 5,
      ],
]);

$data = Calendariovacunacion::find()->where(['CODTARCONTVAC'=>$model->CODTARCONTVAC])->all();

?>
<table class="table table-striped table-bordered">
  <th class='info'>ID</th>
  <th class='info'>Dscripcion</th>
  <th class='info'>Dscripcion 1</th>
  <th class='info'>Dscripcion 2</th>

    <?php
    foreach ($data as $i => $value) {
      echo '<tr>';
      echo '<td>'.$i.'</td>';
      echo '<td>'.$value->CODDOSIS.'</td>';
      echo '<td>'.$value->FECHAVACUNA.'</td>';
      echo '<td>'.$value->ESTADO.'</td>';
      echo '</tr>';

    }
    ?>

</table>


<?php
echo  GridView::widget([
    'dataProvider' => $dataProvider,

    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'CODDOSIS',
        'CODEDAD',
        'FECHAVACUNA',
        'ESTADO',


    ],
]);
?>

</div>
