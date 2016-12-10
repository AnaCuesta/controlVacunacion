<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CiudadanosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciudadanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadanos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ciudadanos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'N_HISTCLINIC',
            'CEDULA',
            'APELLIDOS',
            'NOMBRES',
            'CODSEXO',
            // 'CODEDAD',
            // 'CODNACIONALIDAD',
            // 'CODAUTOIDETNICA',
            // 'CODLUGARRESIDE',
            // 'CODPROVINCIA',
            // 'CODCANTON',
            // 'CODPARROQUIA',
            // 'CODLOCALIDAD',
            // 'DIRCIUD',
            // 'LONGITUD',
            // 'LAT',
            // 'TELFCIUD',
            // 'CORREOCIUD',
            // 'SNPERTENECEUO',
            // 'idCiudadano',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
