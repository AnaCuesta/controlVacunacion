<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
