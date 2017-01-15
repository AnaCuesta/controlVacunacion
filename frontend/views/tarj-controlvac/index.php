<?php

use yii\helpers\Html;
use yii\grid\GridView;
 use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TarjControlvacSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarj Controlvacs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvac-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tarj Controlvac', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
      <div class="col-sm-10">
        <h4><strong><?= Html::encode('Ministerio de Salud Pública') ?></strong></h4>
        <h5><?= Html::encode('Programa Ampliado de Inmunizaciones') ?></h5>
        <h3><strong><?= Html::encode($this->title) ?></strong></h3>
      </div>
      <div class="col-sm-2">
        <?= Html::img(Url::to('/advanced/frontend/views/tarj-controlvac/logo/persona.jpg', false), ['alt' => 'My logo', 'width'=>'110', 'class'=>'pull-right img-responsive']) ?>
      </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODTARCONTVAC',
            'N_HISTCLINIC',
            'UNICODIGOES',
            'perteneceUO',
            'NUMORDENTAR',
            // 'FECHNAC',
            // 'LUGARNAC',
            // 'LUGARINSCRIPCION',
            // 'EDADINGRESO',
            // 'APELLIDOSNOMBRESMADRE',
            // 'APELLIDOSNOMBRESPADRE',
            // 'APELLIDOSNOMBRESTUTOR',
            // 'OBSERV:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
