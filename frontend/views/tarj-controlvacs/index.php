<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TarjControlvacsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarj Controlvacs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarj-controlvacs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tarj Controlvacs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODTARCONTVAC',
            'CODTIPODOC',
            'NUMORDENTAR',
            'FECREGTAR',
            'FECHNAC',
            // 'LUGARNAC',
            // 'LUGARINSCRIPCION',
            // 'EDADINGRESO',
            // 'APELLIDOSNOMBRESMADRE',
            // 'APELLIDOSNOMBRESPADRE',
            // 'APELLIDOSNOMBRESTUTOR',
            // 'OBSERV:ntext',
            // 'CODCALENDARIOVAC',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
