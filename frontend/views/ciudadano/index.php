<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CiudadanoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ciudadanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudadano-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ciudadano', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'DIRCIUD',
            // 'LONGITUD',
            // 'LAT',
            // 'TELFCIUD',
            // 'CORREOCIUD',
            // 'SNPERTENECEUO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
