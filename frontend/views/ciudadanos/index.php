<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Ciudadanos;
use yii\data\ActiveDataProvider;
use yii\db\Query;
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

    <?php
    $query = new Query();
    $dataProvider = new ActiveDataProvider([
          'query' => $query->from('ciudadanos'),
          'pagination' => [
              'pageSize' => 3,
          ],
    ]);
   ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'N_HISTCLINIC',
            'CEDULA',
            'APELLIDOS',
            'NOMBRES',
            'SEXO',
            // 'EDAD',
            // 'NACIONALIDAD',
            // 'AUTOIDETNICA',
            // 'LUGARRESIDE',
            // 'PROVINCIA',
            // 'CANTON',
            // 'PARROQUIA',
            // 'LOCALIDAD',
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
