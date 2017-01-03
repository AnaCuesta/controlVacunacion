<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RegdiarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regdiarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regdiario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Regdiario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CODREGISTRODIARIO',
            'UNICODIGOES',
            'CODTIPODOC',
            'CODLUGARVACUNACION',
            'DESCRIPCIONESCENARIOVAC',
            // 'FECHAREGISTROVAC',
            // 'N_HISTCLINIC',
            // 'CODEDAD',
            // 'NOMBREVACUNADOR',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
